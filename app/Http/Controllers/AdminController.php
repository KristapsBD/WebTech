<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function product(){
        if(Auth::id()){
            if(Auth::user()->usertype == '1'){
                return view('admin.product');
            } else {
                return redirect()->back();
            }

        } else {
            return redirect('login');
        }
    }

    public function uploadproduct(Request $request){
        $data = new product;
        $image = $request->file;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage', $imagename);

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->image = $imagename;

        $data->save();

        return redirect()->back()->with('message','Product uploaded successfully!');
    }

    public function showproduct(){
        $data = product::all();

        return view('admin.showproduct', compact('data'));
    }

    public function deleteproduct($id){
        $data = product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product deleted!');
    }

    public function updateview($id){
        $data = product::find($id);
        return view('admin.updateview', compact('data'));
    }

    public function updateproduct(Request $request, $id){
        $data = product::find($id);
        $image = $request->file;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('productimage', $imagename);
            $data->image = $imagename;
        }

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;

        $data->save();

        return redirect()->back()->with('message','Product updated successfully!');
    }

    public function showorder(){
        $order = order::all();
        return view('admin.showorder', compact('order'));
    }

    public function updatestatus($id){
        $order = order::find($id);

        $order->status = 'Delivered';

        $order->save();

        return redirect()->back()->with('message','Status updated!');
    }

    public function showuser(){
        $users = User::all();
        return view('admin.showuser', compact('users'));
    }

    public function promote($id){
        $user = User::find($id);

        $user->usertype = 1;

        $user->save();

        return redirect()->back()->with('message','User promoted to admin!');
    }

    public function deleteuser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message','User deleted!');
    }
}
