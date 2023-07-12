<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PublicProjects extends Component
{
    public function render()
    {
        return view('livewire.public-projects', [
            'projects' => \App\Models\Projects::query()->where('status', '=', 1)->paginate(8)
        ]);
    }
}
