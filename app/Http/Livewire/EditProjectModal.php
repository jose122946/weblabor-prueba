<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProjectModal extends Component
{
    use WithFileUploads;
    public $showModal = 'hidden';
    public $projectId;
    public $name;
    public $description;
    public $imagen;
    public $trixId;
    public $status;
    protected $listeners = [
        'showModal' => 'showModal'
    ];
    public function render()
    {

        return view('livewire.edit-project-modal');
    }

    public function showModal($projectId) {
        $project = \App\Models\Projects::find($projectId);
        if ($project) {
            $this->name = $project->name;
            $this->description = $project->description;
            $this->status = $project->status;
            $this->imagen = $project->imagen;
        }
        $this->showModal = '';
        $this->projectId = $projectId;
    }

    public function closeModal() {
        $this->showModal = 'hidden';
    }

    public function mount() {
        $this->description = '';
    }
    public function saveProject() {

        if ($this->projectId) {
            $project = \App\Models\Projects::find($this->projectId);
        } else {
            $project = new \App\Models\Projects();
        }

        $project->name = $this->name;
        $project->description = $this->description;
        $project->status = $this->status;
        $project->imagen = $this->imagen && !is_string($this->imagen) ? $this->imagen->store('', 'files') : null;
        $project->save();
        $this->dispatchBrowserEvent('toastr:info', [
            'message' => 'El proyecto se ha guardado'
        ]);
        $this->closeModal();
    }
}
