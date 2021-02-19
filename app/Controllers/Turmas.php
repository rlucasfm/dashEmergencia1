<?php namespace App\Controllers;

use App\Models\Turma;

class Turmas extends BaseController
{
    public function criarturma()
    {
        $data = [
			"title" => "Cadastro de turmas - Emergencia1",
			"name" => session()->get('name'),
			"menuActiveID" => "turmas",
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
            $turma = new Turma();

            $nome = $this->request->getPost('nome') ?? 'Sem nome';
            $cargahoraria = $this->request->getPost('cargahoraria') ?? 0;
            $local = $this->request->getPost('local') ?? 'Vazio';  
            $numturma = $this->request->getPost('numturma') ?? 'Vazio';
            
            $turmaData = [
                "nome" => $nome,
                "cargahoraria" => $cargahoraria,
                "local" => $local,
                'numturma' => $numturma
            ];

            try {
               $response = $turma->cadastrar($turmaData);
               session()->setFlashdata('successMsg', $response);
            } catch (\Exception $err) {
                session()->setFlashdata('errorMsg', 'Houve um erro... '.$err->getMessage());
            }
        }
        return redirect()->to('criarturma');
    }

    public function listarTurmas(){
        $turma = new Turma();

        try {
            $turmas = $turma->listar();
        } catch (\Throwable $th) {
            session()->setFlashdata('errorMsg', 'Houve um erro... '.$err->getMessage());
            return redirect()->to('/');
        }

        $data = [
			"title" => "Listar turmas - Emergencia1",
			"name" => session()->get('name'),
			"menuActiveID" => "turmas",
			"errorMsg" => session()->get('errorMsg'),
			"successMsg" => session()->get('successMsg'),
            "turmas" => $turmas
		];

		echo view('templates/header', $data);
		echo view('turmas/listar', $data);
		echo view('templates/footer', $data);
    }
}