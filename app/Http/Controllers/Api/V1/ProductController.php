<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return response()->json($products, 200);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return response()->json(true, 200);
    }

}
