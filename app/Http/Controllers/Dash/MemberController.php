<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{

    public function membershipCertificate(User $user): View
    {
        return view('admin.member.certificate',compact('user'));
    }

} //end of class
