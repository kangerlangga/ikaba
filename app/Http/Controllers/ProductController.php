<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = [
            'judul' => 'Products',
            'DataP' => Product::latest()->get(),
            'cOP' => Order::where('status_orders', 'Pending')->count(),
            'cMC' => Message::where('status_messages', 'Unread')->count(),
        ];
        return view('pages.admin.product', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data = [
            'judul' => 'New Product',
            'cOP' => Order::where('status_orders', 'Pending')->count(),
            'cMC' => Message::where('status_messages', 'Unread')->count(),
        ];
        return view('pages.admin.product_add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // validate form
        $request->validate([
            'ImageP'    => 'required|image|mimes:jpeg,jpg,png|max:3072',
            'Name'      => 'required|max:255',
            'Code'      => 'required|max:100|unique:products,code_products',
            'Price'     => 'required|numeric|min:0',
            'Stock'     => 'required|integer|min:0',
        ]);

        // Upload images
        $imageP = $request->file('ImageP');

        // Generate unique names for both images
        $imagePName = time() . Str::random(17) . '.' . $imageP->getClientOriginalExtension();

        // Move both images to the same folder
        $imageP->move('assets/public/img/Product', $imagePName);

        //create
        Product::create([
            'id_products'       => 'Product'.Str::random(33),
            'image_products'    => $imagePName,
            'name_products'     => $request->Name,
            'code_products'     => $request->Code,
            'price_products'    => $request->Price,
            'stock_products'    => $request->Stock,
            'created_by'        => Auth::user()->email,
            'modified_by'       => Auth::user()->email,
        ]);

        //redirect to index
        return redirect()->route('product.add')->with(['success' => 'Product has been Added!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $data = [
            'judul' => 'Edit Product',
            'EditProduct' => Product::findOrFail($id),
            'cOP' => Order::where('status_orders', 'Pending')->count(),
            'cMC' => Message::where('status_messages', 'Unread')->count(),
        ];
        return view('pages.admin.product_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'ImageP'    => 'image|mimes:jpeg,jpg,png|max:3072',
            'Name'      => 'required|max:255',
            'Price'     => 'required|numeric|min:0',
            'Stock'     => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('ImageP')) {
            $imagePPath = 'assets/public/img/Product/' . $product->image_products;
            if (file_exists($imagePPath)) {
                unlink($imagePPath);
            }
            $imageP = $request->file('ImageP');
            $imagePName = time() . Str::random(17) . '.' . $imageP->getClientOriginalExtension();
            $imageP->move('assets/public/img/Product', $imagePName);
        } else {
            $imagePName = $product->image_products;
        }

        $product->update([
            'image_products'    => $imagePName,
            'name_products'     => $request->Name,
            'price_products'    => $request->Price,
            'stock_products'    => $request->Stock,
            'modified_by'       => Auth::user()->email,
        ]);

        return redirect()->route('product.data')->with(['success' => 'Product has been Updated!']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get by ID
        $product = Product::findOrFail($id);
        $imagePPath = 'assets/public/img/Product/' . $product->image_products;

        if (file_exists($imagePPath)) {
            unlink($imagePPath);
        }

        $product->delete();

        //redirect to index
        return redirect()->route('product.data')->with(['success' => 'Product has been Deleted!']);
    }

    public function getProductPrice($code) {
        $product = Product::where('code_products', $code)->first();
        return response()->json(['price' => $product ? $product->price_products : 0, 'stock' => $product ? $product->stock_products : 0]);
    }
}
