<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class WalletController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view('admin.wallet.create',compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:1,2',
            'amount' => 'required|min:0',
        ]);

        $user = User::query()->findOrFail($request->user_id);

        DB::beginTransaction();
        try {

            Wallet::query()->create([
                'user_id'=>$request->user_id,
                'type'=>$request->type,
                'amount'=>$request->amount,
            ]);

            // Update user's wallet balance
            $amount = $request->amount;
            $user->wallet += $request->type == 1 ? -$amount : $amount;  // if type == withdraw(سحب) --> minus --- else plus
            $user->save();

            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => __('dash.alert_error')]);
        }

        session()->flash('success', __('dash.alert_add'));
        return redirect()->back();
    }


    /*** get transactions of user ***/
    public function transactions(User $user): View
    {
        $transactions = Wallet::query()->where('user_id',$user->id)->get();

        $total_wallet = $user->wallet;

        return view('admin.wallet.show',compact('transactions','total_wallet'));
    }

} //end of class
