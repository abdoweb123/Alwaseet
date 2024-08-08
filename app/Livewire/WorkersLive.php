<?php

namespace App\Livewire;

use App\Models\Worker;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class WorkersLive extends Component
{
    use LivewireAlert, WithFileUploads;

    use WithPagination;

    public $name, $personal_number, $passport_number, $phone, $email, $worker_id;
    public $isModalOpen = false;
    public $updateMode = false;
    public $confirmingDeletion = false;
    public $workerToDelete = null;

    protected $rules = [
        'name' => 'required|string|max:255',
        'personal_number' => 'required|string|max:20|unique:workers,personal_number',
        'passport_number' => 'required|string|max:20|unique:workers,passport_number',
        'phone' => 'required|string|max:15',
        'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
    ];


    public function render()
    {
        $workers = Worker::query()->paginate(10);

        return view('livewire.workers-live', compact('workers'))
            ->extends('admin.layout')
            ->section('content');
    }


    public function create()
    {
        $this->resetErrorBag(); // Clear validation errors
        $this->resetInputFields();
        $this->isModalOpen = true;
    }

    public function store()
    {
        $this->validate();

        Worker::create([
            'name' => $this->name,
            'personal_number' => $this->personal_number,
            'passport_number' => $this->passport_number,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        $this->alert('success', __('dash.alert_add'));

        $this->resetInputFields();
        $this->isModalOpen = false;
    }

    public function edit($id)
    {
        $this->resetErrorBag(); // Clear validation errors

        $worker = Worker::findOrFail($id);
        $this->worker_id = $id;
        $this->name = $worker->name;
        $this->personal_number = $worker->personal_number;
        $this->passport_number = $worker->passport_number;
        $this->phone = $worker->phone;
        $this->email = $worker->email;

        $this->updateMode = true;
        $this->isModalOpen = true;
    }

    public function update()
    {
        $this->validate();

        $worker = Worker::find($this->worker_id);
        $worker->update([
            'name' => $this->name,
            'personal_number' => $this->personal_number,
            'passport_number' => $this->passport_number,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        $this->alert('success', __('dash.alert_update'));

        $this->resetInputFields();
        $this->isModalOpen = false;
        $this->updateMode = false;
    }

    public function confirmDeletion($id)
    {
        $this->workerToDelete = $id;
        $this->confirmingDeletion = true;
    }

    public function delete()
    {
        Worker::find($this->workerToDelete)->delete();
        $this->alert('success', __('dash.alert_delete'));
        $this->confirmingDeletion = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->personal_number = '';
        $this->passport_number = '';
        $this->phone = '';
        $this->email = '';
        $this->worker_id = '';
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->updateMode = false; // Ensure updateMode is also reset
    }



} //end of class
