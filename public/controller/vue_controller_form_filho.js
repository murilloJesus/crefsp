
	/* AGENDA

		*/
	Vue.component('agenda-filho-formulario-item', {
		template: '#agenda-filho-formulario-template',
		data: function () {
			return {
				data : new Agenda(),
				request : new Request()
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		async beforeUpdate() {
			if (this.controller.id && this.controller.id != this.data.id) {
				r = this.request

				this.data.id =  this.controller.id

				r.loading()

				data = await axios.get(
					window.rota+'api/item/' + this.controller.id
				).then(function (response) {
					r.initial()
					return response.data.item
				}).catch(function(response){
					r.error()
				}).finally({
				})

				this.data = new Agenda(data)

				if( this.data.ticket_publico != ''){
					if( $(this.$refs.sociedade_controller).attr('aria-expanded') === 'false' ) 
						$(this.$refs.sociedade_controller).trigger('click')
				}else{
					if( $(this.$refs.sociedade_controller).attr('aria-expanded') === 'true' )
						$(this.$refs.sociedade_controller).trigger('click')
				}

				if( this.data.ticket_estudante != '' ){
					if( $(this.$refs.estudante_controller).attr('aria-expanded') === 'false' ) 
						$(this.$refs.estudante_controller).trigger('click')
				}else{
					if( $(this.$refs.estudante_controller).attr('aria-expanded') === 'true' )
						$(this.$refs.estudante_controller).trigger('click')
				}

				if(this.data.ticket_credenciado != ''){
					if( $(this.$refs.credenciado_controller).attr('aria-expanded') === 'false' ) 
						$(this.$refs.credenciado_controller).trigger('click')
				}else{
					if( $(this.$refs.credenciado_controller).attr('aria-expanded') === 'true' )
						$(this.$refs.credenciado_controller).trigger('click')
				}

			}
		},
		computed: {
		},
		methods: {
			add: async function () {
					let formData = this.data
					formData.item_id = this.controller.controller.data.id

					var data = [], r = this.request

					r.loading()

				if (this.controller.id && this.controller.placeholder === 'Editar') {

					data = await axios.post(
						window.rota+'api/item/update',
						formData
						).then(function (response) {
							r.success()
							return response.data.data
						}).catch(function(request){
							r.error()
						}).finally({})

						this.controller.atualizar()
						this.close()
						this.reset()

				} else {

					delete formData.id

					data = await axios.post(
						window.rota+'api/item',
						formData, 
						).then(function (response) {
							r.success()
							return response.data.data
						}).catch(function(response){
							r.error()
						}).finally({})

						this.controller.atualizar()
						this.close()
						this.reset()
				}
			},
			reset: function () {
				this.data =  new Agenda()
				this.reset = new Request()
				this.controller.reset()
			},
			close() {
				this.controller.close()
			}
		}
	})

	/* PESSOAS

		*/
	Vue.component('pessoa-filho-formulario-item', {
		template: '#pessoa-filho-formulario-template',
		data: function () {
			return {
				id: "",
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
						window.rota+'api/item/' + this.id
					).then(function (response) {
						return response.data.item
					}).catch(function(){
						r.error()
					}).finally({})

					let formData = new Pessoa(data)
					formData.item_id = this.controller.controller.data.id
					formData.referencia_id = formData.id
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
						this.close()

				}
			},
			reset: function () {

			},
			close() {
				// this.controller.close()
			}
		}
	})


	/* DATA HORA
			@data : data
			@hora : hora
			@t_data : data
			@t_hora : hora
		*/
	Vue.component('data-hora-formulario-item', {
		template: '#data-hora-formulario-template',
		data: function () {
			return {
				data : '',
				hora : '',
				t_data : '',
				t_hora : '',
			}
		},
		props: {
			field : String,
			placeholder: String,
			controller: Object
		},
		computed: {
			modelo : function(){
				return this.controller.modelo
			}
		},
		methods: {
			submit: function () {
				switch(this.modelo){
					case 1:
					this.controller.controller[this.field] = this.data
					this.controller.name = new Helper().dataFormat(this.data)
					break

					case 2: 
					this.controller.controller[this.field] = this.data+''+this.hora
					this.controller.name = new Helper().dataFormat(this.data+''+this.hora)
					break	

					case 3: 
					this.controller.controller[this.field] = this.data+''+this.hora+'.'+this.t_hora
					this.controller.name = new Helper().dataFormat(this.data+''+this.hora+'.'+this.t_hora)
					break			

					case 4: 
					this.controller.controller[this.field] = this.data+''+this.hora+'.'+this.t_data+''+this.t_hora
					this.controller.name = new Helper().dataFormat(this.data+''+this.hora+'.'+this.t_data+''+this.t_hora)
					break		
				}
				this.reset()
				this.close()
			},
			reset: function () {
				this.data = ''
				this.hora = ''
				this.t_data = ''
				this.t_hora = ''
			},
			close(){
				this.controller.close()
			}
		}
	})



