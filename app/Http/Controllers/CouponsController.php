<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;


class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return back()->withErrors('Invalid coupon code. Please try again.');
        }

        session()->put('coupon', [
            'name' => $coupon->code,
            'discount' => $coupon->discount(Cart::subtotal()),
        ]);

        return back()->with('success_message', 'Coupon has been applied!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        return back()->with('success_message', 'Coupon has been removed.');
    }
}
