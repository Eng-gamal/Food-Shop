<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        if (!session()->has('user')) {
            return response()->json([
                'message' => 'يجب تسجيل الدخول أولاً'
            ], 401);
        }

        $product = Product::findOrFail($id);
        $quantity = (int) $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'title' => $product->title,
                'quantity' => $quantity,
                'price' => $product->price,
                'image' => $product->image ? asset($product->image) : null,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'تم إضافة المنتج للعربة بنجاح',
            'cart_count' => count($cart)
        ]);
    }



    public function index()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('front.pages.cart', compact('cart', 'total'));

    }


    // public function updateAll(Request $request)
    // {

    //     $items = $request->input('items', []);
    //     $cart = session()->get('cart', []);

    //     foreach ($items as $id => $quantity) {
    //         if (isset($cart[$id])) {
    //             $quantity = (int) $quantity;

    //             if ($quantity > 0) {
    //                 $cart[$id]['quantity'] = $quantity;
    //             } else {
    //                 unset($cart[$id]);
    //             }
    //         }
    //     }

    //     session()->put('cart', $cart);

    //     $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

    //     return response()->json([
    //         'message' => ' تم تحديث العربة بنجاح',
    //         'cart' => $cart,
    //         'total' => $total,
    //     ]);
    // }

    public function updateAll(Request $request)
    {
        $items = $request->input('items', []);
        $cart = session()->get('cart', []);

        foreach ($items as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = (int) $quantity;
            }
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'تم تحديث العربة',
            'cart' => $cart,
            'total' => collect($cart)->sum(fn($i) => $i['price'] * $i['quantity'])
        ]);
    }


    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json([
            'message' => 'تم حذف المنتج',
            'cart_count' => count($cart),
            'total' => collect($cart)->sum(fn($i) => $i['price'] * $i['quantity'])
        ]);
    }

    public function checkoutPage()
    {


        return view('front.pages.checkout');
    }
    public function checkout(Request $request)
    {
        // هات العربة من السيشن
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return response()->json([
                'message' => 'العربة فارغة',
                'total' => 0
            ], 400);
        }

        // اجمع Subtotal
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        // حدد الشحن
        $shipping = 0;
        $shippingMethod = $request->input('shipping', 'flat-rate');
        if ($shippingMethod === 'flat-rate') {
            $shipping = 49;
        } elseif ($shippingMethod === 'cod-shipping') {
            $shipping = 20;
        } // free-shipping = 0

        // Total
        $total = $subtotal + $shipping;

        // رجع الرد
        return response()->json([
            'message' => 'تم حساب الإجمالي',
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total
        ]);
    }



}
