<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Invoices = Invoice::all();

        return view('invoices.index', compact('Invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'item_name'=>'required',
            'description'=>'required',
            'item_price'=>'required',
            'quantity'=>'required',
            'line_total'=>'required'
        ]);

        $Invoice = new Invoice([
            'item_name' => $request->get('item_name'),
            'description' => $request->get('description'),
            'item_price' => $request->get('item_price'),
            'quantity' => $request->get('quantity'),
            'line_total' => $request->get('line_total')
        ]);
        $Invoice->save();
        return redirect('/invoices')->with('success', 'Invoice saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::find($id);
        return view('invoices.edit', compact('invoice')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name'=>'required',
            'description'=>'required',
            'item_price'=>'required'
        ]);

        $invoice = invoice::find($id);
        $invoice->item_name =  $request->get('item_name');
        $invoice->description = $request->get('description');
        $invoice->item_price = $request->get('item_price');
        $invoice->quantity = $request->get('quantity');
        $invoice->line_total = $request->get('line_total');
        $invoice->save();

        return redirect('/invoices')->with('success', 'invoice updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();

        return redirect('/invoices')->with('success', 'invoice deleted!');
    }
}
