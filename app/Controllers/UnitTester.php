<?php namespace App\Controllers;

use App\Models\Turma;

class UnitTester extends BaseController
{
	public function index()
	{	
		$turma = new Turma();

		var_dump($turma->listar());

	}

	//--------------------------------------------------------------------

}
