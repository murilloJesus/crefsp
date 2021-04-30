/* FORMULARIOS FINAIS */
	/* Pagina

		*/
	Vue.component('pagina-formulario-item', {
		template: '#pagina-formulario-template',
		data: function () {
			return {
				data : new Pagina(),
				request : new Request(),
				template : new Template(),
				busca : new Search(),
				editor : new Helper().textoAleatorio(6),

				//FILHOS
				modal : new Modal(),
				paginas : [],
				itens : [],

			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {
				this.data.id = this.controller.id
				var data = [], r = this.request

				r.loading()

				data = await axios.get(
					window.rota+'api/pagina/' + this.controller.id
				).then(function (response) {
					return response.data
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Pagina(data)
				CKEDITOR.instances[this.editor].setData( data.template )

				if(data.template){
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'false' )
						$(this.$refs.editor_controller).trigger('click')
				}else{
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'true' )
						$(this.$refs.editor_controller).trigger('click')
				}

				if(!this.data.search_id){

					let searchData = this.busca

					delete searchData.id
					delete searchData.lista_categorias
					delete searchData.lista_cidades
					delete searchData.status
					delete searchData.destaque

					data = await axios.post(
						window.rota+'api/busca',
						searchData
						).then(function (response) {
							r.success()
							return response.data.data
						}).catch(function(respose){
							r.error()
						}).finally({})

					this.data.search_id = data.id

					this.busca = new Search(data)

				}else{

					data = await axios.get(
						window.rota+'api/busca/' + this.data.search_id
					).then(function (response) {
						r.initial()
						return response.data
					}).catch(function(){
						r.error()
					}).finally({
					})

					this.busca = new Search(data)

				}


				await this.atualizar_arquivos()
				this.atualizar_abas()
			}
		},
		computed : {
			pessoas : function () {
					return this.itens.pessoa
			},
			editorials : function () {
					return this.itens.editorial
			},
			lista : function () {
					return this.itens.lista
			},
			formulario : function () {
					return this.itens.inputs
			},
			accordion : function () {
					return this.itens.accordion
			},
			banners : function () {
					return this.itens.banners
			},
			videos : function () {
					return this.itens.videos
			},
			mapas : function() {
					return this.itens.mapa
			},
			tabela : function() {
					return this.itens.mapa
			}
		},
		methods: {
			async submit() {
				let formData = this.data
 				formData.template = CKEDITOR.instances[this.editor].getData()

				var data = [], r = this.request, searchData = this.busca
				r.loading()

				if (this.controller.id && this.controller.placeholder === 'Editar') {

					delete searchData.lista_categorias
					delete searchData.lista_cidades
					delete searchData.status
					delete searchData.destaque

					await axios.post(
						window.rota+'api/busca/update',
						searchData
						).then(function (response) {
						}).catch(function(request){
							r.error()
						}).finally({})

					data = await axios.post(
						window.rota+'api/pagina/update',
						formData
						).then(function (response) {
							return response.data.data
						}).catch(function(request){
							r.error()
						}).finally({})

						formData = this.modal

						if(!this.template.modal) {
							formData.name = null
							formData.descricao = null
						}

					 	await axios.post(
							window.rota+'api/item/update',
							formData
							).then(function (response) {
								r.success()
								return response.data.data
							}).catch(function(request){
								r.error()
							}).finally({})

					this.reset()
					this.controller.close()
					this.controller.atualizar()

				} else {

					delete searchData.id
					delete searchData.lista_categorias
					delete searchData.lista_cidades
					delete searchData.status
					delete searchData.destaque

					data = await axios.post(
						window.rota+'api/busca',
						searchData
						).then(function (response) {
							r.success()
							return response.data.data
						}).catch(function(respose){
							r.error()
						}).finally({})

					formData.search_id = data.id
					delete formData.id

					data = await axios.post(
						window.rota+'api/pagina',
						formData
						).then(function (response) {
							r.success()
							return response.data.data
						}).catch(function(respose){
							r.error()
						}).finally({})

						if(this.controller.placeholder === 'Duplicar'){
							await axios.get(
								window.rota+'api/pagina/clone/' + this.controller.id + '/' + data.id
							).then(function (response) {
								return response.data.item
							}).catch(function(){
							}).finally({
							})
						}

					this.reset()
					this.controller.close()
					this.controller.atualizar()

				}

			},
			reset() {
				this.data = new Pagina()
				this.request = new Request()
				this.template = new Template()
				this.busca = new Search()
				this.modal = new Modal()
				CKEDITOR.instances[this.editor].setData( '' )

				this.paginas = []
				this.itens = []

				$(this.$refs.inicial).trigger('click')

				this.controller.reset()
			},
			async submit_for_arquives() {
				let formData = this.data
				formData.template = CKEDITOR.instances[this.editor].getData()

				var data = [], r = this.request, searchData = this.busca

				if (!this.controller.id && this.controller.placeholder !== 'Editar') {

					delete searchData.id
					delete searchData.lista_categorias
					delete searchData.lista_cidades
					delete searchData.status
					delete searchData.destaque

					await axios.post(
						window.rota+'api/busca',
						searchData
						).then(function (response) {
						}).catch(function(respose){
							r.error()
						}).finally({})

					formData.search_id = data.id
					this.search = new Search(data)

					data = await axios.post(
						window.rota+'api/pagina',
						formData
						).then(function (response) {
							return response.data.data
						}).catch(function(){
							r.error()
						})
					this.data = new Pagina(data)
					this.controller.id = data.id
					this.controller.placeholder = 'Editar'

					modalForm = this.modal
					modalForm.pagina_id = this.data.id

					delete modalForm.id

					await axios.post(
						window.rota+'api/item',
						modalForm
						).then(function (response) {
							r.initial()
							return response.data.data
						}).catch(function(){
							r.error()
						})

						if(this.controller.placeholder === 'Duplicar'){
							await axios.get(
								window.rota+'api/pagina/clone/' + this.controller.id + '/' + data.id
							).then(function (response) {
								return response.data.item
							}).catch(function(){
							}).finally({
							})
						}

					this.controller.atualizar()

				}

			},
			async atualizar_arquivos(){
				await axios
				.get(window.rota+'api/paginas/'+this.controller.id)
				.then(response => (this.paginas = response.data))
				.catch(function (error) {
					this.paginas = []
				})
				.finally()

				await axios
				.get(window.rota+'api/item/pagina/'+this.controller.id)
				.then(response => (this.itens = new Lista(response.data) ) )
				.catch(function (error) {
					this.itens = []
				})
				.finally()

				this.modal = this.itens.modal

				return true

			},
			atualizar_abas(){
				this.template.banner = this.banners.length ? true : false
				this.template.galeria = this.data.galeria_id ? true : false
				this.template.videos = this.videos.length ? true : false
				this.template.lista = this.lista.length ? true : false
				this.template.formulario = this.formulario.length ? true : false
				this.template.accordion = this.accordion.length ? true : false
				this.template.editorial = this.editorials.length ? true : false
				this.template.pessoas = this.pessoas.length ? true : false
				this.template.mapas = this.mapas.length ? true : false
				this.template.modal = this.modal.name ? true : false
                this.template.tabela = this.tabela.lenght ? true : false
			}
		}
	})


	/* evento
			@name : texto
			@pessoas : lista
			type : 'evento',
			id: '',
			name: '',
			categoria: '',
			imagem: '',
			status : true,
			destaque : false,
			local : '',
			data : '',
			itens: [],
			destaque: false,
			destaque_pequeno: '',
			destaque_medio: '',
			destaque_grande: '',
		*/
	Vue.component('evento-formulario-item', {
		template: '#evento-formulario-template',
		data: function () {
			return {
				data : new Evento(),
				request : new Request(),
				editor : new Helper().textoAleatorio(6),
				editor_palestras : new Helper().textoAleatorio(6),
				itens : []
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				r = this.request
				r.loading()

				var data = await axios.get(
					window.rota+'api/item/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data.item
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Evento(data)
				CKEDITOR.instances[this.editor].setData( data.template )
				CKEDITOR.instances[this.editor_palestras].setData( data.palestras )

				this.atualizar_arquivos()
			}
		},
		computed: {
			pessoas: function () {
				return this.itens.pessoa
			},
			agendas: function() {
				return this.itens.agenda
			}
		},
		beforeCreate: function(){
			window.caminho_pessoas_input = 'palestrantes';
		},
		methods: {
			async submit() {
				let formData = this.data
				 formData.template = CKEDITOR.instances[this.editor].getData()
				 formData.palestras = CKEDITOR.instances[this.editor_palestras].getData()

				var data = [], r = this.request

				r.loading()

				if (this.controller.id && this.controller.placeholder === 'Editar') {

					await axios.post(
						window.rota+'api/item/update',
						formData
						).then(function (response) {
							r.success()
							return response.data
						}).catch(function(){
							r.error()
						}).finally({

						})

					this.reset()
					this.controller.close()
					this.controller.atualizar()

				} else {

					delete formData.id

					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							r.success
							return response.data.data
						}).catch(function(){
							r.error
						}).finally({})

					if(this.controller.placeholder === 'Duplicar'){
						await axios.get(
							window.rota+'api/item/item/clone/' + this.controller.id + '/' + data.id
						).then(function (response) {
							return response.data.item
						}).catch(function(){
						}).finally({
						})
					}

					this.reset()
					this.controller.close()
					this.controller.atualizar()

				}
			},
			async submit_for_arquives() {
				let formData = this.data
				formData.template = CKEDITOR.instances[this.editor].getData()
				formData.palestras = CKEDITOR.instances[this.editor_palestras].getData()

				var data = [], r = this.request

				if (this.controller.placeholder != 'Editar') {

					r.loading()

					delete formData.id

					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							return response.data.data
						}).catch(function(){
							r.error()
						}).finally({

						})

						this.data = new Evento(data)

						if(this.controller.placeholder === 'Duplicar'){
							await axios.get(
								window.rota+'api/item/item/clone/' + this.controller.id + '/' + data.id
							).then(function (response) {
								return response.data.item
							}).catch(function(){
							}).finally({
							})
						}

					r.initial()

					this.controller.id = this.data.id
					this.controller.placeholder = 'Editar'
					this.atualizar_arquivos()
					this.controller.atualizar()

				}
			},
			async atualizar_arquivos(){
				await axios
				.get(window.rota+'api/item/item/'+this.data.id)
				.then(response => (this.itens = new Lista(response.data)))
				.catch(function (error) {
					this.itens = []
				})
				.finally()
			},
			reset() {
				this.request = new Request()
				this.data = new Evento()
				this.controller.reset()
				CKEDITOR.instances[this.editor].setData( '' )
				CKEDITOR.instances[this.editor_palestras].setData( '' )
			},
		}
	})


	/* CATEGORIAS EVENTOS
		@name : texto
		@href : selector
		@imagem : selector
		@status : checkbox
	*/
	Vue.component('categorias-eventos-formulario-item', {
		template: '#categorias-eventos-formulario-template',
		data: function () {
			return {
				request: new Request('add'),
				data: new Categoria({type : 'evento'}),
				// id: '',
				// type: 'banner',
				// name: '',
				// source: '',
				// imagem: '',
				// descricao: '',
				// status: true,
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				var r = this.request
				r.loading()

				var data = await axios.get(
					window.rota+'api/categoria/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Categoria(data)

			}
		},
		methods: {
			async add() {
				let formData = this.data

				var data = [], r = this.request

				r.loading()

				if (this.controller.placeholder != 'Editar') {

					delete formData.id

					await axios.post(
						window.rota+'api/categoria',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						this.controller.close();
					}

				} else {

					await axios.post(
						window.rota+'api/categoria/update',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						this.controller.close();
					}
				}

			},
			reset() {
				this.data = new Categoria({type : 'evento'})
				this.request = new Request('add')
				this.controller.reset()
			},
		}
	})



		/* CATEGORIAS licitacoes
		@name : texto
		@href : selector
		@imagem : selector
		@status : checkbox
	*/
	Vue.component('categorias-licitacoes-formulario-item', {
		template: '#categorias-licitacoes-formulario-template',
		data: function () {
			return {
				request: new Request('add'),
				data: new Categoria({type : 'licitacao'}),
				// id: '',
				// type: 'banner',
				// name: '',
				// source: '',
				// imagem: '',
				// descricao: '',
				// status: true,
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				var r = this.request
				r.loading()

				var data = await axios.get(
					window.rota+'api/categoria/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Categoria(data)

			}
		},
		methods: {
			async add() {
				let formData = this.data

				var data = [], r = this.request

				r.loading()

				if (this.controller.placeholder != 'Editar') {

					delete formData.id

					await axios.post(
						window.rota+'api/categoria',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						this.controller.close();
					}

				} else {

					await axios.post(
						window.rota+'api/categoria/update',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						this.controller.close();
					}
				}

			},
			reset() {
				this.data = new Categoria({type : 'licitacao'})
				this.request = new Request('add')
				this.controller.reset()
			},
		}
	})




	/* CATEGORIAS VAGAS
		@name : texto
		@href : selector
		@imagem : selector
		@status : checkbox
	*/
	Vue.component('categorias-vagas-formulario-item', {
		template: '#categorias-vagas-formulario-template',
		data: function () {
			return {
				request: new Request('add'),
				data: new Categoria({type : 'vaga'}),
				// id: '',
				// type: 'banner',
				// name: '',
				// source: '',
				// imagem: '',
				// descricao: '',
				// status: true,
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				var r = this.request
				r.loading()

				var data = await axios.get(
					window.rota+'api/categoria/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Categoria(data)

			}
		},
		methods: {
			async add() {
				let formData = this.data

				var data = [], r = this.request

				r.loading()

				if (this.controller.placeholder != 'Editar') {

					delete formData.id

					await axios.post(
						window.rota+'api/categoria',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						this.controller.close();
					}

				} else {

					await axios.post(
						window.rota+'api/categoria/update',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						this.controller.close();
					}
				}

			},
			reset() {
				this.data = new Categoria({type : 'vaga'})
				this.request = new Request('add')
				this.controller.reset()
			},
		}
	})



	/* CATEGORIAS NOTICIA
		@name : texto
		@href : selector
		@imagem : selector
		@status : checkbox
	*/
	Vue.component('categorias-noticia-formulario-item', {
		template: '#categorias-noticia-formulario-template',
		data: function () {
			return {
				request: new Request('add'),
				data: new Categoria({type : 'noticia'}),
				// id: '',
				// type: 'banner',
				// name: '',
				// source: '',
				// imagem: '',
				// descricao: '',
				// status: true,
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				var r = this.request
				r.loading()

				var data = await axios.get(
					window.rota+'api/categoria/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Categoria(data)

			}
		},
		methods: {
			async add() {
				let formData = this.data

				var data = [], r = this.request

				r.loading()

				if (this.controller.placeholder != 'Editar') {

					delete formData.id

					await axios.post(
						window.rota+'api/categoria',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						this.controller.close();
					}

				} else {

					await axios.post(
						window.rota+'api/categoria/update',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						this.controller.close();
					}
				}

			},
			reset() {
				this.data = new Categoria({type : 'noticia'})
				this.request = new Request('add')
				this.controller.reset()
			},
		}
	})


	/* VIDEO
			@name : texto
			@href : selector
			@categoria : selector
			@imagem : selector
			@descricao : texto
			@file : uploader
		*/
	Vue.component('video-formulario-item', {
		template: '#video-formulario-template',
		data: function () {
			return {
				data : {
					video : false,
				},
				request : new Request('add')
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		computed: {

		},
		methods: {
			add: async function () {
				if(this.controller.controller.data.id){

					var r = this.request

					r.loading()

					data = await axios.get(
						window.rota+'api/item/' + this.data.video
					).then(function (response) {
						return response.data.item
					}).catch(function(response){
						r.error()
					}).finally({
					})

					let formData = new Video(data)

					formData.item_id = this.controller.controller.data.id
					formData.referencia_id =  data.id

					delete formData.id

					var data = []

					// You should have a server side REST API
					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							r.initial()
							return response.data.data
						}).catch(function(response){
							r.error()
						}).finally({})

						this.controller.atualizar()
						this.reset()
				}

			},
			reset: function () {
				this.video = false
				this.request = new Request('add')
				this.controller.reset()
			},
		}
	})



	/* MULTIMIDIA
			@name : texto
			@videos : lista
		*/
	Vue.component('multimidia-formulario-item', {
		template: '#multimidia-formulario-template',
		data: function () {
			return {
				data : new Multimidia(),
				video : false,
				videos: [],
				request : new Request()
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				var r = this.request
				this.data.id = this.controller.id

				r.loading()

				data = await axios.get(
					window.rota+'api/item/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data.item
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Multimidia(data)
				this.atualizar_arquivos()
			}
		},
		computed: {
			tabela: function () {
				return new Tabela(this.videos, ['Nome'], ['name'])
			}
		},
		methods: {
			async submit() {
				let formData = this.data

				var data = [], r = this.request

				r.loading()

				if (this.controller.id && this.controller.placeholder === 'Editar') {

					data = await axios.post(
						window.rota+'api/item/update',
						formData
						).then(function (response) {
							r.success()
							return response.data.data
						}).catch(function(response){
							r.error()
						}).finally({})

					this.controller.close()
					this.reset()
					this.controller.atualizar()


				} else {

					delete formData.id

					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							r.success()
							return response.data.data
						}).catch(function(response){
							r.error()
						}).finally({})


					if(this.controller.placeholder === 'Duplicar'){
						await axios.get(
							window.rota+'api/item/item/clone/' + this.controller.id + '/' + data.id
						).then(function (response) {
							return response.data.item
						}).catch(function(){
						}).finally({
						})
					}

					this.controller.close()
					this.reset()
					this.controller.atualizar()

				}

			},
			async submit_for_arquives() {
				let formData = this.data

				var data = [], r = this.request

				if (this.controller.placeholder != 'Editar') {

					r.loading()

					delete formData.id

					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							r.initial()
							return response.data.data
						}).catch(function(response){
							r.error()
						})

					if(this.controller.placeholder === 'Duplicar'){
						await axios.get(
							window.rota+'api/item/item/clone/' + this.controller.id + '/' + data.id
						).then(function (response) {
							return response.data.item
						}).catch(function(){
						}).finally({
						})
					}

					this.controller.id = data.id
					this.data = new Multimidia(data)
					this.controller.placeholder = 'Editar'
					this.controller.atualizar()

				}

			},
			async atualizar_arquivos(){
				await axios
				.get(window.rota+'api/item/item/'+this.data.id)
				.then(response => (this.videos = response.data))
				.catch(function (error) {
					this.videos = []
				})
				.finally()
			},
			reset() {
				this.data = new Multimidia()
				this.request = new Request()
				this.controller.reset()
			},
		}
	})




	/* VAGAS */
	Vue.component('vagas-formulario-item', {
		template: '#vagas-formulario-template',
		data: function () {
			return {
				data : new Vaga(),
				request : new Request(),
				editor: new Helper().textoAleatorio(8),
				arquivos: []
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				var r = this.request

				r.loading()

				var data = await axios.get(
					window.rota+'api/item/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data.item
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Vaga(data)
				CKEDITOR.instances[this.editor].setData( data.template )

				if(data.template){
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'false' )
						$(this.$refs.editor_controller).trigger('click')
				}else{
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'true' )
						$(this.$refs.editor_controller).trigger('click')
				}

				this.atualizar_arquivos()

			}
		},
		computed: {
			tabela: function () {
				return new Tabela(this.arquivos, ['Nome'], ['name'])
			}
		},
		mounted: function() {
			this.controller.atualizar()
		},
		methods: {
			async submit() {
				let formData = this.data

				formData.template =  CKEDITOR.instances[this.editor].getData()

				var data = [], r = this.request

				if (this.controller.id && this.controller.placeholder != 'Editar') {

					delete formData.id

					data = await axios.post(
						window.rota+'api/item',
						formData
					).then(function (response) {
						r.success()
						return response.data.data
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(this.controller.placeholder === 'Duplicar'){
						await axios.get(
							window.rota+'api/arquivo/item/clone/' + this.controller.id + '/' + data.id
						).then(function (response) {
							return response.data.item
						}).catch(function(){
						}).finally({
						})
					}

					this.controller.atualizar();
					this.reset();
					this.controller.close();


				} else {

					data = await axios.post(
						window.rota+'api/item/update',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					this.controller.atualizar();
					this.reset();
					this.controller.close();

				}
			},
			async submit_for_arquives() {
				let formData = this.data

				formData.template = CKEDITOR.instances[this.editor].getData()

				var data = [], r = this.request

				if (this.controller.placeholder != 'Editar') {

					r.loading()

					delete formData.id

					data = await axios.post(
							window.rota+'api/item',
							formData
						).then(function (response) {
							r.initial()
							return response.data.data
						}).catch(function(){
							r.error()
						}).finally({

						})

					if(this.controller.placeholder === 'Duplicar'){
						await axios.get(
							window.rota+'api/arquivo/item/clone/' + this.controller.id + '/' + data.id
						).then(function (response) {
							return response.data.item
						}).catch(function(){
						}).finally({
						})
					}

					this.data = new Vaga(data)

					this.controller.id = this.data.id
					this.controller.placeholder = 'Editar'
					this.controller.atualizar()

				}

			},
			async atualizar_arquivos(){
				await axios
				.get(window.rota+'api/arquivos/item/'+this.data.id)
				.then(response => (this.arquivos = response.data))
				.catch(function (error) {
					this.arquivos = []
				})
				.finally()
			},
			async atualizar(){
				await axios
				.get(window.rota+'api/categoria/'+this.data.categoria)
				.then(response => (this.arquivos = response.data))
				.catch(function (error) {
					this.arquivos = []
				})
				.finally()
			},
			reset() {
				this.data = new Vaga()
				this.request = new Request()
				this.controller.reset()
			},
		}
	})

	/* LICITACAO */
	Vue.component('licitacoes-formulario-item', {
		template: '#licitacoes-formulario-template',
		data: function () {
			return {
				data : new Licitacao(),
				request : new Request(),
				editor: new Helper().textoAleatorio(8),
				arquivos: [],
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				r = this.request

				r.loading()

				data = await axios.get(
					window.rota+'api/item/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data.item
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Licitacao(data)
				CKEDITOR.instances[this.editor].setData( data.template )

				if(data.template){
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'false' )
						$(this.$refs.editor_controller).trigger('click')
				}else{
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'true' )
						$(this.$refs.editor_controller).trigger('click')
				}

				this.atualizar_arquivos()

			}
		},
		computed: {
			tabela: function () {
				return new Tabela(this.arquivos, ['Nome'], ['name'])
			}
		},
		mounted: function(){
			this.controller.atualizar()
		},
		methods: {
			async submit() {
				let formData = this.data

				var r = new Request();

				formData.template = CKEDITOR.instances[this.editor].getData()
				var data = []

				if (this.controller.placeholder != 'Editar') {

					delete formData.id

					data = await axios.post(
						window.rota+'api/item',
						formData
					).then(function (response) {
						r.success()
						// console.log(response.data.data)
						return response.data.data
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(this.controller.placeholder === 'Duplicar'){
						await axios.get(
							window.rota+'api/arquivo/item/clone/' + this.controller.id + '/' + data.id
						).then(function (response) {
							return response.data.item
						}).catch(function(){
						}).finally({
						})
					}

					this.controller.atualizar();
					this.reset();
					this.controller.close();


				} else {

					data = await axios.post(
						window.rota+'api/item/update',
						formData
					).then(function (response) {
						r.success()
						return response.data.data
					}).catch(function(){
						r.error()
					}).finally({
					})

					this.controller.atualizar();
					this.reset();
					this.controller.close();

				}

			},
			async submit_for_arquives() {
				let formData = this.data
				formData.template = CKEDITOR.instances[this.editor].getData()

				var data = [], r = this.request

				if (this.controller.placeholder != 'Editar') {

					r.loading()

					delete formData.id

					data = await axios.post(
							window.rota+'api/item',
							formData
						).then(function (response) {
							return response.data.data
						}).catch(function(response){
							r.error()
						})

						this.data = new Licitacao(data)

						if(this.controller.placeholder === 'Duplicar'){
							await axios.get(
								window.rota+'api/arquivo/item/clone/' + this.controller.id + '/' + data.id
							).then(function (response) {
								return response.data.item
							}).catch(function(){
							}).finally({
							})
						}


					r.initial()

					this.controller.id = this.data.id
					this.controller.placeholder = 'Editar'
					this.atualizar_arquivos()
					this.controller.atualizar()
				}
			},
			async atualizar_arquivos(){
				await axios
				.get(window.rota+'api/arquivos/item/'+this.data.id)
				.then(response => (this.arquivos = response.data))
				.catch(function (error) {
					this.arquivos = []
				})
				.finally()
			},
			reset() {
				this.data = new Licitacao()
				this.request = new Request()
				this.controller.reset()
				CKEDITOR.instances[this.editor].setData( '' )
			}
		}
	})

	/* USUARIO
			@name : texto
			@email : texto
			@password : texto
			@permissoes : selecctor
		*/
	Vue.component('usuarios-formulario-item', {
		template: '#usuarios-formulario-template',
		data: function () {
			return {
				data : new Usuarios(),
				request : new Request()
			}
		},
		props: {
			controller: Object
		},
		computed: {

		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				var r = this.request

				r.loading()

				data = await axios.get(
					window.rota+'api/usuario/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Usuarios(data)

			}
		},
		methods: {
			async add() {
				let formData = this.data

				var data = [], r = this.request

				r.loading()

				if (this.controller.id && this.controller.placeholder === 'Editar') {

					delete formData.password

					data = await axios.post(
						window.rota+'api/update-usuario',
						formData
						).then(function (response) {
							r.success()
							return response
						}).catch(function(){
							r.error()
						})

						this.reset()
						this.controller.atualizar()

				} else {

					delete formData.id

					data = await axios.post(
						window.rota+'api/usuario',
						formData
						).then(function (response) {
							r.success()
							return response
						}).catch(function(){
							r.error()
						})

						this.reset()
						this.controller.atualizar()
				}
			},
			reset() {
				this.data = new Usuarios()
				this.request = new Request()
				this.controller.reset()
			},
		}
	})


	/* GALERIA
			@name : texto
			@imagens : []
		*/
	Vue.component('galerias-formulario-item', {
		template: '#galerias-formulario-template',
		data: function () {
			return {
				id : '',
				type : 'galeria',
				name: '',
				descricao : '',
				imagens: [],
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id  && this.controller.id != this.id) {

				this.data.id = this.controller.id

				var data = await axios.get(
					window.rota+'api/item/' + this.controller.id
				).then(function (response) {
					return response.data.item
				}).catch({
				}).finally({
				})


				this.id = data.id
				this.name = data.name
				this.descricao = data.descricao

				data = await axios.get(
					window.rota+'api/imagens/galeria/' + this.controller.id
				).then(function (response) {
					return response.data
				}).catch({
				}).finally({
				})

				data = new Helper().normalizeImagens(data)
				this.imagens = new Helper().getIncapsuledImagens(data)

			} else {

			}
		},
		methods: {
			async add() {
				if(!this.controller.id){
					let formData = new FormData()
					formData.append('type', this.type)
					formData.append('name', this.name)
					formData.append('descricao', this.descricao)
					formData.append('_token', $("input[name*='_token']").val())

					data = await axios.post(
						window.rota+'api/item',
						formData, {
							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}).then(function (response) {
							return response.data.data
						})

					this.controller.id = data.id
				}else{
					let formData = new FormData()
					formData.append('id', this.controller.id)
					formData.append('name', this.name)
					formData.append('_token', $("input[name*='_token']").val())

					data = await axios.post(
						window.rota+'api/item/update',
						formData, {
							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}).then(function (response) {
						})
				}

					let imgData = new FormData()
					imgData.append('galeria_id', this.controller.id)
					imgData.append('id', this.imagem)

					data = await axios.post(
						window.rota+'api/update-imagem',
						imgData, {
							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}).then(function (response) {
							return response
						})

				this.controller.atualizar()
				this.atualizar()
			},
			async atualizar() {
				if (this.controller.id) {
					data = await axios.get(
						window.rota+'api/imagens/galeria/' + this.controller.id
					).then(function (response) {
						return response.data
					}).catch({
					}).finally({
					})

					data = new Helper().normalizeImagens(data)
					this.imagens = new Helper().getIncapsuledImagens(data)

				} else {

				}
			},
			async deletar(id) {
				await axios
					.get(window.rota+'api/imagem/delete/' + id )
					.then()
					.catch()
					.finally()

				this.controller.atualizar()
				this.atualizar()
				return true
			},
			reset(){
				id  = ''
				name = ''
				descricao  = ''
				imagens = []
			}
		}
	})


	/* ARQUIVOS
			@name : texto
			@descricao : texto
			@tipo : selectore
			@icone : fa-icone
			@data : data
			@file : uploader
		*/
	Vue.component('arquivo-formulario-item', {
		template: '#arquivo-formulario-template',
		data: function () {
			return {
				descricao: "",
				file: "",
				name: "",
				request : new Request('add')
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		computed: {

		},
		methods: {
			add: async function () {
				let formData = new FormData()
				var r = this.request

				r.loading()

				if(this.controller.controller){
					if(this.controller.controller.data.id){
						formData.append('item_id', this.controller.controller.data.id)
					}

					if(this.controller.controller.pagina_id){
						formData.append('pagina_id', this.controller.controller.id)
					}
				}

				formData.append('arquivo', this.file)
				formData.append('name', this.name)
				formData.append('descricao', this.descricao)
				formData.append('_token', $("input[name*='_token']").val())

				var data = []

				// You should have a server side REST API
				data = await axios.post(
					window.rota+'api/arquivo',
					formData, {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}).then(function (response) {
						r.initial()
						return response.data.data
					}).catch(function(){
						r.error()
					}).finally({})

				this.controller.atualizar()
				this.close()
			},
			reset: function () {
				this.descricao = ""
				this.file = ""
				this.name = ""
				this.request = new Request('add')
			},
			close() {
				closeModal(this.controller.idUploadModalName)
			}
		}
	})


/* NOTICIA
		@name : texto
		@id: '',
		@image_id: '',
		@galeria_id : '',
		@type: 'noticia',
		@name: '',
		@descricao: '',
		@data: '',
		@destaque: false,
		@destaque_pequeno: '',
		@destaque_medio: '',
		@destaque_grande: '',
		@status : true,
	*/
	Vue.component('noticia-formulario-item', {
		template: '#noticia-formulario-template',
		data: function () {
			return {
				data: new Noticia(),
				request: new Request(),
				editor : new Helper().textoAleatorio(8),
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status == 0) {

				this.data.id = this.controller.id

				r = this.request
				r.loading()

				var data = await axios.get(
					window.rota+'api/item/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data.item
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Noticia(data)
				CKEDITOR.instances[this.editor].setData( data.template )
				this.data.data = new Helper().now()

				if(data.template){
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'false' )
						$(this.$refs.editor_controller).trigger('click')
				}else{
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'true' )
						$(this.$refs.editor_controller).trigger('click')
				}

			}
		},
		mounted: function() {
			this.controller.atualizar()
		},
		methods: {
			async submit() {
				let formData = this.data
				formData.template = CKEDITOR.instances[this.editor].getData()

				var  r = this.request

				r.loading()

				if (this.controller.placeholder != 'Editar') {

					delete formData.id

					await axios.post(
						window.rota+'api/item',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.controller.close();
						this.reset();
					}

				} else {

					data = await axios.post(
						window.rota+'api/item/update',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.controller.close();
						this.reset();
					}
				}

			},
			reset() {
				this.data = new Noticia()
				this.request = new Request()
				this.controller.reset()
			}
		}
	})

	/* BANNERS
			@name : texto
			@href : selector
			@imagem : selector
			@status : checkbox
		*/
	Vue.component('banner-formulario-item', {
		template: '#banner-formulario-template',
		data: function () {
			return {
				request: new Request('add'),
				data: new Banner({pagina_id : 1}),
				// id: '',
				// type: 'banner',
				// name: '',
				// source: '',
				// imagem: '',
				// descricao: '',
				// status: true,
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				var r = this.request
				r.loading()

				var data = await axios.get(
					window.rota+'api/item/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data.item
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Banner(data)

			}
		},
		methods: {
			async add() {
				let formData = this.data

				var data = [], r = this.request

				r.loading()

				if (this.controller.placeholder != 'Editar') {

					delete formData.id

					await axios.post(
						window.rota+'api/item',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						this.controller.close();
					}

				} else {

					await axios.post(
						window.rota+'api/item/update',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						this.controller.close();
					}
				}

			},
			reset() {
				this.data = new Banner({pagina_id : 1})
				this.request = new Request('add')
				this.controller.reset()
			},
		}
	})




	/* CLUBE
			@name : texto
			@imagem : selector
			@cidade : selector
			@categoria : selector
			@local : texto
			@telefone : texto
			@site : selector
			@template : editor
			@status : checkbox
		*/
	Vue.component('clube-formulario-item', {
		template: '#clube-formulario-template',
		data: function () {
			return {
				request: new Request(),
				data: new Clube(),
				editor: new Helper().textoAleatorio(8),
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				var r = this.request
				r.loading()

				data = await axios.get(
					window.rota+'api/item/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data.item
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Clube(data)
				CKEDITOR.instances[this.editor].setData( data.template )

				if(data.template){
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'false' )
						$(this.$refs.editor_controller).trigger('click')
				}else{
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'true' )
						$(this.$refs.editor_controller).trigger('click')
				}

			}
		},
		methods: {
			async add() {
				let formData = this.data
				formData.template =  CKEDITOR.instances[this.editor].getData()

				var data = [], r = this.request

				r.loading()

				if (this.controller.placeholder != 'Editar') {

					delete formData.id

					var data = await axios.post(
						window.rota+'api/item',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					this.controller.atualizar();
					this.reset();
					this.controller.close();


				} else {

					this.data = await axios.post(
						window.rota+'api/item/update',
						formData
					).then(function (response) {
						r.success()
						return response.data
					}).catch(function(){
						r.error()
					}).finally({
					})

					this.controller.atualizar();
					this.reset();
					this.controller.close();

				}
			},
			reset() {
				this.data = new Clube()
				this.request = new Request()
				this.controller.reset()
				CKEDITOR.instances[this.editor].setData( '' )
			},
		}
	})

	/* PESSOAS
			@name : texto
			@topo (cargo) : texto
			@rodapé (doc) : texto
			@imagem : selector
			@template : editor
		*/
	Vue.component('pessoas-formulario-item', {
		template: '#pessoas-formulario-template',
		data: function () {
			return {
				request: new Request(),
				data : new Pessoa(),
				editor: new Helper().textoAleatorio(8)
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				var r = this.request

				var data = await axios.get(
					window.rota+'api/item/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data.item
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Pessoa(data)
				CKEDITOR.instances[this.editor].setData( data.template )

				if(data.template){
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'false' )
						$(this.$refs.editor_controller).trigger('click')
				}else{
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'true' )
						$(this.$refs.editor_controller).trigger('click')
				}

			}
		},
		methods: {
			async add() {
				let formData = this.data
				formData.template =  CKEDITOR.instances[this.editor].getData()

				var data = [], r = this.request

				if (this.controller.placeholder != 'Editar') {

					delete formData.id

					var data = await axios.post(
						window.rota+'api/item',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						//this.controller.close();
					}

				} else {

					this.data = await axios.post(
						window.rota+'api/item/update',
						formData
					).then(function (response) {
						r.success()
						return response.data
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						//this.controller.close();
					}
				}
			},
			reset() {
				this.data = new Pessoa()
				this.request = new Request()
				CKEDITOR.instances[this.editor].setData( this.data.template )
				// this.controller.reset()
			},
		}
	})



	/* PERMISSOES
			@ name : text
			@ Paginas : checkbox
			@ Noticias : checkbox
			@ Eventos : checkbox
			@ Licitações : checkbox
			@ Emprego e Concurso : checkbox
			@ Multimidia : checkbox
			@ Gerenciar - Acesso Rapido : checkbox
			@ Gerenciar - Arquivos : checkbox
			@ Gerenciar - Banners : checkbox
			@ Gerenciar - Galerias e Imagens : checkbox
			@ Gerenciar - Pessoas : checkbox
			@ Gerenciar - Unidades Móveis : checkbox
			@ Gerenciar - Tema : checkbox
			@ Usuarios  : checkbox
		*/
	Vue.component('permissoes-formulario-item', {
		template: '#permissoes-formulario-template',
		data: function () {
			return {
				request : new Request(),
				data : new Permissoes(),
				todos: false
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				var r = this.request

				r.loading()

				data = await axios.get(
					window.rota+'api/permissao/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Permissoes(data)

			} else {
				this.id = this.controller.id
			}
		},
		methods: {
			mudar() {
				this.data.all(this.todos)
			},
			async add() {
					let formData = this.data
					var data = [], r = this.request

					r.loading()

					if (this.controller.placeholder != 'Editar') {

						delete formData.id

						data = await axios.post(
							window.rota+'api/permissao',
							formData
						).then(function (response) {
							r.success()
						}).catch(function(){
							r.error()
						}).finally({
						})

						this.controller.atualizar();
						this.reset();
						this.controller.close();


					} else {

						data = await axios.post(
							window.rota+'api/permissao/update',
							formData
						).then(function (response) {
							r.success()
						}).catch(function(){
							r.error()
						}).finally({
						})

						this.controller.atualizar();
						this.reset();
						this.controller.close();

				}
			},
			reset() {
				this.data = new Permissoes()
				this.request = new Request()
				this.controller.reset()
			},
		}
	})

	/* TEMA
			@name : texto
			@head : selector
			@foot : selector
			@status : checkbox
		*/
	Vue.component('tema-formulario-item', {
		template: '#tema-formulario-template',
		data: function () {
			return {
				data : new Tema(),
				request: new Request('add'),
				// name: '',
				// head: '',
				// foot: '',
				// status: false,
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				var r = this.request

				r.loading()

				data = await axios.get(
					window.rota+'api/tema/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Tema(data)

			} else {
				this.id = this.controller.id
			}
		},
		methods: {
			async add() {
				let formData = this.data
				var data = [], r = this.request

				r.loading()

				if (this.controller.placeholder != 'Editar') {

					delete formData.id

					data = await axios.post(
						window.rota+'api/tema',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						this.controller.close();
					}

				} else {

					data = await axios.post(
						window.rota+'api/tema/update',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.reset();
						this.controller.close();
					}

				}
			},
			reset() {
				this.data = new Tema()
				this.request = new Request('add')
				this.controller.reset()
			},
		}
	})

	/* UNIDADES MOVEIS
			@observacao : texto
			@longitude : texto
			@latitude : texto
			@data : datepicker
			@local : texto
			@cidade : selector
			@status : checkbox
		*/
	Vue.component('unidades-formulario-item', {
		template: '#unidades-formulario-template',
		data: function () {
			return {
				data : new Mapa(),
				request: new Request(),
				itens : []
			}
		},
		props: {
			controller: Object
		},
		computed: {
			agendas: function() {
				return this.itens.agenda
			}
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				var r = this.request

				r.loading()

				data = await axios.get(
					window.rota+'api/item/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data.item
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Mapa(data)
				this.atualizar_arquivos()

			}
		},
		methods: {
			async submit() {
				let formData = this.data
				formData.datamm = new Helper().makeMonth(formData.data)
				var data = [], r = this.request

				r.loading()

				if (this.controller.placeholder != 'Editar') {

					delete formData.id

					data = await axios.post(
						window.rota+'api/item',
						formData
					).then(function (response) {
						r.success()
						return response.data.data
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(this.controller.placeholder === 'Duplicar'){
						await axios.get(
							window.rota+'api/item/item/clone/' + this.controller.id + '/' + data.id
						).then(function (response) {
							return response.data.item
						}).catch(function(){
						}).finally({
						})
					}

					this.controller.atualizar();
					this.reset();
					this.controller.close();

				} else {

					data = await axios.post(
						window.rota+'api/item/update',
						formData
					).then(function (response) {
						r.success()
					}).catch(function(){
						r.error()
					}).finally({
					})

					this.controller.atualizar();
					this.reset();
					this.controller.close();

				}
			},
			async submit_for_arquives() {
				let formData = this.data
				var data = [], r = this.request

				if (this.controller.placeholder != 'Editar') {

					r.loading()

					delete formData.id

					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							return response.data.data
						}).catch(function(){
							r.error()
							return
						}).finally({

						})

						this.data = new Mapa(data)


						if(this.controller.placeholder === 'Duplicar'){
							await axios.get(
								window.rota+'api/item/item/clone/' + this.controller.id + '/' + data.id
							).then(function (response) {
								return response.data.item
							}).catch(function(){
							}).finally({
							})
						}

					r.initial()

					this.controller.id = this.data.id
					this.controller.placeholder = 'Editar'
					this.atualizar_arquivos()
					this.controller.atualizar()

				}
			},
			async atualizar_arquivos(){
				await axios
				.get(window.rota+'api/item/item/'+this.data.id)
				.then(response => (this.itens = new Lista(response.data)))
				.catch(function (error) {
					this.itens = []
				})
				.finally()
			},
			reset() {
				this.data = new Mapa()
				this.request = new Request()
				this.controller.reset()
			},
		}
	})


	/* ACESSO RAPIDO
			@name : texto
			@href : selector
			@imagem : selector
			@status : checkbox
			@destaque : checkbox
		*/
	Vue.component('acesso-rapido-formulario-item', {
		template: '#acesso-rapido-formulario-template',
		data: function () {
			return {
				data : new Acesso(),
				request : new Request()
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id && this.request.status != 1) {

				this.data.id = this.controller.id

				var r = this.request

				r.loading()

				data = await axios.get(
					window.rota+'api/acesso/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Acesso(data)

			} else {
				this.id = this.controller.id
			}
		},
		methods: {
			async add() {
				let formData = this.data
				var data = [], r = this.request

				r.loading()

				if (this.controller.placeholder != 'Editar') {

					delete formData.id

					data = await axios.post(
						window.rota+'api/acesso',
						formData
					).then(function (response) {
						r.success()
						return response.data.item
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.controller.close();
						this.reset();
					}

				} else {

					data = await axios.post(
						window.rota+'api/acesso/update',
						formData
					).then(function (response) {
						r.success()
						return response.data.item
					}).catch(function(){
						r.error()
					}).finally({
					})

					if(r.status == 200){
						this.controller.atualizar();
						this.controller.close();
						this.reset();
					}

				}
			},
			close(){
				this.controller.close()
			},
			reset() {
				this.data = new Acesso()
				this.request = new Request()
				this.controller.reset()
			},
		}
	})


	/* AGENDA FORMULARIOS */
Vue.component('agenda-form-formulario-item', {
	template: '#agenda-form-formulario-template',
	data: function () {
		return {
			id : false,
			inscricao_id: false,
			inscricoes: []
		}
	},
	props: {
		controller: Object
	},
	async beforeUpdate() {
		if (this.controller.id && this.controller.id != this.id) {

			this.id = this.controller.id

			var data = await axios.get(
				window.rota+'api/formulario/agenda/' + this.controller.id
			).then(function (response) {
				return response.data
			}).catch(function(){
			}).finally({
			})

			this.inscricoes = data

		}
	},
	methods: {
		ver(id){
			this.inscricao_id = id
			$("#inscricao-tab").trigger('click')
		},
		relatorio(){

		},
		lista(){

			var aux = '<table class="table center-block text-center" >' +
			'<thead style="background-color:#f86c6b; font-weight: bold;color:white"> '+
				'<tr> <th scope="col">Nome</th> <th scope="col">Ticket</th> </tr> '+
			'</thead> '+
		   	'<tbody style="font-weight:normal; color:black;">'

			var insc, template

			this.inscricoes.forEach(function(el){
				insc = new Inscricao(el)
				template = '<tr><td scope="col" style="font-weight:normal; color:black;"> '+
					insc.nome+'  </td><td scope="col" style="font-weight:normal; color:black;">'+
					insc.ticket+' </td></tr>'
				aux += template

			})

			aux += '</tbody></table>'

			new Helper().relatorio(aux);
			// var doc = new jsPDF()
			// doc.fromHTML(aux, 10, 10, {'width': 180});
			// doc.save('Inscrições.pdf')

		}
	}
})


	/* HOME
			@name : texto
			@href : selector
			@tema : selector
		*/
	Vue.component('home-formulario-item', {
		template: '#home-formulario-template',
		data: function () {
			return {
				id: '',
				request: new Request(),
				data: new Home(),
				modal : new Modal(),
			}
		},
		props: {
			controller: Object
		},
		async created(){
	 			data = await axios.get(
			      	    window.rota+'api/pagina/1'
			      	).then(function (response) {
			      		return response.data
					}).catch({
					}).finally({
					})

				this.data = new Home(data)
		},
		computed: {

		},
		methods: {
			async add() {

				let formData = this.data
				var data = [],  r = this.request

				r.loading()

				data = await axios.post(
					window.rota+'api/pagina/update',
					formData
					).then(function (response) {
						r.success()
						return response.data
					}).catch( function(response) {
						r.error()
					}).finally({
					})

			},
			reset() {
				this.data = new Home()
				this.request = new Request()
			},
		}
	})
