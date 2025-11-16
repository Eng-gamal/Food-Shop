<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function index()
    {
        $products = $this->product->all();
        return view('front.pages.products', compact('products'));
    }
    public function getProsuctDetails($id)
    {
        // Backward-compatible wrapper to handle existing routes with the misspelled name
        $product = Product::with('file')->findOrFail($id);
        return $this->getProductDetails($product);
    }
    public function getProductDetails(Product $product)
    {
        $product->load('file');
        $details = Product::where('id', '!=', $product->id)->get();
        $products = $this->product->all();
        return view('front.pages.product_details', compact('product', 'details', 'products'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        $products = Product::whereTranslationLike('title', "%{$query}%")->get();

        return response()->json($products);
    }
}
