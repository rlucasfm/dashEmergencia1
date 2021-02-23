<?php namespace App\Controllers;

use App\Models\Turma;
use App\Models\Aluno;

class Matriculas extends BaseController
{
    /** 
     * @method view
     * 
     * Página de matricula de alunos. Envio de informações para view     
     */
    public function matricula()
    {
        $turmas = new Turma();

        $data = [
			"title" => "Matrícula de aluno - Emergencia1",
			"name" => session()->get('name'),
			"menuActiveID" => "matriculas",
			"errorMsg" => session()->get('errorMsg'),
			"successMsg" => session()->get('successMsg'),
            "turmas" => $turmas->listar()
		];

		echo view('templates/header', $data);
		echo view('matriculas/matriculas', $data);
		echo view('templates/footer', $data);
    }

    /** 
     * @method view
     * 
     * Página de busca de alunos. Envio de informações para view     
     */
    public function buscar()
    {
        $alunos = new Aluno();

        $data = [
			"title" => "Matrícula de aluno - Emergencia1",
			"name" => session()->get('name'),
			"menuActiveID" => "matriculas",
			"errorMsg" => session()->get('errorMsg'),
			"successMsg" => session()->get('successMsg')            
		];

		echo view('templates/header', $data);
		echo view('matriculas/busca', $data);
		echo view('templates/footer', $data);
    }

    /** 
     * @method view
     * 
     * Página de edição de alunos. Envio de informações para view     
     */
    public function editar($id_aluno)
    {
        $alunos = new Aluno();
        $turmas = new Turma();

        $data = [
			"title" => "Atualização de aluno - Emergencia1",
			"name" => session()->get('name'),
			"menuActiveID" => "matriculas",
			"errorMsg" => session()->get('errorMsg'),
			"successMsg" => session()->get('successMsg'),
            "aluno" => $alunos->buscar($id_aluno),
            "turmas" => $turmas->listar()           
		];

		echo view('templates/header', $data);
		echo view('matriculas/editar', $data);
		echo view('templates/footer', $data);
    }
    // ==============------- COMUNICAÇÃO COM OS MODELOS -------==============

    /** 
     * @method void
     * 
     * Controller que recebe a matricula do aluno. Recebe informações da view e orienta para Model    
     */
    public function cadastrarMatricula()
    {        
        // Se a requisição for POST...
        if($this->request->getMethod() == "post"){
            $aluno = new Aluno();

            $nome = $this->request->getPost('nome') ?? 'Sem nome';
            $id_turma = $this->request->getPost('id_turma') ?? 0;
            $cpf = $this->request->getPost('cpf') ?? 'Vazio';  
            $telefone = $this->request->getPost('telefone') ?? 'Vazio';
            $perfilOcupacional = $this->request->getPost('perfilOcupacional') ?? 'Vazio';
            $tamanhoCamisa = $this->request->getPost('tamanhoCamisa') ?? 'M';
            
            $dataAluno = [
                "nome" => $nome,
                "id_turma" => $id_turma,
                "cpf" => $cpf,
                'telefone' => $telefone,
                "perfilOcupacional" => $perfilOcupacional,
                "tamanhoCamisa" => $tamanhoCamisa
            ];

            try {
               $response = $aluno->cadastrar($dataAluno);
               session()->setFlashdata('successMsg', $response);
            } catch (\Exception $err) {
                session()->setFlashdata('errorMsg', 'Houve um erro... '.$err->getMessage());
            }
        }

		return redirect()->to('matricula');
    }

    /** 
     * @method void
     * 
     * Controller que recebe a buscar por CPF/Nome do aluno. Recebe informações da view e orienta para Model    
     */
    public function buscarAluno()
    {
        $aluno = new Aluno();

        $cpf = $this->request->getPost('cpf') ?? NULL;
        $nome = $this->request->getPost('nome') ?? NULL;

        if(isset($cpf)){
            try {
                $result = $aluno->buscarCpf($cpf);
            } catch (\Exception $err) {
                $result = $err->getMessage();
            }            
        }elseif(isset($nome)){
            try {
                $result = $aluno->buscarNome($nome);
            } catch (\Exception $err) {
                $result = $err->getMessage();
            } 
        }else{
            $result = 'Nenhum aluno encontrado';
        }            

        echo json_encode($result);
    }

    /** 
     * @method void
     * 
     * Controller que recebe a atualização do aluno. Recebe informações da view e orienta para Model    
     */
    public function editarDB()
    {
        $aluno = new Aluno();

        // Se a requisição for POST...
        if($this->request->getMethod() == "post"){
            $aluno = new Aluno();

            $id = $this->request->getPost('id_aluno');
            $nome = $this->request->getPost('nome') ?? 'Sem nome';
            $id_turma = $this->request->getPost('id_turma') ?? 0;
            $cpf = $this->request->getPost('cpf') ?? 'Vazio';  
            $telefone = $this->request->getPost('telefone') ?? 'Vazio';
            $perfilOcupacional = $this->request->getPost('perfilOcupacional') ?? 'Vazio';
            $tamanhoCamisa = $this->request->getPost('tamanhoCamisa') ?? 'M';
            
            $dataAluno = [
                "id" => $id,
                "nome" => $nome,
                "id_turma" => $id_turma,
                "cpf" => $cpf,
                'telefone' => $telefone,
                "perfilOcupacional" => $perfilOcupacional,
                "tamanhoCamisa" => $tamanhoCamisa
            ];

            try {
               $response = $aluno->atualizar($dataAluno);
               session()->setFlashdata('successMsg', $response);
            } catch (\Exception $err) {
                session()->setFlashdata('errorMsg', 'Houve um erro... '.$err->getMessage());
            }
        }

        return redirect()->to("editar/$id");
    }
}