<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Functions\PushNotification;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class UsersLive extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public $user_id;
    public $name;
    public $email;
    public $phone;
    public $cpr;
    public $password;
    public $wallet;
    public $number_months;
    public $end_memebership;
    public $price_month;
    public $total_price_month;

    // public function post()
    // {
    //     PushNotification::send('test message', null);
    //     dd('success');
    // }

    public function store()
    {

        // $this->membership=isset($this->membership)  ? 1:0;
        // dd($this->end_memebership);
        $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required',
            'email' => 'nullable|email',
            'wallet' => 'required|numeric',
            'cpr' => 'required|unique:users,cpr',
            'password' => 'required',
            'number_months' => 'nullable|numeric|min:1',
            'end_memebership' => 'nullable|date',
            'price_month' => 'nullable|numeric|min:0.001',
        ]);

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->wallet = $this->wallet;
        $user->cpr = $this->cpr;
        $user->is_verified = true;
        $user->number_months = $this->number_months != null || $this->number_months != "" ? $this->number_months : null;
        $user->end_memebership = $this->end_memebership != null || $this->end_memebership != "" ? $this->end_memebership : null;
        $user->price_month = $this->price_month != null || $this->price_month != "" ? $this->price_month : null;
        $user->total_price_month = ($this->number_months != null || $this->number_months != "" ? $this->number_months : null) && ($this->price_month != null || $this->price_month != "" ? $this->price_month : null) ? $this->price_month * $this->number_months : null;
        $user->password = bcrypt($this->password);

        $user->save();

        $this->reset();
        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_add'));
    }

    public function openEditModal($user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user) {
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->cpr = $user->cpr;
            $this->user_id = $user_id;
            $this->wallet = $user->wallet;
            $this->number_months = $user->number_months;
            $this->end_memebership = $user->end_memebership;
            $this->price_month = $user->price_month;
        }
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'nullable|email',
            'phone' => 'required',
            'wallet' => 'required|numeric',
            'number_months' => 'nullable|numeric',
            'end_memebership' => 'nullable|date',
            'price_month' => 'nullable|numeric',
            'cpr' => 'required|unique:users,cpr,' . $this->user_id,
        ]);

        $user = User::find($this->user_id);
        $oldWalt = $user->wallet;
        if (!$user) {
            $this->alert('error', 'Id not found!');
            return back();
        }
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->cpr = $this->cpr;
        $user->wallet = $this->wallet;
        if ($this->password) {
            $user->password = bcrypt($this->password);
        }
        $user->number_months = $this->number_months != null || $this->number_months != "" ? $this->number_months : null;
        $user->end_memebership = $this->end_memebership != null || $this->end_memebership != "" ? $this->end_memebership : null;
        $user->price_month = $this->price_month != null || $this->price_month != "" ? $this->price_month : null;
        $user->total_price_month = ($this->number_months != null || $this->number_months != "" ? $this->number_months : null) && ($this->price_month != null || $this->price_month != "" ? $this->price_month : null) ? $this->price_month * $this->number_months : null;
        $user->save();

        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_update'));
    }

    public function openDeleteModal($user_id)
    {
        $this->user_id = $user_id;
    }

    public function delete()
    {
        $user = User::find($this->user_id);
        if (!$user) {
            $this->alert('error', 'Id not found!');
            return back();
        }

        $user->delete();
        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_delete'));
    }


    public function render()
    {
        // dd($this->isChecked);
        $usersDetailsData = User::search(['name', 'email', 'phone', 'cpr'], $this->search);
        $users = (clone $usersDetailsData)->paginate(50);
        $sumPrice = round((clone $usersDetailsData)->sum('total_price_month'), 3);
        $walletTotla = round((clone $usersDetailsData)->sum('wallet'), 3);
        // dd($walletTotla);
        return view('livewire.users-live', ['users' => $users, 'sumPrice' => $sumPrice,'walletTotla'=>$walletTotla])
            ->extends('admin.layout')
            ->section('content');
    }
}
