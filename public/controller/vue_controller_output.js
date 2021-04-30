/* VISUALIZADORES */

/* TEXTO */
Vue.component("show-texto-item", {
    template: "#show-texto-template",
    data: function () {
        return {};
    },
    props: {
        texto: String
    },
    computed: {
        formatado : function(){
            if(this.texto && this.texto.length > 80) return this.texto.slice(0, 80)+'..'
                return this.texto
        }
    }
});

/* IMAGEM */
Vue.component("show-imagem-item", {
    template: "#show-imagem-template",
    data: function () {
        return {};
    },
    props: {
        controller: Object
    },
    computed: {}
});

Vue.component("show-name-imagem-item", {
    template: "#show-name-imagem-template",
    data: function () {
        return {
            source: "",
            name: "",
            hash: new Helper().textoAleatorio(6)
        };
    },
    props: {
        id: [String, Number]
    },
    created: async function () {
        if (parseInt(this.id)) {
            data = await axios
                .get(window.rota+"api/imagem/" + this.id)
                .then(function (response) {
                    return response.data;
                });

            if (data.original_source) {
                this.source = window.rota + "storage/app/imagens/" + data.source;
            } else {
                this.source = data.source;
            }

            this.name = data.name ? data.name : 'Sem Nome'

        }else{
            this.name = 'Sem Imagem'
            this.source = false;
        }

    },
    beforeUpdate: async function () {
       if (parseInt(this.id)) {
            data = await axios
                .get(window.rota+"api/imagem/" + this.id)
                .then(function (response) {
                    return response.data;
                });

            if (data.original_source) {
                this.source = window.rota+"storage/app/imagens/" + data.source;
            } else {
                this.source = data.source;
            }

            this.name = data.name ? data.name : 'Sem Nome'

        }else{
            this.name = 'Sem Imagem'
            this.source = false;
        }
    },
    updated: function () {
        t = this

        $('#' + t.hash).popover({
            trigger: 'hover',
            html: true,
            content: function () {
                return '<img class="img-fluid" src="' + $(this).data('img') + '" />';
            }
        })
    },
    computed: {}
});


/* PAGINA */
Vue.component("show-name-pagina-item", {
    template: "#show-name-pagina-template",
    data: function() {
        return {
            source: "",
            name: "",
            hash: new Helper().textoAleatorio(6)
        };
    },
    props: {
        id: [String, Number]
    },
    created:  function() {
        if(this.id == 1){
            this.source = '#'
            this.name = 'Menu Principal'
            return true
        }
        if (parseInt(this.id)) {
            if(typeof  window.cache.paginas[this.id] != 'undefined'){
                data = window.cache.paginas[this.id]
            }else{
                data = {
                    name : 'Sem Nome',
                    id : '#'
                }
            }        

            this.source = window.rota+"admin/pagina/" + data.id;
            this.name = data.name;
        } else {
            this.source = this.id;
            this.name = this.id;
        }
    },
    beforeUpdate: function() {
        if(this.id == 1){
            this.source = '#'
            this.name = 'Menu Principal'
            return true
        }
        if (parseInt(this.id)) {

            if(typeof  window.cache.paginas[this.id] != 'undefined'){
                data = window.cache.paginas[this.id]
            }else{
                data = {
                    name : 'Sem Nome',
                    id : '#'
                }
            } 

            this.source = window.rota+"paginas/" + data.id;
            this.name = data.name;
        } else {
            this.source = this.id;
            this.name = this.id;
        }
    },
    computed: {}
});

/* CIDADE */
Vue.component("show-name-cidade-item", {
    template: "#show-name-cidade-template",
    data: function() {
        return {
            name: "",
        };
    },
    props: {
        id: String
    },
    created: function() {
        if(parseInt(this.id)){

            if(typeof  window.cache.cidades[this.id] != 'undefined'){
                data = window.cache.cidades[this.id]
            }else{
                data = {
                    name : 'Sem Nome',
                    id : '#'
                }
            } 
           
            this.name = data.name;
        }
    },
    beforeUpdate: function() {
        if(parseInt(this.id)){

            if(typeof  window.cache.cidades[this.id] != 'undefined'){
                data = window.cache.cidades[this.id]
            }else{
                data = {
                    name : 'Sem Nome',
                    id : '#'
                }
            } 

            this.name = data.name;
        }
    },
    computed: {}
});

// CATEGORIA
Vue.component("show-name-categoria-item", {
    template: "#show-name-categoria-template",
    data: function() {
        return {
            name: "",
        };
    },
    props: {
        id: [String, Number]
    },
    created: function() {
        if(parseInt(this.id)){

            if(typeof  window.cache.categorias[this.id] != 'undefined'){
                data = window.cache.categorias[this.id]
            }else{
                data = {
                    name : 'Sem Nome',
                    id : '#'
                }
            } 

            this.name = data.name;
        }
    },
    beforeUpdate: function() {
        if(parseInt(this.id)){

            if(typeof  window.cache.categorias[this.id] != 'undefined'){
                data = window.cache.categorias[this.id]
            }else{
                data = {
                    name : 'Sem Nome',
                    id : '#'
                }
            } 

            this.name = data.name;
        }
    },
    computed: {}
});


/* DATA */
Vue.component("show-data-item", {
    template: "#show-data-template",
    data: function () {
        return {};
    },
    props: {
        data : String
    },
    computed: {
        output : function(){
            return new Helper().dataFormat(this.data)
        }
    }
});


Vue.component("show-server-data-item", {
    template: "#show-server-data-template",
    data: function () {
        return {};
    },
    props: {
        data : String
    },
    computed: {
        output : function(){
            return new Helper().dataFormat(this.data.replace(/-/g, '').replace(/:/g, '').replace(/ /g, '').slice(0, 12))
        }
    }
});

/* GALERIA */
Vue.component("output-galeria-item", {
    template: "#output-galeria-template",
    data: function () {
        return {
            imagens : [],
            hash: new Helper().textoAleatorio(6)
        };
    },
    props: {
        id: Number
    },
    created: async function () {
        if(parseInt(this.id)){
            data = await axios
                .get(window.rota+"api/imagens/galeria/" + this.id)
                .then(function (response) {
                    return response.data;
                });
            this.imagens = data
        }
    },
    beforeUpdate: async function () {
        if(parseInt(this.id)){
            data = await axios
                .get(window.rota+"api/imagens/galeria/" + this.id)
                .then(function (response) {
                    return response.data;
                });
            this.imagens = data
        }
    },
    computed: {
        amostra: function(){
            aux = new Helper().normalizeImagens( this.imagens.slice(0, 6) )
            return aux
        }
    }
});


/* VIDEO */
Vue.component("show-video-item", {
    template: "#show-video-template",
    data: function () {
        return {};
    },
    props: {
        controller: Object
    },
    computed: {
        video : function(){
            if(!this.controller.source) return ''
            var embed = new Helper().getVideoEmbed(this.controller.source)
            return 'https://www.youtube.com/embed/'+embed+'?showinfo=0&autoplay=0'
        }
    }
});


/* PERMISSOES */
Vue.component("show-name-permissao-item", {
    template: "#show-name-permissao-template",
    data: function() {
        return {
            name: "",
        };
    },
    props: {
        id: [String, Number]
    },
    created: function() {
        if(parseInt(this.id)){
            
            if(typeof  window.cache.permissoes[this.id] != 'undefined'){
                data = window.cache.permissoes[this.id]
            }else{
                data = {
                    name : 'Sem Nome',
                    id : '#'
                }
            } 
            
            this.name = data.name;
        }
    },
    beforeUpdate: function() {
        if(parseInt(this.id)){

            if(typeof  window.cache.permissoes[this.id] != 'undefined'){
                data = window.cache.permissoes[this.id]
            }else{
                data = {
                    name : 'Sem Nome',
                    id : '#'
                }
            } 

            this.name = data.name;
        }
    },
    computed: {}
});

// ITEM
Vue.component("show-name-evento-item", {
    template: "#show-name-evento-template",
    data: function() {
        return {
            name: "",
        };
    },
    props: {
        id: [String, Number]
    },
    created: function() {
        if(parseInt(this.id)){
            
            if(typeof  window.cache.eventos[this.id] != 'undefined'){
                data = window.cache.eventos[this.id]
            }else{
                data = {
                    name : 'Sem Nome'
                }
            }


            this.name = data.name;
        }
    },
    beforeUpdate: function() {
        if(parseInt(this.id)){
            if(typeof  window.cache.eventos[this.id] != 'undefined'){
                data = window.cache.eventos[this.id]
            }else{
                data = {
                    name : 'Sem Nome'
                }
            }

            this.name = data.name;
        }
    },
    computed: {}
});



Vue.component("output-agenda-inscricao-item", {
    template: "#output-agenda-inscricao-template",
    data: function() {
        return {
            data : new Inscricao(),
            request : new Request(),
        }
    },
    props: {
        controller: Object
    },
    async beforeUpdate() {
        if(this.controller.inscricao_id && this.controller.inscricao_id != this.data.id && this.request.status != 1){

            var r = this.request

            this.data.id = this.controller.inscricao_id

            r.loading()

            var data = await axios
				.get(window.rota+'api/formulario/'+this.controller.inscricao_id)
				.then(function(response){
                    r.success()
                    return response.data
                })
				.catch(function (error) {
					r.error()
				})
                .finally()

                this.data = new Inscricao(data)
                
        }
    },
    computed: {
        layout : function(){
            return this.data.relatorio
        }
    }
});


Vue.component("output-formulario-item", {
    template: "#output-formulario-template",
    data: function() {
        return {
            data : new Formulario(),
            request : new Request(),
        }
    },
    props: {
        controller: Object
    },
    async beforeUpdate() {
        if(this.controller.id && this.controller.id != this.data.id && this.request.status != 1){

            var r = this.request

            this.data.id = this.controller.id

            r.loading()

            var data = await axios
				.get(window.rota+'api/formulario/'+this.controller.id)
				.then(function(response){
                    r.success()
                    return response.data
                })
				.catch(function (error) {
					r.error()
				})
                .finally()

                this.data = new Formulario(data)
                
        }
    },
    computed: {
        layout : function(){
            return this.data.relatorio
        }
    }
});
