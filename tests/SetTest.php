<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SetTest extends TestCase
{
	use DatabaseTransactions;
    public function testSetIndex()
    {
		$this->visit('/sets')
			->see('Minifig');
    }

    public function testSetShow()
    {
        $this->visit('/sets/2')
            ->see('Minifig');
    }

    public function testSetCreate()
    {
    	$user = factory(App\User::class)->create();
    	$this->actingAs($user)
    		->visit('/sets/create')
    		->type('TestSet', 'name')
    		->type('12345', 'number')
            ->attach('10188.png', 'file')
    		->press('Create')
    		->see('Set created');
    }

    public function testSetEdit()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
            ->visit('/sets/10/edit')
            ->type('TestSetEdit', 'name')
            ->type('12345 Edit', 'number')
            ->press('Edit')
            ->see('Set saved');
    }

    public function testSetDelete()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
            ->visit('/sets/10/edit')
            ->press('Delete')
            ->see('Set deleted');
    }

    public function testSetEditAsGuest()
    {
        $this->visit('/sets/10/edit')
            ->see('login');
    }
}
