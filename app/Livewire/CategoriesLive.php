<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Functions\Upload;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CategoriesLive extends Component
{
    use LivewireAlert, WithFileUploads;

    public $category_id;
    public $title_ar;
    public $title_en;
    public $image;
    public $old_image;
    public $parent_id;
    public $modal_title;

    public function openAddModal($parent_id = null)
    {
        $this->reset();
        if($parent_id){
            $this->parent_id = $parent_id;
            $this->modal_title = Category::find($parent_id)?->title_.lang();
        }
    }

    public function storeParent($again = false)
    {
        $this->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'image' => 'required'
        ]);

        $category = new Category();
        $category->title_ar = $this->title_ar;
        $category->title_en = $this->title_en;
        $category->image = Upload::UploadFile($this->image, 'categories');
        $category->save();

        $this->reset();
        if($again == false){
            $this->dispatch('closeModal');
        }
        $this->alert('success', __('dash.alert_add'));
    }

    public function storeChield($again = false)
    {
        $this->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
        ]);
        $category = new Category();
        $category->parent_id = $this->parent_id;
        $category->title_en = $this->title_en;
        $category->title_ar = $this->title_ar;
        $category->save();

        if($again == false){
            $this->reset();
            $this->dispatch('closeModal');
        }else{
            $this->resetExcept('parent_id');
        }
        $this->alert('success', __('dash.alert_add'));

    }

    public function openEditModal($category_id)
    {
        $category = category::findOrFail($category_id);
        if($category){
            $this->category_id = $category_id;
            $this->title_ar = $category->title_ar;
            $this->title_en = $category->title_en;
            $this->old_image = $category->image;
        }
    }

    public function update()
    {
        $this->validate([
            'title_ar' => 'required|min:3',
            'title_en' => 'required|min:3',
        ]);

        $category = category::find($this->category_id);
        if(!$category){
            $this->alert('error', 'Id not found!');
            return back();
        }
        $category->title_ar = $this->title_ar;
        $category->title_en = $this->title_en;
        if($this->image){
            Upload::deleteImage($category->image);
            $category->image = Upload::UploadFile($this->image, 'categories');
        }
        $category->save();
        $this->reset();
        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_update'));
    }

    public function openDeleteModal($category_id)
    {
        $this->category_id = $category_id;
    }

    public function delete()
    {
        $category = category::find($this->category_id);
        if(!$category){
            $this->alert('error', 'Id not found!');
            return back();
        }

        $category->delete();
        $this->dispatch('closeModal');
        $this->alert('success', __('dash.alert_delete'));
    }
    
    public function render()
    {
        $categories = Category::where('parent_id', null)->with('subs')->get();

        return view('livewire.categories-live', compact('categories'))
        ->extends('admin.layout')
        ->section('content');
    }
}
