<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;

class ReviewController extends Controller
{
    public function addreview(Request $request){
       $stars = $request->input('product_rating');
       $product = $request->input('product_id');

       $product_check = Product::where('id', $product)->first();
       $prod = Product::where('id', $product)->get();
       $user = auth()->user();
       if($product_check){

            $user = auth()->user();

            $purchased = Order::where('phone', $user->phone)->where('product_name', $prod[0]->title)->first();
            if($purchased){
                $existing_rating = Review::where('user_id', Auth::id())->where('prod_id', $product)->first();

                if($existing_rating){
                    $existing_rating->stars = $stars;
                    $existing_rating->update();
                } else {
                    Review::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $product,
                        'stars' => $stars
                    ]);
                }
                return redirect()->back()->with('message','Product rated successfully!');
            } else {
                return redirect()->back()->with('message','You cannot review this item');
            }
       } else {
            return redirect()->back()->with('message','Link broken');
       }
    }
}
