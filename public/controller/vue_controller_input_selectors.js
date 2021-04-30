/* SELECTORS INPUTS */

	/* PAGINAS */
	Vue.component('input-pagina-item', {
		template: '#input-pagina-template',
		data: function () {
			return {
				id : '',
				name : '',
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		methods: {
			open_search(){
				$(this.$refs.modal_search).modal("show")
			},
			close_search(){
				$(this.$refs.modal_search).modal("hide")
			},
			open_upload(){
				$(this.$refs.modal_upload).modal("show")
			},
			close_upload(){
				$(this.$refs.modal_upload).modal("hide")
			},
			open_link(){
				$(this.$refs.modal_link).modal("show")
			},
			close_link(){
				$(this.$refs.modal_link).modal("hide")
			},
		}
	})

	/* Editorials */
	Vue.component('input-editorials-item', {
		template: '#input-editorials-template',
		data: function () {
			return {
				id : '',
				name : '',
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		methods: {

		}
	})



	/* TEMPLATES */
	Vue.component('input-templates-item', {
		template: '#input-templates-template',
		data: function () {
			return {
				id : '',
				name : '',
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		methods: {

		}
	})

	/* FORMATO */
	Vue.component('input-formato-item', {
		template: '#input-formato-template',
		data: function () {
			return {
				id : '',
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		computed : {
			name(){
				switch(this.controller.formato){
					case 'text' :
						return 'Texto'

					case 'textarea' :
						return 'Area de Texto'

					case 'checkbox' : 
						return 'Checkbox'

					case 'seccao' : 
						return 'Seção'

					case 'default' : 
						return ''
				}
			}
		}
	})

	/* DATAMM */
	Vue.component('input-datamm-item', {
		template: '#input-datamm-template',
		data: function () {
			return {
				id : '',
				name : '',
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		methods: {

		}
	})

	/* DATAMM */
	Vue.component('input-menu-item', {
		template: '#input-menu-template',
		data: function () {
			return {
				name : ''
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		beforeUpdate(){
			if (this.controller.parent_id ) {
           		data = window.cache.paginas[this.controller.parent_id]

				this.name = data.name
			} else {
				this.name = ''
			}
		},
		computed : {
			
		},
		methods: {
			open_search(){
				$(this.$refs.modal_search).modal("show")
			},
			close_search(){
				$(this.$refs.modal_search).modal("hide")
			}
		}
	})


	/* LISTAS */
	Vue.component('input-listas-item', {
		template: '#input-listas-template',
		data: function () {
			return {
				id : '',
				name : '',
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		methods: {

		}
	})




	/* CIDADES */
	Vue.component('input-cidade-item', {
		template: '#input-cidade-template',
		data: function () {
			return {
				name : '',
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		beforeUpdate: async function () {
			if (this.controller.cidade ) {
            	data = window.cache.cidades[this.controller.cidade]

				this.name = data.name
			} else {
				this.name = ''
			}
		},
		methods: {
			open_search(){
				$(this.$refs.modal_search).modal("show")
			},
			close_search(){
				$(this.$refs.modal_search).modal("hide")
			}
		}
	})

/* IMAGEM */
	Vue.component('input-imagem-item', {
		template: '#input-imagem-template',
		data: function () {
			return {
				id: '',
				source: '',
				name: '',
			}
		},
		beforeUpdate: async function () {
			if (this.controller[this.field]) {
				data = await axios
					.get(window.rota+"api/imagem/" + this.controller[this.field])
					.then(function (response) {
						return response.data
					})

				this.name = data.name ? data.name : 'Sem Nome'
			} else {
				this.name = ''
			}
		},
		props: {
			placeholder: String,
			require: {
				type: Boolean,
				default: false,
			},
			field: {
				type: String,
				default: 'image_id',
			},
			controller: Object
		},
		methods: {
			open_upload(){
				$(this.$refs.modal_upload).modal("show")
			},
			open_link(){
				$(this.$refs.modal_link).modal("show")
			},
			close_upload(){
				$(this.$refs.modal_upload).modal("hide")
			},
			close_link(){
				$(this.$refs.modal_link).modal("hide")
			},
			$null: function () {
				this.id = null
				this.source = null
				this.name = 'Sem Imagem'
			},
			send: function (id) {
				this.controller[this.field] = id
			}
		}
	})

	Vue.component('input-head-item', {
		template: '#input-head-template',
		data: function () {
			return {
				id : '',
				source: '',
				name: '',
			}
		},
		beforeUpdate: async function () {
			if (this.controller.head) {
				data = await axios
					.get(window.rota+"api/imagem/" + this.controller.head)
					.then(function (response) {
						return response.data
					})

				this.name = data.name ? data.name : 'Sem Nome'
			} else {
				this.name = ''
			}
		},
		props: {
			placeholder: String,
			require: {
				type: Boolean,
				default: false,
			},
			controller: Object
		},
		methods: {
			open_upload(){
				$(this.$refs.modal_upload).modal("show")
			},
			open_link(){
				$(this.$refs.modal_link).modal("show")
			},
			close_upload(){
				$(this.$refs.modal_upload).modal("hide")
			},
			close_link(){
				$(this.$refs.modal_link).modal("hide")
			},
			$null: function () {
				this.id = null
				this.source = null
				this.name = 'Sem Imagem'
			},
			send: function (id) {
				this.controller.head = id
			}
		}
	})

	Vue.component('input-foot-item', {
		template: '#input-foot-template',
		data: function () {
			return {
				id: '', 
				source: '',
				name: '',
			}
		},
		beforeUpdate: async function () {
			if (this.controller.head) {
				data = await axios
					.get(window.rota+"api/imagem/" + this.controller.foot)
					.then(function (response) {
						return response.data
					})

				this.name = data.name ? data.name : 'Sem Nome'
			} else {
				this.name = ''
			}
		},
		props: {
			placeholder: String,
			require: {
				type: Boolean,
				default: false,
			},
			controller: Object
		},
		methods: {
			open_upload(){
				$(this.$refs.modal_upload).modal("show")
			},
			open_link(){
				$(this.$refs.modal_link).modal("show")
			},
			close_upload(){
				$(this.$refs.modal_upload).modal("hide")
			},
			close_link(){
				$(this.$refs.modal_link).modal("hide")
			},
			$null: function () {
				this.id = null
				this.source = null
				this.name = 'Sem Imagem'
			},
			send: function (id) {
				this.controller.foot = id
			}
		}
	})

	/* DATA HORA  */
	Vue.component('input-data-hora-item', {
		template: '#input-data-hora-template',
		data : function(){
			return {
				id: '',
				name : '',
				modelo : 0,
			}
		},
		mounted(){
			if ( this.controller[this.field] && this.controller[this.field] != this.id) {

				this.name = new Helper().dataFormat(this.controller[this.field])

			} else if (this.controller[this.field] == ''){
				this.name = ''
			}

			this.id = this.controller[this.field]
		},
		beforeUpdate() {
			if ( this.controller[this.field] && this.controller[this.field] != this.id) {

				this.name = new Helper().dataFormat(this.controller[this.field])

			} else if (this.controller[this.field] == ''){
				this.name = ''
			}

			this.id = this.controller[this.field]
		},
		props: {
			controller: Object,
			field: {
				type : String,
				default : 'data'
			},
			type: String,
			placeholder: String
		},
		methods: {
			selector(type){
				this.modelo = type
				this.open()
			},
			open(){
				$(this.$refs.modal).modal('show')
			},
			close(){
				$(this.$refs.modal).modal('hide')
			}
		}
	})


	/* ARQUIVO */
	Vue.component('input-arquivo-item', {
		template: '#input-arquivo-template',
		data: function () {
			return {
				id: '',
				name: '',
				uploadModalName: new Helper().textoAleatorio(6),
				searchModalName: new Helper().textoAleatorio(6)
			}
		},
		props: {
			field : {
				type : String,
				default : 'arquivo'
			},
			placeholder: String,
			controller: Object
		},
		methods :{
			open_upload(){
				$(this.$refs.modal_upload).modal("show")
			},
			open_search(){
				$(this.$refs.modal_search).modal("show")
			},			
			close_upload(){
				$(this.$refs.modal_upload).modal("hide")
			},
			close_search(){
				$(this.$refs.modal_search).modal("hide")
			},	
		}
	})

	/* CATEGORIA*/
	Vue.component('input-categoria-item', {
		template: '#input-categoria-template',
		data: function () {
			return {
				data : [],
				name : '',
				id : '',
			}
		},
		props: {
			placeholder: String,
			controller: Object,
			type: String
		},
		async created() {
			data = await axios.get(
				window.rota+'api/categorias/'+this.type
			).then(function (response) {
				return response.data
			}).catch({
			}).finally({
			})

			this.data = data
		},
		async beforeUpdate() {
			if ( this.controller.categoria && this.controller.categoria != this.id) {
				data = await axios.get(
					window.rota+'api/categoria/' + this.controller.categoria
				).then(function (response) {
					return response.data
				}).catch({
				}).finally({
				})

				this.name = data.name

			} else if (this.controller.categoria == ''){
				this.name = ''
			}
		},
		methods: {
			open_upload(){
				$(this.$refs.modal_upload).modal("show")
			},
			close_upload(){
				$(this.$refs.modal_upload).modal("hide")
			},
			submit(el) {
				this.id = this.data[el].id
				this.name = this.data[el].name
				this.controller.categoria = this.data[el].id
			},
			async atualizar(){
				data = await axios.get(
					window.rota+'api/categorias/'+this.type
				).then(function (response) {
					return response.data
				}).catch({
				}).finally({
				})

				this.data = data			
				}
		}
	})



	/* PERMISSOES */
	Vue.component('input-permissoes-item', {
		template: '#input-permissoes-template',
		data: function () {
			return {
				id : '',
				name: '',
				data: [],
			}
		},
		props: {
			placeholder: String,
			controller: Object,
		},
		async created() {
			data = await axios.get(
				window.rota+'api/permissoes/'
			).then(function (response) {
				return response.data
			}).catch({
			}).finally({
			})

			this.data = data
		},
		async beforeUpdate() {
			if ( this.controller.permissoes && this.controller.permissoes != this.id) {
				data = await axios.get(
					window.rota+'api/permissao/' + this.controller.permissoes
				).then(function (response) {
					return response.data
				}).catch({
				}).finally({
				})

				this.name = data.name
				this.id = data.permissoes

			} else if (this.controller.permissoes == ''){
				this.name = ''
				this.id = ''
			}
		},
		methods: {
			submit(el) {
				this.id = this.data[el].id
				this.name = this.data[el].name
				this.controller.permissoes = this.data[el].id
			}
		}
	})


	/* PESSOA */
	Vue.component('input-pessoa-item', {
		template: '#input-pessoa-template',
		data: function () {
			return {
				id: '',
				name : ''
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		beforeUpdate(){
			if(this.controller.id == false){
				this.name = ''
			}
		},
		methods: {
			open_upload(){
				$(this.$refs.modal_upload).modal("show")
			},
			open_search(){
				$(this.$refs.modal_search).modal("show")
			},		
			close_upload(){
				$(this.$refs.modal_upload).modal("hide")
			},
			close_search(){
				$(this.$refs.modal_search).modal("hide")
			},	
		}
	})

	/* SOURCE */
	Vue.component('input-source-item', {
		template: '#input-source-template',
		data: function () {
			return {
				id : '',
				name : '',
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		beforeUpdate: async function () {
			if ( this.controller.source && this.controller.source != this.id ) {
				if( $.isNumeric(this.controller.source) ){
					data = await axios
						.get(window.rota+"api/pagina/" + this.controller.source)
						.then(function (response) {
							return response.data
						})

					this.name = data.name
					this.id = data.id
				}else{
					this.name = this.controller.source
				}
			}
		},		
		methods: {
			open_link(){
				$(this.$refs.modal_link).modal("show")
			},
			open_search(){
				$(this.$refs.modal_search).modal("show")
			},
			close_link(){
				$(this.$refs.modal_link).modal("hide")
			},
			close_search(){
				$(this.$refs.modal_search).modal("hide")
			},
		}
	})


	/* VIDEO */
	Vue.component('input-video-item', {
		template: '#input-video-template',
		data: function () {
			return {
				name : '',
			}
		},
		props: {
			placeholder: String,
			controller: Object
		},
		beforeUpdate: async function () {
			if ( this.controller.id == false ) {
				this.name = ''
			}
		},
		methods: {
			open_upload(){
				$(this.$refs.modal_upload).modal("show")
			},
			open_search(){
				$(this.$refs.modal_search).modal("show")
			},
			close_upload(){
				$(this.$refs.modal_upload).modal("hide")
			},
			close_search(){
				$(this.$refs.modal_search).modal("hide")
			},
		}
	})

	/* TEMA*/
	Vue.component('input-tema-item', {
		template: '#input-tema-template',
		data: function () {
			return {
				data : [],
				name : '',
				id : '',
			}
		},
		props: {
			placeholder: String,
			controller: Object,
		},
		async created() {
			data = await axios.get(
				window.rota+'api/temas/'
			).then(function (response) {
				return response.data
			}).catch({
			}).finally({
			})

			this.data = data
		},
		async beforeUpdate() {
			if ( this.controller.tema_id && this.controller.tema_id != this.id) {
				data = await axios.get(
					window.rota+'api/tema/' + this.controller.tema_id
				).then(function (response) {
					return response.data
				}).catch({
				}).finally({
				})

				this.name = data.name

			} else if (this.controller.tema == ''){
				this.name = ''
			}
		},
		methods: {
			submit(el) {
				this.id = this.data[el].id
				this.name = this.data[el].name
				this.controller.tema_id = this.data[el].id
			}
		}
	})
