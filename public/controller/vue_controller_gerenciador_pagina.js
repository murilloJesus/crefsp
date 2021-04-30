	/* EDITORIAL PAGINA
		@editorial : formulario
		@editorials : tabela
		*/
Vue.component('gerenciar-pagina-editorials-item', {
	template: '#gerenciar-pagina-editorials-template',
	data: function () {
		return {
			id: false,
			tipo : '',
			placeholder: 'Adicionar',
		}
	},
	props: {
		controller : Object
	},
	computed: {
		data: function () {
			return this.controller.editorials
		}
	},
	methods: {
		atualizar() {
			this.controller.atualizar_arquivos()
		},
		editar(id){
			this.id = id
			this.placeholder = 'Editar'
			this.open()
		},
		duplicar(id){
			this.id = id
			this.placeholder = 'Duplicar'
			this.open()
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', true)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/item/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.controller.atualizar_arquivos()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', false)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/item/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.controller.atualizar_arquivos()
		},
		deletar(id){
			var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

			if(confirm){
				this.deleta(id)
			}

		},
		async deleta(id) {
			await axios
				.get(window.rota+'api/item/delete/' + id)
				.then()
				.catch()
				.finally()

			this.controller.atualizar_arquivos()
			return true
		},
		open(tipo = 4){
			this.tipo = tipo
			$(this.$refs.modal).modal('show')
		},
		close(){
			$(this.$refs.modal).modal('hide')
		},
		reset(){
			this.placeholder = 'Adicionar'
			this.id = false
		}
	}
})




	/* GALERIAS PAGINA
		@galeria : formulario
		@galerias : tabela
		*/
Vue.component('gerenciar-pagina-galerias-item', {
	template: '#gerenciar-pagina-galerias-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
		}
	},
	props: {
		controller : Object
	},
	computed: {
		data: function () {
			return this.controller.galeria
		}
	},
	methods: {
		atualizar() {
			
		},
		editar(id){
			this.id = id
			this.placeholder = 'Editar'
			this.open()
		},
		duplicar(id){
			this.id = id
			this.placeholder = 'Duplicar'
			this.open()
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', true)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/item/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.controller.atualizar_arquivos()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', false)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/item/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.controller.atualizar_arquivos()
		},
		deletar(id){
			var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

			if(confirm){
				this.deleta(id)
			}

		},
		async deleta(id) {
			await axios
				.get(window.rota+'api/item/delete/' + id)
				.then()
				.catch()
				.finally()

			this.controller.atualizar_arquivos()
			return true
		},
		open(){
			$(this.$refs.modal).modal('show')
		},
		close(){
			$(this.$refs.modal).modal('hide')
		},
		reset(){
			this.placeholder = 'Adicionar'
			this.id = false
		}
	}
})


	/* VIDEOS PAGINA
		@video : formulario
		@videos : tabela
		*/
Vue.component('gerenciar-pagina-videos-item', {
	template: '#gerenciar-pagina-videos-template',
	data: function () {
		return {
			video: false,
			request : new Request('add')
		}
	},
	props: {
		controller : Object
	},
	computed: {
		data: function () {
			return this.controller.videos
		}
	},
	methods: {
		atualizar() {
			this.controller.atualizar_arquivos()
		},
		async add(){
			if(this.video){
				t = this
				t.request.loading()

				var	data = await axios.get(
						window.rota+'api/item/' + this.video
					).then(function (response) {
						return response.data.item
					}).catch(function(){
						t.request.error()
					}).finally({
					})

					formData = new Video(data)
					formData.pagina_id = this.controller.data.id
					formData.referencia_id = formData.id
					delete formData.id


					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							t.request.initial()
							return response.data.data
						}).catch(function(response){
							t.request.error()
						}).finally({
						})

					this.atualizar()
					this.reset()				
			}

		},
		deletar(id){
			var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

			if(confirm){
				this.deleta(id)
			}

		},
		async deleta(id) {
			await axios
				.get(window.rota+'api/item/delete/' + id)
				.then()
				.catch()
				.finally()

			this.controller.atualizar_arquivos()
			return true
		},
		reset(){
			this.id = false
			this.request = new Request('add')
		}
	}
})


	/* BANNERS PAGINA
		@banner : formulario
		@banners : tabela
		*/
Vue.component('gerenciar-pagina-banners-item', {
	template: '#gerenciar-pagina-banners-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
		}
	},
	props: {
		controller : Object
	},
	computed: {
		data: function () {
			return this.controller.banners
		}
	},
	methods: {
		atualizar() {
			this.controller.atualizar_arquivos()
		},
		editar(id){
			this.id = id
			this.placeholder = 'Editar'
			this.open()
		},
		duplicar(id){
			this.id = id
			this.placeholder = 'Duplicar'
			this.open()
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', true)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/item/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.controller.atualizar_arquivos()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', false)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/item/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.controller.atualizar_arquivos()
		},
		deletar(id){
			var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

			if(confirm){
				this.deleta(id)
			}

		},
		async deleta(id) {
			await axios
				.get(window.rota+'api/item/delete/' + id)
				.then()
				.catch()
				.finally()

			this.controller.atualizar_arquivos()
			return true
		},
		open(){
			$(this.$refs.modal).modal('show')
		},
		close(){
			$(this.$refs.modal).modal('hide')
		},
		reset(){
			this.id = false
			this.placeholder = 'Adicionar'
		}
	}
})



	/* MAPAS PAGINA
		@banner : formulario
		@banners : tabela
		*/
		Vue.component('gerenciar-pagina-mapas-item', {
			template: '#gerenciar-pagina-mapas-template',
			data: function () {
				return {
					id: false,
					placeholder: 'Adicionar',
				}
			},
			props: {
				controller : Object
			},
			computed: {
				data: function () {
					return this.controller.mapas
				}
			},
			methods: {
				atualizar() {
					this.controller.atualizar_arquivos()
				},
				editar(id){
					this.id = id
					this.placeholder = 'Editar'
					this.open()
				},
				duplicar(id){
					this.id = id
					this.placeholder = 'Duplicar'
					this.open()
				},
				async ativar(id) {
					let formData = new FormData()
		
					formData.append('id', id)
					formData.append('status', true)
					formData.append('_token', $("input[name*='_token']").val())
		
					var data = []
		
					data = await axios.post(
					window.rota+'api/item/update',
						formData, {
							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}).then(function (response) {
							return response
						})
		
		
					this.controller.atualizar_arquivos()
				},
				async desativar(id) {
					let formData = new FormData()
		
					formData.append('id', id)
					formData.append('status', false)
					formData.append('_token', $("input[name*='_token']").val())
		
					var data = []
		
					data = await axios.post(
					window.rota+'api/item/update',
						formData, {
							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}).then(function (response) {
							return response
						})
		
		
					this.controller.atualizar_arquivos()
				},
				deletar(id){
					var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")
		
					if(confirm){
						this.deleta(id)
					}
		
				},
				async deleta(id) {
					await axios
						.get(window.rota+'api/item/delete/' + id)
						.then()
						.catch()
						.finally()
		
					this.controller.atualizar_arquivos()
					return true
				},
				open(){
					$(this.$refs.modal).modal('show')
				},
				close(){
					$(this.$refs.modal).modal('hide')
				},
				reset(){
					this.id = false
					this.placeholder = 'Adicionar'
				}
			}
		})


	/* FORMULARIO PAGINA
		@formulario : formulario
		@formularios : tabela
		*/
Vue.component('gerenciar-pagina-formularios-item', {
	template: '#gerenciar-pagina-formularios-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
		}
	},
	props: {
		controller : Object
	},
	computed: {
		data: function () {
			return this.controller.formulario
		}
	},
	methods: {
		atualizar() {
			this.controller.atualizar_arquivos()
		},
		editar(id){
			this.id = id
			this.placeholder = 'Editar'
			this.open()
		},
		duplicar(id){
			this.id = id
			this.placeholder = 'Duplicar'
			this.open()
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', true)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/item/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.controller.atualizar_arquivos()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', false)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/item/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.controller.atualizar_arquivos()
		},
		deletar(id){
			var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

			if(confirm){
				this.deleta(id)
			}

		},
		async deleta(id) {
			await axios
				.get(window.rota+'api/item/delete/' + id)
				.then()
				.catch()
				.finally()

			this.controller.atualizar_arquivos()
			return true
		},
		open(){
			$(this.$refs.modal).modal('show')
		},
		close(){
			$(this.$refs.modal).modal('hide')
		},
		reset(){
			this.id = false
			this.placeholder = 'Adicionar'
		}
	}
})

	/* LISTA PAGINA
		@lista : formulario
		@listas : tabela
		*/
Vue.component('gerenciar-pagina-listas-item', {
	template: '#gerenciar-pagina-listas-template',
	data: function () {
		return {
			id: false,
			tipo : '',
			placeholder: 'Adicionar',
		}
	},
	props: {
		controller : Object
	},
	computed: {
		data: function () {
			return this.controller.lista
		}
	},
	methods: {
		atualizar() {
			this.controller.atualizar_arquivos()
		},
		editar(id){
			this.id = id
			this.placeholder = 'Editar'
			this.open()
		},
		duplicar(id){
			this.id = id
			this.placeholder = 'Duplicar'
			this.open()
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', true)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/item/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.controller.atualizar_arquivos()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', false)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/item/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.controller.atualizar_arquivos()
		},
		deletar(id){
			var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

			if(confirm){
				this.deleta(id)
			}

		},
		async deleta(id) {
			await axios
				.get(window.rota+'api/item/delete/' + id)
				.then()
				.catch()
				.finally()

			this.controller.atualizar_arquivos()
			return true
		},
		open(tipo = 4){
			this.tipo = tipo
			$(this.$refs.modal).modal('show')
		},
		close(){
			console.log(this.controller.controller.data);
			
			$(this.$refs.modal).modal('hide')
		},
		reset(){
			this.placeholder = 'Adicionar'
			this.id = false
		}
	}
})


	/* ACCORDION PAGINA
		@accordion : formulario
		@accordions : tabela
		*/
Vue.component('gerenciar-pagina-accordions-item', {
	template: '#gerenciar-pagina-accordions-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
		}
	},
	props: {
		controller : Object
	},
	computed: {
		data: function () {
			return this.controller.accordion
		}
	},
	methods: {
		atualizar() {
			this.controller.atualizar_arquivos()
		},
		editar(id){
			this.id = id
			this.placeholder = 'Editar'
			this.open()
		},
		duplicar(id){
			this.id = id
			this.placeholder = 'Duplicar'
			this.open()
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', true)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/item/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.controller.atualizar_arquivos()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', false)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/item/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.controller.atualizar_arquivos()
		},
		deletar(id){
			var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

			if(confirm){
				this.deleta(id)
			}

		},
		async deleta(id) {
			await axios
				.get(window.rota+'api/item/delete/' + id)
				.then()
				.catch()
				.finally()

			this.controller.atualizar_arquivos()
			return true
		},
		open(){
			$(this.$refs.modal).modal('show')
		},
		close(){
			$(this.$refs.modal).modal('hide')
		},
		reset(){
			this.placeholder = 'Adicionar'
			this.id = false
		}
	}
})

	/* VIDEOS PAGINA
		@pessoa : formulario
		@pessoas : tabela
		*/
Vue.component('gerenciar-pagina-pessoas-item', {
	template: '#gerenciar-pagina-pessoas-template',
	data: function () {
		return {
			id: false,
			request : new Request('add')
		}
	},
	props: {
		controller : Object
	},
	computed: {
		data: function () {
			return this.controller.pessoas
		}
	},
	methods: {
		atualizar() {
			this.controller.atualizar_arquivos()
		},
		async add(){
			if(this.id){
				t = this
				t.request.loading()

				var	data = await axios.get(
						window.rota+'api/item/' + this.id
					).then(function (response) {
						return response.data.item
					}).catch(function(){
						t.request.error()
					}).finally({
					})

					formData = new Pessoa(data)
					formData.pagina_id = this.controller.data.id
					formData.referencia_id = formData.id
					delete formData.id


					data = await axios.post(
						window.rota+'api/item',
						formData
						).then(function (response) {
							t.request.initial()
							return response.data.data
						}).catch(function(response){
							t.request.error()
						}).finally({
						})

					this.atualizar()
					this.reset()				
			}

		},
		editar(id){
			window.open("/admin/listar-pessoas/"+id, "_blank");
		},
		deletar(id){
			var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

			if(confirm){
				this.deleta(id)
			}

		},
		async deleta(id) {
			await axios
				.get(window.rota+'api/item/delete/' + id)
				.then()
				.catch()
				.finally()

			this.controller.atualizar_arquivos()
			return true
		},
		reset(){
			this.id = false
			this.request = new Request('add')
		}
	}
})
