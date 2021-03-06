<div class="container-fluid">
    <div class='s-pre-con'>
        <img src="/static/img/loader.gif" alt="Animação bacana de carregamento">
    </div>

    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col">
                <h5 class="card-title">Lista de Turmas</h5>
            </div>                    
        </div>        
        <table class="table table-striped table-responsive w-100 d-block d-md-table">
            <thead>
                <tr>                                                              
                    <th scope="col">ID</th>
                    <th scope="col">Nome da turma</th>
                    <th scope="col">Número da turma</th>
                    <th scope="col">Carga horária</th>
                    <th scope="col">Local da turma</th>
                </tr>
            </thead>
            <tbody id="table-body"></tbody>
        </table> 
        <div class="container text-center">
            <div id="pagination-wrapper"></div>
        </div> 
        </div>
    </div>

</div>

<script>
// Informações do Back-end para o front-end
let tableData = [
    <?php foreach($turmas as $turma): ?>
        {
            'id': '<?= esc($turma->id) ?>',
            'nome': '<?= esc($turma->nome) ?>',
            'cargahoraria': '<?= esc($turma->cargahoraria) ?>', 
            'local': '<?= esc($turma->local) ?>',
            'numturma': '<?= esc($turma->numturma) ?>'
        },
    <?php endforeach ?>
]

var state = {
    'querySet': tableData,
    'page': 1,
    'rows': 10,
    'window': 3,
    'checked': false
}

buildTable();

// Funcionamento da paginação
function pagination(querySet, page, rows){
    let trimStart = (page-1)*rows;
    let trimEnd = trimStart+rows;

    let trimmedData = querySet.slice(trimStart, trimEnd);
    let pages = Math.ceil(querySet.length / rows);

    return {
        'querySet': trimmedData,
        'pages': pages
    }
}

// Tratamento dinâmico dos botões de paginação
function pageButtons(pages){
    let wrapper = document.getElementById('pagination-wrapper');
    wrapper.innerHTML = '';

    let maxLeft = (state.page - Math.floor(state.window /2));
    let maxRight = (state.page + Math.floor(state.window /2));

    if(maxLeft < 1){
        maxLeft = 1;
        maxRight = state.window
    }

    if(maxRight > pages){
        maxLeft = pages - (state.window - 1);
        maxRight = pages

        if(maxLeft < 1){
            maxLeft = 1
        }
    }

    for(var page = maxLeft; page <= maxRight; page++){
        wrapper.innerHTML += '<button value='+page+' class="page btn btn-sm btn-info mr-1">'+page+'</button>'; 
    }

    if(state.page != 1){
        wrapper.innerHTML = '<button value=1 class="page btn btn-sm btn-info mr-1">&#171; Primeira</button>' + wrapper.innerHTML; 
    }

    if(state.page != pages){
        wrapper.innerHTML += '<button value='+pages+' class="page btn btn-sm btn-info mr-1">Última &#187;</button>'; 
    }

    $('.page').on('click', function() {        
        $('#table-body').empty();
        
        state.page = Number($(this).val());
        buildTable();
    })
}

// Passar as informações para a tabela
function buildTable(){
    let table = $('#table-body');
    let data = pagination(state.querySet, state.page, state.rows);

    tabList = data.querySet;

    for (var i = 1 in tabList) {
        //Usando "Template Litterals" para fazer as linhas
        var row =  `<tr>
                    <td>${tabList[i].id}</td>
                    <td><a href='detalhes/${tabList[i].id}'>${tabList[i].nome}</a></td>
                    <td>${tabList[i].numturma}</td>
                    <td>${tabList[i].cargahoraria}</td>
                    <td>${tabList[i].local}</td>                    
                    `
        table.append(row)
    }

    pageButtons(data.pages);
}

</script>