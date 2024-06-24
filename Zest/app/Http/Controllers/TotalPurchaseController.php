<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\totalpurchase;
use App\Models\Product;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SupplierExport;
use App\Imports\SupplierImport;
use Maatwebsite\Excel\Facades\Excel;

class TotalPurchaseController extends Controller
{
    //index
    public function index(){
        $purchase = totalPurchase::all();
        $supplier = Supplier::all();
        $product = Product::all();
        $purchase = totalPurchase::orderBy('created_at', 'asc')->get();
        return view("totalpurchase.index", compact("purchase", "supplier", "product"));
    }

    public function create()
    {
        $supplier = Supplier::all();
        $product = Product::all();
        return view("totalpurchase.create", compact("supplier","product"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "product_name"=> "required",
            "supplier_name"=> "required",
            "quantity"=> "numeric",
            "in_date"=> "required",
        ]);

        try {
            totalpurchase::create($request->all());
            return redirect()->route('totalpurchase.index')->with('success', 'Purchase added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add purchase. Please try again.');
        }
    }

    public function edit($id)
    {
        $purchase = totalpurchase::find($id);
        $supplier = Supplier::all();
        $product = Product::all();
        return view('totalpurchase.edit', compact('purchase','supplier', 'product'));
    }

    public function update(Request $request, $id)
    {
        $purchase = totalpurchase::find($id);

        $request->validate([
            "product_name"=> "required",
            "supplier_name"=> "required",
            "quantity"=> "numeric",
            "in_date"=> "required",
        ]);

        $update = [
            'product_name' => $request->product_name,
            'supplier_name' => $request->supplier_name,
            'quantity' => $request->quantity,
            'in_date' => $request->in_date,
        ];

        try {
            $purchase->update($request->all());
            return redirect()->route('totalpurchase.index')->with('success', 'Purchase updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update purchase. Please try again.');
        }
    }

    public function delete($id) {
        try {
            $pur = totalpurchase::find($id);
            $pur->delete();
            return redirect()->route('totalpurchase.index')->with('success', 'Purchase deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete purchase. Please try again.');
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $purchase = totalpurchase::query()
            ->where('product_name', 'ILIKE', '%' . $query . '%')
            ->orWhere('supplier_name', 'ILIKE', '%' . $query . '%')
            ->orWhere('quantity', 'ILIKE', '%' . $query . '%')
            ->orWhere('in_date', 'ILIKE', '%' . $query . '%')
            ->get();
        $supplier = Supplier::all();
        $product = Product::all();

        return view("totalpurchase.index", compact("product","supplier","purchase"));
    }
}