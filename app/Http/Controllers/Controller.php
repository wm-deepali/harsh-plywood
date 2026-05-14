<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function submitReleasePaymentall(Request $request)
    {
        $requestData = $request->all();

        // ✅ VALIDATION FIX
        $validator = Validator::make($requestData, [
            'teacher_id' => 'required',
            'payment_method' => 'required',
            'payment_date' => 'required',
            'transaction_id' => 'required',
            'remarks' => 'required',
            'upload_screenshot' => 'required|image|mimes:jpg,png,svg,jpeg',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false, // ✅ FIXED
                'code' => 422,
                'errors' => $validator->errors(),
            ]);
        }

        // ✅ FILE UPLOAD
        if ($request->hasFile('upload_screenshot')) {
            $requestData['upload_screenshot'] = $request->file('upload_screenshot')->store('upload_screenshot');
        }

        $teacherId = $request->teacher_id;

        $startOfPreviousMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfPreviousMonth = Carbon::now()->subMonth()->endOfMonth();

        DB::beginTransaction();

        try {

            // ================= QUESTIONS =================
            $questions = Question::where('teacher_id', $teacherId)
                ->where('payment_status', 'pending')
                ->whereBetween('created_at', [$startOfPreviousMonth, $endOfPreviousMonth])
                ->pluck('id');

            Question::where('teacher_id', $teacherId)
                ->where('payment_status', 'pending')
                ->whereBetween('created_at', [$startOfPreviousMonth, $endOfPreviousMonth])
                ->update([
                    'payment_status' => 'paid',
                    'payment_mode' => $request->payment_method,
                    'payment_release_date' => now(),
                ]);

            // ================= TESTS =================
            $tests = StudentTest::where('teacher_id', $teacherId)
                ->where('payment_status', 'pending')
                ->whereBetween('created_at', [$startOfPreviousMonth, $endOfPreviousMonth])
                ->pluck('id');

            StudentTest::where('teacher_id', $teacherId)
                ->where('payment_status', 'pending')
                ->whereBetween('created_at', [$startOfPreviousMonth, $endOfPreviousMonth])
                ->update([
                    'payment_status' => 'paid',
                    'payment_mode' => $request->payment_method,
                    'payment_release_date' => now(),
                ]);

            // ================= ONCALL =================
            $oncalls = StudentTeacherOnCallLiveStreaming::where('teacher_id', $teacherId)
                ->where('teacher_payment_status', 'pending')
                ->whereBetween('created_at', [$startOfPreviousMonth, $endOfPreviousMonth])
                ->pluck('id');

            StudentTeacherOnCallLiveStreaming::where('teacher_id', $teacherId)
                ->where('teacher_payment_status', 'pending')
                ->whereBetween('created_at', [$startOfPreviousMonth, $endOfPreviousMonth])
                ->update([
                    'teacher_payment_status' => 'paid',
                    'payment_mode' => $request->payment_method,
                    'payment_release_date' => now(),
                ]);

            // ================= LIVE CLASS =================
            $livecalls = LiveClassSchedule::where('teacher_id', $teacherId)
                ->where('teacher_payment_status', 'pending')
                ->whereBetween('created_at', [$startOfPreviousMonth, $endOfPreviousMonth])
                ->pluck('id');

            LiveClassSchedule::where('teacher_id', $teacherId)
                ->where('teacher_payment_status', 'pending')
                ->whereBetween('created_at', [$startOfPreviousMonth, $endOfPreviousMonth])
                ->update([
                    'teacher_payment_status' => 'released',
                    'payment_mode' => $request->payment_method,
                    'payment_release_date' => now(),
                ]);

            // ================= INTERVIEW (CSV FIELD) =================
            $interview = InterviewScheduleDetailTeacher::where('teacher_id', 'like', "%$teacherId%")
                ->where('teacher_payment_status', 'pending')
                ->whereBetween('created_at', [$startOfPreviousMonth, $endOfPreviousMonth])
                ->pluck('id');

            InterviewScheduleDetailTeacher::where('teacher_id', 'like', "%$teacherId%")
                ->where('teacher_payment_status', 'pending')
                ->whereBetween('created_at', [$startOfPreviousMonth, $endOfPreviousMonth])
                ->update([
                    'teacher_payment_status' => 'released',
                    'payment_mode' => $request->payment_method,
                    'payment_release_date' => now(),
                ]);

            // ================= SAVE PAYMENT LOG =================
            $extraData = [
                'teacher_id' => $teacherId,
                'question_id' => $questions->implode(","),
                'testpaper_id' => $tests->implode(","),
                'oncall_id' => $oncalls->implode(","),
                'liveclass_id' => $livecalls->implode(","),
                'interview_id' => $interview->implode(","),
                'payment_status' => "paid",
                'payment_for_start_date' => $startOfPreviousMonth->format('d M'),
                'payment_for_end_date' => $endOfPreviousMonth->format('t M'),
                'status' => "released",
            ];

            $finalData = array_merge($requestData, $extraData);

            TeacherPaymentManage::create($finalData);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Payment Released Successfully',
            ]);

        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
