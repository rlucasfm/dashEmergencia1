<div class="container">
    <div class='s-pre-con'>
        <img src="<?= ROOTFOLDER ?>/static/img/loader.gif" alt="Loading cool animation">
    </div>

    <form action="../editarDB" method="POST">
        <div class="card">
            <div class="card-body">
                <h4>Matrícula de aluno</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">Nome do aluno</label>
                            <input type="text" class="form-control" name="nome" id="nome" aria-describedby="nomeHelp" value="<?= esc($aluno->nome); ?>" required>  
                            <input type="hidden" name="id_aluno" value="<?= esc($aluno->id); ?>">                          
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_turma">Turma</label>
                            <select name="id_turma" id="id_turma" class="form-control">
                                <?php foreach($turmas as $turma): ?>
                                <option value="<?= esc($turma->id); ?>" <?php if($aluno->id_turma == $turma->id) echo "selected"; ?>><?= esc($turma->nome); ?></option>
                                <?php endforeach; ?>
                            </select>                           
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" value="<?= esc($aluno->cpf); ?>"" required>                            
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" name="telefone" id="telefone" value="<?= esc($aluno->telefone); ?>" required>                            
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="perfilOcupacional">Perfil Ocupacional</label>
                            <input type="text" class="form-control" name="perfilOcupacional" value="<?= esc($aluno->perfilOcupacional); ?>"" id="perfilOcupacional">                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tamanhoCamisa">Tamanho da Camisa</label>
                            <select name="tamanhoCamisa" id="tamanhoCamisa" class="form-control">
                                <option value="pp" <?php if($aluno->tamanhoCamisa == 'pp') echo "selected"; ?>>PP</option>
                                <option value="p" <?php if($aluno->tamanhoCamisa == 'p') echo "selected"; ?>>P</option>
                                <option value="m" <?php if($aluno->tamanhoCamisa == 'm') echo "selected"; ?>>M</option>
                                <option value="g" <?php if($aluno->tamanhoCamisa == 'g') echo "selected"; ?>>G</option>
                                <option value="gg" <?php if($aluno->tamanhoCamisa == 'gg') echo "selected"; ?>>GG</option>
                                <option value="xg" <?php if($aluno->tamanhoCamisa == 'xg') echo "selected"; ?>>XG</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-4">Enviar</button>
                        </div>
                    </div>
                </div>
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

<script>
    $('#cpf').attr("onkeypress", "mascara(this, aplicarCpf)")
    $('#cpf').attr("maxlength", "14")
</script>