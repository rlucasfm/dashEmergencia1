<?php namespace App\Controllers;

class Turmas extends BaseController
{
    public function criarturma()
    {
        $data = [
			"title" => "Cadastro de turmas - Emergencia1",
			"name" => session()->get('name'),
			"menuActiveID" => "dash",
			"errorMsg" => session()->get('errorMsg'),
			"successMsg" => session()->get('successMsg')
		];
		echo view('templates/header', $data);
		echo view('turmas/cadastrar', $data);
		echo view('templates/footer', $data);
    }

    public function cadastrarturmaDB()
    {
        // Se a requisição for POST...
        if($this->request->getMethod() == "post"){
            $nome = $this->request->getPost('nome') ?? 'Sem nome';
            $cargahoraria = $this->request->getPost('cargahoraria') ?? 0;
            $local = $this->request->getPost('local') ?? 'Vazio';            
        }else{
            return redirect()->to('criarturma');
        }
    }
}