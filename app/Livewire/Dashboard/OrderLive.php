<?php

namespace App\Livewire\Dashboard;

use App\Models\Order;
use App\Models\Worker;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class OrderLive extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $order_id;
    public $search;

    public $order_number;

    public $bla_name;
    public $id_type;
    public $id_number;
    public $note;
    public $request_status;

    public $name, $personal_number, $passport_number, $phone, $email, $workers = [];


    public function mount()
    {
        $this->loadWorkers();
    }

    public function loadWorkers()
    {
        $this->workers = Worker::query()->select('personal_number')->get();
    }

    public function openDeleteModal($order_id)
    {
        $this->order_id = $order_id;
    }

    public function delete()
    {
        $order = Order::find($this->order_id);
        if ($order) {
            $order->delete();
            $this->dispatch('closeModal');
            $this->alert('success', __('dash.alert_delete'));
        }
    }

    public function changeStatus($order_id)
    {
        $order = Order::find($order_id);
        $order->status = !$order->status;
        $order->save();
    }


    public function openEditModal($order_id)
    {
        $this->order_id = $order_id;
        $order = Order::find($order_id);
        $this->order_number = $order->order_number;
        $this->bla_name = $order->bla_name;
        $this->id_type = $order->id_type;
        $this->id_number = $order->id_number;
        $this->note = $order->note;

        // worker data
        $this->loadWorkers();
        $this->personal_number = $order->worker?->personal_number;
        $this->name = $order->worker?->name;
        $this->passport_number = $order->worker?->passport_number;
        $this->phone = $order->worker?->phone;
        $this->email = $order->worker?->email;

    }


    // when choose personal_number from select['options'], get the other data
    public function updatedPersonalNumber($value)
    {
        $worker = Worker::where('personal_number', $value)->first();

        $this->loadWorkers();
        if ($worker) {
            $this->name = $worker->name;
            $this->passport_number = $worker->passport_number;
            $this->phone = $worker->phone;
            $this->email = $worker->email;
        } else {
            // Reset fields if no worker found
            $this->name = '';
            $this->passport_number = '';
            $this->phone = '';
            $this->email = '';
        }
    }


    public function openChangeRequestStatusModal($order_id)
    {
        $this->order_id = $order_id;
        $order = Order::find($order_id);
        $this->request_status = $order->request_status;

    }


    public function updateStatus()
    {
        $this->validate([
            'request_status' => 'required'
        ]);
        // dd($this->request_status);
        $order = Order::find($this->order_id);
        $order->request_status = $this->request_status;
        $order->save();

        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_update'));
    }


    public function update()
    {
        $this->validate([
            'note' => 'max:255'
        ]);

        // update worker data
        $worker = Worker::where('personal_number', $this->personal_number)->first();
        $worker->personal_number = $this->personal_number;
        $worker->name = $this->name;
        $worker->passport_number = $this->passport_number;
        $worker->phone = $this->phone;
        $worker->email = $this->email;
        $worker->save();

        // update order data
        $order = Order::find($this->order_id);
        $order->order_number = $this->order_number;
        $order->bla_name = $this->bla_name;
        $order->id_type = $this->id_type;
        $order->id_number = $this->id_number;
        $order->worker_id = $worker->id;
        $order->note = $this->note;
        $order->save();

        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_update'));
    }


    public function render()
    {
        $ordersDetailsData = Order::with(['user'])->where('created_at', 'LIKE', '%' . $this->search . '%')
            ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('phone', 'LIKE', '%' . $this->search . '%')
            ->orWhere('price', 'LIKE', '%' . $this->search . '%')
            ->orWhere('order_number', 'LIKE', '%' . $this->search . '%')
            ->orWhereHas('service', function ($q) {
                $q->where('title_en', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('title_ar', 'LIKE', '%' . $this->search . '%');
            })
            ->latest()->paginate(50);
        $orders = (clone $ordersDetailsData);
        $ordersCount = $ordersDetailsData->count();
        // dd($ordersCount);
        $sumPrice = round((clone $ordersDetailsData)->sum('price'), 3);
        // dd($sumPrice);

        return view('livewire.dashboard.order-live', compact('orders', 'sumPrice', 'ordersCount'))
            ->extends('admin.layout')
            ->section('content');
    }


} //end of class
