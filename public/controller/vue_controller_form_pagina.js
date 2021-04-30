/* GALERIA
			@name : texto
			@imagens : []
		*/
	Vue.component('galeria-pagina-formulario-item', {
		template: '#galeria-pagina-formulario-template',
		data: function () {
			return {
				data : new Galeria(),
				request : new Request('add'),
				image_id : '',
				imagens: [],
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.controller.data.galeria_id  && this.controller.controller.data.galeria_id != this.data.id && this.request.status != 1) {
			
				var r = this.request
				r.loading()

				var data = await axios.get(
					window.rota+'api/item/' + this.controller.controller.data.galeria_id
				).then(function (response) {
					return response.data.item
				}).catch(function(){
					r.error()
				}).finally({
				})

				this.data = new Galeria(data)

				data = await axios.get(
					window.rota+'api/imagens/galeria/' + this.data.id
				).then(function (response) {
					r.initial()
					return response.data
				}).catch(function(){
					r.error()
				}).finally({
				})

				data = new Helper().normalizeImagens(data)
				this.imagens = new Helper().getIncapsuledImagens(data)

			} 
		},
		methods: {
			async add() {

				let formData = this.data
				var data = [], r = this.request

				r.loading()

				if(!this.controller.controller.data.galeria_id){

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

					this.controller.controller.data.galeria_id = data.id
					this.data = new Galeria(data)

				}else{
					
					data = await axios.post(
						window.rota+'api/item/update',
						formData
						).then(function (response) {
							return response.data
						}).catch(function(){
							r.error()
						}).finally({
						})
				}

					let imgData = new FormData()
					imgData.append('galeria_id', this.controller.controller.data.galeria_id)	
					imgData.append('id', this.image_id)	

					data = await axios.post(
						window.rota+'api/imagem/update',
						imgData
						).then(function (response) {
							r.success()
							return response.data
						}).catch(function(){
							r.error()
						}).finally({
						})

				this.controller.atualizar()
				this.atualizar()
			},
			async atualizar() {
				if (this.controller.controller.data.galeria_id) {
					var r = this.request

					r.loading()

					data = await axios.get(
						window.rota+'api/imagens/galeria/' + this.controller.controller.data.galeria_id
						).then(function (response) {
							r.initial()
							return response.data
						}).catch(function(){
							r.error()
						}).finally({
						})


					data = new Helper().normalizeImagens(data)
					this.imagens = new Helper().getIncapsuledImagens(data)
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
				this.data = new Galeria()
				this.request = new Request('add')
				this.image_id = ''
				this.imagens = []	
			}
		}
	})
	
	/* LISTA
		@name : texto
		@href : selector
		@descricao : texto
		@categoria : selector
	*/
	Vue.component('lista-pagina-formulario-item', {
		template: '#lista-pagina-formulario-template',
		data: function () {
			return {
				id: "",
				data : {
					type : '',
					icone: '',
					name : '',
					source : '',
					template : '',
					descricao : '',
					datamm : '',
					datayy : '',
					data : '',
					cidade : '',
					categoria : '',	
					status : true,
				},
				arquivo : '',
				imagem : '',
				editor : new Helper().textoAleatorio(6),
				request : new Request()
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		computed: {
			busca: function(){
				return this.controller.controller.busca.categoria || this.controller.controller.busca.cidade || this.controller.controller.busca.datamm ||  this.controller.controller.busca.datayy || this.controller.controller.busca.datarange 
			}
		},
		async beforeUpdate(){
			if(this.controller.id && this.controller.id != this.id){
					this.request.loading()

					data = await axios.get(
						window.rota+'api/item/' + this.controller.id
					).then(function (response) {
						return response.data.item
					}).catch({
					}).finally({
					})

					if(data.type == 'arquivo'){
					 	this.controller.tipo = 1
					}
					if(data.type == 'link') {
						this.controller.tipo = 2
					}
					if(data.type == 'template'){
						this.controller.tipo = 3
					}
					if(data.type == 'imagem'){
						this.controller.tipo = 4
					}


					this.data.name = data.name
					this.data.source = data.source
					this.data.icone = data.icone
					this.data.descricao = data.descricao
					this.data.template = data.template
					this.data.categoria = data.categoria
					this.data.cidade = data.cidade
					this.data.datamm = data.datamm
					this.data.datayy = data.datayy
					this.data.data = data.data
					
					this.id = data.id
					this.imagem = data.image_id
					this.arquivo = data.arquivo_id

					this.request.initial()

			}
		},
		updated(){
				if(this.controller.tipo === 1){

				}else if(this.controller.tipo === 2){

				}else if(this.controller.tipo === 3){
					CKEDITOR.instances[this.editor].setData( this.data.template )

					
				if(this.data.template){
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'false' ) 
						$(this.$refs.editor_controller).trigger('click')
				}else{
					if( $(this.$refs.editor_controller).attr('aria-expanded') === 'true' )
						$(this.$refs.editor_controller).trigger('click')
				}

				}else if(this.controller.tipo === 4){

				}
		},
		methods: {
			add: async function () {

				this.request.loading()
				t = this
				
				var formData = this.data
				if(this.controller.tipo === 1){
					formData.arquivo_id = this.arquivo
					formData.type = 'arquivo'
				}else if(this.controller.tipo === 2){
					formData.icone = 'fa-link'
					formData.type = 'link'
				}else if(this.controller.tipo === 3){
					formData.type = 'template'
					formData.template = CKEDITOR.instances[this.editor].getData()
				}else if(this.controller.tipo === 4){
					formData.type = 'imagem'
					formData.imagem = this.imagem
				}

				formData._token = $("input[name*='_token']").val()
				formData.pagina_id = this.controller.controller.data.id

				if(this.controller.placeholder != 'Editar'){

					if(this.controller.placeholder === 'Duplicar') formData.referencia_id = this.id

					delete formData.id

					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							t.request.success()
							return response.data.data
						}).catch(function(){
							t.request.error()
						}).finally({
						})


					if(this.request.status == 200){
						this.controller.atualizar()
						this.reset()
						this.close()
					}

				}else{

					formData.id = this.id

					data = await axios.post(
						window.rota+'api/item/update',
						formData
						).then(function (response) {
							t.request.success()
							return response.data.data
						}).catch(function(){
							t.request.error()
						}).finally({
						})


					if(this.request.status == 200){
						this.controller.atualizar()
						this.reset()
						this.close()
					}
				}

			},
			reset: function () {
				this.controller.id = ''
				this.controller.placeholder = 'Adicionar'

				this.id = ''
				this.data.name = ''
				this.data.source = ''
				this.data.icone = ''
				this.data.descricao = ''
				this.data.categoria = ''
				this.data.datamm = ''
				this.data.datayy = ''
				this.data.cidade = ''
				this.data.data = ''

				this.request = new Request()

				if(this.controller.tipo == 1){

					this.arquivo = ''
				}
				if(this.controller.tipo == 2){

				}
				if(this.controller.tipo == 3){
					CKEDITOR.instances[this.editor].setData( '' )
					
				}
				if(this.controller.tipo == 4){
					this.imagem = ''
				}
			},
			close() {
				this.controller.close()
			}
		}
	})


	/* EDITORIAL
		@name : texto
		@href : selector
		@descricao : texto
		@categoria : selector
		@imagem : selector
		@flash : arquivo
		@zip : arquivo
		@pdf : arquivo
		@video : video
		@autor : texto
		*/
	Vue.component('editorial-pagina-formulario-item', {
		template: '#editorial-pagina-formulario-template',
		data: function () {
			return {
				id: "",
				data : {
					type : 'editorial',
					name : '',
					source : '',
					template : '',
					descricao : '',
					imagem : '',
					flash : '',
					zip : '',
					pdf : '',
					video : '',
					autor : '',
					datamm : '',
					datayy : '',
					data : '',
					cidade : '',
					categoria : '',	
				},
				arquivo : '',
				editor : new Helper().textoAleatorio(6),
				request : new Request()

			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		computed: {
			busca: function(){
				return this.controller.controller.busca.categoria || this.controller.controller.busca.cidade || this.controller.controller.busca.datamm ||  this.controller.controller.busca.datayy || this.controller.controller.busca.datarange 
			}
		},
		async beforeUpdate(){
			if(this.controller.id && this.controller.id != this.id && this.request.status != 1){

					let r = this.request

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

					this.data.name = data.name
					this.data.source = data.source
					this.data.template = data.template
					this.data.descricao = data.descricao
					this.data.imagem = data.imagem
					this.data.flash = data.flash
					this.data.zip = data.zip
					this.data.pdf = data.pdf
					this.data.video = data.video
					this.data.autor = data.autor
					this.data.datamm = data.datamm
					this.data.datayy = data.datayy
					this.data.data = data.data
					this.data.cidade = data.cidade
					this.data.categoria = data.categoria
					this.id = data.id

					this.controller.tipo = 4

					CKEDITOR.instances[this.editor].setData( this.data.template )

			}
		},
		updated(){

		},
		methods: {
			add: async function () {

				var r = this.request

				r.loading()
				
				var formData = this.data
				if(this.controller.tipo == 1){
					formData.arquivo_id = this.arquivo
				}else if(this.controller.tipo == 2){
				}else if(this.controller.tipo == 3){
				}else if(this.controller.tipo == 4){
					formData.template = CKEDITOR.instances[this.editor].getData()
				}

				formData.status = true
				formData._token = $("input[name*='_token']").val()
				formData.pagina_id = this.controller.controller.data.id

				if(this.controller.placeholder != 'Editar'){
					// You should have a server side REST API 
					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							r.success
							return response.data.data
						})

					this.controller.atualizar()
					this.reset()
					this.close()

				}else{
					formData.id = this.id
					data = await axios.post(
						window.rota+'api/item/update',
						formData
						).then(function (response) {
							r.success
							return response.data.data
						})

					this.controller.atualizar()
					this.reset()
					this.close()
				}

			},
			reset: function () {
				this.data.name = ''
				this.data.source = ''
				this.data.template = ''
				this.data.descricao = ''
				this.data.imagem = ''
				this.data.flash = ''
				this.data.zip = ''
				this.data.pdf = ''
				this.data.video = ''
				this.data.autor = ''
				this.data.datamm = ''
				this.data.datayy = ''
				this.data.data = ''
				this.data.cidade = ''
				this.data.categoria = ''
				this.request = new Request()
			},
			close() {
				this.controller.close()
			}
		}
	})


	/* ACORDION
		@name : texto
		@template : editor
		*/
	Vue.component('accordion-pagina-formulario-item', {
		template: '#accordion-pagina-formulario-template',
		data: function () {
			return {
				id: "",
				data : new Accordion(),
				request : new Request(),
				editor : new Helper().textoAleatorio(6),
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		async beforeUpdate(){
			if(this.controller.id && this.controller.id != this.data.id){

					data = await axios.get(
						window.rota+'api/item/' + this.controller.id
					).then(function (response) {
						return response.data.item
					}).catch({
					}).finally({
					})

					this.data = new Accordion(data)

			}
		},
		methods: {
			add: async function () {
				var formData = this.data
				formData.pagina_id = this.controller.controller.data.id
				this.request.loading()

				if(this.controller.placeholder != 'Editar'){
					var t = this
					delete formData.id

					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							t.request.success()
							return response.data.data
						}).catch(function(){
							t.request.error()
						}).finally({
						})

					if(this.request.status == 200){
						this.controller.atualizar()
						this.reset()
						this.close()
					}

				}else{

					var t = this

					data = await axios.post(
						window.rota+'api/item/update',
						formData
						).then(function (response) {
							t.request.success()
							return response.data.data
						}).catch(function(){
							t.request.error()
						}).finally({
						})

					if(this.request.status == 200){
						this.controller.atualizar()
						this.reset()
						this.close()
					}
				}


			},
			reset: function () {
				this.controller.reset()
				this.data = new Accordion()
				this.request = new Request()
			},
			close() {
				this.controller.close()
			}
		}
	})

	/* BANNER
		@name : texto
		@imagem : selector
		*/
	Vue.component('banner-pagina-formulario-item', {
		template: '#banner-pagina-formulario-template',
		data: function () {
			return {
				data : new Banner(),
				request : new Request()
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		async beforeUpdate(){
			if(this.controller.id && this.controller.id != this.data.id){
					var t = this
					t.request.loading()
					var	data = await axios.get(
						window.rota+'api/item/' + this.controller.id
					).then(function (response) {
						t.request.initial()
						return response.data.item
					}).catch(function(){
						t.request.error()
					}).finally({
					})

					this.data = new Banner(data)
			}
		},
		methods: {
			add: async function () {
				var formData = this.data
				formData.pagina_id = this.controller.controller.data.id
				this.request.loading()

				if(this.controller.placeholder != 'Editar'){
					var t = this
					delete formData.id

					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							t.request.success()
							return response.data.data
						}).catch(function(){
							t.request.error()
						}).finally({
						})

				}else{

					var t = this

					data = await axios.post(
						window.rota+'api/item/update',
						formData
						).then(function (response) {
							t.request.success()
							return response.data.data
						}).catch(function(){
							t.request.error()
						}).finally({
						})

				}

				if(this.request.status == 200){
					this.controller.atualizar()
					this.reset()
					this.close()
				}

			},
			reset: function () {
				this.data = new Banner({pagina_id : this.controller.controller.data.id})
				this.request = new Request()
				this.controller.reset()
			},
			close() {
				this.controller.close()
			}
		}
	})



	/* MAPAS
		@name : texto
		@imagem : selector
		*/
		Vue.component('mapas-pagina-formulario-item', {
			template: '#mapas-pagina-formulario-template',
			data: function () {
				return {
					data : new Mapa(),
					request : new Request()
				}
			},
			props: {
				placeholder: String,
				controller: Object
			},
			async beforeUpdate(){
				if(this.controller.id && this.controller.id != this.data.id){
						var t = this
						t.request.loading()
						var	data = await axios.get(
							window.rota+'api/item/' + this.controller.id
						).then(function (response) {
							t.request.initial()
							return response.data.item
						}).catch(function(){
							t.request.error()
						}).finally({
						})
	
						this.data = new Mapa(data)
				}
			},
			methods: {
				add: async function () {
					var formData = this.data
					formData.datamm = new Helper().makeMonth(formData.data)
					formData.pagina_id = this.controller.controller.data.id
					this.request.loading()
	
					if(this.controller.placeholder != 'Editar'){
						var t = this
						delete formData.id
	
						data = await axios.post(
							window.rota+'api/item',
							formData
							).then(function (response) {
								t.request.success()
								return response.data.data
							}).catch(function(){
								t.request.error()
							}).finally({
							})
	
					}else{
	
						var t = this
	
						data = await axios.post(
							window.rota+'api/item/update',
							formData
							).then(function (response) {
								t.request.success()
								return response.data.data
							}).catch(function(){
								t.request.error()
							}).finally({
							})
	
					}
	
					if(this.request.status == 200){
						this.controller.atualizar()
						this.reset()
						this.close()
					}
	
				},
				reset: function () {
					this.data = new Mapa({pagina_id : this.controller.controller.data.id})
					this.request = new Request()
					this.controller.reset()
				},
				close() {
					this.controller.close()
				}
			}
		})

	/* VIDEO
		@video : selector
		*/
	Vue.component('video-pagina-formulario-item', {
		template: '#video-pagina-formulario-template',
		data: function () {
			return {
				id: "",
				data : {
					type : 'video',
					video : ''
				},
				request : new Request()
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		async beforeUpdate(){
			if(this.controller.id && this.controller.id != this.id){
					data = await axios.get(
						window.rota+'api/item/' + this.controller.id
					).then(function (response) {
						return response.data.item
					}).catch({
					}).finally({
					})

					this.data.video = data.video
					this.id = data.id
			}
		},
		methods: {
			add: async function () {
					var formData = this.data
					formData.status = true
					formData._token = $("input[name*='_token']").val()
					formData.pagina_id = this.controller.controller.data.id

				if(this.controller.placeholder != 'Editar'){
					// You should have a server side REST API 
					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							return response.data.data
						})
				}else{
					formData.id = this.id
					data = await axios.post(
						window.rota+'api/item/update',
						formData
						).then(function (response) {
							return response.data.data
						})
				}

				this.controller.atualizar()
				this.reset()
				this.close()
			},
			reset: function () {
				this.id = ''
				this.controller.id = ''
				this.data.video = ''
			},
			close() {
				this.controller.close()
			}
		}
	})



	/* INPUT
		@name : texto
		@formato : selector
		@descricao : texto
		@obrigatorio : checkbox
		*/
	Vue.component('formulario-pagina-formulario-item', {
		template: '#formulario-pagina-formulario-template',
		data: function () {
			return {
				data : new Input(),
				request : new Request()
			}
		},
		props: {
			controller: Object
		},
		async beforeUpdate(){
			if(this.controller.id && this.controller.id != this.data.id && this.request.status != 1){

					var r = this.request

					r.loading()

					data = await axios.get(
						window.rota+'api/item/' + this.controller.id
					).then(function (response) {
						r.initial()
						return response.data.item
					}).catch({
					}).finally({
					})

					this.data = new Input(data)
			}
		},
		methods: {
			add: async function () {
				var formData = this.data
				formData.pagina_id = this.controller.controller.data.id
				this.request.loading()

				if(this.controller.placeholder != 'Editar'){
					var t = this
					delete formData.id

					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							t.request.success()
							return response.data.data
						}).catch(function(){
							t.request.error()
						}).finally({
						})

					this.controller.atualizar()
					this.close()
					this.reset()
					

				}else{

					var t = this

					data = await axios.post(
						window.rota+'api/item/update',
						formData
						).then(function (response) {
							t.request.success()
							return response.data.data
						}).catch(function(){
							t.request.error()
						}).finally({
						})

					this.controller.atualizar()
					this.close()
					this.reset()
					
				}

			},
			reset: function () {
				this.data = new Input()
				this.request = new Request()
				this.controller.reset()
			},
			close() {
				this.controller.close()
			}
		}
	})



	/* BUSCA
			@pesquisar : checkbox
			@categoria : checkbox
			@datarange : checkbox
			@datamm : checkbox
			@datayy : checkbox
			@cidade : checkbox

		*/
	Vue.component('busca-formulario-item', {
		template: '#busca-formulario-template',
		data: function () {
			return {
				
			}
		},
		props: {
			controller: Object
		},
		beforeUpdate(){
			this.controller.busca = this.data
		},
		computed: {
			data : function(){
				return this.controller.busca
			}
		},
		methods: {
			add: async function () {
				if(this.controller.id && this.controller.id != this.id){
					data = await axios.post(
						window.rota+'api/busca/',
						this.data
					).then(function (response) {
						return response.data
					}).catch({
					}).finally({
					})

					let formData = this.data


					var data = []

					// You should have a server side REST API 
					data = await axios.post(
						window.rota+'api/video',
						formData, {
							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}).then(function (response) {
							return response.data.data
						})

				}
			},
			reset: function () {
				this.controller.busca = new Search()
			},
		}
	})

	/* TEMPLATES
			@banner : checkbox
			@galeria : checkbox
			@videos : checkbox
			@lista : checkbox
			@formulario : checkbox
			@accordion : checkbox
			@editorial : checkbox
			@pessoas : checkbox
		*/
	Vue.component('templates-formulario-item', {
		template: '#templates-formulario-template',
		data: function () {
			return {
				id: '',
				data : {}
			}
		},
		created() {
			this.data = this.controller.template
		},
		props: {
			controller: Object
		},
		beforeUpdate(){
			this.data = this.controller.template
			switch(this.data.template){
				case 1 : //Pessoas
					this.data.banner = false
					this.data.galeria = false
					this.data.videos = false
					this.data.lista = false
					this.data.formulario = false
					this.data.accordion = false
					this.data.editorial = false
					this.data.pessoas = true
					break

				case 2 : //Listas
					this.data.banner = false
					this.data.galeria = false
					this.data.videos = false
					this.data.lista = true
					this.data.formulario = false
					this.data.accordion = false
					this.data.editorial = false
					this.data.pessoas = false
					break

				case 3 : //Editorial
					this.data.banner = false
					this.data.galeria = false
					this.data.videos = false
					this.data.lista = false
					this.data.formulario = false
					this.data.accordion = false
					this.data.editorial = true
					this.data.pessoas = false
					break
			}
			this.controller.template = this.data
		},
		methods: {
			reset: function () {
				this.data = new Template()
			},
		}
	})


	// /* PESSOAS

	// 	*/
	// Vue.component('pessoa-pagina-formulario-item', {
	// 	template: '#pessoa-pagina-formulario-template',
	// 	data: function () {
	// 		return {
	// 			id: "",

	// 			request : new Request()
	// 		}
	// 	},
	// 	props: {
	// 		placeholder: String,
	// 		controller: Object
	// 	},
	// 	computed: {

	// 	},
	// 	methods: {
	// 		add: async function () {
	// 			if(this.controller.controller.data.id){
	// 				var r = this.request

	// 				r.loading()

	// 				data = await axios.get(
	// 					window.rota+'api/item/' + this.id
	// 				).then(function (response) {
	// 					return response.data.item
	// 				}).catch({
	// 				}).finally({
	// 				})

	// 				let formData = new FormData()
	// 				formData.append('type', data.type)
	// 				formData.append('pagina_id', this.controller.controller.data.id)
	// 				formData.append('referencia_id', data.id)
	// 				formData.append('name', data.name)
	// 				formData.append('imagem', data.imagem)
	// 				formData.append('cargo', data.cargo)
	// 				formData.append('doc', data.doc)
	// 				formData.append('template', data.template)


	// 				var data = []

	// 				// You should have a server side REST API 
	// 				data = await axios.post(
	// 					window.rota+'api/item',
	// 					formData, {
	// 						headers: {
	// 							'Content-Type': 'multipart/form-data'
	// 						}
	// 					}).then(function (response) {
	// 						return response.data.data
	// 					})

	// 			}

	// 			this.controller.atualizar()
	// 			this.close()
	// 		},
	// 		reset: function () {

	// 		},
	// 		close() {
	// 			this.controller.close_modal()
	// 		}
	// 	}
	// })

