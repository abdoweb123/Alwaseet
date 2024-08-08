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

class HomeController extends Controller
{
    public function index()
    {
        $home = [
            // 'hospitals' => Hospital::count(),
            // 'services' => Service::count(),
            // 'specialties' => Specialty::count(),
            // 'categories' => Category::count(),
            // 'partners' => Company::count(),
            // 'emails' => CompanyEmail::count(),
        ];

        return view('admin.index', compact('home'));
    }



    public function user_data(Request $request)
    {
        $user = User::where('id',$request->user_id)->first();
        return response()->json($user);
    }


    public function service_price(Request $request)
    {
        // dd(1);
        $service=Service::find($request->service_id);
        $user = User::where('id',$request->user_id)->first();
        if($user->end_memebership==null){
            $price=$service->price;
        }else{
            $price=$service->price_for_users;
        }
        return response()->json($price);

    }


}
