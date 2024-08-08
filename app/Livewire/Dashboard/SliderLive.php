<?php

namespace App\Livewire\Dashboard;

use App\Models\Slide;
use Livewire\Component;
use App\Functions\Upload;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SliderLive extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $slide_id;
    public $title_ar;
    public $title_en;
    public $desc_ar;
    public $desc_en;
    public $link;
    public $image;
    public $old_image;

    public function store()
    {
        $this->validate([
            'desc_ar' => 'required|min:3|max:255',
            'desc_en' => 'required|min:3|max:255',
            'title_ar' => 'required|min:3|max:255',
            'title_en' => 'required|min:3|max:255',
            'link' => 'max:255',
            'image' => 'required|image',
        ]);

        $slide = new Slide();
        $slide->desc_ar = $this->desc_ar;
        $slide->desc_en = $this->desc_en;
        $slide->title_ar = $this->title_ar;
        $slide->title_en = $this->title_en;
        $slide->link = $this->link;
        $slide->image = Upload::UploadFile($this->image, 'slides');
        $slide->save();
        
        $this->reset();
        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_add'));
    }
    public function openEditModal($slide_id)
    {
        $slide = Slide::findOrFail($slide_id);
        if($slide){
            $this->desc_ar = $slide->desc_ar;
            $this->desc_en = $slide->desc_en;
            $this->title_ar = $slide->title_ar;
            $this->title_en = $slide->title_en;
            $this->link = $slide->link;
            $this->old_image = $slide->image;
            $this->slide_id = $slide->id;
        }
    }

    public function update()
    {
        $this->validate([
            'desc_ar' => 'required|min:3|max:255',
            'desc_en' => 'required|min:3|max:255',
            'title_ar' => 'required|min:3|max:255',
            'title_en' => 'required|min:3|max:255',
            'link' => 'max:255',
        ]);

        $slide = Slide::find($this->slide_id);
        if(!$slide){
            $this->alert('error', 'Id not found!');
            return back();
        }
        $slide->desc_ar = $this->desc_ar;
        $slide->desc_en = $this->desc_en;
        $slide->title_ar = $this->title_ar;
        $slide->title_en = $this->title_en;
        $slide->link = $this->link;
        if($this->image){
            Upload::deleteImage($slide->image);
            $slide->image = Upload::UploadFile($this->image, 'slides');
        }
        $slide->save();

        $this->reset();
        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_update'));
    }

    public function openDeleteModal($slide_id)
    {
        $this->slide_id = $slide_id;
    }

    public function delete()
    {
        $slide = Slide::find($this->slide_id);
        if(!$slide){
            $this->alert('error', 'Id not found!');
            return back();
        }
        Upload::deleteImage($slide->image);
        $slide->delete();

        $this->reset();
        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_delete'));
    }

    public function render()
    {
        $slides = Slide::get();
        return view('livewire.dashboard.slider-live', compact('slides'))
        ->extends('admin.layout')
        ->section('content');
    }
}
