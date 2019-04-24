<?php

namespace Tests\Unit;

use App\User;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class UserTest extends TestCase
{
	use RefreshDatabase;
	
     /** @test */
    public function a_user_has_projects()
    {
        $user = factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->projects);
    }

     /** @test */
    public function a_user_has_accessible_projects()
    {
    	$tomas = $this->signIn();

        ProjectFactory::ownedBy($tomas)->create();

        $this->assertCount(1, $tomas->accessibleProjects());

        $filiuka = factory(User::class)->create();
        $salnyte = factory(User::class)->create();

        $project = tap(ProjectFactory::ownedBy($filiuka)->create())->invite($salnyte);
        $this->assertCount(1, $tomas->accessibleProjects());
        $project->invite($tomas);
        $this->assertCount(2, $tomas->accessibleProjects());
    }
}
 