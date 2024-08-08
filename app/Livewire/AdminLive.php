<?php

namespace App\Livewire;

use App\Models\Admin;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class AdminLive extends Component
{
    use LivewireAlert, WithPagination;

    public $search;

    public $admin_id;
    public $name;
    public $email;
    public $password;

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required'
        ]);

        $admin = new Admin();
        $admin->name = $this->name;
        $admin->email = $this->email;
        $admin->password = bcrypt($this->password);
        $admin->save();
        
        $this->reset();
        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_add'));
    }
    public function openEditModal($admin_id)
    {
        $admin = Admin::findOrFail($admin_id);
        if($admin){
            $this->name = $admin->name;
            $this->email = $admin->email;
            $this->admin_id = $admin_id;
        }
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:admins,email,'.$this->admin_id,
        ]);

        $admin = Admin::find($this->admin_id);
        if(!$admin){
            $this->alert('error', 'Id not found!');
            return back();
        }
        $admin->name = $this->name;
        $admin->email = $this->email;
        if($this->password){
            $admin->password = bcrypt($this->password);
        }
        $admin->save();

        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_update'));
    }

    public function openDeleteModal($admin_id)
    {
        $this->admin_id = $admin_id;
    }

    public function delete()
    {
        $admin = Admin::find($this->admin_id);
        if(!$admin){
            $this->alert('error', 'Id not found!');
            return back();
        }

        $admin->delete();
        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_delete'));
    }

    public function render()
    {
        $admins = Admin::search(['name', 'email'], $this->search)->paginate(20);
        return view('livewire.admin-live', compact('admins'))
        ->extends('admin.layout')
        ->section('content');
    }
}
