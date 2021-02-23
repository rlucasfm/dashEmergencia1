<?php namespace App\Controllers;

use App\Models\Turma;
use App\Models\Aluno;

class Turmas extends BaseController
{
    /** 
     * @method void
     * 
     * Página de criação de turmas. Envio de informações para view     
     */
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

    /** 
     * @method void
     * 
     * Página de listagem de turmas. Envio de informações para view     
     */
    public function listarTurmas(){
        $turma = new Turma();

        try {
            $turmas = $turma->listar();
        } catch (\Exception $err) {
            session()->setFlashdata('errorMsg', 'Houve um erro... '.$err->getMessage());
            return redirect()->to(ROOTFOLDER . '/');
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

     /** 
     * @method void
     * 
     * Página de detalhamento de turmas. Envio de informações para view     
     */
    public function detalhes($id_turma)
    {
        $turma = new Turma();
        $aluno = new Aluno();

        try {
            $detalhes_turma = $turma->detalhes($id_turma);
        } catch (\Exception $err) {
            session()->setFlashdata('errorMsg', 'Houve um erro... '.$err->getMessage());
            return redirect()->to(ROOTFOLDER . '/');
        }

        try {
            $detalhes_alunos = $aluno->listar($id_turma);
        } catch (\Exception $err) {
            session()->setFlashdata('errorMsg', 'Houve um erro... '.$err->getMessage());
            return redirect()->to(ROOTFOLDER . '/');
        }

        $data = [
			"title" => "Detalhe da turma - Emergencia1",
			"name" => session()->get('name'),
			"menuActiveID" => "turmas",
			"errorMsg" => session()->get('errorMsg'),
			"successMsg" => session()->get('successMsg'),
            "detalhes" => $detalhes_turma,
            "id_turma" => $id_turma,
            "alunos" => $detalhes_alunos
		];
		echo view('templates/header', $data);
		echo view('turmas/detalhes', $data);
		echo view('templates/footer', $data);
    }
    // ==============------- COMUNICAÇÃO COM OS MODELOS -------==============

    /** 
     * @method void
     * 
     * Página de criação de turmas. Recebe informações da view e orienta para Model    
     */
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

    /** 
     * @method void
     * 
     * Página de edição de turmas. Recebe informações da view e orienta para Model    
     */
    public function atualizarTurma()
    {
        // Se a requisição for POST...
        if($this->request->getMethod() == "post"){
            $turma = new Turma();

            $nome = $this->request->getPost('nome') ?? 'Sem nome';
            $cargahoraria = $this->request->getPost('cargahoraria') ?? 0;
            $local = $this->request->getPost('local') ?? 'Vazio';  
            $numturma = $this->request->getPost('numturma') ?? 'Vazio';
            $id_turma = $this->request->getPost('idturma') ?? 'Vazio';
            
            $turmaData = [
                "id" => $id_turma,
                "nome" => $nome,
                "cargahoraria" => $cargahoraria,
                "local" => $local,
                'numturma' => $numturma
            ];

            try {
               $response = $turma->atualizar($turmaData);
               session()->setFlashdata('successMsg', $response);
            } catch (\Exception $err) {
                session()->setFlashdata('errorMsg', 'Houve um erro... '.$err->getMessage());
            }
        }
        return redirect()->to('listarTurmas');
    }
}