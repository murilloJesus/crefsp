	/* PAGINA */
		Vue.component('linker-pagina-formulario-item', {
			template: '#linker-pagina-formulario-template',
			data: function () {
				return {
					data : new Pagina(),
					request : new Request()
				}
			},
			props: {
				titulo: String,
				controller: Object
			},
			computed: {

			},
			methods: {
				submit: async function () {
					let formData = this.data
					var data = [], r = this.request

					r.loading()

					delete formData.id

					data = await axios.post(
						window.rota+'api/pagina',
						formData 
						).then(function (response) {
							r.success
							return response.data.data
						}).catch(function(response){
							r.error()
						}).finally({

						})


					this.controller.controller.id = data.id
					this.controller.name = data.name
					this.close()
					this.reset()
				},
				reset: function () {
					this.data = new Pagina()
					this.request = new Request()
				},
				close() {
					this.controller.close_link()
				}
			}
		})



	/* IMAGEM */
		Vue.component('linker-imagem-formulario-item', {
			template: '#linker-imagem-formulario-template',
			data: function () {
				return {
					name: '',
					descricao: '',
					source: '',
					request : new Request()

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
					let formData = new FormData()
					formData.append('name', this.name)
					formData.append('source', this.source)
					formData.append('descricao', this.descricao)
					formData.append('_token', $("input[name*='_token']").val())

					var data = [], r = this.request

					r.loading()

					// You should have a server side REST API 
					data = await axios.post(
						window.rota+'api/upload-url',
						formData, {
							headers: {
								'Content-Type': 'multipart/form-data'
							}
						}).then(function (response) {
							r.success()
							return response.data.data
						}).catch(function(request){
							r.error()
						}).finally({})
					

					this.controller.send(data.id)
					this.controller.name = data.name
					this.close()
					this.reset()
				},
				reset: function () {
					this.name = ''
					this.descricao = ''
					this.source = ''
					this.request = new Request()
				},
				close() {
					this.controller.close_link()
				}
			}
		})


	/* SOURCE */
		Vue.component('linker-source-formulario-item', {
			template: '#linker-source-formulario-template',
			data: function () {
				return {
					source: '',
					request : new Request()
				}
			},
			props: {
				titulo: String,
				controller: Object
			},
			computed: {

			},
			methods: {
				submit: async function () {
					this.controller.controller.source = this.source
					this.controller.name = this.source
					this.reset()
					this.close()
				},
				reset: function () {
					this.source = ''
				},
				close() {
					this.controller.close_link()
				}
			}
		})
