<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoices;
use App\Models\Products;
use App\Models\Sections;
use Illuminate\Http\Request;
use App\Notifications\Invoice;
use App\Models\invoices_details;
use App\Models\invoices_attachments;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoices::all();
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::all();
        $sections = Sections::all();
        return view('invoices.create', compact('products', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        Invoices::create([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'Status' => 'Unpaid',
            'Value_Status' => 2,
            'note' => $request->note,
        ]);
        $invoice_id = Invoices::latest()->first()->id;
        invoices_details::create([
            'invoice_id' => $invoice_id,
            'invoice_number' => $request->invoice_number,
            'product' => $request->product,
            'section' => $request->Section,
            'status' => 'unpaid',
            'status_value' => 2,
            'note' => $request->note,
            'user' => (Auth::user()->name),
        ]);
        if ($request->hasFile('pic')) {
            $invoice_id = Invoices::latest()->first()->id;
            $attachment = $request->file('pic');
            $file_name = $attachment->getClientOriginalName();
            $invoice_number = $request->invoice_number;
            //
            invoices_attachments::create([
                'invoice_id' => $invoice_id,
                'invoice_number' => $invoice_number,
                'file_name' => $file_name,
                'created_by' => (Auth::user()->name),
                'attachment' => $request->file('pic')->store('public/Attachments'),
            ]);
        }
        $user = Role::findByName('Admin')->users;
        $Invoices = Invoices::latest()->first()->id;
        Notification::send($user, new Invoice($Invoices));
        
        Alert::success('Success', 'Invoice created successfully and Attachment uploaded successfully');
        return redirect()->route('invoices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoices = Invoices::where('id', $id)->first();
        $invoices_details = invoices_details::where('invoice_id', $id)->get();
        $invoices_attachments = invoices_attachments::where('invoice_id', $id)->get();
        $notification = auth()->user()->unreadNotifications->where('data.id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
        }
        return view('invoices.details', compact('invoices', 'invoices_details', 'invoices_attachments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoices::where('id', $id)->first();
        $sections = Sections::all();
        $products = Products::all();
        //dd($invoice);
        return view('invoices.edit', compact('invoice', 'sections', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoices $invoices)
    {
        //dd($request->all());
        $invoices = Invoices::where('id', $request->id)->update([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'Status' => 'unpaid',
            'Value_Status' => 2,
            'note' => $request->note,
        ]);
        Alert::success('Success', 'Invoice updated successfully');
        return redirect()->route('invoices.index');
    }

    /**
     * Remove the specified resource from storage to trash.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoices = Invoices::where('id', $id)->delete();
        Alert::success('Success', 'Invoice deleted successfully');
        return redirect()->route('invoices.index');
    }

    /**
     * delete invoice for ever from storage.
     */
    public function delete($id)
    {
        $invoices = Invoices::where('id', $id)->forceDelete();
        Alert::success('Success', 'Invoice deleted successfully');
        return redirect()->route('invoices.archive');
    }

    /**
     * return all invoices archive
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        $invoices = Invoices::onlyTrashed()->get();
        return view('invoices.archive', compact('invoices'));
    }

    /**
     * restore invoice from archive
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $invoices = Invoices::onlyTrashed()->where('id', $id)->restore();
        Alert::success('Success', 'Invoice restored successfully');
        return redirect()->route('invoices.index');
    }

    public function getproducts($id)
    {
        $products = Products::where('section_id', $id)->pluck('Product_name', 'id');
        return json_encode($products);
    }

    /**
     * return view paid invoices
     * @return \Illuminate\Http\Response
     */
    public function paid($id)
    {
        $invoice = Invoices::where('id', $id)->first();
        //dd($invoice);
        $sections = Sections::all();
        return view('invoices.paid', compact('invoice'));
    }

    /**
     * Paidupdate for invoices
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function paidupdate(Request $request)
    {
        //dd($request->all());
        if ($request->Status=='Paid') {
            $invoices = Invoices::where('id', $request->id)->update([
                'Status' => $request->Status,
                'Value_Status' => 1,
                'Payment_Date' => $request->Payment_Date,
            ]);
            invoices_details::create([
                'invoice_id' => $request->id,
                'invoice_number' => $request->invoice_number,
                'Payment_Date' => $request->Payment_Date,
                'product' => $request->product,
                'section' => $request->Section,
                'status' => 'Paid',
                'status_value' => 1,
                'note' => $request->note,
                'user' => (Auth::user()->name),
            ]);
            Alert::success('Success', 'Invoice paid successfully');
            return redirect()->route('invoices.index');
        } else {
            $invoices = Invoices::where('id', $request->id)->update([
                'Status' => 'Partially',
                'Value_Status' => 3,
                'Payment_Date' => $request->Payment_Date,
            ]);
            invoices_details::create([
                'invoice_id' => $request->id,
                'invoice_number' => $request->invoice_number,
                'Payment_Date' => $request->Payment_Date,
                'product' => $request->product,
                'section' => $request->Section,
                'status' => 'Partially',
                'status_value' => 3,
                'note' => $request->note,
                'user' => (Auth::user()->name),
            ]);
            Alert::success('Success', 'Invoice partial successfully');
            return redirect()->route('invoices.index');
        }
    }

    /**
     * markAsRead all notifications
     * @return \Illuminate\Http\Response
     */
    public function markAsRead()
    {
        if (Auth::user()->unreadNotifications->count() > 0) {
            Auth::user()->unreadNotifications->markAsRead();
            Alert::success('Success', 'All notifications marked as read');
            return redirect()->back();
        } else {
            Alert::error('Error', 'No unread notifications');
            return redirect()->back(); 
        }
    }
    
}
