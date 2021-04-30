
$(function(){

	window.rota = '/';

	if ( $("#app_tabela").length ){
		var app_tabela =new Vue({
			el: '#app_tabela',
			data: function(){
				return {
					controller : this,
					pesquisa : search,
					res : typeof resource !== 'undefined' ? resource : false,
					data: [],
					pesquisar : '',
					categoria : '',
					cidade : '',
					datamm : '',
					datayy : '',
					dataup : '',
					datato : '',
					starts: 0,
					size: 12,
				}
			},
			async beforeCreate () {
				if(typeof resource !== 'undefined'){
					await axios
					.get(resource.href)
					.then(response => (this.data = response.data))
				
					return true

				}else{
					this.data = fakeData

					return true
				}
			},
			computed: {
				output: function(){
					var data = this.data && this.data.length > 0 ? this.data : false;
					if(!data) return [];

					var pesquisar = this.pesquisar && this.pesquisar.toLowerCase()
					var categoria = this.categoria && this.categoria.toLowerCase()
					var cidade = this.cidade && this.cidade.toLowerCase()
					var datamm = this.datamm && this.datamm.toLowerCase()
					var datayy = this.datayy && this.datayy.toLowerCase()
					var dataup = this.dataup && this.dataup.toLowerCase()
					var datato = this.datato && this.datato.toLowerCase()

					if (pesquisar) {
						data = data.filter(function (row) {
							return Object.keys(row).some(function (key) {
								return String(row[key]).toLowerCase().indexOf(pesquisar) > -1
							})
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
							return ( row.data >= dataup && row.data <= datato)
						})
					}


					return data
				},
				tabela: function(){
					return new Tabela(this.paginator, this.res.colunas, this.res.linhas)
				},
				paginator: function(){
					if( this.paginatorInspector !== this.hashCode(this.output) ){
						this.paginatorInspector = this.hashCode(this.output);
						this.starts = 0;
					}
					if(this.size > this.sizeofarray){
						return this.output.slice(this.starts, this.sizeofarray)
					}
					if(this.starts > this.end){
						return this.output.slice(this.starts, this.sizeofarray).concat(this.output.slice(0, this.end))
					}
					return this.output.slice(this.starts, this.end)
				},
				end: function(){
					if( this.starts+this.size > this.sizeofarray ){
						return  (this.starts+this.size) - this.sizeofarray
					}
					return this.starts+this.size;
				},
				sizeofarray: function(){return this.output.length;},
				pagesize: function(){return Math.ceil(this.output.length/this.size);},
				pages: function(){
					var i = 0;
					var retorno = {};
					var page = this.page;
					if(this.page + 7 >= this.pagesize && this.pagesize >= 15) page = this.pagesize - 15
					while(i < this.pagesize && i < 15){
						if(this.page + 7 >= this.pagesize && this.pagesize >= 15 ) retorno[i] = page+i;
						else if(page >= 8)	retorno[i] = page-7+i;
						else retorno[i] = i;
						i++;
						
					}
					return retorno;
				},
				hasPage: function(){
					return !(this.pagesize == 1)
				},
				page: function(){return parseInt(this.starts/this.size); }
			},
			methods: {
				sortBy: function (key) {
					this.sortKey = key
					this.sortOrders[key] = this.sortOrders[key] * -1
				},
				toward :function(){
					if (this.starts > 0) this.starts -= this.size
						else this.starts = (this.pagesize-1)*this.size
					},
				foward :function(){
					if ( (this.starts + this.size) < this.data.length ) this.starts += this.size
						else this.starts = 0
					},
				hashCode : function(obj){
					var s = JSON.stringify(obj);
					return s.split("").reduce(function(a,b){a=((a<<5)-a)+b.charCodeAt(0);return a&a},0);              
				},
				toPage(page){
					this.starts = this.size*page;
				}
			}
		})	
	}

	
		var app = new Vue({
				el: "#app",
				data: function(){
					return {
						rota :  '/'
					}
				},
			})

})
