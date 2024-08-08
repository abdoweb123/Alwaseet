<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\CompanyEmail;
use App\Models\Contactus;
use App\Models\Hospital;
use App\Models\Image;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\Specialty;
use App\Models\Worker;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function new_order()
    {
        $users = User::get();
        $services = Service::get();
        return view('admin.new_order', compact('users','services'));
    }

    public function create_order(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
        ]);
        // dd($request->all());
        $lastOrder = Order::latest('order_number')->first();
        $nextNumber = $lastOrder ? (int) substr($lastOrder->order_number, 1) + 1 : 1;
        $service=Service::find($request->service_id);
        $user = User::where('id',$request->user_id)->first();
        if($user->end_memebership==null){
            $price=$service->price;
        }else{
            $price=$service->price_for_users;
        }
        $order = new Order();
        $order->order_number = 'R' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->service_id = $request->service_id;
        $order->user_id = $request->user_id;
        $order->price = $request->price??$price;
        $order->save();

        return redirect(route('dashboard.home'))->with('success', __('dash.item_added'));
    }


    public function edit_order($id)
    {
        $order = Order::find($id);

        $workers = Worker::query()->select('personal_number')->get();

        return view('admin.edit_order', compact('workers','order'));
    }


    public function worker_data(Request $request)
    {
        $worker = Worker::where('personal_number',$request->personal_number)->first();
        return response()->json($worker);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'note' => 'max:255'
        ]);

        $worker = Worker::where('personal_number', $request->personal_number)->first();

        // update order data
        $order = Order::find($id);
        $order->order_number = $request->order_number;
        $order->bla_name = $request->bla_name;
        $order->id_type = $request->id_type;
        $order->id_number = $request->id_number;
        $order->worker_id = $worker->id;
        $order->note = $request->note;
        $order->save();

        session()->flash('success', __('dash.alert_update'));
        return redirect()->back();
    }


    public function show_order($order_id)
    {
        $order = Order::findOrFail($order_id);

        return view('admin.show_order', compact('order'));
    }


} //end of class
