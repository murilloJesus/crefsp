function cache_db_instance(){

    window.cache = {}

    getCategorias()
    getPaginas()
    getCidades()
    getPermissoes()
    getEventos()

}

async function getPaginas(){

    window.cache.paginas = window.localStorage.getItem('paginas');

    var paginas, aux = [], rota = '/'
    await axios
    .get(rota+'api/paginas')
    .then(function(response){
        paginas = response.data
    })
    .catch(function (error) {
        paginas = []
    })

    paginas.forEach(function(el){
        aux[el.id] = {name : el.name, id : el.id }
    })
    window.localStorage.setItem('paginas', aux);
    window.cache.paginas = aux;
}

async function getCidades(){

    window.cache.paginas = window.localStorage.getItem('cidades');

    var cidades, aux = [], rota = '/'

    await axios
    .get(rota+'api/cidades')
    .then(function(response){
        cidades = response.data
    }) 
    .catch(function (error) {
        cidades = []
    })

    cidades.forEach(function(el){
        aux[el.id] = {name : el.name, id : el.id }
    })

    window.localStorage.setItem('cidades', aux);
    window.cache.cidades = aux;
}

async function getCategorias(){

    window.cache.paginas = window.localStorage.getItem('categorias');

    var categorias, aux = [], rota = '/'

    await axios
    .get(rota+'api/categorias')
    .then(function(response){
        categorias = response.data
    }) 
    .catch(function (error) {
        categorias = []
    })

    categorias.forEach(function(el){
        aux[el.id] = {name : el.name, id : el.id }
    })

    window.localStorage.setItem('categorias', aux);
    window.cache.categorias = aux;
}

async function getPermissoes(){

    window.cache.paginas = window.localStorage.getItem('permissoes');

    var permissoes, aux = [], rota = '/'

    await axios
    .get(rota+'api/permissoes')
    .then(function(response){
        permissoes = response.data
    }) 
    .catch(function (error) {
        permissoes = []
    })

    permissoes.forEach(function(el){
        aux[el.id] = {name : el.name, id : el.id }
    })

    window.localStorage.setItem('permissoes', aux);
    window.cache.permissoes = aux;
}

async function getEventos(){

    window.cache.paginas = window.localStorage.getItem('eventos_unidades');

    var eventos, aux = [], rota = '/'

    await axios
    .get(rota+'api/eventos_unidades')
    .then(function(response){
        eventos = response.data
    }) 
    .catch(function (error) {
        eventos = []
    })

    eventos.forEach(function(el){
        if(el.type == 'evento'){ aux[el.id] = {name : 'Evento: '+el.name, id : el.id } }
        else if(el.type == 'mapa') { aux[el.id] = {name : 'Unidade Móvel: '+el.local, id : el.id } }
    })

    window.localStorage.setItem('eventos_unidades', aux);
    window.cache.eventos = aux;
}

cache_db_instance();

function listenClick() {
    
    $(".list-group-item").off("click");
    $("#duplicate").off("click");
    $("#remove").off("click");
    $("#save").off("click");
    $("#sortable .list-group-item").on("click", function(e) {
        $(".list-group-item").removeClass("selected");
        $(this).addClass("selected");
        e.stopPropagation();
    });

    $("#sortable2 .list-group-item").on("click", function(e) {
        $(".list-group-item").removeClass("selected");
        $(this).addClass("selected");
        e.stopPropagation();
    });

    $("#duplicate").on("click", function() {
        var a = $(".list-group-item.selected");
        a.after(a.clone().removeClass("selected"));

        listenClick();
        init();
    });

    $("#remove").on("click", function() {
        var a = $(".list-group-item.selected");

        $("#sortable2").append(a.clone().removeClass("selected"));

        a.remove();

        listenClick();
        init();

    });

    $("#save").on("click", async function() {

        var data = treeing( $(".content-tree-child1") ), r = new Request();
        
        r.loading();

       await axios.post(
        '/api/pagina/update-arvore',
        data
        ).then(function (response) {
            return response.data
        }).catch(function(respose){
            r.error();
        }).finally({})

        data = treeing( $(".content-tree-child2") )

        await axios.post(
            '/api/pagina/update-arvore',
            data
            ).then(function (response) {
                r.success();
                return response.data
            }).catch(function(respose){
                r.error();
            }).finally({})
    

    });
}

function treeing(html){
    var aux = {
        id : html.data('id'),
        children : []
    }, i = 1;
    html.children('ul').children('li').each(function(index, el){
       aux.children.push( treeing($(el)) )
    })
    return aux;
}

function closeModal(id) {
    $(id).modal("hide");
}

function init() {

    $("div.block").off("click");
    $("div.block").click(function() {
        $(this)
            .parent()
            .children("ul")
            .toggle();
    });

    $("div.block-title").off("dblclick");
    $("div.block-title").dblclick(function() {
        if (!$(this).hasClass("block") && !$(this).hasClass("ghost")) {
            $(this)
                .parent()
                .children("ul")
                .html(
                    '<li class="list-group-item ghost">' +
                        '<div class="block-title ghost">Adicione itens!</div>' +
                        '<ul class="list-group sortable list-unstyled"></ul>' +
                        "</li>"
                );

            $(this)
                .parent()
                .children("ul")
                .toggle();
            $(this).addClass("block");
            init();
        }
    });

    $(".sortable").sortable({
        connectWith: ".sortable",
        cursor: "grabbing ",
        cancel: ".block, .ghost",
        placeholder: "sortable-placeholder",
        cursorAt: { left: 150, top: 17 },
        tolerance: "pointer",
        scroll: false,
        zIndex: 9999,
        receive: function(event, ui) {
            $(this)
                .children("li.ghost")
                .remove();
            var sourceList = ui.sender;
            if (sourceList.children().length < 1) {
                sourceList.html(
                    '<li class="list-group-item ghost">' +
                        '<div class="block-title ghost">Adicione itens!</div>' +
                        '<ul class="list-group sortable list-unstyled"></ul>' +
                        "</li>"
                );
            }
        }
    });
    $(".sortable").disableSelection();
}

$(function() {

    init();
    listenClick();

    // Listen for click on toggle checkbox
    $("#todos").click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $(":checkbox").each(function() {
                this.checked = true;
            });
        } else {
            $(":checkbox").each(function() {
                this.checked = false;
            });
        }
    });

    $(".connectedSortable")
        .sortable({
            connectWith: ".connectedSortable"
        })
        .disableSelection();

    $(".sortabled").hide();

    $(".sortables").on("click", function() {
        $("#list_" + $(this).attr("id")).toggle();
    });

    if ($("#editor1").length) CKEDITOR.replace("editor1");
    if ($("#editor-pessoa").length) CKEDITOR.replace("editor-pessoa");
}).ready(function() {
    $("main").show();
}).ready(function() {
});
