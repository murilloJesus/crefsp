// classes de construcao da arvore
//classe mae de outros componentes
//segura conteudo e outras paginas
		class Pagina {
		  constructor(obj = {}, root = false) {
			this.id = obj.id ? obj.id : '';
			this.type = obj.type ? obj.type : 'pagina';
			this.name = obj.name ? obj.name : '';
			this.descricao = obj.descricao ? obj.descricao : '';
		    this.source = obj.source ? obj.source : false;
		    this.html = obj.html ? obj.html : '';
		    this.root = root;
		    this.childRoot = obj.childRoot ? obj.childRoot : false;
		    this.open = obj.open ? obj.open : false;
			this.clicked = obj.clicked ? obj.clicked : false;
			this.acessos = obj.acessos ? new Lista(obj.acessos) : '';
			this.videos = obj.videos ? new Lista(obj.acessos) : '';

			this.autor = obj.autor
			this.data = {
				full_created: obj.created_at ? new Helper().data_replace(obj.created_at) : false,
				created_at:  obj.created_at ? new Helper().has_update(obj.created_at, obj.updated_at) : false,
                updated_at:  obj.updated_at ? new Helper().data_replace_format(obj.updated_at): false
            }
			this.children = []

			this.setLista(obj.itens)

            if(this.id == 9){
                let t = this
                axios.get(`/updateData/9/0`)
                .then(function (response) {
                    t.setLista(response.data)
                })
            }

			this.addChildrens(obj.children)

			this.search = obj.search ?  new Search(obj.search) : false
		  }

		  dump(){
			  var t = this, a = {}

			  a = {
				  name : t.name,
				  source : t.source,
				  html : t.html,
				  itens : t.lista.fullList,
				  children : []
			  }

			  t.children.forEach(function(el){
				a.children.push(el.dump())
			  })

			//   return a
		  }

		  addChildrens(child = []){
			  var aux = {}, t = this
			  child.forEach(function(el){

				aux = el

				if(t.root && !t.html && !t.childRoot && (t.lista != -1 && ( typeof t.lista.fullList != 'undefined' && !t.lista.fullList.length) ) ) {
					aux.open = true
					t.childRoot = true
					aux.clicked = true
				}

				t.children.push( new Pagina(aux) )
			  })
		  }

		  addHtml(html){
			this.html = html
		  }

		  setLista(lista){

			if(lista){

				this.lista = new Lista(lista)
				var aux = []

			  if(this.getAgendas().length > 0 ){
					var child = []
					this.getAgendas().forEach(function(el) {

						aux = new Pagina({id: el.id, name : 'Inscrição para '+el.dataFormatada })
						aux.agenda = el
						child.push(aux)
					});

				  this.lista.fullList = []
					this.children = child
				}

			}else{
				this.lista = -1;
			}
		  }

		  getLista(){
		  	 return  this.lista.lista
		  }

		  getLicitacao(){
			return  this.lista.licitacao
	  	 }

		  getEditorial(){
		  	return this.lista.editorial
		  }

		  getClube(){
		  	return this.lista.clube
		  }


		  getPessoas(){
		  	return this.lista.pessoa
		  }

		  getVagas(){
		  	return this.lista.vaga
		  }

		  getInputs(){
		  	return this.lista.inputs
		  }

		  getAccordion(){
		  	return this.lista.accordion
		  }

		  getMapa(){
		  	return this.lista.mapa
		  }

		  getLicitacao(){
			  return this.lista.licitacao
		  }

		  getDestaques(){
		  	return this.lista.destaques
		  }

		  getNoticias(){
			  return this.lista.noticias
		  }

		  getDestaquesEventos(){
			  return this.lista.destaques_eventos
		  }

		  getEventos(){
			  return this.lista.eventos
		  }

		  getBanners(){
		  	return this.lista.banners
		  }

		  getVideos(){
		  	return this.lista.videos
		  }

		  getGaleria(){
		  	return this.lista.galeria
		  }

		  getAcessos(){
		  	return this.acessos.acesso
		  }

		  getModal(){
		  	return this.lista.modal
		  }

		  getAgendas(){
		  	return this.lista.agendas
		  }
		  setSearch(search){
		  	this.search = search
		  }

		  getSearch(){
		  	return this.search
		  }

		  unclick(){
		  	this.children.forEach(function(el){
		  		el.unclick()
		  	})
		  	this.clicked = ''
		  }

		}

//filha de pagina
// filtro para item output
		class Search{
		  constructor(obj = []) {
		    this.pesquisar = obj.pesquisar ? obj.pesquisar : false
		    this.categoria = obj.categoria ? obj.categoria : false
		    this.datarange = obj.datarange ? obj.datarange : false
		    this.datamm = obj.datamm ? obj.datamm : false
		    this.datayy = obj.datayy ? obj.datayy : false
		    this.cidade = obj.cidade ? obj.cidade : false
		  }

		  getArrYear(data = []){
		  	if ( !this.datayy ) return ''
		  	var retorno = []
		  	data.forEach(function(val){
		  		if(retorno.indexOf(val.datayy) == -1)
		  			retorno.push(val.datayy)
		  	})
		  	return retorno;
		  }

		  getArrMonth(data = [], year = ''){
		  	if ( !this.datamm ) return ''
		  	var retorno = []
		  	data.forEach(function(val){
			  	if(year && String(year) === String(val.datayy) ){
			  		if(String(retorno).toLowerCase().indexOf(String(val.datamm).toLowerCase()) == -1)
			  			retorno.push(val.datamm)
			  	}else{
			  		if(val.datamm && String(retorno).toLowerCase().indexOf(String(val.datamm).toLowerCase()) == -1)
			  			retorno.push(val.datamm)
			  	}
			})
		  	return retorno;
		  }

		  getArrCat(data = []){
		  	if ( !this.categoria ) return ''
		  	var retorno = []
		  	data.forEach(function(val){
		  		if( val.categoria && String(retorno).toLowerCase().indexOf(String(val.categoria).toLowerCase()) == -1)
		  			retorno.push(val.categoria)
		  	})
		  	return retorno;
		  }

		  getArrCid(data = []){
		  	if ( !this.cidade ) return ''
		  	var retorno = []
		  	data.forEach(function(val){
		  		if( val.cidade && String(retorno).toLowerCase().indexOf(String(val.cidade).toLowerCase()) == -1)
		  			retorno.push(val.cidade)
		  	})
		  	return retorno;
		  }

		  // getArrTip(data = []){
		  // 	if ( !this.tipo ) return ''
		  // 	var retorno = []
		  // 	data.forEach(function(val){
		  // 		if( val.tipo && String(retorno).toLowerCase().indexOf(String(val.tipo).toLowerCase()) == -1)
		  // 			retorno.push(val.tipo)
		  // 	})
		  // 	return retorno;
		  // }
		}

//filha de pagina
//segura os item output
		class Lista{
			constructor(lista = [], hide = ''){
				var link = [], licitacao = [], pessoa = [], inputs = [], editorial = [],
				clube = [], vaga = [], accordion = [], destaques = [],
				noticias = [], mapa = [], banners = [], eventos = [],
				videos = [], galeria = false , destaques_eventos = [],
				modal = [], list = [], acesso = [], agendas = []


				lista.forEach(function(obj){
					if(obj.type == 'link'){
						link.push( new Link(obj) )
						list.push( new Link(obj) )

					}else if(obj.type == 'template'){
						link.push( new Link(obj) )
						list.push( new Link(obj) )

					}else if(obj.type == 'licitacao'){
						licitacao.push( new Licitacao(obj) )
						list.push( new Licitacao(obj) )

					}else if(obj.type == 'arquivo'){
						link.push( new Arquivo(obj) )
						list.push( new Arquivo(obj) )

					}else if(obj.type == 'pessoa'){
						pessoa.push( new Pessoa(obj) )
						list.push( new Pessoa(obj) )

					}else if(obj.type == 'editorial'){
						editorial.push( new Editorial(obj) )
						list.push( new Editorial(obj) )

					}else if(obj.type == 'clube'){
						clube.push( new Clube(obj) )
						list.push( new Clube(obj) )

					}else if(obj.type == 'vaga'){
						vaga.push( new Vaga(obj) )
						list.push( new Vaga(obj) )

					}else if(obj.type == 'banner'){
						banners.push(new Banner(obj))
						list.push(new Banner(obj))

					}else if(obj.type == 'noticia'){
						if( obj.destaque === "1" ) destaques.push( new Noticia(obj) )
						noticias.push( new Noticia(obj) )
						list.push( new Noticia(obj) )

					}else if(obj.type == 'evento'){
						if( obj.destaque ) destaques_eventos.push( new Evento(obj) )
						eventos.push( new Evento(obj) )
						list.push( new Evento(obj) )

					}else if(obj.type == 'accordion'){
						accordion.push( new Accordion(obj) )
						list.push( new Accordion(obj) )

					}else if(obj.type == 'mapa'){
						mapa.push( new Mapa(obj) )
						list.push( new Mapa(obj) )

					}else if(obj.type == 'input'){
						inputs.push( new Input(obj) )
						list.push( new Input(obj) )

					}else if(obj.type == 'video'){
						videos.push( new Video(obj) )
						list.push( new Video(obj) )

					}else if(obj.type == 'galeria'){
						galeria = new Galeria(obj)
						list.push( new Galeria(obj) )
					}else if(obj.type == 'modal'){
						modal.push( new Modal(obj) )
						list.push( new Modal(obj) )
					}else if(obj.type == 'acesso'){
						acesso.push( new Acesso(obj) )
					}else if(obj.type == 'agenda'){
						agendas.push( new Agenda(obj) )
						list.push( new Modal(obj) )
					}
				})

				this.lista = link
				this.licitacao = licitacao
				this.pessoa = pessoa
				this.inputs = inputs
				this.editorial = editorial
				this.clube = clube
				this.vaga = vaga
				this.accordion = accordion
				this.mapa = mapa
				this.destaques = destaques
				this.noticias = noticias
				this.banners = banners
				this.eventos = eventos
				this.videos = videos
				this.galeria = galeria
				this.modal = modal
				this.acesso = acesso
				this.agendas = agendas
				this.destaques_eventos = destaques_eventos
				this.fullList = list

			}

            updateLista(updateItens){
                updateItens.forEach(function(obj){
					if(obj.type == 'link'){
						this.lista.push( new Link(obj) )
						this.fullList.push( new Link(obj) )

					}else if(obj.type == 'template'){
						this.lista.push( new Link(obj) )
						this.fullList.push( new Link(obj) )

					}else if(obj.type == 'licitacao'){
						this.licitacao.push( new Licitacao(obj) )
						this.fullList.push( new Licitacao(obj) )

					}else if(obj.type == 'arquivo'){
						this.lista.push( new Arquivo(obj) )
						this.fullList.push( new Arquivo(obj) )

					}else if(obj.type == 'pessoa'){
						this.pessoa.push( new Pessoa(obj) )
						this.fullList.push( new Pessoa(obj) )

					}else if(obj.type == 'editorial'){
						this.editorial.push( new Editorial(obj) )
						this.fullList.push( new Editorial(obj) )

					}else if(obj.type == 'clube'){
						this.clube.push( new Clube(obj) )
						this.fullList.push( new Clube(obj) )

					}else if(obj.type == 'vaga'){
						this.vaga.push( new Vaga(obj) )
						this.fullList.push( new Vaga(obj) )

					}else if(obj.type == 'banner'){
						this.banners.push(new Banner(obj))
						this.fullList.push(new Banner(obj))

					}else if(obj.type == 'noticia'){
						if( obj.destaque ) destaques.push( new Noticia(obj) )
						this.noticias.push( new Noticia(obj) )
						this.fullList.push( new Noticia(obj) )

					}else if(obj.type == 'evento'){
						if( obj.destaque ) destaques_eventos.push( new Evento(obj) )
						this.eventos.push( new Evento(obj) )
						this.fullList.push( new Evento(obj) )

					}else if(obj.type == 'accordion'){
						this.accordion.push( new Accordion(obj) )
						this.fullList.push( new Accordion(obj) )

					}else if(obj.type == 'mapa'){
						this.mapa.push( new Mapa(obj) )
						this.fullList.push( new Mapa(obj) )

					}else if(obj.type == 'input'){
						this.inputs.push( new Input(obj) )
						this.fullList.push( new Input(obj) )

					}else if(obj.type == 'video'){
						this.videos.push( new Video(obj) )
						this.fullList.push( new Video(obj) )

					}else if(obj.type == 'galeria'){
						this.galeria = new Galeria(obj)
						this.fullList.push( new Galeria(obj) )
					}else if(obj.type == 'modal'){
						this.modal.push( new Modal(obj) )
						this.fullList.push( new Modal(obj) )
					}else if(obj.type == 'acesso'){
						this.acesso.push( new Acesso(obj) )
					}else if(obj.type == 'agenda'){
						this.agendas.push( new Agenda(obj) )
						this.fullList.push( new Modal(obj) )
					}
				})
            }

		}

 // classes de obj isolados
  	    class Vaga {
		  constructor(obj = []) {
		    this.type  = 'vaga'
		  	this.name = obj.name ? obj.name : ''
		    this.cidade = obj.cidade ? obj.cidade : ''
		    this.descricao = obj.descricao ? obj.descricao : ''
		    this.href = obj.id ? 'empregos_e_concursos/'+new Helper().rotear(obj) : ''

		    this.data = obj.data ? obj.data : ''
		    this.dataFormatada = obj.data ? new Helper().dataFormat(obj.data) : ''
		  }
		}



		class Noticia {
		  constructor(obj = []) {
		  	this.type = 'noticia';
		  	this.name = obj.name ? obj.name : ''
			this.autor = obj.autor ? obj.autor : ''
		  	this.descricao = obj.descricao ? obj.descricao : ''
		  	this.categoria = obj.categoria ? obj.categoria : ''
		  	this.href = obj.id ? 'noticia/'+new Helper().rotear(obj) : ''
		  	this.destaque = obj.destaque ? obj.destaque : ''
		  	this.destaque_pequeno = obj.destaque_pequeno ? new Imagem(obj.destaque_pequeno) : new Imagem()
		  	this.destaque_medio = obj.destaque_medio ? new Imagem(obj.destaque_medio) : new Imagem()
		  	this.destaque_grande = obj.destaque_grande ? new Imagem(obj.destaque_grande) : new Imagem()

		    this.imagem = obj.imagem ? new Imagem(obj.imagem) : new Imagem()

		  	this.data = obj.data ? obj.data : ''
		    this.dataFormatada = obj.data ? new Helper().dataFormat(obj.data) : ''
		  	}

		  	make_page(){
		  		var root = new Pagina({name : this.name, descricao : this.descricao})

		  		var dataL = [
		  			new Banner({ imagem : this.imagem, descricao: this.descricao})
		  		]

		  		var lista = new Lista(dataL);

		        root.setLista(lista);

		        root.addHtml('template-noticia')
		        root.root = true

		        return root
		  	}
		}

		class Evento {
		  constructor(obj = []) {
		  	this.type = 'evento'
		    this.name = obj.name ? obj.name : ''
		    this.categoria = obj.categoria ? obj.categoria : ''
		  	this.href = obj.id ? 'evento/'+ new Helper().rotear(obj) : ''
		  	this.destaque = obj.destaque ? obj.destaque : ''
		  	this.local = obj.local ? obj.local : ''
			this.endereco = obj.endereco ? obj.endereco : ''

		  	this.destaque_pequeno = obj.destaque_pequeno ? new Imagem(obj.destaque_pequeno) : new Imagem()
		  	this.destaque_medio = obj.destaque_medio ? new Imagem(obj.destaque_medio) : new Imagem()
		  	this.destaque_grande = obj.destaque_grande ? new Imagem(obj.destaque_grande) : new Imagem()

		    this.imagem = obj.imagem ? new Imagem(obj.imagem) : new Imagem()
		    this.source = this.imagem.backgroundSource
		    this.descricao = this.imagem.descricao

		    this.data = obj.data ? obj.data : ''
		    this.dataFormatada = obj.data ? new Helper().dataFormat(obj.data) : ''
		  }
		}

		class Agenda {
			constructor(obj = []){
				this.type = 'agenda'
				this.id = obj.id ? obj.id : ''

				this.data = obj.data ? obj.data : false
				this.dataFormatada = obj.data ? new Helper().dataFormat(obj.data) : ''

				this.ticket_publico = obj.ticket_publico ? obj.ticket_publico : false
				this.ticket_estudante = obj.ticket_estudante ? obj.ticket_estudante : false
				this.ticket_credenciado = obj.ticket_credenciado ? obj.ticket_credenciado : false
				this.ticket = 0

			}

		}

		class Licitacao {// AQUII
			constructor(obj = []){
				this.type = 'licitacao'
				this.name = obj.name ? obj.name : ''
				this.categoria = obj.categoria ? obj.categoria : ''
				this.objeto = obj.objeto ? new Helper().reduzirTexto(obj.objeto) : ''
				this.descricao = obj.descricao ? obj.descricao : ''
				this.numero = obj.numero ? obj.numero : ''
				this.processo = obj.processo ? obj.processo : ''
				this.local = obj.local ? obj.local : ''
		  		this.href = obj.id ? 'licitacao/'+ new Helper().rotear(obj) : ''

			    this.data = obj.data ? obj.data : ''
			    this.dataFormatada = obj.data ? new Helper().dataFormat(obj.data) : ''
			}
		}

		class Banner{
			constructor(obj = [] ){
				this.type = 'banners'
				this.name = obj.name ? obj.name : ''
				this.descricao = obj.descricao ? obj.descricao : ''
		  		this.href = obj.source ? new Helper().rotear_banner(obj.source) : '#Banner'
		    	this.imagem = obj.imagem ? new Imagem(obj.imagem) : new Imagem()
			}
		}

		class Galeria{
			constructor(obj = []){
				var t = this
				t.type = 'galeria'
				t.name = obj.name ? obj.name : ''
				t.descricao = obj.descricao ? obj.descricao : ''
				t.imagens = []
				obj.images.forEach(function(el){
					t.imagens.push( new Imagem(el) )
				})
			}
		}

		class Imagem{
			constructor(obj = []){
				this.name = obj.name ? obj.name : ''

				obj.source = obj.source ? obj.source.replace('https://www.crefsp.gov.br/wp-content/uploads/', '/storage/app/uploads/') : '';

				this.source = obj.source ? obj.source : window.rota+'public/img/icone-sem-foto.jpg'
				if(obj.original_source){
					this.source = obj.source ? window.rota+'storage/app/imagens/'+obj.source : window.rota+'public/img/icone-sem-foto.jpg'
				}
				this.descricao = obj.descricao ? obj.descricao : ''
				this.backgroundSource = 'background-image: url(\''+this.source+'\')';
			}
		}

		class Arquivo {
		  constructor(obj = []) {
		  	this.type = 'arquive'
		  	this.arquive = obj.arquive ? obj.arquive : ''
			this.icone = 'fa-file-pdf'

			this.name = obj.name ? obj.name : ''
			this.href = new Helper().rotear_arquivo(obj)
			this.source = new Helper().rotear_arquivo(obj)
			this.datamm = obj.datamm ? obj.datamm : ''
			this.datammid = obj.datamm ? new Helper().ordenaMes(obj.datamm) : 0
		    this.datayy = obj.datayy ? obj.datayy : ''
		    this.categoria = obj.categoria ? obj.categoria : ''
		    this.data = obj.data ? obj.data : ''
		    this.dataFormatada = obj.data ? new Helper().dataFormat(obj.data) : ''
			this.descricao = obj.descricao ? obj.descricao : ''

		  }
		}

		class Tabela{
			constructor(lista = [], colunas = ['Nome', 'Tipo', 'Objeto', "Processo", "Abertura"]){
				var tabela = []
				lista.forEach(function(el){
					tabela.push({
							linha : [el.name, el.categoria, el.objeto, el.processo, el.dataFormatada],
							elemento : el
						})
				})
				this.tabela = tabela
				this.colunas = colunas
			}
		}


		class Pessoa{
			constructor(obj = []){
				this.type = 'pessoa'
				this.name = obj.name ? obj.name : ''
				this.cargo = obj.cargo ? obj.cargo : ''
				this.credencial = obj.doc ? obj.doc : ''
				this.cidade = obj.cidade ? obj.cidade : ''
				this.template = obj.template ? obj.template : ''

		    	this.imagem = obj.imagem ? new Imagem(obj.imagem) : new Imagem()
				this.source = this.imagem.source
			}
		}

		class Acesso{
			constructor(obj = []){
				this.type = 'acesso'

				this.id = obj.id ? obj.id : ''
				this.name = obj.name ? obj.name : ''
				this.descricao = obj.descricao ? obj.descricao : ''
				this.source = obj.source ? new Helper().rotear_acesso(obj) : ''
				this.destaque = obj.destaque ? obj.destaque : ''

		    	this.imagem = obj.imagem ? new Imagem(obj.imagem) : new Imagem()
			}
		}

		class Link {
		  constructor(obj = []) {
		  	this.type = 'link'
		  	this.icone = 'fa-link'
			this.name = obj.name ? obj.name : ''
			this.href = new Helper().rotear_link(obj)
		    this.descricao = obj.descricao ? obj.descricao : ''
		    this.categoria = obj.categoria ? obj.categoria : ''
			this.datamm = obj.datamm ? obj.datamm : ''
			this.datammid = obj.datamm ? new Helper().ordenaMes(obj.datamm) : 0
		    this.datayy = obj.datayy ? obj.datayy : ''

		    this.data = obj.data ? obj.data : ''
		    this.dataFormatada = obj.data ? new Helper().dataFormat(obj.data) : ''
		  }
		}


		class Editorial {
		  constructor(obj = []) {
		    this.type = 'editorial'
		    this.name = obj.name ? obj.name : ''
		    this.href = obj.source ? new Helper().rotear_source(obj.source) : ''
		    this.descricao = obj.descricao ? obj.descricao : ''
		    this.categoria = obj.categoria ? obj.categoria : ''
		    this.datayy = obj.datayy ? obj.datayy : ''
		    this.datamm = obj.datamm ? obj.datamm : ''

		    this.imagem = obj.imagem ? new Imagem(obj.imagem) : ''

			this.data = obj.data ? obj.data : ''
			this.dataFormatada = obj.data ? new Helper().dataFormat(obj.data) : ''

		    this.flash = obj.flash ? {source : obj.flash} : ''
		    this.zip = obj.zip ? new Arquivo(obj.zip) : ''
		    this.pdf = obj.pdf ? new Arquivo(obj.pdf) : ''

		    this.video = obj.video ? new Video(obj.video) : ''

		    this.autor = obj.autor ? obj.autor : ''
		    this.cidade = obj.cidade ? obj.cidade : ''
		    this.site = obj.site ? {name : obj.site, href : new Helper().rotear_site(obj.site) } : ''
		    this.endereco = obj.endereco ? obj.endereco : ''
		    this.editora = obj.editora ? obj.editora : ''
		    this.telefone = obj.telefone ? obj.telefone : ''
		  }
		}

		class Clube {
		  constructor(obj = []) {
		    this.type = 'clube'
		    this.name = obj.name ? obj.name : 'teste'
		    this.href = obj.id ? 'beneficio/'+new Helper().rotear(obj) : ''
		    this.cidade = obj.cidade ? obj.cidade : ''
		    this.categoria = obj.categoria ? obj.categoria : ''
		    this.descricao = obj.descricao ? obj.descricao : ''

		    this.imagem = obj.imagem ? new Imagem(obj.imagem) : new Imagem()
			this.source = this.imagem.source

		    this.endereco = obj.endereco ? obj.endereco : ''
		    this.telefone = obj.telefone ? obj.telefone : ''
		    this.site = obj.site ? obj.site : ''
		  }
		}

		class Accordion{
			constructor(obj = []) {
				this.type = 'accordion'
 				this.name = obj.name ? obj.name : 'teste'
				this.descricao = obj.descricao ? obj.descricao : ''
			}
		}


		class Input {
		  constructor(obj = []) {
		    this.type = 'input'
		    this.name = obj.name ? obj.name : ''
		    this.formato = obj.formato ? obj.formato : 'text'
		    this.descricao = obj.descricao ? obj.descricao : ''
		    this.obrigatorio = obj.obrigatorio ? obj.obrigatorio : false
			this.hash = new Helper().formatName(this.name)
		  }
		}

		class Mapa {
			constructor(obj = []){
				var helper = new Helper();

				this.type = 'mapa'
				this.latitude = obj.latitude ? obj.latitude : ''
				this.longitude = obj.longitude ? obj.longitude : ''
				this.cidade = obj.cidade ? obj.cidade : ''
				this.local = obj.local ? obj.local : ''
				this.endereco = obj.endereco ? obj.endereco : ''
				this.observacao = obj.descricao ? obj.descricao : ''
				this.template = obj.template ? obj.template : ''
				this.data = obj.data ? obj.data : ''
				this.datamm = obj.datamm ? obj.datamm : ''
				this.href = obj.id ? 'unidades/'+new Helper().rotear(obj) : ''
				this.dataFormatada = obj.data ? helper.dataFormat(obj.data) : ''
				this.descricao = '<a _href="#">									<b><i class="fa fa-clock"> </i><b class="red"> '+this.dataFormatada+'</b> <i class="fa fa-map-marker"> </i> '+this.cidade+'</b>		<br>'+this.local +' <i>('+this.endereco+')</i>								</a>								<br><i>'+this.observacao+'</i>				 <div>"'+this.template+'"</div>'
			}
		}

		class Video {
		  constructor(obj = []) {
		  	this.type = 'video'
		    this.name = obj.name ? obj.name : ''
			this.descricao = obj.descricao ? obj.descricao : ''
			this.embed = obj.source
			this.href = 'https://www.youtube.com/embed/'+obj.source
		    this.imagem = new Imagem({source : 'https://img.youtube.com/vi/'+obj.source +'/0.jpg'})
		  }
		}


		class Modal {
		  constructor(obj = []) {
		  	this.type = 'modal'
		    this.name = obj.name ? obj.name : ''
		    this.descricao = obj.descricao ? obj.descricao : ''
		  }
		}

		class Helper{

            has_update(created, updated){
                return this.get_day(created) < this.get_day(updated) ? this.data_replace_format(created) : false
            }

            get_day(date){
                return parseInt(this.data_replace(date)/1000000)
            }

			data_replace(data){
				return data.replace(/[- :]/g, "")
			}

			data_replace_format(data){
				return this.dataFormat( this.data_replace(data) )
			}

			dataFormat(data){
				data = String(data)
				var aft = data.split('.').length ? data.split('.')[1] : ''
				var bef = data.split('.')[0]
				var retorno = ''

				var len = bef.length, min, hor, dia, mes, ano
				data = bef
				if(len == 4){
					hor = data.slice(0,2)
					min = data.slice(2, 4)

					retorno = hor+'h'+min
				}else if(len == 8){

					ano = data.slice(0,4)
					mes = data.slice(4, 6)
					dia = data.slice(6, 8)

					retorno = dia+'/'+mes+'/'+ano

				}else if( len >= 12){

					ano = data.slice(0,4)
					mes = data.slice(4, 6)
					dia = data.slice(6, 8)
					hor = data.slice(8, 10)
					min = data.slice(10, 12)

					retorno =  dia+'/'+mes+'/'+ano+' '+hor+'h'+min

				}

				if( aft ){
					if(aft.length == 4){
						return retorno+' às '+this.dataFormat(aft)
					}else{
						return retorno+' até '+this.dataFormat(aft)
					}
				}else{
					return retorno
				}
			}

			isContent(string){
				if( string ){
					return string
				}

				return '';
			}

			textoAleatorio(tamanho = 12)
				{
				    var letras = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz';
				    var aleatorio = '';
				    for (var i = 0; i < tamanho; i++) {
				        var rnum = Math.floor(Math.random() * letras.length);
				        aleatorio += letras.substring(rnum, rnum + 1);
				    }
				    return aleatorio;
				}

			reduzirTexto(texto){
				if(texto.length > 80) return texto.slice(0, 80)+'..'
                return texto
			}

			rotear(obj){

				if(!obj.name) obj.name = 'Sem Nome';

				var rota = obj.id+'-'+obj.name.replace(/ /g, '-').replace(/\//g, '-').replace(/%/g, '-')

				return window.rota+rota
			}

			rotear_acesso(obj){

				let rota = obj.source;

				if(rota.indexOf('http://') > -1){
					return rota
				}

				if(rota.indexOf('https://') > -1){
					return rota
				}

				if(!obj.name) obj.name = 'Sem Nome';

				rota = obj.source+'-'+obj.name.replace(/ /g, '-').replace(/\//g, '-').replace(/%/g, '-')


				return rota
			}

			rotear_source(rota){

				if(rota.indexOf('https://www.crefsp.gov.br/wp-content/uploads/') > -1){
					return rota.replace('https://www.crefsp.gov.br/wp-content/uploads/', '/storage/app/uploads/')
				}

				if(rota.indexOf('http://') > -1){
					return rota
				}

				if(rota.indexOf('https://') > -1){
					return rota
				}

				rota = "/storage/app/arquivos/"+rota

				return rota
			}

			rotear_banner(rota){

				if(rota.indexOf('https://www.crefsp.gov.br/wp-content/uploads/') > -1){
					return rota.replace('https://www.crefsp.gov.br/wp-content/uploads/', '/storage/app/uploads/')
				}

				if(rota.indexOf('http://') > -1){
					return rota
				}

				if(rota.indexOf('https://') > -1){
					return rota
				}

				return rota
			}

			rotear_source_externo(rota){

				if(rota.indexOf('https://www.crefsp.gov.br/wp-content/uploads/') > -1){
					return rota.replace('https://www.crefsp.gov.br/wp-content/uploads/', '/storage/app/uploads/')
				}

				if(rota.indexOf('http://') > -1){
					return rota
				}

				if(rota.indexOf('https://') > -1){
					return rota
				}

				rota = "/storage/app/uploads/"+rota

				return rota
			}

			rotear_arquivo(obj){

				if(obj.arquivo){
					obj = obj.arquivo
				}

				let rota = ''

				if(obj.source){
					rota = this.rotear_source(obj.source)
				}else if(obj.href){
					rota = this.rotear_source_externo(obj.href)
				}else{
					rota = 'link/'+this.rotear(obj)
				}

				return rota
			}

			rotear_site(rota){
				if(rota.indexOf('http://') == -1){
					return 'http://'+rota
				}

				return rota
			}


			rotear_link(obj){

				let rota = ''

				if(obj.source){
					rota = this.rotear_source(obj.source)
				}else if(obj.href){
					rota = this.rotear_source(obj.href)
				}else{
					rota = 'link/'+this.rotear(obj)
				}

				return rota
			}

			formatName(string){
				return string.replace(/\s/g, '_')
			}

			async enviarFormulario(json, item){



			}

			ordenaMes(datamm){
				switch (datamm) {
					case 'Janeiro':
						return 1;
					break;

					case 'Fevereiro':
						return 2;
					break;

					case 'Março':
						return 3;
					break;

					case 'Abril':
						return 4;
					break;

					case 'Maio':
						return 5;
					break;

					case 'Junho':
						return 6;
					break;

					case 'Julho':
						return 7;
					break;

					case 'Agosto':
						return 8;
					break;

					case 'Setembro':
						return 9;
					break;

					case 'Outubro':
						return 10;
					break;

					case 'Novembro':
						return 11;
					break;

					case 'Dezembro':
						return 12;
					break;
				}
			}

		}
