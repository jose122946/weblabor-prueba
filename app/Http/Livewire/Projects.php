<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;
    public $search = '';
    public $sortField;
    public $sortDirection = 'asc';
    public $listeners = [
        'deleteProject' => 'delete'
    ];
    public function render()
    {
        return view('livewire.projects', [
            'projects' => \App\Models\Projects::query()->where('name', 'LIKE', "%$this->search%")
                ->orderBy($this->sortField, $this->sortDirection)->paginate(10)
        ]);
    }

    public function sortBy($field) {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function showModal($projectId = null) {
        $this->emit('showModal', $projectId);
    }

    public function delete(\App\Models\Projects $project) {
        $name = $project->name;
        if ($project->imagen) {
            Storage::disk('files')->delete($project->imagen);
        }
        $project->delete();
        $this->dispatchBrowserEvent('toastr:info', [
            'message' => "El projecto $name ha sido eliminado"
        ]);
    }

    public function deleteConfirm(\App\Models\Projects $project) {
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => 'Delete Project',
            'text' => 'Estas seguro que desea eliminar el proyecto?',
            'type' => 'warning',
            'project' => $project
        ]);
    }
}
