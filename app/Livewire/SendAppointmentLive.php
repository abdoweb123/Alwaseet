<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class SendAppointmentLive extends Component
{
    public $name, $phone, $email, $message;
    public $sent;
    public function store()
    {
        $this->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:15',
            'email' => 'required|max:255|email:rfc,dns',
            'message' => 'required|max:255',
        ]);

        $contact = new Contact();
        $contact->name = $this->name;
        $contact->phone = $this->phone;
        $contact->email = $this->email;
        $contact->message = $this->message;
        $contact->type = 'appointment';
        $contact->save();

        $this->reset();
        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.send-appointment-live');
    }
}
