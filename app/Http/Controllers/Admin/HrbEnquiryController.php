<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HrbEnquiry;
use Illuminate\Http\Request;

class HrbEnquiryController extends Controller
{
    public function index()
    {
        $enquiries = HrbEnquiry::latest()
            ->paginate(10);

        return view(
            'admin.hrb_enquiries.index',
            compact('enquiries')
        );
    }

    public function destroy($id)
    {
        $enquiry = HrbEnquiry::findOrFail($id);

        $enquiry->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }

    // ✅ Bulk delete

    public function bulkDelete(Request $request)
    {
        HrbEnquiry::whereIn(
            'id',
            $request->ids
        )->delete();

        return response()->json([
            'message' => 'Selected Enquiries Deleted'
        ]);
    }
}