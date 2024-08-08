<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactusFrontLive extends Component
{

    public $name, $subject, $email, $message;
    public $sent;
    public function store()
    {
        $this->validate([
            'name' => 'required|max:255',
            'subject' => 'required|max:255',
            'email' => 'required|max:255|email:rfc,dns',
            'message' => 'required|max:255',
        ]);

        $contact = new Contact();
        $contact->name = $this->name;
        $contact->subject = $this->subject;
        $contact->email = $this->email;
        $contact->message = $this->message;
        $contact->type = 'contact';
        $contact->save();

        $this->reset();
        $this->sent = true;
    }

    public function render()
    {
        $points = setting('google_map_link') ? getMapPoint(setting('google_map_link')) : [];

        $data = [
            'phone' => setting('phone'),
            'email' => setting('email'),
            'address' => setting('address'),
            "lat" => $points["lat"] ?? '',
            "long" => $points["long"] ?? '',
        ];


        return view('livewire.contactus-front-live', compact('data'))
        ->extends('userarea.layout')
        ->section('content');
    }
}
