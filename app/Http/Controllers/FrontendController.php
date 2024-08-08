<?php

namespace App\Http\Controllers;

use App\Jobs\SendMembershipExpirationNotification;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Category;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function home()
    {
        $categories = Category::where('parent_id', null)->limit(12)->get();
        $slides = Slide::get();
        return view('userarea.home', compact('categories', 'slides'));
    }

    public function categories()
    {
        $categories = Category::where('parent_id', null)->get();

        return view('userarea.categories', compact('categories'));
    }

    public function about_us()
    {
        return view('userarea.about');
    }

    public function contact()
    {
        $points = setting('google_map_link') ? getMapPoint(setting('google_map_link')) : [];

        return view('userarea.contact', compact('points'));
    }

    public function contact_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|max:255|min:3|email|ends_with:.com',
            'phone' => 'required|max:255|min:3',
            'subject' => 'required|max:255|min:3',
            'message' => 'required|max:1000|min:3',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return back()->with('success', __('dash.sended_successfully'));
    }

    public function services_show($service_id)
    {
        $service = Service::findOrFail($service_id);
        $category = $service->category;
        return view('userarea.service_show', compact('service', 'category'));
    }

    public function guest($service_id)
    {
        $service = Service::findOrFail($service_id);
        $category = $service->category;
        return view('userarea.guest', compact('service', 'category'));
    }

    public function guest_store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'phone' => 'required|min:3|max:10'
        ]);
        $lastOrder = Order::latest('order_number')->first();
        $nextNumber = $lastOrder ? (int) substr($lastOrder->order_number, 1) + 1 : 1;

        $order = new Order();
        $order->order_number = 'R' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->service_id = $request->service_id;
        $order->price = Service::find($request->service_id)->price;
        $order->save();

        return back()->with('success', __('dash.sended_successfully'));
    }

    public function user_store($service_id)
    {
        $user = auth()->user();

        if($user->total_price_month != null && Carbon::now()->toDateString()  < $user->end_memebership){
            $price = Service::find($service_id)->price_for_users;
        }else{
           $price = Service::find($service_id)->price;
        }
        // if ($price > $user->wallet) {
        //     return back()->with('error', __('dash.wallet_error'));
        // }
        $lastOrder = Order::latest('order_number')->first();
        $nextNumber = $lastOrder ? (int) substr($lastOrder->order_number, 1) + 1 : 1;
        $user = auth()->user();
        $order = new Order();
        $order->user_id = auth()->id();
        $order->order_number = 'R' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
        $order->name = $user->name;
        $order->phone = $user->phone;
        $order->service_id = $service_id;
        $order->price = $price;
        $order->save();

        $user->wallet -= $order->price;
        $user->save();

        return back()->with('success', __('dash.wallet_success'));
    }

    public function login_page()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        return view('userarea.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'cpr' => 'required',
            'password' => 'required|min:3|max:255',
        ]);
        // dd($request->all());
        $credentials = [
            'cpr'  => $request->cpr ,
            'password' => $request->password,
        ];
// dd($credentials);
        // Attempt to login the user
        if (Auth::attempt($credentials)) {
            // dd(1);
            return redirect()->route('home');
        } else {
            // dd(2);
            return back()->with('error', __('dash.bad_credential'));
        }
    }

    public function profile()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', auth()->id())->latest()->get();
        return view('userarea.profile', compact('user', 'orders'));
    }

    public function change_pass(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|unique:users,phone,' . auth()->id(),
            'password' => 'min:3|max:255',
            'number_months' => 'nullable|numeric',
            'end_memebership' => 'nullable|date',
            'price_month' => 'nullable|numeric',
        ]);

        $user = User::find(auth()->id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->number_months = $request->number_months;
        $user->end_memebership = $request->end_memebership;
        $user->price_month = $request->price_month;
        $user->total_price_month = $request->price_month * $request->number_months;
        $user->save();

        return back()->with('success', __('dash.alert_update'));
    }

    public function orders()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();
        return view('userarea.old_orders', compact('orders'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
