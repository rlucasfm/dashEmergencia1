<?php namespace App\Models;

use CodeIgniter\Model;

class Turma extends Model
{
    protected $table            = 'turmas';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id', 'nome', 'cargahoraria', 'local'];
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
            throw new \Exception('Já existe um curso cadastrado com este nome', 100);
        }               
    }

    public function listar(){
        try {
           return $this->findAll();
        } catch (\Exception $th) {
            throw $th;
        }        
    }
}