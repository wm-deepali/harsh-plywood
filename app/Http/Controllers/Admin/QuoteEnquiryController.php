<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteInquiry;
use Illuminate\Http\Request;

class QuoteEnquiryController extends Controller
{
    public function index()
    {
        $enquiries = QuoteInquiry::latest()->paginate(10);

        return view('admin.quote_enquiries.index', compact('enquiries'));
    }

    public function destroy($id)
    {
        $enquiry = QuoteInquiry::findOrFail($id);
        $enquiry->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }

    // ✅ Bulk delete
    public function bulkDelete(Request $request)
    {
        QuoteInquiry::whereIn('id', $request->ids)->delete();

        return response()->json([
            'message' => 'Selected Enquiries Deleted'
        ]);
    }
}