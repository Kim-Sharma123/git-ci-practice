<?php

namespace App\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;
    public $successMessage = '';

    // Validation rules
    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        // Validate input
        $validatedData = $this->validate();

        // Reset form fields
        $this->reset(['name', 'email', 'message']);

        // Set success message
        $this->successMessage = "Thank you! Your message has been submitted successfully.";
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
