<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Course;

class ShopController extends Controller
{
    public function viewIndex(Request $request): View
    {
        $courses = Course::all();
        return view('shop.shop_index')->with('courses',$courses);
    }
    public function viewCart(Request $request): View
    {
        return view('shop.shop_cart');
    }
    public function addToCart($id)
    {
        $course = Course::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $course->name,
                "quantity" => 1,
                "price" => $course->price,
                "type" => $course->type
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Course added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Course removed successfully');
        }
    }


}
