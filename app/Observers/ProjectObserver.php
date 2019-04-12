<?php

namespace App\Observers;

use App\Project;
use App\Activity;

class ProjectObserver
{
    /**
     * Handle the project "created" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
        Activity::create([
            'project_id' => $project->id,
            'description' => 'created'
        ]);
    }

    /**
     * Handle the project "updated" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function updated(Project $project)
    {
        Activity::create([
            'project_id' => $project->id, 
            'description' => 'updated'
        ]);
    }
}
