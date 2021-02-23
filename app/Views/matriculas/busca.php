<div class="container">
    <div class="card">
        <div class="card-body">
            <h4>Buscar aluno</h4>
            <hr>
            <form id="formBusca">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nome">Nome do aluno</label>
                            <input type="text" name="nome" id="nome" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cpf">CPF do aluno</label>
                            <input type="text" name="cpf" id="cpf" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="button" class="btn btn-success mt-4" id="btnBusca">Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <table class="table table-striped table-responsive w-100 d-block d-md-table">
                <thead>
                    <tr>                                                              
                        <th scope="col">ID</th>
                        <th scope="col">Nome do aluno</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Tamanho da Camisa</th>
                        <th scope="col">Perfil Ocupacional</th>
                    </tr>
                </thead>
                <tbody id="table-body"></tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $("#btnBusca").on('click', () => {        
        if($('#cpf').val() != ''){
            let cpf = $('#cpf').val();
            $.ajax({
                type: "post",
                url: "buscarAluno",
                data: {cpf: cpf},
                success: function(data){  
                    $("#table-body").html('');        
                    let json = JSON.parse(data);
                    json.forEach(function(item, index){
                    let row =  `<tr>
                                <td>${item.id}</td>
                                <td><a href="editar/${item.id}">${item.nome}</a></td>
                                <td>${item.cpf}</td>
                                <td>${item.telefone}</td>
                                <td>${item.tamanhoCamisa}</td>                    
                                <td>${item.perfilOcupacional}</td>                    
                                `;
                    $("#table-body").append(row);
                    })                                   
                }
            })
        }else if($('#nome').val() != ''){
            let nome = $('#nome').val();
            $.ajax({
                type: "post",
                url: "buscarAluno",
                data: {nome: nome},
                success: function(data){ 
                    $("#table-body").html('');
                    let json = JSON.parse(data);
                    json.forEach(function(item, index){
                    let row =  `<tr>
                                <td>${item.id}</td>
                                <td><a href="editar/${item.id}">${item.nome}</a></td>
                                <td>${item.cpf}</td>
                                <td>${item.telefone}</td>
                                <td>${item.tamanhoCamisa}</td>                    
                                <td>${item.perfilOcupacional}</td>                    
                                `;
                    $("#table-body").append(row);
                    }) 
                }
            })
        }else{
            alert('Por favor, preencha um dos campos');
        }
    })
</script>

<script>
    $('#cpf').attr("onkeypress", "mascara(this, aplicarCpf)")
    $('#cpf').attr("maxlength", "14")
</script>