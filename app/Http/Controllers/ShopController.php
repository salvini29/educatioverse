<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Course;
use Stripe;

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
    public function viewDetail(Request $request): View
    {
        $course = Course::findOrFail($request->id);
        $course_parsed = $course->getAttributes();
        $relatedCourses = Course::where('topic',$course_parsed['topic'])->whereNotIn('id', [$course_parsed['id']])->inRandomOrder()->limit(4)->get();
        return view('shop.shop_detail')->with('course',$course)->with('relatedCourses', $relatedCourses);
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
    public function addMultipleToCart(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;
        $course = Course::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $course->name,
                "quantity" => $quantity,
                "price" => $course->price,
                "type" => $course->type
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->route('shop.cart')->with('success', 'Course added to cart successfully!');
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
    //STRIPE
    public function viewStripeGateway(Request $request): View
    {
        session()->put('pay_amount', $request->pay_amount);
        return view('shop.stripe_gateway')->with('pay_amount',$request->pay_amount);
    }
    public function postStripePayment(Request $request)
    {
        Stripe\Stripe::setApiKey(config('stripe.sk'));
      
        /*Stripe\Charge::create ([
                "amount" => 10 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from tester." 
        ]);
                
        return back()->with('success', 'Payment successful!');*/

        function calculateOrderAmount(): int 
        {
            $total_pay = session()->get('pay_amount');
            $order_amount = (int)$total_pay*100;
            return $order_amount;
        }

        
        header('Content-Type: application/json');

        try {

            //$jsonStr = file_get_contents('php://input');
            //$jsonObj = json_decode($jsonStr);

            $paymentIntent = Stripe\PaymentIntent::create([
                'amount' => calculateOrderAmount(),
                'currency' => 'usd', // Replace with your country's primary currency
                "description" => "Course payment",
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            echo json_encode($output);
        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }


    }

}
