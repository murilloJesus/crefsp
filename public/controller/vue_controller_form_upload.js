	// pagina
	Vue.component('uploader-pagina-formulario-item', {
		template: '#uploader-pagina-formulario-template',
		data: function () {
			return {
				data : new Pagina(),
				request : new Request(),
				template : new Template(),
				busca : new Search(),
				editor : new Helper().textoAleatorio(6),

				placeholder : 'Adicionar',
				//FILHOS
				modal : new Modal(),
				paginas : [],
				itens : [],

			}
		},
		props: {
			controller: Object
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
		},
		methods: {
			async submit() {

				if(!this.data.id){
					
					let formData = this.data
					 formData.template = CKEDITOR.instances[this.editor].getData()
	
					var data = [], r = this.request
	
					r.loading() 
	
					delete formData.id
					formData.parent_id = this.controller.controller.controller.data.id
	
					data = await axios.post(
						window.rota+'api/pagina',
						formData
						).then(function (response) {
							r.success()
							return response.data.data
						}).catch(function(respose){
							r.error()
						}).finally({})

				}else{

					let formData = this.data
					 formData.template = CKEDITOR.instances[this.editor].getData()
	
					var data = [], r = this.request
	
					r.loading() 
	
					data = await axios.post(
						window.rota+'api/pagina/update',
						formData
						).then(function (response) {
							r.success()
							return response.data.data
						}).catch(function(respose){
							r.error()
						}).finally({})
						
				}

				this.controller.controller.controller.atualizar_arquivos()
				this.close()
				this.reset()
		
			},
			async submit_for_arquives() {
				let formData = this.data
				formData.template = CKEDITOR.instances[this.editor].getData()

				var data = [], r = this.request

				if (!this.data.id && this.placeholder !== 'Editar') {
					
					delete formData.id
					formData.parent_id = this.controller.controller.controller.data.id

					data = await axios.post(
						window.rota+'api/pagina',
						formData
						).then(function (response) {
							r.initial()
							return response.data.data
						}).catch(function(){
							r.error()
						})

					this.data = new Pagina(data)

					modalForm = this.modal
					modalForm.pagina_id = this.data.id

					delete modalForm.id

					await axios.post(
						window.rota+'api/item',
						modalForm
						).then(function (response) {
							return response.data.data
						}).catch(function(){
							r.error()
						})
						
					
					this.controller.controller.controller.atualizar_arquivos()
					this.atualizar_arquivos()
				
				}

			},
			async atualizar_arquivos(){
				await axios
				.get(window.rota+'api/paginas/'+this.data.id)
				.then(response => (this.paginas = response.data))
				.catch(function (error) {
					this.paginas = []
				})
				.finally()

				await axios
				.get(window.rota+'api/item/pagina/'+this.data.id)
				.then(response => (this.itens = new Lista(response.data) ) )
				.catch(function (error) {
					this.itens = []
				})
				.finally()

				this.modal = this.itens.modal

			},
			reset() {
				this.data = new Pagina()
				this.request = new Request()
				this.template = new Template()
				this.busca = new Search()
				this.modal = new Modal()
				this.placeholder = 'Adicionar'
				CKEDITOR.instances[this.editor].setData( '' )
				$(this.$refs.inicial).trigger('click')

				this.paginas = []
				this.itens = []
			},
			close(){
				this.controller.close_upload()
			}
		}
	})


	// Vue.component('uploader-pagina-formulario-item', {
	// 	template: '#uploader-pagina-formulario-template',
	// 	data: function () {
	// 		return {
	// 			id: '',
	// 			referencia_id : '',
	// 			pagina_id : '',
	// 			name: '',
	// 			source : '',
	// 			status: true,
	// 			editor : new Helper().textoAleatorio(6),

	// 			//FILHOS
	// 			template : {},
	// 			busca : {},
	// 			paginas : [],
	// 			itens : [],

	// 		}
	// 	},
	// 	props: {
	// 		controller: Object
	// 	},
	// 	async beforeUpdate() {
	// 		if (this.controller.id && this.controller.id != this.id) {
	// 			data = await axios.get(
	// 				window.rota+'api/pagina/' + this.controller.id
	// 			).then(function (response) {
	// 				return response.data
	// 			}).catch({
	// 			}).finally({
	// 			})

	// 			this.id = data.id
	// 			this.referencia_id = data.referencia_id
	// 			this.pagina_id = data.pagina_id
	// 			this.name = data.name
	// 			this.source = data.source
	// 			this.status = data.status
	// 			CKEDITOR.instances[this.editor].setData( data.template )
			
	// 			this.atualizar_arquivos()
	// 		} 
	// 	},
	// 	computed : {
	// 		pessoas : function () {
	// 				return this.itens.pessoa
	// 		},
	// 		editorials : function () {
	// 				return this.itens.editorial
	// 		},
	// 		lista : function () {
	// 				return this.itens.lista
	// 		},
	// 		formulario : function () {
	// 				return this.itens.inputs
	// 		},
	// 		accordion : function () {
	// 				return this.itens.accordion
	// 		},
	// 		banners : function () {
	// 				return this.itens.banners
	// 		},
	// 		// galeria : function () {
	// 		// 		return this.itens.galeria
	// 		// },
	// 		videos : function () {
	// 				return this.itens.videos
	// 		},
	// 	},
	// 	methods: {
	// 		async submit() {
	// 			let formData = new FormData()
	// 			formData.append('name', this.name)
	// 			formData.append('status', this.status)
 	// 			formData.append('template', CKEDITOR.instances[this.editor].getData())

	// 			formData.append('_token', $("input[name*='_token']").val())

	// 			var data = []

	// 			if (this.controller.id && this.controller.placeholder === 'Editar') {
	// 				formData.append('id', this.controller.id)
	// 				data = await axios.post(
	// 					window.rota+'api/pagina/update',
	// 					formData, {
	// 						headers: {
	// 							'Content-Type': 'multipart/form-data'
	// 						}
	// 					}).then(function (response) {
	// 						return response.data.data
	// 					})

	// 				this.reset()
	// 				this.controller.close()
	// 				this.controller.atualizar()


	// 			} else {
	// 				data = await axios.post(
	// 					window.rota+'api/pagina',
	// 					formData, {
	// 						headers: {
	// 							'Content-Type': 'multipart/form-data'
	// 						}
	// 					}).then(function (response) {
	// 						return response.data.data
	// 					})

	// 				this.reset()
	// 				this.controller.close()
	// 				this.controller.atualizar()
				
	// 			}

	// 		},
	// 		async add() {
	// 			let formData = new FormData()
	// 			formData.append('name', this.name)
	// 			formData.append('status', this.status)
	// 			formData.append('template', CKEDITOR.instances[this.editor].getData())

	// 			formData.append('_token', $("input[name*='_token']").val())

	// 			var data = []

	// 			if (this.controller.id && this.controller.placeholder === 'Editar') {
	// 				formData.append('id', this.controller.id)
	// 				data = await axios.post(
	// 					window.rota+'api/pagina/update',
	// 					formData, {
	// 						headers: {
	// 							'Content-Type': 'multipart/form-data'
	// 						}
	// 					}).then(function (response) {
	// 						return response.data.data
	// 					})

	// 				this.reset()
	// 				this.controller.close()
	// 				this.controller.atualizar()


	// 			} else {
	// 				data = await axios.post(
	// 					window.rota+'api/pagina',
	// 					formData, {
	// 						headers: {
	// 							'Content-Type': 'multipart/form-data'
	// 						}
	// 					}).then(function (response) {
	// 						return response.data.data
	// 					})

	// 				this.reset()
	// 				this.controller.close()
	// 				this.controller.atualizar()
				
	// 			}

	// 		},
	// 		reset() {
	// 			this.id = ''
	// 			this.name = ''
	// 			this.source = ''
	// 			this.status  = true
	// 			CKEDITOR.instances[this.editor].setData( '' )

	// 			this.paginas = []
	// 			this.pessoas = []

	// 			this.controller.placeholder = 'Adicionar'
	// 		},
	// 		async submit_for_arquives() {
	// 			let formData = new FormData()
	// 			formData.append('name', this.name)
	// 			formData.append('source', this.source)
	// 			formData.append('status', this.status)
	// 			formData.append('referencia_id', this.referencia_id)
	// 			formData.append('template', CKEDITOR.instances[this.editor].getData())

	// 			formData.append('_token', $("input[name*='_token']").val())

	// 			var data = []

	// 			if (!this.controller.id && this.controller.placeholder !== 'Editar') {
	// 				data = await axios.post(
	// 					window.rota+'api/pagina',
	// 					formData, {
	// 						headers: {
	// 							'Content-Type': 'multipart/form-data'
	// 						}
	// 					}).then(function (response) {
	// 						return response.data.pagina
	// 					})

	// 				this.controller.id = data.id
	// 				this.id = data.id
	// 				this.controller.placeholder = 'Editar'

	// 				this.controller.atualizar()
				
	// 			}

	// 		},
	// 		async atualizar_arquivos(){
	// 		await axios
	// 		.get(window.rota+'api/pagina/pagina/'+this.controller.id)
	// 		.then(response => (this.paginas = response.data))
	// 		.catch(function (error) {
	// 			this.paginas = []
	// 		})
	// 		.finally()

	// 		await axios
	// 		.get(window.rota+'api/item/pagina/'+this.controller.id)
	// 		.then(response => (this.itens = new Lista(response.data) ) )
	// 		.catch(function (error) {
	// 			this.itens = []
	// 		})
	// 		.finally()

	// 		this.atualizar_abas()
	// 		},
	// 		atualizar_abas(){
	// 			this.template.banner = this.banners.lengh ? true : false
	// 			// this.template.galeria = this.galeria.length ? true : false
	// 			this.template.videos = this.videos.length ? true : false
	// 			this.template.lista = this.lista.length ? true : false
	// 			this.template.formularaio = this.formulario.length ? true : false
	// 			this.template.accordion = this.accordion.length ? true : false
	// 			this.template.editorial = this.editorials.length ? true : false
	// 			this.template.pessoas = this.pessoas.length ? true : false
	// 		}
	// 	}
	// })




	// IMAGEM
	Vue.component('uploader-imagem-formulario-item', {
			template: '#uploader-imagem-formulario-template',
			data: function () {
				return {
					request : new Request(),
					descricao: "",
					file: "",
					name: ""
				}
			},
			props: {
				placeholder: String,
				controller: Object
			},
			computed: {

			},
			methods: {
				submit: async function () {
					var r = this.request
					r.loading()

					let formData = new FormData()
					formData.append('id', this.controller.controller.id)
					formData.append('imagem', this.file)
					formData.append('name', this.name)
					formData.append('descricao', this.descricao)
					formData.append('_token', $("input[name*='_token']").val())

					var data = []

					// You should have a server side REST API 
					data = await axios.post(
						window.rota+'api/upload',
						formData, {
							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}).then(function (response) {
							r.success()
							return response.data.data
						}).catch(function(){
							r.error()
						}).finally({})

					this.controller.send(data.id)
					this.controller.name = data.name
					this.reset()
					this.close()
				},
				reset: function () {
					this.request = new Request()
					this.descricao = ""
					this.file = ""
					this.name = ""
				},
				close() {
					this.controller.close_upload()
				}
			}
		})

	/* ARQUIVO */
		Vue.component('uploader-arquivo-formulario-item', {
			template: '#uploader-arquivo-formulario-template',
			data: function () {
				return {
					request : new Request(),
					descricao: "",
					file: "",
					name: "",
				}
			},
			props: {
				placeholder: String,
				controller: Object
			},
			computed: {

			},
			methods: {
				submit: async function () {
					var  r = this.request
					r.loading()

					let formData = new FormData()
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
							r.success()
							return response.data.data
						}).catch(function(){
							r.error()
						}).finally({})

					this.controller.controller[this.controller.field] = data.id
					this.controller.name = data.name
					this.reset()
					this.close()
				},
				reset: function () {
					this.request = new Request()
					this.descricao = ""
					this.file = ""
					this.name = ""
				},
				close() {
					this.controller.close_upload()
				}
			}
		})

	// PESSOA
	Vue.component('uploader-pessoa-formulario-item', {
			template: '#uploader-pessoa-formulario-template',
			data: function () {
				return {
					data : new Pessoa(),
					request : new Request(),				
					editor: new Helper().textoAleatorio(8),
				}
			},
			props: {
				placeholder: String,
				controller: Object
			},
			methods: {
				submit: async function () {
					let formData = this.data
					formData.template = CKEDITOR.instances[this.editor].getData();

					var data = []
					this.request.loading()
					delete formData.id

					t = this
					
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

					this.controller.controller.id = data.id 
					this.controller.name = data.name
					this.close()
					this.reset()
				},
				reset: function () {
					this.data = new Pessoa()
					this.request = new Request()
					CKEDITOR.instances[this.editor].setData('')
				},
				close() {
					this.controller.close_upload()
				}
			}
		})

	/* CATEGORIAS */
		Vue.component('uploader-categoria-formulario-item', {
			template: '#uploader-categoria-formulario-template',
			data: function () {
				return {
					name: '',
					request : new Request()
				}
			},
			props: {
				placeholder: String,
				controller: Object,
			},
			computed: {

			},
			methods: {
				async submit() {
					let formData = new FormData()
					formData.append('name', this.name)
					formData.append('type', this.controller.type)

					var data = [], r = this.request

					r.loading()

					// You should have a server side REST API 
					data = await axios.post(
						window.rota+'api/categoria',
						formData
						).then(function (response) {
							r.success()
							return response.data.data
						}).catch(function(){
							r.error()
						})

					this.controller.controller.categoria = data.id
					this.controller.name = data.name

					this.controller.atualizar()
					this.close()
					this.reset()
				},
				reset(){
					this.name = ''
					this.request = new Request()
				},
				close() {
					this.controller.close_upload()
				}
			}
		})

	/* VIDEO */
		Vue.component('uploader-video-formulario-item', {
			template: '#uploader-video-formulario-template',
			data: function () {
				return {
					name : "",
					data : new Video(),
					request : new Request()
				}
			},
			props: {
				placeholder: String,
				controller: Object
			},
			methods: {
				submit: async function () {
					let formData = this.data
					formData.source = new Helper().getVideoEmbed(formData.source)
					var data = []
					this.request.loading()
					delete formData.id
					formData.item_id = this.controller.controller.controller.controller.data.id

					t = this
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

					this.controller.controller.controller.controller.atualizar_arquivos()
					this.close()
					this.reset()
				},
				reset: function () {
					this.data = new Video()
					this.request = new Request()
				},
				close() {
					this.controller.close_upload()
				}
			}
		})
