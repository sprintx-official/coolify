<?php

namespace App\Livewire\SharedVariables\Project;

use App\Models\Project;
use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $projects;

    public function mount()
    {
        if (auth()->user()->isMember()) {
            abort(403);
        }
        $this->projects = Project::ownedByCurrentTeam()->get();
    }

    public function render()
    {
        return view('livewire.shared-variables.project.index');
    }
}
