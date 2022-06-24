<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if($usertype == '1')
        {
            return view('admin.home');
        } else {
            $data = product::paginate(6);

            $user = auth()->user();
            $count = cart::where('phone', $user->phone)->count();
            $latestdata = product::latest()->take(3)->get();

            return view('user.home', compact('data', 'count', 'latestdata'));
        }
    }

    public function allproducts()
    {
        $usertype = Auth::user()->usertype;
        if($usertype == '1')
        {
            return view('admin.home');
        } else {
            $data = product::paginate(6);

            $user = auth()->user();
            $count = cart::where('phone', $user->phone)->count();

            return view('user.allproducts', compact('data', 'count'));
        }
    }

    public function index()
    {
        if(Auth::id()){
            return redirect('redirect');
        } else {
            $data = product::paginate(6);
            $latestdata = product::latest()->take(3)->get();

            return view('user.home', compact('data', 'latestdata'));
        }
    }

    public function search(Request $request){
        $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            $search = $request->search;

            $data = product::where('title','Like','%'.$search.'%')->orWhere('description','Like','%'.$search.'%')->get();
            return view('admin.showproduct', compact('data'));

        } else {
            $search = $request->search;

            $user = auth()->user();
            $count = cart::where('phone', $user->phone)->count();

            if($search == ''){
                $data = product::paginate(6);
    
                return view('user.allproducts', compact('data', 'count'));
            }

            $data = product::where('title','Like','%'.$search.'%')->orWhere('description','Like','%'.$search.'%')->get();
    
            return view('user.allproducts', compact('data', 'count'));
        }
    }

    public function addcart(Request $request, $id){
        if(Auth::id()){
            $product = product::find($id);
            $user = auth()->user();
            $cart = new cart;
            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back()->with('message','Product added to cart!');
        } else {
            return redirect('login');
        }
    }

    public function showcart(){
        $user = auth()->user();
        $cart = cart::where('phone', $user->phone)->get();
        $count = cart::where('phone', $user->phone)->count();

        return view('user.showcart', compact('count', 'cart'));
    }

    public function deletecart($id){
        $data = cart::find($id);
        $data->delete();
        
        return redirect()->back()->with('message','Product removed from cart!');
    }

    public function confirmorder(Request $request){
        $user = auth()->user();
        $name = $user->name;
        $phone = $user->phone;
        $address = $user->address;

        foreach($request->productname as $key => $productname){
            $order = new order;
            $order->product_name = $request->productname[$key];
            $order->price = $request->price[$key];
            $order->quantity = $request->quantity[$key];
            $order->name = $name;
            $order->phone = $phone;
            $order->address = $address;
            $order->status = 'Not delivered';
            $order->save();
        }
        DB::table('carts')->where('phone', $phone)->delete();
        return redirect()->back()->with('message','Order sent!');
    }

    public function viewproduct($id){
        $product = product::find($id);
        $user = auth()->user();
        $count = cart::where('phone', $user->phone)->count();

        return view('user.viewproduct', compact('product', 'count'));
    }

    public function filter(Request $request){
        if($request->sortby == 'asc' || $request->sortby == 'desc'){
            $data = Product::orderBy('price', $request->sortby ?? 'ASC')->get();
        } else {
            if($request->sortby == 'asctime'){
                $data = Product::orderBy('id', 'ASC')->get();
            } else {
                $data = Product::orderBy('id', 'DESC')->get();
            }
        }

        $user = auth()->user();
        $count = cart::where('phone', $user->phone)->count();

        return view('user.allproducts', compact('data', 'count', 'request'));
    }

    public function orders(){
        $user = auth()->user();
        $orders = order::where('phone', $user->phone)->get();
        $count = cart::where('phone', $user->phone)->count();

        return view('user.showorder', compact('orders', 'count'));
    }
}
