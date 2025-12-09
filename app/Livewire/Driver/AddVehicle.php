<?php

namespace App\Livewire\Driver;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Vehicle;

class AddVehicle extends Component
{
    use WithFileUploads;
    public $make;
    public $model;
    public $registration_number;
    public $year;
    public $registration_document;
    public $insurance_document;
    public $roadworthy_certificate;

    protected function rules()
    {
        return [
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'registration_number' => 'required|string|unique:vehicles,registration_number|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'registration_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'insurance_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'roadworthy_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ];
    }

    public function save()
    {
        $this->validate();

        $data = [
            'user_id' => auth()->id(),
            'make' => $this->make,
            'model' => $this->model,
            'registration_number' => strtoupper($this->registration_number),
            'year' => $this->year,
            'status' => 'pending',
        ];

        if ($this->registration_document) {
            $data['registration_document'] = $this->registration_document->store('vehicle-documents', 'public');
        }
        if ($this->insurance_document) {
            $data['insurance_document'] = $this->insurance_document->store('vehicle-documents', 'public');
        }
        if ($this->roadworthy_certificate) {
            $data['roadworthy_certificate'] = $this->roadworthy_certificate->store('vehicle-documents', 'public');
        }

        Vehicle::create($data);

        session()->flash('message', 'Vehicle added successfully! Waiting for admin approval.');

        $this->reset([
            'make',
            'model',
            'registration_number',
            'year',
            'registration_document',
            'insurance_document',
            'roadworthy_certificate'
        ]);

        $this->dispatch('vehicle-added');
    }

    public function render()
    {
        return view('livewire.driver.add-vehicle')->layout('layouts.driver');
    }
}
