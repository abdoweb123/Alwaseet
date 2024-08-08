<?php

namespace App\Livewire;

use App\Models\Contact;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ContactLive extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    public $name, $email, $subject, $message, $created_at;

    public $msg_id;
    public function openShowModal($contact_id)
    {
        $contact = Contact::find($contact_id);
        if($contact){
            $this->name = $contact->name;
            $this->email = $contact->email;
            $this->subject = $contact->subject;
            $this->message = $contact->message;
            $this->created_at = $contact->created_at;
        }
    }

    public function openDeleteModal($msg_id)
    {
        $this->msg_id = $msg_id;
    }

    public function delete()
    {
        $msg = Contact::find($this->msg_id);
        if($msg){
            $msg->delete();
            $this->dispatch('closeModal');
            $this->alert('success', __('dash.alert_delete'));    
        }
    }

    public function render()
    {
        $contacts = Contact::latest()->paginate(20);

        return view('livewire.contact-live', compact('contacts'))
        ->extends('admin.layout')
        ->section('content');
    }
}
