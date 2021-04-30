
	/* PAGINAS FILHO
		@video : formulario
		@videos : tabela
		*/
		Vue.component('gerenciar-filho-paginas-item', {
			template: '#gerenciar-filho-paginas-template',
			data: function () {
				return {
					id: false,
					placeholder: 'Adicionar',
					request : new Request('add')
				}
			},
			props: {
				uploader: Boolean,
				controller : Object
			},
			async beforeCreate() {
		
			},
			computed: {
				data: function () {
					return this.controller.paginas
				}
			},
			methods: {
				editar(id) {
					this.placeholder = 'Editar'
					this.id = id
					this.open()
				},
				duplicar(id) {
					this.placeholder = 'Duplicar'
					this.id = id
					this.open()
				},
				async add(){
					if(this.id){
						var t = this, r = this.request
						r.loading()
		
						var	data = await axios.get(
								window.rota+'api/pagina/' + this.id
							).then(function (response) {
								return response.data
							}).catch(function(){
								t.request.error()
							}).finally({
							})
		
						formData = new Pagina(data)
						formData.parent_id = this.controller.data.id
						formData.referencia_id = formData.id
						delete formData.id
		
						data = await axios.post(
							window.rota+'api/pagina',
							formData
							).then(function (response) {
								return response.data.data
							}).catch(function(response){
								t.request.error()
							}).finally({
							})
	
						this.controller.atualizar_arquivos()
						this.reset()				
					}
				},
				async ativar(id) {
					let formData = new FormData()
		
					formData.append('id', id)
					formData.append('status', true)
					formData.append('_token', $("input[name*='_token']").val())
		
					var data = []
		
					data = await axios.post(
					window.rota+'api/pagina/update',
						formData, {
							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}).then(function (response) {
							return response
						})
		
		
					this.atualizar_arquivos()
				},
				async desativar(id) {
					let formData = new FormData()
		
					formData.append('id', id)
					formData.append('status', false)
					formData.append('_token', $("input[name*='_token']").val())
		
					var data = []
		
					data = await axios.post(
					window.rota+'api/pagina/update',
						formData, {
							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}).then(function (response) {
							return response
						})
		
		
					this.atualizar_arquivos()
				},
				deletar(id){
					var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

					if(confirm){
						this.deleta(id)
					}


				},
				async deleta(id) {
					await axios
						.get(window.rota+'api/pagina/delete/' + id)
						.then()
						.catch()
						.finally()
		
					this.controller.atualizar_arquivos();
					return true
				},
				open () {
					$(this.$refs.modal).modal('show')
				},
				close () {
					$(this.$refs.modal).modal('hide')
				},
				reset(){
					this.id = false
					this.placeholder = 'Adicionar'
				}
			}
		})
		


	/* AGENDA PAGINA
		@agenda : formulario
		@agendas : tabela
		*/
Vue.component('gerenciar-filho-agenda-item', {
	template: '#gerenciar-filho-agenda-template',
	data: function () {
		return {
			id: '',
			placeholder: 'Adicionar',
		}
	},
	props: {
		controller : Object
	},
	computed: {
		data: function () {
			return this.controller.agendas
		}
	},
	methods: {
		atualizar() {
			this.controller.atualizar_arquivos()
		},
		editar(id){
			this.id = id
			this.$emit('id', id);
			this.placeholder = 'Editar'
			this.open()
		},
		duplicar(id){
			this.id = id
			this.placeholder = 'Duplicar'
			this.open()
		},
		async ativar(id) {
			// let formData = new FormData()

			// formData.append('id', id)
			// formData.append('status', true)
			// formData.append('_token', $("input[name*='_token']").val())

			// var data = []

			// data = await axios.post(
			// window.rota+'api/item/update',
			// 	formData, {
			// 		headers: {
			// 			'Content-Type': 'multipart/form-data'
			// 		}
			// 	}).then(function (response) {
			// 		return response
			// 	})


			// this.controller.atualizar_arquivos()
		},
		async desativar(id) {
			// let formData = new FormData()

			// formData.append('id', id)
			// formData.append('status', false)
			// formData.append('_token', $("input[name*='_token']").val())

			// var data = []

			// data = await axios.post(
			// window.rota+'api/item/update',
			// 	formData, {
			// 		headers: {
			// 			'Content-Type': 'multipart/form-data'
			// 		}
			// 	}).then(function (response) {
			// 		return response
			// 	})


			// this.controller.atualizar_arquivos()
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

	/* VIDEOS FILHO
		@video : formulario
		@videos : tabela
		*/
Vue.component('gerenciar-filho-videos-item', {
	template: '#gerenciar-filho-videos-template',
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
			return this.controller.videos
		},
		arquivos : function(){
			return this.controller.videos
		}
	},
	methods: {
		atualizar() {
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

			this.atualizar()
			return true
		},
		reset(){
			this.placeholder = 'Adicionar'
			this.id = false
		}
	}
})


	/* PESSOAS FILHO
		@pessoa : formulario
		@pessoas : tabela
		*/
Vue.component('gerenciar-filho-pessoas-item', {
	template: '#gerenciar-filho-pessoas-template',
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
			return this.controller.pessoas
		},
		arquivos : function(){
			return this.controller.pessoas
		}
	},
	methods: {
		atualizar() {
			this.controller.atualizar_arquivos()
		},
		deletar(id){
					var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

					if(confirm){
						this.deleta(id)
					}

		},
		editar(id){
			window.open("/admin/listar-pessoas/"+id, "_blank");
		},
		async deleta(id) {
			await axios
				.get(window.rota+'api/item/delete/' + id)
				.then()
				.catch()
				.finally()

			this.atualizar()
			return true
		},
	}
})



/* ARQUIVOS FILHO
		@arquivos : formulario
		@arquivoss : tabela
		*/
Vue.component('gerenciar-filho-arquivos-item', {
	template: '#gerenciar-filho-arquivos-template',
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
			return this.controller.arquivos
		},
		arquivos : function(){
			return this.controller.arquivos
		}
	},
	methods: {
		atualizar() {
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
				.get(window.rota+'api/arquivo/delete/' + id)
				.then()
				.catch()
				.finally()

			this.atualizar()
			return true
		},
	}
})

