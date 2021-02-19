<div class="container-fluid">   
    <div class='s-pre-con'>
        <img src="<?= ROOTFOLDER ?>/static/img/loader.gif" alt="Loading cool animation">
    </div>

    <div class="card">
        <div class="card-body">        
            <h4>Informações da turma</h4>
            <hr> 
            <form action='../atualizarTurma' method='POST'>
                <div class="row">
                    <div class="col-md-4">
                        <input type="hidden" name="idturma" value="<?= esc($id_turma) ?>">
                        <div class="form-group">
                            <label for="nome">Nome da turma</label>
                            <input type="text" class="form-control" name="nome" id="nome" aria-describedby="nomeHelp" value="<?= esc($detalhes->nome) ?>" required>                            
                        </div>
                    </div>  
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="numturma">Número da turma</label>
                            <input type="text" name="numturma" id="numturma" class="form-control" value="<?= esc($detalhes->numturma) ?>" required>                            
                        </div>
                    </div> 
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cargahoraria">Carga horária</label>
                            <input type="number" name="cargahoraria" id="cargahoraria" class="form-control" value="<?= esc($detalhes->cargahoraria) ?>" required>                            
                        </div>
                    </div>  
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="local">Local da turma</label>
                            <input type="text" name="local" id="local" class="form-control" value="<?= esc($detalhes->local) ?>">                            
                        </div>
                    </div>                             
                </div> 
                <hr>    
                <button type="submit" class="btn btn-primary mt-4" id="btnSubmit">Atualizar</button>
            </form>            
        </div>
    </div>
</div>

<script>
    $('#btnSubmit').on('click', (event) => {
        $('.s-pre-con').show();

        setTimeout(() => {
            $('.s-pre-con').hide(); 
        }, 1500);
    })
</script>