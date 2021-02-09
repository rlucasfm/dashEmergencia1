<div class="container-fluid">
    <div class='s-pre-con'>
        <img src="/static/img/loader.gif" alt="Loading cool animation">
    </div>

    <form action="cadastrarturmaDB" method="POST">    
    <div class="card">
        <div class="card-body">        
            <h4>Informações da turma</h4>
            <hr> 
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="nome">Nome da turma</label>
                        <input type="text" class="form-control" name="nome" id="nome" aria-describedby="nomeHelp" required>
                        <small id="nomeHelp" class="form-text text-muted">Este é o nome da turma</small>
                    </div>
                </div>  
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cargahoraria">Carga horária</label>
                        <input type="number" name="cargahoraria" id="cargahoraria" class="form-control" required>
                        <small>Apenas números</small>
                    </div>
                </div>  
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="local">Local da turma</label>
                        <input type="text" name="local" id="local" class="form-control">
                        <small>Local onde a turma é ministrada</small>
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
    })
</script>