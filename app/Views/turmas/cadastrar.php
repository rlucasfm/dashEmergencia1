<div class="container-fluid">
    <div class='s-pre-con'>
        <img src="<?= ROOTFOLDER ?>/static/img/loader.gif" alt="Loading cool animation">
    </div>

    <form action="cadastrarturmaDB" method="POST">    
    <div class="card">
        <div class="card-body">        
            <h4>Informações da turma</h4>
            <hr> 
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nome">Nome da turma</label>
                        <input type="text" class="form-control" name="nome" id="nome" aria-describedby="nomeHelp" required>
                        <mdall id="nomeHelp" class="form-text text-muted">Este é o nome da turma</mdall>
                    </div>
                </div>  
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="numturma">Número da turma</label>
                        <input type="text" name="numturma" id="numturma" class="form-control" required>
                        <mdall>Número de identificação para a turma</mdall>
                    </div>
                </div> 
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cargahoraria">Carga horária</label>
                        <input type="number" name="cargahoraria" id="cargahoraria" class="form-control" required>
                        <mdall>Apenas números, em horas</mdall>
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="local">Local da turma</label>
                        <input type="text" name="local" id="local" class="form-control">
                        <mdall>Local onde a turma é ministrada</mdall>
                    </div>
                </div>                             
            </div> 
            <hr>    
            <button type="submit" class="btn btn-primary mt-4" id="btnSubmit">Cadastrar</button>
        </div>
    </div>
</form>                 

</div>
<script>
    $('#btnSubmit').on('click', (event) => {
        $('.s-pre-con').show();

        setTimeout(() => {
            $('.s-pre-con').hide(); 
        }, 1500);
    })
</script>