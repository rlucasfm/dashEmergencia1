<?php namespace App\Models;

use CodeIgniter\Model;

class Aluno extends Model
{
    protected $table            = 'alunos';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id', 'id_turma', 'nome', 'cpf', 'telefone', 'tamanhoCamisa', 'perfilOcupacional'];
    protected $useTimestamps    = false;
    protected $skipValidation   = true;

    public function cadastrar($data){
        if(empty($this->where('nome', $data['nome'])->first())){
            try {
                $this->insert($data);
                return('Cadastro realizado com sucesso');
            } catch (\Exception $err) {
                throw $err;
            }
        }else{
            throw new \Exception('Já existe um aluno cadastrado com este nome', 100);
        }               
    }

    public function listar($id_turma)
    {
        try {
            return $this->where('id_turma', $id_turma)->findAll();
        } catch (\Exception $th) {
            throw $th;
        }    
    }

    public function buscar($id)
    {
        try {
            return $this->find($id);
        } catch (\Exception $th) {
            throw $th;
        }    
    }

    public function atualizar($data)
    {
        try {
            $this->save($data);
            return('Turma atualizada!');
        } catch (\Exception $err) {
            throw $err;
        }        
    }

    public function buscarCpf($cpf){
        try {
            $result = $this->like('cpf', $cpf)->limit(20)->findAll();
            if(count($result) != 0){
                return $result;
            }else{
                return "Nenhum aluno encontrado";
            }
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function buscarNome($nome){
        try {
            $result = $this->like('nome', $nome)->limit(20)->findAll();
            if(count($result) != 0){
                return $result;
            }else{
                return "Nenhum aluno encontrado";
            }
        } catch (\Exception $th) {
            throw $th;
        }
    }
}