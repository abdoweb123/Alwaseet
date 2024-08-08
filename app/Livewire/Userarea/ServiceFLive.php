<?php

namespace App\Livewire\Userarea;

use App\Models\Category;
use App\Models\Service;
use Livewire\Component;

class ServiceFLive extends Component
{
    public $category;
    public $categories;
    public $selected_category_id;

    public function serviceGet($category_id)
    {
        $this->selected_category_id = $category_id;
    }
    
    public function mount($category_id)
    {
        $this->category = Category::find($category_id);
        $this->categories = Category::where('parent_id', $category_id)->get();
        $this->selected_category_id = $this->categories->first()?->id;
    }

    public function render()
    {
        $services = Service::with('category')->where('category_id', $this->selected_category_id)->get();
        return view('livewire.userarea.service-f-live', compact('services'))
        ->extends('userarea.layout')
        ->section('content');
    }
}
