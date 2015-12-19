<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SetTest extends TestCase
{
	use DatabaseTransactions;
    public function testSetIndex()
    {
		$this->visit('sets')
			->see('Death Star');
    }

    public function testSetShow() 
    {
        $this->visit('sets/2')
            ->see('Death Star');
    }

    public function testSetCreate()
    {
    	$user = factory(App\User::class)->create();
    	$this->actingAs($user)
    		->visit('sets/create')
    		->type('TestSet', 'name')
    		->type('12345', 'number')
    		->press('Create')
    		->see('Set created');
    }

    public function testSetEdit()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
            ->visit('sets/9999/edit')
            ->type('TestSetEdit', 'name')
            ->type('12345 Edit', 'number')
            ->press('Save')
            ->see('Set saved');
    }

    public function testSetDelete()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
            ->visit('sets/9999/edit')
            ->press('Delete')
            ->see('Set deleted');
    }

}
