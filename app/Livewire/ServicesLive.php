<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Functions\Upload;
use App\Models\Category;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ServicesLive extends Component
{
    use WithFileUploads, LivewireAlert;
    public $service_id;
    public $sub_category;
    public $title_ar;
    public $title_en;
    public $price;
    public $price_for_users;
    public $desc_ar;
    public $desc_en;

    public function store($again = false)
    {
        $this->validate([
            'title_ar' => 'required|min:3|max:255',
            'title_en' => 'required|min:3|max:255',
            'price' => 'required',
            'price_for_users' => 'required',
            'desc_ar' => 'required|min:3|max:1000',
            'desc_en' => 'required|min:3|max:1000',
        ]);

        $service = new Service();
        $service->category_id = $this->sub_category->id;
        $service->title_ar = $this->title_ar;
        $service->title_en = $this->title_en;
        $service->price = $this->price;
        $service->price_for_users = $this->price_for_users;
        $service->desc_ar = $this->desc_ar;
        $service->desc_en = $this->desc_en;
        $service->save();
        
        if($again == false){
            $this->dispatch('closeModal');
        }

        $this->resetExcept('sub_category');
        $this->alert('success', __('dash.alert_add'));
    }
    public function openEditModal($service_id)
    {
        $service = Service::findOrFail($service_id);
        if($service){
            $this->title_ar = $service->title_ar;
            $this->title_en = $service->title_en;
            $this->price = $service->price;
            $this->price_for_users = $service->price_for_users;
            $this->desc_ar = $service->desc_ar;
            $this->desc_en = $service->desc_en;
            $this->service_id = $service_id;
        }
    }

    public function update()
    {
        $this->validate([
            'title_ar' => 'required|min:3|max:255',
            'title_en' => 'required|min:3|max:255',
            'price' => 'required',
            'price_for_users' => 'required',
            'desc_ar' => 'required|min:3|max:1000',
            'desc_en' => 'required|min:3|max:1000',
        ]);

        $service = Service::find($this->service_id);
        if(!$service){
            $this->alert('error', 'Id not found!');
            return back();
        }
        $service->title_ar = $this->title_ar;
        $service->title_en = $this->title_en;
        $service->price = $this->price;
        $service->price_for_users = $this->price_for_users;
        $service->desc_ar = $this->desc_ar;
        $service->desc_en = $this->desc_en;
        $service->save();

        $this->resetExcept('sub_category');
        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_update'));
    }

    public function openDeleteModal($service_id)
    {
        $this->service_id = $service_id;
    }

    public function delete()
    {
        $service = Service::find($this->service_id);
        if(!$service){
            $this->alert('error', 'Id not found!');
            return back();
        }
        $service->delete();

        $this->resetExcept('sub_category');
        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_delete'));
    }

    public function mount($sub_category_id)
    {
        $this->sub_category = Category::find($sub_category_id);
    }

    public function render()
    {
        $services = Service::where('category_id', $this->sub_category->id)->get();
        return view('livewire.services-live', compact('services'))
        ->extends('admin.layout')
        ->section('content');
    }
}
