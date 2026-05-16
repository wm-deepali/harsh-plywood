<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;

class ContactEnquiryController extends Controller
{
    public function index()
    {
        $enquiries = ContactEnquiry::latest()
            ->paginate(10);

        return view(
            'admin.contact_enquiries.index',
            compact('enquiries')
        );
    }

    public function destroy($id)
    {
        $enquiry = ContactEnquiry::findOrFail($id);

        $enquiry->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }

    // ✅ Bulk delete

    public function bulkDelete(Request $request)
    {
        ContactEnquiry::whereIn(
            'id',
            $request->ids
        )->delete();

        return response()->json([
            'message' => 'Selected Enquiries Deleted'
        ]);
    }
}