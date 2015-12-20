<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MinfigTest extends TestCase
{
	use DatabaseTransactions;
    public function testMinifigIndex()
    {
        $this->visit('minifigs')
			->see('Boba');
    }

    public function testMinifigCreate()
    {
    	$user = factory(App\User::class)->create();
        $minfig = factory(App\Minifig::class)->create();
    	$this->actingAs($user)
    		->visit('minifigs/create')
    		->type('TestMinifig', 'name')
    		->select('9999', 'set_id')
            #->attach('10188.png', 'files[]')
    		->press('Create')
    		->see('Minifig created');
    }

    public function testMinifigEdit()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
            ->visit('minifigs/2/edit')
            ->type('TestMinifig Edit', 'name')
            #->attach(['10188.png', '10189.png'], 'files[]')
            ->select('9999', 'set_id')
            ->press('Save')
            ->see('Minifig saved');
    }

    public function testMinifigDelete()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
            ->visit('minifigs/2/edit')
            ->press('Delete')
            ->see('Minifig deleted');
    }

    public function testSetEditAsGuest()
    {
        $this->visit('minifigs/2/edit')
            ->see('login');
    }
}