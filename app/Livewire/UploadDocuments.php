<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\DriverDocument;

class UploadDocuments extends Component
{
    use WithFileUploads;

    public $drivers_licence;
    public $id_document;
    public $hasDocuments = false;

    public function mount()
    {
        $this->hasDocuments = auth()->user()->driverDocument()->exists();
    }

    public function save()
    {
        $this->validate([
            'drivers_licence' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'id_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if (!$this->drivers_licence && !$this->id_document) {
            session()->flash('error', 'Please upload at least one document.');
            return;
        }

        $data = [];

        if ($this->drivers_licence) {
            $data['drivers_licence'] = $this->drivers_licence->store('documents', 'public');
        }

        if ($this->id_document) {
            $data['id_document'] = $this->id_document->store('documents', 'public');
        }

        DriverDocument::updateOrCreate(
            ['user_id' => auth()->id()],
            $data
        );

        session()->flash('message', 'Documents uploaded successfully!');
        $this->hasDocuments = true;
        $this->reset(['drivers_licence', 'id_document']);
    }

    public function render()
    {
        return view('livewire.upload-documents')
            ->layout('layouts.driver');
    }
}
