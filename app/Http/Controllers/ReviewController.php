<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Comment;

class ReviewController extends Controller
{
    public function addreview(Request $request){
       $stars = $request->input('product_rating');
       $product = $request->input('product_id');

       $product_check = Product::where('id', $product)->first();
       $prod = Product::where('id', $product)->get();
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

    public function writecomment($id){
        $product = Product::where('id', $id)->first();
        $user = auth()->user();
        $count = Cart::where('phone', $user->phone)->count();

        if($product){
            $comment = Comment::where('user_id', Auth::id())->where('prod_id', $id)->first();
            if($comment){
                return view('reviews.edit', compact('comment', 'count'));
            } else {
                $purchased = Order::where('phone', $user->phone)->where('product_name', $product->title)->first();

                return view('reviews.index', compact('product', 'purchased', 'count'));
            }
        } else {
            return redirect()->back()->with('message', 'Broken link!');
        }
    }

    public function createcomment(Request $request){
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->first();
        if($product){
            $user_comment = $request->input('user_comment');
            $new_comment = Comment::create([
                'user_id' => Auth::id(),
                'prod_id' => $product_id,
                'comment' => $user_comment
            ]);

            if($new_comment){
                return redirect('viewproduct/'.$product_id)->with('message','Comment added! Thank you!');
            }

        } else {
            return redirect()->back()->with('message', 'Broken link!');
        }
    }

    public function editcomment($id){
        $product = Product::where('id', $id)->first();
        $user = auth()->user();
        $count = cart::where('phone', $user->phone)->count();

        if($product){
            $comment = Comment::where('user_id', Auth::id())->where('prod_id', $id)->first();
            if($comment){
                return view('reviews.edit', compact('comment', 'count'));
            } else {
                return redirect()->back()->with('message', 'Broken link!');
            }
        } else {
            return redirect()->back()->with('message', 'Broken link!');
        }
    }

    public function updatecomment(Request $request){
        $user_comment = $request->input('user_comment');

        if($user_comment != ''){
            $review_id = $request->input('comment_id');
            $review = Comment::where('id', $review_id)->where('user_id', Auth::id())->first();

            if($review){
                $review->comment = $user_comment;
                $review->update();
                return redirect('viewproduct/'.$review->product->id)->with('message', 'Review updated successfully!');
            } else {
                return redirect()->back()->with('message', 'Cannot submit empty review!');
            }
        }
    }
}
