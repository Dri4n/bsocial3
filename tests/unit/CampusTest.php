<?php

use App\User;
use App\Campus;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use \TestCase;

class CampusTest extends TestCase
{
	use DatabaseTransactions;
	/** @test */
	function agregar_un_usuario_a_un_campus(){

		$user = factory(User::class)->create(['campus_id' => 1]);
		$campus = factory(Campus::class)->create(['host' => 'localhost']);
		$campus->addUser($user);

		$this->assertEquals($user->id,$campus->users()->first()->id);
	}

	/** @test */
	function agregar_muchos_usuarios_a_un_campus(){

		$campusestwo = factory(Campus::class,2)->create();
		$campus = factory(Campus::class)->create();
		$users = factory(User::class,2)->create();

		$campus->addUser($users);

		$this->assertEquals(2,$campus->users()->get()->count());

		// $this->setExpectedException('Exception');

		$campus->addUser($campusestwo);
	}

	function eliminar_usuario_de_un_campus(){
		$campus = Campus::first();
		$campus->users()->first()->delete();
	}
}