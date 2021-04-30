/* GERENCIADORES -- >


/* HOME
		@home : formulario
		*/
Vue.component('gerenciar-home-item', {
	template: '#gerenciar-home-template',
	data: function () {
		return {
			id: 1,
			placeholder: 'Adicionar',
		}
	},
	async beforeCreate() {
	},
	computed: {
		data : function(){
		}
	},
	methods: {
		editar(id) {
		},
		duplicar(id) {
		},
		async atualizar() {
		},
		async ativar(id) {
		},
		async desativar(id) {
		},
		deletar(id){
			var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

			if(confirm){
				this.deleta(id)
			}

		},
		async deleta(id) {
		},
	}
})


	/* PAGINAS
		@paginas : formulario
		@paginas : tabela
		*/
Vue.component('gerenciar-pagina-item', {
	template: '#gerenciar-pagina-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			paginas: [],
			modalName: new Helper().textoAleatorio(6)
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/paginas')
			.then(response => (this.paginas = response.data))
			.catch(function (error) {
				this.paginas = []
			})
			.finally()

		return true
	},
	mounted(){
		if(typeof window.editar != 'undefined'){
			this.editar(window.editar);
		}
	},
	computed: {
		data: function () {
			return this.paginas
		}
	},
	methods: {
		open () {
			$("#"+this.modalName).modal('show')
		},
		close () {
			$("#"+this.modalName).modal('hide')
		},
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
		async atualizar() {
			await axios
				.get(window.rota+'api/paginas')
				.then(response => (this.paginas = response.data))
				.catch(function (error) {
					this.paginas = []
				})
				.finally()

			return true
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 1)
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


			this.atualizar()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 0)
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


			this.atualizar()
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

				this.atualizar()

			return true
		},
		reset(){
			this.id = false
			this.placeholder = 'Adicionar'
		}

	}
})

	/* EVENTOS
		@evento : formulario
		@eventos : tabela
		*/
Vue.component('gerenciar-evento-item', {
	template: '#gerenciar-evento-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			eventos: [],
			modalName: new Helper().textoAleatorio(6)
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/eventos')
			.then(response => (this.eventos = response.data))
			.catch(function (error) {
				this.eventos = []
			})
			.finally()

		return true
	},
	computed: {
		data: function () {
			return this.eventos
		}
	},
	methods: {
		open () {
			$("#"+this.modalName).modal('show')
		},
		close () {
			$("#"+this.modalName).modal('hide')
		},
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
		async ativar_destaque(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('destaque', true)
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


			this.atualizar()
		},
		async desativar_destaque(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('destaque', false)
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


			this.atualizar()
		},
		async atualizar() {
			await axios
				.get(window.rota+'api/eventos')
				.then(response => (this.eventos = response.data))
				.catch(function (error) {
					this.eventos = []
				})
				.finally()

			$(this.$refs.lista).trigger('click')

			return true
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 1)
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


			this.atualizar()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 0)
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


			this.atualizar()
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
			this.id = false
			this.placeholder = 'Adicionar'
			this.eventos = []
		}
	}
})

/* BANNERS
	@banner : formulario
	@banners : tabela
	*/
	Vue.component('gerenciar-categorias-noticia-item', {
		template: '#gerenciar-categorias-noticia-template',
		data: function () {
			return {
				id: false,
				placeholder: 'Adicionar',
				categorias_eventos: []
			}
		},
		async beforeCreate() {
			await axios
				.get(window.rota+'api/categorias/noticia')
				.then(response => (this.categorias_eventos = response.data))
				.catch(function (error) {
					this.categorias_eventos = []
				})
				.finally()

			return true
		},
		computed: {
			data: function () {
				return this.categorias_eventos
			}
		},
		methods: {
			editar(id) {
				this.placeholder = 'Editar'
				this.id = id
			},
			duplicar(id) {
				this.placeholder = 'Duplicar'
				this.id = id
			},
			async atualizar() {
				await axios
					.get(window.rota+'api/categorias/noticia')
					.then(response => (this.categorias_eventos = response.data))
					.catch(function (error) {
						this.categorias_eventos = []
					})
					.finally()

				return true
			},
			async ativar(id) {
				let formData = new FormData()

				formData.append('id', id)
				formData.append('status', 1)
				formData.append('_token', $("input[name*='_token']").val())

				var data = []

				data = await axios.post(
				window.rota+'api/categoria/update',
					formData, {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}).then(function (response) {
						return response
					})


				this.atualizar()
			},
			async desativar(id) {
				let formData = new FormData()

				formData.append('id', id)
				formData.append('status', 0)
				formData.append('_token', $("input[name*='_token']").val())

				var data = []

				data = await axios.post(
				window.rota+'api/categoria/update',
					formData, {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}).then(function (response) {
						return response
					})


				this.atualizar()
			},
			deletar(id){
				var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

				if(confirm){
					this.deleta(id)
				}

			},
			async deleta(id) {
				await axios
					.get(window.rota+'api/categoria/delete/' + id)
					.then()
					.catch()
					.finally()

				this.atualizar()
				return true
			},
			reset(){
				this.id = false
				this.placeholder = 'Adicionar'
			},
			open () {
			},
			close () {
			},
		}
	})



	/* BANNERS
	@banner : formulario
	@banners : tabela
	*/
	Vue.component('gerenciar-categorias-eventos-item', {
		template: '#gerenciar-categorias-eventos-template',
		data: function () {
			return {
				id: false,
				placeholder: 'Adicionar',
				categorias_eventos: []
			}
		},
		async beforeCreate() {
			await axios
				.get(window.rota+'api/categorias/evento')
				.then(response => (this.categorias_eventos = response.data))
				.catch(function (error) {
					this.categorias_eventos = []
				})
				.finally()

			return true
		},
		computed: {
			data: function () {
				return this.categorias_eventos
			}
		},
		methods: {
			editar(id) {
				this.placeholder = 'Editar'
				this.id = id
			},
			duplicar(id) {
				this.placeholder = 'Duplicar'
				this.id = id
			},
			async atualizar() {
				await axios
					.get(window.rota+'api/categorias/evento')
					.then(response => (this.categorias_eventos = response.data))
					.catch(function (error) {
						this.categorias_eventos = []
					})
					.finally()

				return true
			},
			async ativar(id) {
				let formData = new FormData()

				formData.append('id', id)
				formData.append('status', 1)
				formData.append('_token', $("input[name*='_token']").val())

				var data = []

				data = await axios.post(
				window.rota+'api/categoria/update',
					formData, {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}).then(function (response) {
						return response
					})


				this.atualizar()
			},
			async desativar(id) {
				let formData = new FormData()

				formData.append('id', id)
				formData.append('status', 0)
				formData.append('_token', $("input[name*='_token']").val())

				var data = []

				data = await axios.post(
				window.rota+'api/categoria/update',
					formData, {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}).then(function (response) {
						return response
					})


				this.atualizar()
			},
			deletar(id){
				var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

				if(confirm){
					this.deleta(id)
				}

			},
			async deleta(id) {
				await axios
					.get(window.rota+'api/categoria/delete/' + id)
					.then()
					.catch()
					.finally()

				this.atualizar()
				return true
			},
			reset(){
				this.id = false
				this.placeholder = 'Adicionar'
			},
			open () {
			},
			close () {
			},
		}
	})



	/* BANNERS
	@banner : formulario
	@banners : tabela
	*/
	Vue.component('gerenciar-categorias-licitacoes-item', {
		template: '#gerenciar-categorias-licitacoes-template',
		data: function () {
			return {
				id: false,
				placeholder: 'Adicionar',
				categorias_licitacoes: []
			}
		},
		async beforeCreate() {
			await axios
				.get(window.rota+'api/categorias/licitacao')
				.then(response => (this.categorias_licitacoes = response.data))
				.catch(function (error) {
					this.categorias_licitacoes = []
				})
				.finally()

			return true
		},
		computed: {
			data: function () {
				return this.categorias_licitacoes
			}
		},
		methods: {
			editar(id) {
				this.placeholder = 'Editar'
				this.id = id
			},
			duplicar(id) {
				this.placeholder = 'Duplicar'
				this.id = id
			},
			async atualizar() {
				await axios
					.get(window.rota+'api/categorias/licitacao')
					.then(response => (this.categorias_licitacoes = response.data))
					.catch(function (error) {
						this.categorias_licitacoes = []
					})
					.finally()

				return true
			},
			async ativar(id) {
				let formData = new FormData()

				formData.append('id', id)
				formData.append('status', 1)
				formData.append('_token', $("input[name*='_token']").val())

				var data = []

				data = await axios.post(
				window.rota+'api/categoria/update',
					formData, {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}).then(function (response) {
						return response
					})


				this.atualizar()
			},
			async desativar(id) {
				let formData = new FormData()

				formData.append('id', id)
				formData.append('status', 0)
				formData.append('_token', $("input[name*='_token']").val())

				var data = []

				data = await axios.post(
				window.rota+'api/categoria/update',
					formData, {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}).then(function (response) {
						return response
					})


				this.atualizar()
			},
			deletar(id){
				var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

				if(confirm){
					this.deleta(id)
				}

			},
			async deleta(id) {
				await axios
					.get(window.rota+'api/categoria/delete/' + id)
					.then()
					.catch()
					.finally()

				this.atualizar()
				return true
			},
			reset(){
				this.id = false
				this.placeholder = 'Adicionar'
			},
			open () {
			},
			close () {
			},
		}
	})


	Vue.component('gerenciar-categorias-vagas-item', {
		template: '#gerenciar-categorias-vagas-template',
		data: function () {
			return {
				id: false,
				placeholder: 'Adicionar',
				categorias_vagas: []
			}
		},
		async beforeCreate() {
			await axios
				.get(window.rota+'api/categorias/vaga')
				.then(response => (this.categorias_vagas = response.data))
				.catch(function (error) {
					this.categorias_vagas = []
				})
				.finally()

			return true
		},
		computed: {
			data: function () {
				return this.categorias_vagas
			}
		},
		methods: {
			editar(id) {
				this.placeholder = 'Editar'
				this.id = id
			},
			duplicar(id) {
				this.placeholder = 'Duplicar'
				this.id = id
			},
			async atualizar() {
				await axios
					.get(window.rota+'api/categorias/vaga')
					.then(response => (this.categorias_vagas = response.data))
					.catch(function (error) {
						this.categorias_vagas = []
					})
					.finally()

				return true
			},
			async ativar(id) {
				let formData = new FormData()

				formData.append('id', id)
				formData.append('status', 1)
				formData.append('_token', $("input[name*='_token']").val())

				var data = []

				data = await axios.post(
				window.rota+'api/categoria/update',
					formData, {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}).then(function (response) {
						return response
					})


				this.atualizar()
			},
			async desativar(id) {
				let formData = new FormData()

				formData.append('id', id)
				formData.append('status', 0)
				formData.append('_token', $("input[name*='_token']").val())

				var data = []

				data = await axios.post(
				window.rota+'api/categoria/update',
					formData, {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}).then(function (response) {
						return response
					})


				this.atualizar()
			},
			deletar(id){
				var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

				if(confirm){
					this.deleta(id)
				}

			},
			async deleta(id) {
				await axios
					.get(window.rota+'api/categoria/delete/' + id)
					.then()
					.catch()
					.finally()

				this.atualizar()
				return true
			},
			reset(){
				this.id = false
				this.placeholder = 'Adicionar'
			},
			open () {
			},
			close () {
			},
		}
	})



	/* MULTIMIDIA
		@multimidia : formulario
		@multimidias : tabela
		*/
Vue.component('gerenciar-multimidia-item', {
	template: '#gerenciar-multimidia-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			multimidias: [],
			modalName: new Helper().textoAleatorio(6)
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/multimidia')
			.then(response => (this.multimidias = response.data))
			.catch(function (error) {
				this.multimidias = []
			})
			.finally()

		return true
	},
	computed: {
		data: function () {
			return this.multimidias
		}
	},
	methods: {
		open () {
			$("#"+this.modalName).modal('show')
		},
		close () {
			$("#"+this.modalName).modal('hide')
		},
		editar(id) {
			this.placeholder = 'Editar'
			this.id = id
			$('#multimdia-tab').trigger('click')
			this.open()
		},
		duplicar(id) {
			this.placeholder = 'Duplicar'
			this.id = id
			$('#multimdia-tab').trigger('click')
			this.open()
		},
		async atualizar() {
			await axios
				.get(window.rota+'api/multimidia')
				.then(response => (this.multimidias = response.data))
				.catch(function (error) {
					this.multimidias = []
				})
				.finally()

			$(this.$refs.lista).trigger('click')

			return true
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 1)
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


			this.atualizar()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 0)
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


			this.atualizar()
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

/* VAGAS
		@vaga : formulario
		@vagas : tabela
		*/
		Vue.component('gerenciar-vaga-item', {
			template: '#gerenciar-vaga-template',
			data: function () {
				return {
					id: false,
					placeholder: 'Adicionar',
					vagas: [],
					modalName: new Helper().textoAleatorio(6)
				}
			},
			async beforeCreate() {
				await axios
					.get(window.rota+'api/vagas')
					.then(response => (this.vagas = response.data))
					.catch(function (error) {
						this.vagas = []
					})
					.finally()

				return true
			},
			computed: {
				data: function () {
					return this.vagas
				}
			},
			methods: {
				open () {
					$("#"+this.modalName).modal('show')
				},
				close () {
					$("#"+this.modalName).modal('hide')
				},
				editar(id) {
					this.placeholder = 'Editar'
					this.id = id
					$("#vaga-tab").trigger('click')
					this.open()
				},
				duplicar(id) {
					this.placeholder = 'Duplicar'
					this.id = id
					$("#vaga-tab").trigger('click')
					this.open()
				},
				async atualizar() {
					await axios
						.get(window.rota+'api/vagas')
						.then(response => (this.vagas = response.data))
						.catch(function (error) {
							this.vagas = []
						})
						.finally()

					return true
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
					this.id = false
					this.placeholder = 'Adicionar'
				}
			}
		})



/* NOTICIA
			@noticia : formulario
			@noticias : tabela
			*/
			Vue.component('gerenciar-noticia-item', {
				template: '#gerenciar-noticia-template',
				data: function () {
					return {
						id: false,
						placeholder: 'Adicionar',
						noticias: [],
					}
				},
				async beforeCreate() {
					await axios
						.get(window.rota+'api/noticias')
						.then(response => (this.noticias = response.data))
						.catch(function (error) {
							this.noticias = []
						})
						.finally()

					return true
				},
				computed: {
					data: function () {
						return this.noticias
					}
				},
				mounted(){
					if(typeof window.editar != 'undefined'){
						this.editar(window.editar);
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
					async ativar_destaque(id) {
						let formData = new FormData()

						formData.append('id', id)
						formData.append('destaque', true)
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


						this.atualizar()
					},
					async desativar_destaque(id) {
						let formData = new FormData()

						formData.append('id', id)
						formData.append('destaque', false)
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


						this.atualizar()
					},
					async ativar(id) {
						let formData = new FormData()

						formData.append('id', id)
						formData.append('status', 1)
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


						this.atualizar()
					},
					async desativar(id) {
						let formData = new FormData()

						formData.append('id', id)
						formData.append('status', 0)
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


						this.atualizar()
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
					async atualizar() {
						await axios
							.get(window.rota+'api/noticias')
							.then(response => (this.noticias = response.data))
							.catch(function (error) {
								this.noticias = []
							})
							.finally()

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


	/* LICITACAO
		@licitacao : formulario
		@licitacoes : tabela
		*/
Vue.component('gerenciar-licitacao-item', {
	template: '#gerenciar-licitacao-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			licitacoes: [],
			modalName: new Helper().textoAleatorio(6)
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/licitacoes')
			.then(response => (this.licitacoes = response.data))
			.catch(function (error) {
				this.licitacoes = []
			})
			.finally()

		return true
	},
	computed: {
		data: function () {
			return this.licitacoes
		}
	},
	methods: {
		open () {
			$("#"+this.modalName).modal('show')
		},
		close () {
			$("#"+this.modalName).modal('hide')
            this.reset();
		},
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
		async atualizar() {
			await axios
				.get(window.rota+'api/licitacoes')
				.then(response => (this.licitacoes = response.data))
				.catch(function (error) {
					this.licitacoes = []
				})
				.finally()

			$(this.$refs.lista).trigger('click')

			return true
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 1)
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


			this.atualizar()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 0)
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


			this.atualizar()
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
			this.id = false
			this.placeholder = 'Adicionar'
		}

	}
})



	/* ARQUIVOS
		@arquivos : formulario
		@arquivoss : tabela
		*/
Vue.component('gerenciar-arquivos-item', {
	template: '#gerenciar-arquivos-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			arquivos: []
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/arquivos')
			.then(response => (this.arquivos = response.data))
			.catch(function (error) {
				this.arquivos = []
			})
			.finally()

		return true
	},
	computed: {
		data: function () {
			return this.arquivos
		}
	},
	methods: {
		editar(id) {
			this.placeholder = 'Editar'
			this.id = id
			$(this.$refs.form).trigger('click')

		},
		duplicar(id) {
			this.placeholder = 'Duplicar'
			this.id = id
			$(this.$refs.form).trigger('click')

		},
		async atualizar() {
			await axios
				.get(window.rota+'api/arquivos')
				.then(response => (this.arquivos = response.data))
				.catch(function (error) {
					this.arquivos = []
				})
				.finally()

			$(this.$refs.lista).trigger('click')

			return true
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 1)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/arquivo/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.atualizar()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 0)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/arquivo/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.atualizar()
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



	/* ACESSO RAPIDO
		@acesso : formulario
		@acessos : tabela
		*/
Vue.component('gerenciar-acesso-rapido-item', {
	template: '#gerenciar-acesso-rapido-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			acessos: []
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/acessos')
			.then(response => (this.acessos = response.data))
			.catch(function (error) {
				this.acessos = []
			})
			.finally()

		return true
	},
	computed: {
		data: function () {
			return this.acessos
		}
	},
	methods: {
		editar(id) {
			this.placeholder = 'Editar'
			this.id = id
			$(this.$refs.modal).modal('show')
		},
		duplicar(id) {
			this.placeholder = 'Duplicar'
			this.id = id
			$(this.$refs.modal).modal('show')
		},
		async atualizar() {
			await axios
				.get(window.rota+'api/acessos')
				.then(response => (this.acessos = response.data))
				.catch(function (error) {
					this.acessos = []
				})
				.finally()

			$(this.$refs.lista).trigger('click')

			return true
		},
		async ativar_destaque(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('destaque', true)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/acesso/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.atualizar()
		},
		async desativar_destaque(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('destaque', false)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/acesso/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.atualizar()
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 1)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/acesso/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.atualizar()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 0)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/acesso/update',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.atualizar()
		},
		deletar(id){
			var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

			if(confirm){
				this.deleta(id)
			}

		},
		async deleta(id) {
			await axios
				.get(window.rota+'api/acesso/delete/' + id)
				.then()
				.catch()
				.finally()

			this.atualizar()
			return true
		},
		open(tipo){
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

	/* BANNERS
			@banner : formulario
			@banners : tabela
			*/
Vue.component('gerenciar-banner-item', {
	template: '#gerenciar-banner-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			banner: []
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/banner')
			.then(response => (this.banner = response.data))
			.catch(function (error) {
				this.banner = []
			})
			.finally()

		return true
	},
	computed: {
		data: function () {
			return this.banner
		}
	},
	methods: {
		editar(id) {
			this.placeholder = 'Editar'
			this.id = id
		},
		duplicar(id) {
			this.placeholder = 'Duplicar'
			this.id = id
		},
		async atualizar() {
			await axios
				.get(window.rota+'api/banner')
				.then(response => (this.banner = response.data))
				.catch(function (error) {
					this.banner = []
				})
				.finally()

			return true
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 1)
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


			this.atualizar()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 0)
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


			this.atualizar()
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
			this.id = false
			this.placeholder = 'Adicionar'
		},
		open () {
		},
		close () {
		},
	}
})




	/* CLUBE
			@clube : formulario
			@clubes : tabela
			*/
Vue.component('gerenciar-clube-item', {
	template: '#gerenciar-clube-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			clube: []
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/clube')
			.then(response => (this.clube = response.data))
			.catch(function (error) {
				this.clube = []
			})
			.finally()

		return true
	},
	computed: {
		data: function () {
			return this.clube
		}
	},
	methods: {
		editar(id) {
			this.placeholder = 'Editar'
			this.id = id
			$(this.$refs.form).trigger('click')
		},
		duplicar(id) {
			this.placeholder = 'Duplicar'
			this.id = id
			$(this.$refs.form).trigger('click')
		},
		async atualizar() {
			await axios
				.get(window.rota+'api/clube')
				.then(response => (this.clube = response.data))
				.catch(function (error) {
					this.clube = []
				})
				.finally()

			$(this.$refs.lista).trigger('click')

			return true
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 1)
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


			this.atualizar()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 0)
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


			this.atualizar()
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
			this.id = false
			this.placeholder = 'Adicionar'
			$(this.$refs.lista).trigger('click')
		},
		close(){

		}
	}
})




	/* PESSOAS
			@pessoa : formulario
			@pessoas : galerias
			*/
Vue.component('gerenciar-pessoas-item', {
	template: '#gerenciar-pessoas-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			pessoas: []
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/pessoas')
			.then(response => (this.pessoas = response.data))
			.catch(function (error) {
				console.log(error);
				this.pessoas = []
			})
			.finally()

		return true
	},
	mounted(){
		if(typeof window.editar != 'undefined'){
			this.editar(window.editar);
		}
	},
	computed: {
		data: function () {
			return this.pessoas
		}
	},
	methods: {
		editar(id) {
			this.placeholder = 'Editar'
			this.id = id
			$(this.$refs.form).trigger('click')

		},
		duplicar(id) {
			this.placeholder = 'Duplicar'
			this.id = id
			$(this.$refs.form).trigger('click')

		},
		async atualizar() {
			await axios
				.get(window.rota+'api/pessoas')
				.then(response => (this.pessoas = response.data))
				.catch(function (error) {
					console.log(error);
					this.pessoas = []
				})
				.finally()

			$(this.$refs.lista).trigger('click')

			return true
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
	}
})



	/* GALERIAS
			@galeria : formulario
			@galerias : galerias
			*/
Vue.component('gerenciar-galerias-item', {
	template: '#gerenciar-galerias-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			galerias: []
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/galerias')
			.then(response => (this.galerias = response.data))
			.catch(function (error) {
				this.galerias = []
			})
			.finally()

		return true
	},
	computed: {
		data: function () {
			return this.galerias
		}
	},
	methods: {
		editar(id) {
			this.placeholder = 'Editar'
			this.id = id
			$(this.$refs.form).trigger('click')

		},
		duplicar(id) {
			this.placeholder = 'Duplicar'
			this.id = id
			$(this.$refs.form).trigger('click')

		},
		async atualizar() {
			await axios
				.get(window.rota+'api/galerias')
				.then(response => (this.galerias = response.data))
				.catch(function (error) {
					this.galerias = []
				})
				.finally()

			return true
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
	}
})


	/* PERMISSOES
			@permissao : foemulario
			@permissoes : tabela
			*/
Vue.component('gerenciar-permissoes-item', {
	template: '#gerenciar-permissoes-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			permissoes: []
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/permissoes')
			.then(response => (this.permissoes = response.data))
			.catch(function (error) {
				this.permissoes = []
			})
			.finally()

		return true
	},
	computed: {
		data: function () {
			return this.permissoes
		}
	},
	methods: {
		editar(id) {
			this.placeholder = 'Editar'
			this.id = id
			$(this.$refs.form).trigger('click')

		},
		duplicar(id) {
			this.placeholder = 'Duplicar'
			this.id = id
			$(this.$refs.form).trigger('click')

		},
		async atualizar() {
			await axios
				.get(window.rota+'api/permissoes')
				.then(response => (this.permissoes = response.data))
				.catch(function (error) {
					this.permissoes = []
				})
				.finally()

			$(this.$refs.lista).trigger('click')

			return true
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 1)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/update-permissao',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.atualizar()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 0)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/update-permissao',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.atualizar()
		},
		deletar(id){
			var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

			if(confirm){
				this.deleta(id)
			}

		},
		async deleta(id) {
			await axios
				.get(window.rota+'api/permissao/delete/' + id)
				.then()
				.catch()
				.finally()

			this.atualizar()
			return true
		},
		reset(){
			this.id = false
			this.placeholder = 'Adicionar'
		}
	}
})




/* USUÁRIOS */
Vue.component('gerenciar-usuarios-item', {
	template: '#gerenciar-usuarios-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			usuarios: []
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/usuarios')
			.then(response => (this.usuarios = response.data))
			.catch(function (error) {
				this.usuarios = []
			})
			.finally()

		return true
	},
	computed: {
		data: function () {
			return this.usuarios
		}
	}
	,
	methods: {
		editar(id) {
			this.placeholder = 'Editar'
			this.id = id
			$(this.$refs.form).trigger('click')

		},
		async atualizar() {
			await axios
				.get(window.rota+'api/usuarios')
				.then(response => (this.usuarios = response.data))
				.catch(function (error) {
					this.usuarios = []
				})
				.finally()

				$(this.$refs.lista).trigger('click')

			return true
		},
		deletar(id){
			var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

			if(confirm){
				this.deleta(id)
			}

		},
		async deleta(id) {
			await axios
				.get(window.rota+'api/usuario/delete/' + id)
				.then()
				.catch()
				.finally()

			this.atualizar()
			return true
		},
		reset(){
			this.id = false
			this.placeholder = 'Adicionar'
			$(this.$refs.lista).trigger('click')
		}
	}
})



/* TEMA
		@tema : foemulario
		@temas : tabela
		*/
Vue.component('gerenciar-tema-item', {
	template: '#gerenciar-tema-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			temas: []
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/temas')
			.then(response => (this.temas = response.data))
			.catch(function (error) {
				this.temas = []
			})
			.finally()

		return true
	},
	methods: {
		editar(id) {
			this.placeholder = 'Editar'
			this.id = id
		},
		duplicar(id) {
			this.placeholder = 'Duplicar'
			this.id = id
		},
		async atualizar() {
			await axios
				.get(window.rota+'api/temas')
				.then(response => (this.temas = response.data))
				.catch(function (error) {
					this.temas = []
				})
				.finally()

			return true
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 1)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/update-tema',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.atualizar()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 0)
			formData.append('_token', $("input[name*='_token']").val())

			var data = []

			data = await axios.post(
			window.rota+'api/update-tema',
				formData, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then(function (response) {
					return response
				})


			this.atualizar()
		},
		deletar(id){
			var confirm = window.confirm("Tem certeza que deseja excluir este item e todo o seu conteudo? Esta ação não pode ser desfeita!")

			if(confirm){
				this.deleta(id)
			}

		},
		async deleta(id) {
			await axios
				.get(window.rota+'api/tema/delete/' + id)
				.then()
				.catch()
				.finally()

			this.atualizar()
			return true
		},
		reset(){
			this.id = false
			this.placeholder = 'Adicionar'
		}
	}
})

/* UNIDADES MOVEIS
		@unidade : formulario
		@unidades : tabela
		*/

Vue.component('gerenciar-unidade-item', {
	template: '#gerenciar-unidade-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			modalName: new Helper().textoAleatorio(6),
			unidades: []
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/unidades')
			.then(response => (this.unidades = response.data))
			.catch(function (error) {
				this.unidades = []
			})
			.finally()

		return true
	},
	computed: {
		data : function(){
			return this.unidades
		}
	},
	methods: {
		open () {
			$("#"+this.modalName).modal('show')
		},
		close () {
			$("#"+this.modalName).modal('hide')
		},
		editar(id) {
			this.placeholder = 'Editar'
			this.id = id
			$("#unidade-tab").trigger('click')
			this.open()
		},
		duplicar(id) {
			this.placeholder = 'Duplicar'
			this.id = id
			$("#unidade-tab").trigger('click')
			this.open()
		},
		async atualizar() {
			await axios
				.get(window.rota+'api/unidades')
				.then(response => (this.unidades = response.data))
				.catch(function (error) {
					this.unidades = []
				})
				.finally()

			return true
		},
		async ativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 1)
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


			this.atualizar()
		},
		async desativar(id) {
			let formData = new FormData()

			formData.append('id', id)
			formData.append('status', 0)
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


			this.atualizar()
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

/* AGENDA
	@agenda : formulario
	@agendas : tabela
	*/

Vue.component('gerenciar-agenda-item', {
	template: '#gerenciar-agenda-template',
	data: function () {
		return {
			id: false,
			placeholder: 'Adicionar',
			agendas: []
		}
	},
	async beforeCreate() {
		await axios
			.get(window.rota+'api/agendas')
			.then(response => (this.agendas = response.data))
			.catch(function (error) {
				this.agendas = []
			})
			.finally()

		return true
	},
	computed: {
		data : function(){
			return this.agendas
		}
	},
	mounted(){
		if(typeof window.editar != 'undefined'){
			this.ver(window.editar);
		}
	},
	methods: {
		open () {
			$(this.$refs.modal).modal('show')
		},
		close () {
			$(this.$refs.modal).modal('hide')
		},
		ver(id) {
			this.id = id
			$("#agenda-tab").trigger('click')
			this.open()
		},
		async atualizar() {
			await axios
				.get(window.rota+'api/agendas')
				.then(response => (this.agendas = response.data))
				.catch(function (error) {
					this.agendas = []
				})
				.finally()

			return true
		},
		reset(){
			this.id = false
		}
	}
})


/* AGENDA
	@agenda : formulario
	@agendas : tabela
	*/

	Vue.component('gerenciar-formularios-item', {
		template: '#gerenciar-formularios-template',
		data: function () {
			return {
				id: false,
				placeholder: 'Adicionar',
				formularios: []
			}
		},
		async beforeCreate() {
			await axios
				.get(window.rota+'api/formularios-pagina')
				.then(response => (this.formularios = response.data))
				.catch(function (error) {
					this.formularios = []
				})
				.finally()

			return true
		},
		computed: {
			data : function(){
				return this.formularios
			}
		},
		mounted(){
			if(typeof window.editar != 'undefined'){
				this.ver(window.editar);
			}
		},
		methods: {
			open () {
				$(this.$refs.modal).modal('show')
			},
			close () {
				$(this.$refs.modal).modal('hide')
			},
			ver(id) {
				this.id = id
				$("#agenda-tab").trigger('click')
				this.open()
			},
			async atualizar() {
				await axios
					.get(window.rota+'api/formularios-pagina')
					.then(response => (this.formularios = response.data))
					.catch(function (error) {
						this.formularios = []
					})
					.finally()

				return true
			},
			reset(){
				this.id = false
			}
		}
	})

	/* LOGS
	@agenda : logs
	@agendas : tabela
	*/

	Vue.component('gerenciar-logs-item', {
		template: '#gerenciar-logs-template',
		data: function () {
			return {
				id: false,
				// placeholder: 'Adicionar',
				logs: []
			}
		},
		async beforeCreate() {
			await axios
				.get(window.rota+'api/logs-pagina')
				.then(response => (this.logs = response.data))
				.catch(function (error) {
					this.logs = []
				})
				.finally()

			return true
		},
		computed: {
			data : function(){
				return this.logs
			}
		},
		mounted(){
			// if(typeof window.editar != 'undefined'){
			// 	this.ver(window.editar);
			// }
		},
		methods: {
			open () {
				$(this.$refs.modal).modal('show')
			},
			close () {
				$(this.$refs.modal).modal('hide')
			},
			ver(id) {
				this.id = id
				$("#agenda-tab").trigger('click')
				this.open()
			},
			async atualizar() {
				await axios
					.get(window.rota+'api/logs-pagina')
					.then(response => (this.logs = response.data))
					.catch(function (error) {
						this.logs = []
					})
					.finally()

				return true
			},
			reset(){
				this.id = false
			}
		}
	})
