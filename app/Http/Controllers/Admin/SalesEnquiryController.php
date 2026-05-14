<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SalesEnquiry;
use Illuminate\Http\Request;

class SalesEnquiryController extends Controller
{
    public function index()
    {
        $enquiries = SalesEnquiry::latest()->paginate(10);

        return view('admin.sales_enquiries.index', compact('enquiries'));
    }

    public function destroy($id)
    {
        $enquiry = SalesEnquiry::findOrFail($id);
        $enquiry->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }

    // ✅ Bulk delete
    public function bulkDelete(Request $request)
    {
        SalesEnquiry::whereIn('id', $request->ids)->delete();

        return response()->json([
            'message' => 'Selected Enquiries Deleted'
        ]);
    }
}