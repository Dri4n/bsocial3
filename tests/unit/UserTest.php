<?php

use App\User;
use App\Campus;

use \TestCase;

class UserTest extends TestCase
{
	/** @test */
	function an_user_associated_to_existing_campus(){
		$user = factory(User::class)->create(['campus_id' => 1]);
		$campus = $user->campus()->first();
		$this->assertEquals($campus->id,1);
	}
}