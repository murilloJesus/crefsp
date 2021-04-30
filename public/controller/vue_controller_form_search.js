	// GALERIAS
		Vue.component('searcher-galeria-formulario-item', {
			template: '#searcher-galeria-formulario-template',
			data: function () {
				return {
					pesquisa: new Search({pesquisar : true}),
					data: [],
					pesquisar: '',
					categoria: '',
					cidade: '',
					datamm: '',
					datayy: '',
					dataup: '',
					datato: '',
					starts: 0,
					size: 6,
				}
			},
			props: {
				placeholder: String,
				controller: Object
			},
			beforeCreate: async function () {
				await axios
					.get(window.rota+'api/galerias')
					.then(response => (this.data = response.data))
					.catch(function (error) {
						this.data = []
					})
					.finally()

			},
			computed: {
				output: function () {
					var data = this.data && this.data.length > 0 ? this.data : false;
					if (!data) return [];

					var pesquisar = this.pesquisar && this.pesquisar.toLowerCase()
					var categoria = this.categoria && this.categoria.toLowerCase()
					var cidade = this.cidade && this.cidade.toLowerCase()
					var datamm = this.datamm && this.datamm.toLowerCase()
					var datayy = this.datayy && this.datayy.toLowerCase()
					var dataup = this.dataup && this.dataup.toLowerCase()
					var datato = this.datato && this.datato.toLowerCase()

					if (pesquisar) {
						data = data.filter(function (row) {
								return String(row['name']).toLowerCase().indexOf(pesquisar) > -1
						})
					}
					if (categoria) {
						data = data.filter(function (row) {
							return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
						})
					}
					if (cidade) {
						data = data.filter(function (row) {
							return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
						})
					}
					if (datayy) {
						data = data.filter(function (row) {
							return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
						})
					}
					if (datamm) {
						data = data.filter(function (row) {
							return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
						})
					}
					if (dataup || datato) {
						dataup = dataup ? dataup : 0;
						datato = datato ? datato : 99999999;
						data = data.filter(function (row) {
							return (row.data >= dataup && row.data <= datato)
						})
					}


					return data
				},
				tabela: function () {
					return this.paginator
				},
				paginator: function () {
					if (this.paginatorInspector !== this.hashCode(this.output)) {
						this.paginatorInspector = this.hashCode(this.output);
						this.starts = 0;
					}
					if (this.size > this.sizeofarray) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					if (this.starts > this.end) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					return this.output.slice(this.starts, this.end)
				},
				end: function () {
					if (this.starts + this.size > this.sizeofarray) {
						return (this.starts + this.size) - this.sizeofarray
					}
					return this.starts + this.size;
				},
				sizeofarray: function () { return this.output.length; },
				pagesize: function () { return Math.ceil(this.output.length / this.size); },
				pages: function () {
					var i = 0;
					var retorno = {};
					var page = this.page;
					if (this.page + 7 >= this.pagesize && this.pagesize >= 15) page = this.pagesize - 15
					while (i < this.pagesize && i < 15) {
						if (this.page + 7 >= this.pagesize && this.pagesize >= 15) retorno[i] = page + i;
						else if (page >= 8) retorno[i] = page - 7 + i;
						else retorno[i] = i;
						i++;

					}
					return retorno;
				},
				hasPage: function () {
					return !(this.pagesize == 1)
				},
				page: function () { return parseInt(this.starts / this.size); }
			},
			methods: {
				sortBy: function (key) {
					this.sortKey = key
					this.sortOrders[key] = this.sortOrders[key] * -1
				},
				toward: function () {
					if (this.starts > 0) this.starts -= this.size
					else this.starts = (this.pagesize - 1) * this.size
				},
				foward: function () {
					if ((this.starts + this.size) < this.data.length) this.starts += this.size
					else this.starts = 0
				},
				hashCode: function (obj) {
					var s = JSON.stringify(obj);
					return s.split("").reduce(function (a, b) { a = ((a << 5) - a) + b.charCodeAt(0); return a & a }, 0);
				},
				toPage(page) {
					this.starts = this.size * page;
				},
				submit(el) {
					this.controller.controller.galeria_id = this.tabela[el].id		
					this.close()
				},
				close() {
					this.controller.close()
				}
			}
		})





	// PAGINAS
		Vue.component('searcher-pagina-formulario-item', {
			template: '#searcher-pagina-formulario-template',
			data: function () {
				return {
					pesquisa: new Search({pesquisar : true}),
					data: [],
					pesquisar: '',
					categoria: '',
					cidade: '',
					datamm: '',
					datayy: '',
					dataup: '',
					datato: '',
					starts: 0,
					size: 6,
				}
			},
			props: {
				placeholder: String,
				controller: Object,
				field : {
					type : String,
					default : 'id'
				}
			},
			beforeCreate: async function () {
				await axios
					.get(window.rota+'api/paginas')
					.then(response => (this.data = response.data))
					.catch(function (error) {
						this.data = []
					})
					.finally()

			},
			computed: {
				output: function () {
					var data = this.data && this.data.length > 0 ? this.data : false;
					if (!data) return [];

					var pesquisar = this.pesquisar && this.pesquisar.toLowerCase()
					var categoria = this.categoria && this.categoria.toLowerCase()
					var cidade = this.cidade && this.cidade.toLowerCase()
					var datamm = this.datamm && this.datamm.toLowerCase()
					var datayy = this.datayy && this.datayy.toLowerCase()
					var dataup = this.dataup && this.dataup.toLowerCase()
					var datato = this.datato && this.datato.toLowerCase()

					if (pesquisar) {
						data = data.filter(function (row) {
								return String(row['name']).toLowerCase().indexOf(pesquisar) > -1
						})
					}
					if (categoria) {
						data = data.filter(function (row) {
							return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
						})
					}
					if (cidade) {
						data = data.filter(function (row) {
							return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
						})
					}
					if (datayy) {
						data = data.filter(function (row) {
							return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
						})
					}
					if (datamm) {
						data = data.filter(function (row) {
							return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
						})
					}
					if (dataup || datato) {
						dataup = dataup ? dataup : 0;
						datato = datato ? datato : 99999999;
						data = data.filter(function (row) {
							return (row.data >= dataup && row.data <= datato)
						})
					}


					return data
				},
				tabela: function () {
					return this.paginator
				},
				paginator: function () {
					if (this.paginatorInspector !== this.hashCode(this.output)) {
						this.paginatorInspector = this.hashCode(this.output);
						this.starts = 0;
					}
					if (this.size > this.sizeofarray) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					if (this.starts > this.end) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					return this.output.slice(this.starts, this.end)
				},
				end: function () {
					if (this.starts + this.size > this.sizeofarray) {
						return (this.starts + this.size) - this.sizeofarray
					}
					return this.starts + this.size;
				},
				sizeofarray: function () { return this.output.length; },
				pagesize: function () { return Math.ceil(this.output.length / this.size); },
				pages: function () {
					var i = 0;
					var retorno = {};
					var page = this.page;
					if (this.page + 7 >= this.pagesize && this.pagesize >= 15) page = this.pagesize - 15
					while (i < this.pagesize && i < 15) {
						if (this.page + 7 >= this.pagesize && this.pagesize >= 15) retorno[i] = page + i;
						else if (page >= 8) retorno[i] = page - 7 + i;
						else retorno[i] = i;
						i++;

					}
					return retorno;
				},
				hasPage: function () {
					return !(this.pagesize == 1)
				},
				page: function () { return parseInt(this.starts / this.size); }
			},
			methods: {
				sortBy: function (key) {
					this.sortKey = key
					this.sortOrders[key] = this.sortOrders[key] * -1
				},
				toward: function () {
					if (this.starts > 0) this.starts -= this.size
					else this.starts = (this.pagesize - 1) * this.size
				},
				foward: function () {
					if ((this.starts + this.size) < this.data.length) this.starts += this.size
					else this.starts = 0
				},
				hashCode: function (obj) {
					var s = JSON.stringify(obj);
					return s.split("").reduce(function (a, b) { a = ((a << 5) - a) + b.charCodeAt(0); return a & a }, 0);
				},
				toPage(page) {
					this.starts = this.size * page;
				},
				submit(el) {
					this.controller.controller[this.field] = this.tabela[el].id
					this.controller.name = this.tabela[el].name			
					this.close()
				},
				close() {
					this.controller.close_search()
				}
			}
		})



	// PESSOA
		Vue.component('searcher-pessoa-formulario-item', {
			template: '#searcher-pessoa-formulario-template',
			data: function () {
				return {
					pesquisa: new Search({pesquisar : true}),
					data: [],
					pesquisar: '',
					categoria: '',
					cidade: '',
					datamm: '',
					datayy: '',
					dataup: '',
					datato: '',
					starts: 0,
					size: 6,
				}
			},
			props: {
				placeholder: String,
				controller: Object
			},
			beforeCreate: async function () {
				if(typeof window.caminho_pessoas_input === 'undefined'){
					window.caminho_pessoas_input = 'pessoas'
				}
				
				await axios
					.get(window.rota+'api/'+window.caminho_pessoas_input)
					.then(response => (this.data = response.data))
					.catch(function (error) {
						this.data = []
					})
					.finally()

			},
			computed: {
				output: function () {
					var data = this.data && this.data.length > 0 ? this.data : false;
					if (!data) return [];

					var pesquisar = this.pesquisar && this.pesquisar.toLowerCase()
					var categoria = this.categoria && this.categoria.toLowerCase()
					var cidade = this.cidade && this.cidade.toLowerCase()
					var datamm = this.datamm && this.datamm.toLowerCase()
					var datayy = this.datayy && this.datayy.toLowerCase()
					var dataup = this.dataup && this.dataup.toLowerCase()
					var datato = this.datato && this.datato.toLowerCase()

					if (pesquisar) {
						data = data.filter(function (row) {
								return String(row['name']).toLowerCase().indexOf(pesquisar) > -1
						})
					}
					if (categoria) {
						data = data.filter(function (row) {
							return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
						})
					}
					if (cidade) {
						data = data.filter(function (row) {
							return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
						})
					}
					if (datayy) {
						data = data.filter(function (row) {
							return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
						})
					}
					if (datamm) {
						data = data.filter(function (row) {
							return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
						})
					}
					if (dataup || datato) {
						dataup = dataup ? dataup : 0;
						datato = datato ? datato : 99999999;
						data = data.filter(function (row) {
							return (row.data >= dataup && row.data <= datato)
						})
					}


					return data
				},
				tabela: function () {
					return this.paginator
				},
				paginator: function () {
					if (this.paginatorInspector !== this.hashCode(this.output)) {
						this.paginatorInspector = this.hashCode(this.output);
						this.starts = 0;
					}
					if (this.size > this.sizeofarray) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					if (this.starts > this.end) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					return this.output.slice(this.starts, this.end)
				},
				end: function () {
					if (this.starts + this.size > this.sizeofarray) {
						return (this.starts + this.size) - this.sizeofarray
					}
					return this.starts + this.size;
				},
				sizeofarray: function () { return this.output.length; },
				pagesize: function () { return Math.ceil(this.output.length / this.size); },
				pages: function () {
					var i = 0;
					var retorno = {};
					var page = this.page;
					if (this.page + 7 >= this.pagesize && this.pagesize >= 15) page = this.pagesize - 15
					while (i < this.pagesize && i < 15) {
						if (this.page + 7 >= this.pagesize && this.pagesize >= 15) retorno[i] = page + i;
						else if (page >= 8) retorno[i] = page - 7 + i;
						else retorno[i] = i;
						i++;

					}
					return retorno;
				},
				hasPage: function () {
					return !(this.pagesize == 1)
				},
				page: function () { return parseInt(this.starts / this.size); }
			},
			methods: {
				sortBy: function (key) {
					this.sortKey = key
					this.sortOrders[key] = this.sortOrders[key] * -1
				},
				toward: function () {
					if (this.starts > 0) this.starts -= this.size
					else this.starts = (this.pagesize - 1) * this.size
				},
				foward: function () {
					if ((this.starts + this.size) < this.data.length) this.starts += this.size
					else this.starts = 0
				},
				hashCode: function (obj) {
					var s = JSON.stringify(obj);
					return s.split("").reduce(function (a, b) { a = ((a << 5) - a) + b.charCodeAt(0); return a & a }, 0);
				},
				toPage(page) {
					this.starts = this.size * page;
				},
				submit(el) {
					this.controller.controller.id = this.tabela[el].id
					this.controller.name = this.tabela[el].name

					this.close()
				},
				close() {
					this.controller.close_search()
				}
			}
		})

	// SOURCE
		Vue.component('searcher-source-formulario-item', {
			template: '#searcher-source-formulario-template',
			data: function () {
				return {
					pesquisa: new Search({pesquisar : true}),
					data: [],
					pesquisar: '',
					categoria: '',
					cidade: '',
					datamm: '',
					datayy: '',
					dataup: '',
					datato: '',
					starts: 0,
					size: 6,
				}
			},
			props: {
				placeholder: String,
				controller: Object
			},
			beforeCreate: async function () {
				await axios
					.get(window.rota+'api/paginas')
					.then(response => (this.data = response.data))
					.catch(function (error) {
						this.data = []
					})
					.finally()

			},
			computed: {
				output: function () {
					var data = this.data && this.data.length > 0 ? this.data : false;
					if (!data) return [];

					var pesquisar = this.pesquisar && this.pesquisar.toLowerCase()
					var categoria = this.categoria && this.categoria.toLowerCase()
					var cidade = this.cidade && this.cidade.toLowerCase()
					var datamm = this.datamm && this.datamm.toLowerCase()
					var datayy = this.datayy && this.datayy.toLowerCase()
					var dataup = this.dataup && this.dataup.toLowerCase()
					var datato = this.datato && this.datato.toLowerCase()

					if (pesquisar) {
						data = data.filter(function (row) {
								return String(row['name']).toLowerCase().indexOf(pesquisar) > -1
						})
					}
					if (categoria) {
						data = data.filter(function (row) {
							return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
						})
					}
					if (cidade) {
						data = data.filter(function (row) {
							return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
						})
					}
					if (datayy) {
						data = data.filter(function (row) {
							return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
						})
					}
					if (datamm) {
						data = data.filter(function (row) {
							return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
						})
					}
					if (dataup || datato) {
						dataup = dataup ? dataup : 0;
						datato = datato ? datato : 99999999;
						data = data.filter(function (row) {
							return (row.data >= dataup && row.data <= datato)
						})
					}


					return data
				},
				tabela: function () {
					return this.paginator
				},
				paginator: function () {
					if (this.paginatorInspector !== this.hashCode(this.output)) {
						this.paginatorInspector = this.hashCode(this.output);
						this.starts = 0;
					}
					if (this.size > this.sizeofarray) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					if (this.starts > this.end) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					return this.output.slice(this.starts, this.end)
				},
				end: function () {
					if (this.starts + this.size > this.sizeofarray) {
						return (this.starts + this.size) - this.sizeofarray
					}
					return this.starts + this.size;
				},
				sizeofarray: function () { return this.output.length; },
				pagesize: function () { return Math.ceil(this.output.length / this.size); },
				pages: function () {
					var i = 0;
					var retorno = {};
					var page = this.page;
					if (this.page + 7 >= this.pagesize && this.pagesize >= 15) page = this.pagesize - 15
					while (i < this.pagesize && i < 15) {
						if (this.page + 7 >= this.pagesize && this.pagesize >= 15) retorno[i] = page + i;
						else if (page >= 8) retorno[i] = page - 7 + i;
						else retorno[i] = i;
						i++;

					}
					return retorno;
				},
				hasPage: function () {
					return !(this.pagesize == 1)
				},
				page: function () { return parseInt(this.starts / this.size); }
			},
			methods: {
				sortBy: function (key) {
					this.sortKey = key
					this.sortOrders[key] = this.sortOrders[key] * -1
				},
				toward: function () {
					if (this.starts > 0) this.starts -= this.size
					else this.starts = (this.pagesize - 1) * this.size
				},
				foward: function () {
					if ((this.starts + this.size) < this.data.length) this.starts += this.size
					else this.starts = 0
				},
				hashCode: function (obj) {
					var s = JSON.stringify(obj);
					return s.split("").reduce(function (a, b) { a = ((a << 5) - a) + b.charCodeAt(0); return a & a }, 0);
				},
				toPage(page) {
					this.starts = this.size * page;
				},
				submit(el) {
					this.controller.controller.source = this.tabela[el].id
					this.controller.name = this.tabela[el].name			
					this.close()
				},
				close() {
					this.controller.close_search()
				}
			}
		})

	// CIDADE 
		Vue.component('searcher-cidade-formulario-item', {
			template: '#searcher-cidade-formulario-template',
			data: function () {
				return {
					pesquisa: new Search({pesquisar : true}),
					data: [],
					pesquisar: '',
					categoria: '',
					cidade: '',
					datamm: '',
					datayy: '',
					dataup: '',
					datato: '',
					starts: 0,
					size: 6,
				}
			},
			props: {
				placeholder: String,
				controller: Object
			},
			beforeCreate: async function () {
				await axios
					.get(window.rota+'api/cidades')
					.then(response => (this.data = response.data))
					.catch(function (error) {
						this.data = []
					})
					.finally()

			},
			computed: {
				output: function () {
					var data = this.data && this.data.length > 0 ? this.data : false;
					if (!data) return [];

					var pesquisar = this.pesquisar && this.pesquisar.toLowerCase()
					var categoria = this.categoria && this.categoria.toLowerCase()
					var cidade = this.cidade && this.cidade.toLowerCase()
					var datamm = this.datamm && this.datamm.toLowerCase()
					var datayy = this.datayy && this.datayy.toLowerCase()
					var dataup = this.dataup && this.dataup.toLowerCase()
					var datato = this.datato && this.datato.toLowerCase()

					if (pesquisar) {
						data = data.filter(function (row) {
								return String(row['name']).toLowerCase().indexOf(pesquisar) > -1
						})
					}
					if (categoria) {
						data = data.filter(function (row) {
							return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
						})
					}
					if (cidade) {
						data = data.filter(function (row) {
							return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
						})
					}
					if (datayy) {
						data = data.filter(function (row) {
							return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
						})
					}
					if (datamm) {
						data = data.filter(function (row) {
							return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
						})
					}
					if (dataup || datato) {
						dataup = dataup ? dataup : 0;
						datato = datato ? datato : 99999999;
						data = data.filter(function (row) {
							return (row.data >= dataup && row.data <= datato)
						})
					}


					return data
				},
				tabela: function () {
					return this.paginator
				},
				paginator: function () {
					if (this.paginatorInspector !== this.hashCode(this.output)) {
						this.paginatorInspector = this.hashCode(this.output);
						this.starts = 0;
					}
					if (this.size > this.sizeofarray) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					if (this.starts > this.end) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					return this.output.slice(this.starts, this.end)
				},
				end: function () {
					if (this.starts + this.size > this.sizeofarray) {
						return (this.starts + this.size) - this.sizeofarray
					}
					return this.starts + this.size;
				},
				sizeofarray: function () { return this.output.length; },
				pagesize: function () { return Math.ceil(this.output.length / this.size); },
				pages: function () {
					var i = 0;
					var retorno = {};
					var page = this.page;
					if (this.page + 7 >= this.pagesize && this.pagesize >= 15) page = this.pagesize - 15
					while (i < this.pagesize && i < 15) {
						if (this.page + 7 >= this.pagesize && this.pagesize >= 15) retorno[i] = page + i;
						else if (page >= 8) retorno[i] = page - 7 + i;
						else retorno[i] = i;
						i++;

					}
					return retorno;
				},
				hasPage: function () {
					return !(this.pagesize == 1)
				},
				page: function () { return parseInt(this.starts / this.size); }
			},
			methods: {
				sortBy: function (key) {
					this.sortKey = key
					this.sortOrders[key] = this.sortOrders[key] * -1
				},
				toward: function () {
					if (this.starts > 0) this.starts -= this.size
					else this.starts = (this.pagesize - 1) * this.size
				},
				foward: function () {
					if ((this.starts + this.size) < this.data.length) this.starts += this.size
					else this.starts = 0
				},
				hashCode: function (obj) {
					var s = JSON.stringify(obj);
					return s.split("").reduce(function (a, b) { a = ((a << 5) - a) + b.charCodeAt(0); return a & a }, 0);
				},
				toPage(page) {
					this.starts = this.size * page;
				},
				submit(el) {
					this.controller.controller.cidade = this.tabela[el].id
					this.controller.name = this.tabela[el].name			
					this.close()
				},
				close() {
					this.controller.close_search()
				}
			}
		})

	//  VIDEO
		Vue.component('searcher-video-formulario-item', {
			template: '#searcher-video-formulario-template',
			data: function () {
				return {
					pesquisa: new Search({pesquisar : true}),
					data: [],
					pesquisar: '',
					categoria: '',
					cidade: '',
					datamm: '',
					datayy: '',
					dataup: '',
					datato: '',
					starts: 0,
					size: 6,
				}
			},
			props: {
				placeholder: String,
				controller: Object
			},
			beforeCreate: async function () {
				await axios
					.get(window.rota+'api/videos')
					.then(response => (this.data = response.data))
					.catch(function (error) {
						this.data = []
					})
					.finally()

			},
			computed: {
				output: function () {
					var data = this.data && this.data.length > 0 ? this.data : false;
					if (!data) return [];

					var pesquisar = this.pesquisar && this.pesquisar.toLowerCase()
					var categoria = this.categoria && this.categoria.toLowerCase()
					var cidade = this.cidade && this.cidade.toLowerCase()
					var datamm = this.datamm && this.datamm.toLowerCase()
					var datayy = this.datayy && this.datayy.toLowerCase()
					var dataup = this.dataup && this.dataup.toLowerCase()
					var datato = this.datato && this.datato.toLowerCase()

					if (pesquisar) {
						data = data.filter(function (row) {
							return String(row['name']).toLowerCase().indexOf(pesquisar) > -1
						})
					}
					if (categoria) {
						data = data.filter(function (row) {
							return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
						})
					}
					if (cidade) {
						data = data.filter(function (row) {
							return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
						})
					}
					if (datayy) {
						data = data.filter(function (row) {
							return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
						})
					}
					if (datamm) {
						data = data.filter(function (row) {
							return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
						})
					}
					if (dataup || datato) {
						dataup = dataup ? dataup : 0;
						datato = datato ? datato : 99999999;
						data = data.filter(function (row) {
							return (row.data >= dataup && row.data <= datato)
						})
					}


					return data
				},
				tabela: function () {
					return this.paginator
				},
				paginator: function () {
					if (this.paginatorInspector !== this.hashCode(this.output)) {
						this.paginatorInspector = this.hashCode(this.output);
						this.starts = 0;
					}
					if (this.size > this.sizeofarray) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					if (this.starts > this.end) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					return this.output.slice(this.starts, this.end)
				},
				end: function () {
					if (this.starts + this.size > this.sizeofarray) {
						return (this.starts + this.size) - this.sizeofarray
					}
					return this.starts + this.size;
				},
				sizeofarray: function () { return this.output.length; },
				pagesize: function () { return Math.ceil(this.output.length / this.size); },
			pages: function () {
				var i = 0;
				var retorno = {};
				var page = this.page;
				if (this.page + 7 >= this.pagesize && this.pagesize >= 15) page = this.pagesize - 15
				while (i < this.pagesize && i < 15) {
					if (this.page + 7 >= this.pagesize && this.pagesize >= 15) retorno[i] = page + i;
					else if (page >= 8) retorno[i] = page - 7 + i;
					else retorno[i] = i;
					i++;

				}
				return retorno;
			},
				hasPage: function () {
					return !(this.pagesize == 1)
				},
				page: function () { return parseInt(this.starts / this.size); }
			},
			methods: {
				sortBy: function (key) {
					this.sortKey = key
					this.sortOrders[key] = this.sortOrders[key] * -1
				},
				toward: function () {
					if (this.starts > 0) this.starts -= this.size
					else this.starts = (this.pagesize - 1) * this.size
				},
				foward: function () {
					if ((this.starts + this.size) < this.data.length) this.starts += this.size
					else this.starts = 0
				},
				hashCode: function (obj) {
					var s = JSON.stringify(obj);
					return s.split("").reduce(function (a, b) { a = ((a << 5) - a) + b.charCodeAt(0); return a & a }, 0);
				},
				toPage(page) {
					this.starts = this.size * page;
				},
				submit(el) {
					this.controller.controller.data.video = this.tabela[el].id
					this.controller.name = this.tabela[el].name			
					this.close()
				},
				close() {
					this.controller.close_search()
				}
			}
		})

	//ARQUIVO 
		Vue.component('searcher-arquivo-formulario-item', {
			template: '#searcher-arquivo-formulario-template',
			data: function () {
				return {
					pesquisa: new Search({pesquisar : true}),
					data: [],
					pesquisar: '',
					categoria: '',
					cidade: '',
					datamm: '',
					datayy: '',
					dataup: '',
					datato: '',
					starts: 0,
					size: 6,
				}
			},
			props: {
				placeholder: String,
				controller: Object,
			},
			beforeCreate: async function () {
				await axios
					.get(window.rota+'api/arquivos')
					.then(response => (this.data = response.data))
					.catch(function (error) {
						this.data = []
					})
					.finally()

			},
			computed: {
				output: function () {
					var data = this.data && this.data.length > 0 ? this.data : false;
					if (!data) return [];

					var pesquisar = this.pesquisar && this.pesquisar.toLowerCase()
					var categoria = this.categoria && this.categoria.toLowerCase()
					var cidade = this.cidade && this.cidade.toLowerCase()
					var datamm = this.datamm && this.datamm.toLowerCase()
					var datayy = this.datayy && this.datayy.toLowerCase()
					var dataup = this.dataup && this.dataup.toLowerCase()
					var datato = this.datato && this.datato.toLowerCase()

					if (pesquisar) {
						data = data.filter(function (row) {
							return String(row['name']).toLowerCase().indexOf(pesquisar) > -1
						})
					}
					if (categoria) {
						data = data.filter(function (row) {
							return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
						})
					}
					if (cidade) {
						data = data.filter(function (row) {
							return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
						})
					}
					if (datayy) {
						data = data.filter(function (row) {
							return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
						})
					}
					if (datamm) {
						data = data.filter(function (row) {
							return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
						})
					}
					if (dataup || datato) {
						dataup = dataup ? dataup : 0;
						datato = datato ? datato : 99999999;
						data = data.filter(function (row) {
							return (row.data >= dataup && row.data <= datato)
						})
					}


					return data
				},
				tabela: function () {
					return this.paginator
				},
				paginator: function () {
					if (this.paginatorInspector !== this.hashCode(this.output)) {
						this.paginatorInspector = this.hashCode(this.output);
						this.starts = 0;
					}
					if (this.size > this.sizeofarray) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					if (this.starts > this.end) {
						return this.output.slice(this.starts, this.sizeofarray)
					}
					return this.output.slice(this.starts, this.end)
				},
				end: function () {
					if (this.starts + this.size > this.sizeofarray) {
						return (this.starts + this.size) - this.sizeofarray
					}
					return this.starts + this.size;
				},
				sizeofarray: function () { return this.output.length; },
				pagesize: function () { return Math.ceil(this.output.length / this.size); },
				pages: function () {
					var i = 0;
					var retorno = {};
					var page = this.page;
					if (this.page + 7 >= this.pagesize && this.pagesize >= 15) page = this.pagesize - 15
					while (i < this.pagesize && i < 15) {
						if (this.page + 7 >= this.pagesize && this.pagesize >= 15) retorno[i] = page + i;
						else if (page >= 8) retorno[i] = page - 7 + i;
						else retorno[i] = i;
						i++;

					}
					return retorno;
				},
				hasPage: function () {
					return !(this.pagesize == 1)
				},
				page: function () { return parseInt(this.starts / this.size); }
			},
			methods: {
				sortBy: function (key) {
					this.sortKey = key
					this.sortOrders[key] = this.sortOrders[key] * -1
				},
				toward: function () {
					if (this.starts > 0) this.starts -= this.size
					else this.starts = (this.pagesize - 1) * this.size
				},
				foward: function () {
					if ((this.starts + this.size) < this.data.length) this.starts += this.size
					else this.starts = 0
				},
				hashCode: function (obj) {
					var s = JSON.stringify(obj);
					return s.split("").reduce(function (a, b) { a = ((a << 5) - a) + b.charCodeAt(0); return a & a }, 0);
				},
				toPage(page) {
					this.starts = this.size * page;
				},
				submit(el) {
					this.controller.controller[this.controller.field] = this.tabela[el].id
					this.controller.name = this.tabela[el].name

					this.close()
				},
				close() {
					this.controller.close_search()
				}
			}
		})
