

class Pagina{
	constructor(obj = []){
		this.id = obj.id ? obj.id : ''
		this.parent_id = obj.parent_id ? obj.parent_id : ''
		this.referencia_id = obj.referencia_id ? obj.referencia_id : ''
		this.search_id = obj.search_id ? obj.search_id : ''
		this.galeria_id = obj.galeria_id ? obj.galeria_id : ''
		this.email_receiver = obj.email_receiver ? obj.email_receiver : 'cref4sp@crefsp.gov.br'
		this.name = obj.name ? obj.name : ''
		this.source = obj.source ? obj.source : ''
		this.template = obj.template ? obj.template : ''
		this.status = obj.status ? obj.status : true

		this._token = $("input[name*='_token']").val()

	}
}
//filha de pagina
// filtro para item output
class Search {
	 constructor(obj = []) {
		this.id = obj.id ? obj.id : ''

		this.pesquisar = obj.pesquisar ? obj.pesquisar : false
		this.categoria = obj.categoria ? obj.categoria : false
		this.datarange = obj.datarange ? obj.datarange : false
		this.status = obj.status ? obj.status : false
		this.destaque = obj.destaque ? obj.destaque : false
		this.datamm = obj.datamm ? obj.datamm : false
		this.datayy = obj.datayy ? obj.datayy : false
		this.cidade = obj.cidade ? obj.cidade : false

		this._token = $("input[name*='_token']").val()

		this.lista_categorias = []
		this.lista_cidades = []

		this.getFromDataBase();
	}

	async getFromDataBase(){
		var aux = []

		if(this.categoria){
			var lista_categorias = await axios
			.get(window.rota+'api/categorias')
			.then(function(response){
				return response.data
			})

			aux = []

			lista_categorias.forEach(function(el){
				aux[el.id] = (el.name);
			})

			this.lista_categorias = aux
		}

		if(this.cidade){
			var lista_cidades = await axios
			.get(window.rota+'api/cidades')
			.then(function(response){
				return response.data
			})

			aux = []

			lista_cidades.forEach(function(el){
				aux[el.id] = (el.name);
			})

			this.lista_cidades = aux
		}
	}

	getArrYear(data = []) {
		if (!this.datayy) return false
		var retorno = []
		data.forEach(function (val) {
			if (retorno.indexOf(val.datayy) == -1)
				retorno.push(val.datayy)
		})
		return retorno.length ? retorno : false
	}

	getArrMonth(data = [], year = false) {
		if (!this.datamm) return false
		var retorno = []
		data.forEach(function (val) {
			if (year && String(year) === String(val.datayy)) {
				if (String(retorno).toLowerCase().indexOf(String(val.datamm).toLowerCase()) == -1)
					retorno.push(val.datamm)
			} else {
				if (val.datamm && String(retorno).toLowerCase().indexOf(String(val.datamm).toLowerCase()) == -1)
					retorno.push(val.datamm)
			}
		})
		return retorno.length ? retorno : false
	}

	getArrCat(data = []) {
		if (!this.categoria) return false
		var retorno = []
		var t = this
		data.forEach(function (val) {
			if (t.lista_categorias[val.categoria] && String(retorno).toLowerCase().indexOf(String(t.lista_categorias[val.categoria]).toLowerCase()) == -1)
				retorno.push([val.categoria, t.lista_categorias[val.categoria]])
		})

		return retorno.length ? retorno : false
	}

	getArrCid(data = []) {
		if (!this.cidade) return false
		var retorno = []
		var t = this
		data.forEach(function (val) {
			if (t.lista_cidades[val.cidade] && String(retorno).toLowerCase().indexOf(String(t.lista_cidades[val.cidade]).toLowerCase()) == -1)
				retorno.push([val.cidade, t.lista_cidades[val.cidade]])
		})
		return retorno.length ? retorno : false
	}
}

//filha de pagina
//segura os item output
class Lista {
	constructor(lista = [], hide = false) {
		var link = [], pessoa = [], inputs = [], editorial = [],
			clube = [], vaga = [], accordion = [], destaques = [],
			noticias = [], mapa = [], banners = [], eventos = [],
			videos = [], destaques_eventos = [], agenda = [], modal = new Modal()

		lista.forEach(function (obj) {
			if (obj.type == 'link') {
				link.push(new Link(obj))

			} else if (obj.type == 'template') {
				link.push(new Link(obj))

			} else if (obj.type == 'arquivo') {
				link.push(new Arquivo(obj))

			} else if (obj.type == 'imagem') {
				link.push(new Imagem(obj))

			} else if (obj.type == 'template') {
				link.push(new Link(obj))

			} else if (obj.type == 'pessoa') {
				pessoa.push(new Pessoa(obj))

			} else if (obj.type == 'editorial') {
				editorial.push(new Editorial(obj))

			} else if (obj.type == 'clube') {
				clube.push(new Clube(obj))

			} else if (obj.type == 'vaga') {
				vaga.push(new Vaga(obj))

			} else if (obj.type == 'banner') {
				banners.push(new Banner(obj))

			} else if (obj.type == 'noticia') {
				if (obj.destaque) destaques.push(new Noticia(obj))
				noticias.push(new Noticia(obj))

			} else if (obj.type == 'evento') {
				if (obj.destaque) destaques_eventos.push(new Evento(obj))
				eventos.push(new Evento(obj))

			} else if (obj.type == 'accordion') {
				accordion.push(new Accordion(obj))

			} else if (obj.type == 'mapa') {
				mapa.push(new Mapa(obj))

			} else if (obj.type == 'input') {
				inputs.push(new Input(obj))

			} else if (obj.type == 'video') {
				videos.push(new Video(obj))

			} else if (obj.type == 'agenda') {
				agenda.push(new Agenda(obj))

			} else if (obj.type == 'modal') {
				modal = new Modal(obj)

			}
		})

		this.lista = link
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
		this.agenda = agenda
		this.modal = modal
		this.destaques_eventos = destaques_eventos
		this.itens = this.getIncapsuledItens(lista)

	}

	getIncapsuledItens(lista = []) {
		var list = []

		lista.forEach(function (obj) {
			if (obj.type == 'link') {
				list.push(new Link(obj))

			} else if (obj.type == 'template') {
				list.push(new Link(obj))

			} else if (obj.type == 'imagem') {
				list.push(new Imagem(obj))

			} else if (obj.type == 'arquivo') {
				list.push(new Arquivo(obj))

			} else if (obj.type == 'pessoa') {
				list.push(new Pessoa(obj))

			} else if (obj.type == 'editorial') {
				list.push(new Editorial(obj))

			} else if (obj.type == 'clube') {
				list.push(new Clube(obj))

			} else if (obj.type == 'vaga') {
				list.push(new Vaga(obj))

			} else if (obj.type == 'banner') {
				list.push(new Banner(obj))

			} else if (obj.type == 'noticia') {
				list.push(new Noticia(obj))

			} else if (obj.type == 'evento') {
				list.push(new Evento(obj))

			} else if (obj.type == 'accordion') {
				list.push(new Accordion(obj))

			} else if (obj.type == 'mapa') {
				list.push(new Mapa(obj))

			} else if (obj.type == 'input') {
				list.push(new Input(obj))

			} else if (obj.type == 'video') {
				list.push(new Video(obj))

			} else if (obj.type == 'licitacao') {
				list.push(new Licitacao(obj))

			} else if (obj.type == 'galeria') {
				list.push(new Galeria(obj))

			} else if (obj.type == 'agenda') {
				list.push(new Agenda(obj))

			}
		})

		return list
	}
}


class Tabela {
	constructor(lista = [], colunas = [], campos = [], listar = true) {
		var linha = []

		if (listar) lista = new Lista().getIncapsuledItens(lista)

		var a, c

		campos.forEach(function (e) {
			a = e.split('.')
			if (a.length > 1) {
				c = {
					type: a[1],
					val: a[0]
				}
			} else {
				c = {
					type: false,
					val: a[0]
				}
			}


			linha.push(c)
		})

		this.campos = linha
		this.tabela = lista
		this.colunas = colunas
	}
}


// classes de obj isolados
class Vaga {
	constructor(obj = []) {
		this.type = 'vaga'
		this.pagina_id = 13
		this.id = obj.id ? obj.id : ''
		this.name = obj.name ? obj.name : ''
		this.cidade = obj.cidade ? obj.cidade : ''
		this.categoria = obj.categoria ? obj.categoria : ''
		this.descricao = obj.descricao ? obj.descricao : ''
		this.href = obj.href ? obj.href : ''
		this.status = obj.status ? obj.status : true

		this.data = obj.data ? obj.data : new Helper().now(false)

		this.template = obj.template ? obj.template : ''
		this._token = $("input[name*='_token']").val()
	}
}

class Noticia {
	constructor(obj = []) {
		this.type = 'noticia'

		this.pagina_id = 9
		this.id = obj.id ? obj.id : ''
		this.image_id = obj.image_id ? obj.image_id : ''
		this.galeria_id = obj.galeria_id ? obj.galeria_id : ''

		this.name = obj.name ? obj.name : ''
		this.autor = obj.autor ? obj.autor : ''
		this.descricao = obj.descricao ? obj.descricao : ''
		this.categoria = obj.categoria ? obj.categoria : ''
		this.destaque = obj.destaque ? obj.destaque : false
		this.status = obj.status ? obj.status : true
		this.data = obj.data ? obj.data : new Helper().now(true)
		this.template = obj.template ? obj.template : ''
		this.destaque_pequeno = obj.destaque_pequeno ? obj.destaque_pequeno : ''
		this.destaque_medio = obj.destaque_medio ? obj.destaque_medio : ''
		this.destaque_grande = obj.destaque_grande ? obj.destaque_grande : ''
		this._token = $("input[name*='_token']").val()
	}
}

class Evento {
	constructor(obj = []) {
		this.type = 'evento'
		this.pagina_id = 11

		this.id = obj.id ? obj.id : ''
		this.image_id = obj.image_id ? obj.image_id : ''

		this.name = obj.name ? obj.name : ''
		this.categoria = obj.categoria ? obj.categoria : ''
		this.cidade = obj.cidade ? obj.cidade : ''

		this.status = obj.status ? obj.status : true
		this.destaque = obj.destaque ? obj.destaque : false

		this.data = obj.data ? obj.data : new Helper().now(true)
		this.local = obj.local ? obj.local : ''
		this.endereco = obj.endereco ? obj.endereco : ''
		this.template = obj.template ? obj.template : ''
		this.palestras = obj.palestras ? obj.palestras : ''

		this.destaque_pequeno = obj.destaque_pequeno ? obj.destaque_pequeno : ''
		this.destaque_medio = obj.destaque_medio ? obj.destaque_medio : ''
		this.destaque_grande = obj.destaque_grande ? obj.destaque_grande : ''

		this._token = $("input[name*='_token']").val()
	}

	relatorio(){

		var retorno = [
			{
				name : 'Nome',
				value : this.name,
				size : 'col-md-12'
			},
			{
				name : 'Categoria',
				value : window.cache.categorias[this.categoria] ? window.cache.categorias[this.categoria].name : '',
				size : 'col-md-12'
			},
			{
				name : 'Cidade',
				value : window.cache.cidades[this.cidade] ? window.cache.cidades[this.cidade].name : '',
				size : 'col-md-12'
			},
			{
				name : 'Endereço',
				value : this.local,
				size : 'col-md-12'
			},
			{
				name : 'Data',
				value : new Helper().dataFormat(this.data),
				size : 'col-md-12'
			},
		]

		return retorno

	}
}

class Categoria {
	constructor(obj = []) {
		this.id = obj.id ? obj.id : ''
		this.type = obj.type ? obj.type : ''
		this.name = obj.name ? obj.name : ''
		this.indice = obj.indice ? obj.indice : 999
		this.status = typeof obj.status === 'undefined' ? true : obj.status
	}
}


class Agenda {
	constructor(obj = []){
		this.type = 'agenda'
		this.id = obj.id ? obj.id : ''
		this.data = obj.data ? obj.data : new Helper().now(false)
		this.ticket_publico = obj.ticket_publico ? obj.ticket_publico : ''
		this.ticket_estudante = obj.ticket_estudante ? obj.ticket_estudante : ''
		this.ticket_credenciado = obj.ticket_credenciado ? obj.ticket_credenciado : ''
		this._token = $("input[name*='_token']").val()
	}
}

class Licitacao {// AQUII
	constructor(obj = []) {
		this.type = 'licitacao'
		this.id = obj.id ? obj.id : ''
		this.pagina_id = 8
		this.name = obj.name ? obj.name : ''
		this.objeto = obj.objeto ? obj.objeto : ''
		this.numero = obj.numero ? obj.numero : ''
		this.processo = obj.processo ? obj.processo : ''
		this.local = obj.local ? obj.local : ''
		this.data = obj.data ? obj.data : new Helper().now(true)
		this.status = obj.status ? obj.status : true
		this.extrato = obj.extrato ? Number(obj.extrato) : false
		this.categoria = obj.categoria ? obj.categoria : ''
		this.template = obj.template ? obj.template : ''
		this._token = $("input[name*='_token']").val()
	}
}

class Banner {
	constructor(obj = []) {
		this.type = 'banner'
		this.id = obj.id ? obj.id : ''
		this.pagina_id = obj.pagina_id ? obj.pagina_id : ''
		this.image_id = obj.image_id ? obj.image_id : ''
		this.name = obj.name ? obj.name : ''
		this.source = obj.source ? obj.source : ''
		this.status = obj.status ? obj.status : true
	}
}

class Galeria {
	constructor(obj = []) {
		this.type = 'galeria'
		this.id = obj.id ? obj.id : ''

		this.name = obj.name ? obj.name : ''
		this.descricao = obj.descricao ? obj.descricao : ''
	}
}

class Imagem {
	constructor(obj = []) {
		this.type = 'imagem'
		this.autor = obj.autor ? obj.autor : ''
		this.id = obj.id ? obj.id : ''
		this.pagina_id = obj.pagina_id ? obj.pagina_id : ''
		this.name = obj.name ? obj.name : ''
		this.source = obj.source ? obj.source : 'img/crefsp.png'
		this.descricao = obj.descricao ? obj.descricao : ''
		this.backgroundSource = 'background-image: url(\'' + this.source + '\')';
	}
}

class Arquivo {
	constructor(obj = []) {
		this.type = 'arquive'
		this.arquive = obj.arquive ? obj.arquive : ''
		this.icone = 'fa-file'
		this.id = obj.id ? obj.id : ''
		this.pagina_id = obj.pagina_id ? obj.pagina_id : ''
		if (this.arquive) {
			switch (this.arquive) {
				case 'pdf':
					this.icone = 'fa-file-pdf'
					break

				default:
					this.icone = 'fa-file'
			}
		}

		this.name = obj.name ? obj.name : ''
		this.href = obj.source ? obj.source : ''
		this.source = obj.source ? obj.source : ''
		this.status = obj.status ? obj.status : true

		this.datamm = obj.datamm ? obj.datamm : ''
		this.datayy = obj.datayy ? obj.datayy : ''
		this.categoria = obj.categoria ? obj.categoria : ''
		this.data = obj.data ? obj.data : ''
		this.descricao = obj.descricao ? obj.descricao : ''
	}
}

class Pessoa {
	constructor(obj = []) {
		this.type = 'pessoa'
		this.id = obj.id ? obj.id : ''
		this.indice = obj.indice ? obj.indice : 999
		this.image_id = obj.image_id ? obj.image_id : ''
		this.pagina_id = obj.pagina_id ? obj.pagina_id : ''

		this.name = obj.name ? obj.name : ''
		this.cargo = obj.cargo ? obj.cargo : ''
		this.doc = obj.doc ? obj.doc : ''
		this.template = obj.template ? obj.template : null

		this.status = obj.status ? obj.status : true

		this._token = $("input[name*='_token']").val()
	}
}

class Link {
	constructor(obj = []) {
		this.type = 'link'
		this.pagina_id = obj.pagina_id ? obj.pagina_id : ''
		this.id = obj.id ? obj.id : ''
		this.icone = 'fa-link'
		this.name = obj.name ? obj.name : 'Sem Nome'
		this.href = obj.href ? obj.href : ''
		this.descricao = obj.descricao ? obj.descricao : ''
		this.categoria = obj.categoria ? obj.categoria : ''
		this.datamm = obj.datamm ? obj.datamm : ''
		this.datayy = obj.datayy ? obj.datayy : ''
		this.status = obj.status ? obj.status : true
		this.template = obj.template ? obj.template : ''
		this.data = obj.data ? obj.data : ''
		this._token = $("input[name*='_token']").val()
	}
}


class Editorial {
	constructor(obj = []) {
		this.type = 'editorial'
		this.id = obj.id ? obj.id : ''
		this.name = obj.name ? obj.name : ''
		this.href = obj.href ? obj.href : ''
		this.descricao = obj.descricao ? obj.descricao : ''
		this.categoria = obj.categoria ? obj.categoria : ''
		this.datayy = obj.datayy ? obj.datayy : ''
		this.datamm = obj.datamm ? obj.datamm : ''
		this.status = obj.status ? obj.status : true
		this.imagem = obj.imagem ? new Imagem(obj.imagem) : ''
		this.data = obj.data ? obj.data : ''
		this.flash = obj.flash ? new Arquivo(obj.flash) : ''
		this.zip = obj.zip ? new Arquivo(obj.zip) : ''
		this.pdf = obj.pdf ? new Arquivo(obj.pdf) : ''
		this.video = obj.video ? new Video(obj.video) : ''
		this.autor = obj.autor ? obj.autor : ''
		this._token = $("input[name*='_token']").val()
	}
}

class Clube {
	constructor(obj = []) {
		this.pagina_id = 12
		this.type = 'clube'
		this.id = obj.id ? obj.id : ''
		this.image_id = obj.image_id ? obj.image_id : ''

		this.name = obj.name ? obj.name : ''
		this.cidade = obj.cidade ? obj.cidade : ''
		this.categoria = obj.categoria ? obj.categoria : ''
		this.descricao = obj.descricao ? obj.descricao : ''
		this.local = obj.local ? obj.local : ''
		this.endereco = obj.endereco ? obj.endereco : ''
		this.telefone = obj.telefone ? obj.telefone : ''
		this.site = obj.site ? obj.site : ''
		this.status = obj.status ? obj.status : true
		this.template = obj.template ? obj.template : ''

		this._token = $("input[name*='_token']").val()
	}
}

class Accordion {
	constructor(obj = []) {
		this.type = 'accordion'
		this.id = obj.id ? obj.id : ''
		this.pagina_id = obj.pagina_id ? obj.pagina_id : ''
		this.name = obj.name ? obj.name : ''
		this.descricao = obj.descricao ? obj.descricao : ''
		this.status = obj.status ? obj.status : true
		this._token = $("input[name*='_token']").val()
	}
}

class Acesso {
	constructor(obj = []) {
		this.id = obj.id ? obj.id : '';
		this.name = obj.name ? obj.name : ''
		this.source = obj.source ? obj.source : ''
		this.image_id = obj.image_id ? obj.image_id : ''
		this.status = obj.status ? obj.status : true
		this.destaque = obj.destaque ? obj.destaque : false
		this.popularidade = obj.popularidade ? obj.popularidade : 0
		this._token = $("input[name*='_token']").val()
	}
}



class Input {
	constructor(obj = []) {
		this.type = 'input'
		this.id = obj.id ? obj.id : ''
		this.indice = obj.indice ? obj.indice : 999
		this.pagina_id = obj.pagina_id ? obj.pagina_id : ''
		this.name = obj.name ? obj.name : ''
		this.formato = obj.formato ? obj.formato : 'text'
		this.descricao = obj.descricao ? obj.descricao : ''
		this.obrigatorio = obj.obrigatorio ? obj.obrigatorio : ''
		this.status = obj.status ? obj.status : true
		this._token = $("input[name*='_token']").val()
	}
}

class Mapa {
	constructor(obj = []) {
		this.type = 'mapa'

		this.id = obj.id ? obj.id : ''
		this.pagina_id = obj.pagina_id ? obj.pagina_id : 15

		this.latitude = obj.latitude ? obj.latitude : ''
		this.longitude = obj.longitude ? obj.longitude : ''
		this.cidade = obj.cidade ? obj.cidade : ''
		this.local = obj.local ? obj.local : ''
		this.endereco = obj.endereco ? obj.endereco : ''
		this.descricao = obj.descricao ? obj.descricao : ''
		this.template = obj.template ? obj.template : ''
		this.data = obj.data ? obj.data : new Helper().now(false)
		this.datamm = obj.datamm ? obj.datamm : ''
		this.status = obj.status ? obj.status : true

		this._token = $("input[name*='_token']").val()

	}

	relatorio(){

		var retorno = [
			{
				name : 'Cidade',
				value : window.cache.cidades[this.cidade] ? window.cache.cidades[this.cidade].name : '',
				size : 'col-md-12'
			},
			{
				name : 'Local',
				value : this.local,
				size : 'col-md-12'
			},
			{
				name : 'Observações',
				value : this.descricao,
				size : 'col-md-12'
			},
			{
				name : 'Agendas e Tickets',
				value : this.template,
				size : 'col-md-12'
			},
			{
				name : 'Mês',
				value : this.datamm,
				size : 'col-md-12'
			},
			{
				name : 'Data',
				value : new Helper().dataFormat(this.data),
				size : 'col-md-12'
			},
		]

		return retorno

	}
}

class Video {
	constructor(obj = []) {
		this.type = 'video'

		this.id = obj.id ? obj.id : ''
		this.pagina_id = obj.pagina_id ? obj.pagina_id : ''

		this.name = obj.name ? obj.name : ''
		this.source = obj.source ? obj.source : ''
		this.descricao = obj.descricao ? obj.descricao : ''

		this.status = obj.status ? obj.status : true

		this._token = $("input[name*='_token']").val()
	}
}


class Home {
	constructor(obj = []) {
		this.id = 1

		this.name = obj.name ? obj.name : ''
		this.source = obj.source ? obj.source : ''
		this.tema_id = obj.tema_id ? obj.tema_id : ''

		this._token = $("input[name*='_token']").val()
	}
}

class Multimidia {
	constructor(obj = []){
		this.type = 'multimidia'

		this.pagina_id = 10
		this.id = obj.id ? obj.id : ''
		this.name = obj.name ? obj.name : ''

		this._token = $("input[name*='_token']").val()

	}
}

class Modal {
	constructor(obj = []) {
		this.type = 'modal'

		this.id = obj.id ? obj.id : ''
		this.pagina_id = obj.pagina_id ? obj.pagina_id : ''
		this.item_id = obj.item_id ? obj.item_id : ''

		this.name = obj.name ? obj.name : ''
		this.descricao = obj.descricao ? obj.descricao : ''



		this._token = $("input[name*='_token']").val()
	}
}

class Usuarios {
	constructor(obj = []){
		this.id = obj.id ? obj.id : ''
		this.name = obj.name ? obj.name : ''
		this.email = obj.email ? obj.email : ''
		this.password = obj.password ? obj.password : ''
		this.permissoes = obj.permissoes ? obj.permissoes : ''
	}
}

class Permissoes {
	constructor(obj = []) {
		this.id = obj.id ? obj.id : ''
		this.name = obj.name ? obj.name : ''

		this.home = obj.home ? obj.home : false
		this.paginas = obj.paginas ? obj.paginas : false

		this.noticias = obj.noticias ? obj.noticias : false
		this.eventos = obj.eventos ? obj.eventos : false
		this.licitacoes = obj.licitacoes ? obj.licitacoes : false
		this.emprego = obj.emprego ? obj.emprego : false
		this.multimidia = obj.multimidia ? obj.multimidia : false
		this.clube = obj.clube ? obj.clube : false
		this.unidades = obj.unidades ? obj.unidades : false

		this.pessoas = obj.pessoas ? obj.pessoas : false
		this.formularios = obj.formularios ? obj.formularios : false

		this.usuarios = obj.usuarios ? obj.usuarios : false
	}

	all(bool){
		this.home = bool
		this.paginas = bool
		this.noticias = bool
		this.eventos = bool
		this.licitacoes = bool
		this.emprego = bool
		this.multimidia = bool
		this.clube = bool
		this.unidades = bool
		this.pessoas = bool
		this.formularios = bool
		this.usuarios = bool
	}
}

class Template {
	constructor() {
		this.banner = false
		this.galeria = false
		this.videos = false
		this.lista = false
		this.formulario = false
		this.accordion = false
		this.editorial = false
		this.pessoas = false
		this.modal = false
		this.mapas = false
		this.tabela = false
	}
}

class Tema  {
	constructor(obj = []) {
		this.id = obj.id ? obj.id : ''

		this.name = obj.name ? obj.name : ''
		this.head = obj.head ? obj.head : ''
		this.foot = obj.foot ? obj.foot : ''
		this.status = obj.status ? obj.status : true

		this._token = $("input[name*='_token']").val()

	}
}

class Inscricao {
	constructor(obj = []) {
		this.id = obj.id ? obj.id : ''
		this.item = obj.item_id ? obj.item_id : ''
		this.nome = obj.nome ? obj.nome : ''
		this.email = obj.email ? obj.email : ''
		this.ticket = this.id+'/'+this.item
		this.json = obj.json ? JSON.parse(obj.json) : []

		this.relatorio = this.relatorio(this.json)
	}

	relatorio(json){

		var retorno = [
			{
				name : 'Nome',
				value : this.nome,
				size : 'col-md-8'
			},
			{
				name : 'Ticket',
				value : this.ticket,
				size : 'col-md-4'
			},
			{
				name : 'E-mail',
				value : this.email,
				size : 'col-md-12'
			},
		], aux = {}, t = this

		Object.keys(json).forEach(function(el){

			if( !t.validate(el) ) return 0

			aux = t.campo(el, json[el])

			retorno.push(aux)
		})

		return retorno

	}

	validate(el){
		if( el === 'nome' || el === 'email' || el === 'g-recaptcha-response') return false
		else return true
	}

	campo(el, value){
		el = el.replace(/_/g, ' ')
		value = typeof value === 'undefined' ? 'Não' : value
		var retorno = {
			name : el,
			value : value,
			size : this.size(el)
		}

		return retorno
	}

	size(string){
		var size = string.length

		if(size < 10) return 'col-md-2'
		if(size < 20) return 'col-md-4'
		if(size < 30) return 'col-md-6'
		if(size < 40) return 'col-md-8'
		if(size < 50) return 'col-md-10'
		return 'col-md-12'

	}
}


class Formulario {
	constructor(obj = []) {
		this.id = obj.id ? obj.id : ''
		this.item = obj.item_id ? obj.item_id : ''
		this.nome = obj.nome ? obj.nome : ''
		this.email = obj.email ? obj.email : ''
		this.json = obj.json ? JSON.parse(obj.json) : []

		this.relatorio = this.relatorio(this.json)
	}

	relatorio(json){

		var retorno = [
			{
				name : 'Nome',
				value : this.nome,
				size : 'col-md-12'
			},
			{
				name : 'E-mail',
				value : this.email,
				size : 'col-md-12'
			},
		], aux = {}, t = this

		Object.keys(json).forEach(function(el){

			if( !t.validate(el) ) return 0

			aux = t.campo(el, json[el])

			retorno.push(aux)
		})

		return retorno

	}

	validate(el){
		if( el === 'nome' || el === 'email' || el === 'g-recaptcha-response') return false
		else return true
	}

	campo(el, value){
		el = el.replace(/_/g, ' ')
		value = typeof value === 'undefined' ? 'Não' : value
		var retorno = {
			name : el,
			value : value,
			source : '/storage/app/denuncias/'+value,
			size : this.size(el+value)
		}

		return retorno
	}

	size(string){
		var size = string.length/2

		if(size < 10) return 'col-md-2'
		if(size < 20) return 'col-md-4'
		if(size < 30) return 'col-md-6'
		if(size < 40) return 'col-md-8'
		if(size < 50) return 'col-md-10'
		return 'col-md-12'

	}
}



class Request {
	constructor(type = 'submit'){
		switch(type){
			case 'add':
				this.icon_initial = 'fa-plus'
				break

			case 'submit':
				this.icon_initial = 'fa-dot-circle-o'
				break
		}

		this.icone = this.icon_initial
		this.status = 0
		$("#loading").hide()
	}

	initial(){
		this.icone = this.icon_initial
		this.status = 0
		$("#loading").hide()
	}

	success(){
		this.icone = 'fa-check-circle'
		this.status = 200
		$("#loading").hide()
	}

	loading(){
		this.icone = 'spinner-border'
		this.status = 1
		$("#loading").show()
	}

	error(){
		this.icone = 'fa-exclamation-circle'
		this.status = 500
		$("#loading").hide()
	}
}

class Helper {
	dataFormat(data){
		data = String(data)
		var aft = data.split('.').length ? data.split('.')[1] : false
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

		}else if( len == 12){

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

	now(datahora = true){
		if (datahora){
			return $.datepicker.formatDate('yymmdd', new Date())+''+new Date().getHours()+''+new Date().getMinutes()
		} else{

			return $.datepicker.formatDate('yymmdd', new Date());
		}

	}

	isContent(string) {
		if (string) {
			return string
		}

		return '';
	}

	getDaysAgo(x = 5){
		var dateOffset = (24*60*60*1000) * x;
		var myDate = new Date();
		myDate.setTime(myDate.getTime() - dateOffset);

		return myDate;
	}

	textoAleatorio(tamanho = 12) {
		var letras = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz';
		var aleatorio = '';
		for (var i = 0; i < tamanho; i++) {
			var rnum = Math.floor(Math.random() * letras.length);
			aleatorio += letras.substring(rnum, rnum + 1);
		}
		return aleatorio;
	}

	fakeList(arr = [], iterate = 10) {
		var aux = []
		for (var i = iterate; i >= 0; i--) {
			aux.push(arr);
		}

		return aux
	}

	normalizeImagens(data = []){
		var aux = []

		data.forEach(function(el){
			if (el.original_source) {
                el.source = window.rota+"storage/app/imagens/" + el.source;
            } else {
                el.source = el.source;
            }
            aux.push(el)
		})

		return aux

	}

	getIncapsuledImagens(data = []){
		var aux = []
		data.forEach(function(el){
			aux.push(new Imagem(el))
		})

		return aux
	}

	getVideoEmbed(url){
            return url.split("=")[1]
	}

	makeMonth(data){

		data = data

		var mes = data.slice(4, 6)

		switch(mes){
			case '01':
			return 'Janeiro'
			break

			case '02':
			return 'Fevereiro'
			break

			case '03':
			return 'Março'
			break

			case '04':
			return 'Abril'
			break

			case '05':
			return 'Maio'
			break

			case '06':
			return 'Junho'
			break

			case '07':
			return 'Julho'
			break

			case '08':
			return 'Agosto'
			break

			case '09':
			return 'Setembro'
			break

			case '10':
			return 'Outubro'
			break

			case '11':
			return 'Novembro'
			break

			case '12':
			return 'Dezembro'
			break

			default:
			return 'Nenhum'
		}


	}
			relatorio(string){
				let aux = '<style>'+
				'.col-centered {'+
				  'display: table-cell;'+
				  'float: none;'+
				  'vertical-align: top;'+
				'}'+
				'</style>'+
				'<!DOCTYPE html>'+
				'<html>'+
				'<head>'+
					'<meta charset="utf-8">'+
					'<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">'+
					'<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">'+
					'<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>'+
					'<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>'+
					'<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>'+
					'<title>Relatório</title>'+
				'</head>'+
				'<style>'+
				'@media print '+
				'{'+
				  '#noprint { display:none; } '+
				  '#printHeader { display:block; } '+
				  'body { background: #fff; }'+
				'}'+
				'#printHeader{ display:none;} '+
				'.brd {'+
					'border:1px solid #000;'+
				'}'+
				'.placeholder {'+
					'width:300px;'+
					'height:50px;'+
					'background-color:#DDD;'+
				'}'+
				'.col-center-block {'+
					'float: none;'+
					'display: block;'+
					'margin-left: auto;'+
					'margin-right: auto;'+
				'}'+
				'</style>'+
				'<body><center><img alt="Conselho Regional do Estado de São Paulo - Quarta Região" width="200" src="https://www.crefsp.gov.br/public/img/crefsp.png"></center>'+ string +
				'<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>'+
				'</body>'+
				'</html>';

				// let aux = '<p>aaaaaa</p>';

				// var myWindow = window.open('data:text/html,' + encodeURIComponent(aux), '_blank');
				// myWindow.focus();

				var winPrint = window.open('', '', 'width='+screen.width+',height='+screen.height);
				winPrint.document.write(aux);

			}

	// fakeArvore(size = 6, recursive = 0){
	// 	var aux = new Pagina(), arr = []
	// 	for (var i = size; i >= 0; i--) {
	// 		if(recursive > 0){
	// 			arr = this.fakeArvore(1, recursive - 1)
	// 		}else{
	// 			arr = new Pagina()
	// 		}
	// 		aux.addChildren(arr);
	// 	}

	// 	return aux
	// }

	// makeArvore(arvore){
	// 	var isto = this, data = this.reverseArvore(arvore), estrutura = this.estruturaArvore(), aux = arvore.id ? data[arvore.id] : new Pagina()
	// 	if(estrutura.children.length){
	// 		estrutura.children.forEach(function(el){
	// 			aux.addChildren(isto.makeArvore(el, data))
	// 		})
	// 	}
	// 	return aux
	// }

	// reverseArvore(arr = []){
	// 	// console.log(arr)
	// 	var aux = [], isto = this
	// 	arr.children.forEach(function(el){
	// 		if(el.children.length){
	// 			aux = aux.concat(isto.reverseArvore(el))
	// 		}
	// 		el.children = []
	// 		aux.push(el)
	// 	})

	// 	return aux
	// }

	// estruturaArvore( el = $(".content-tree").first() ){
	// 	var isto = this
	// 	var estrutura = {
	// 		name : $(el).children('div').html(),
	// 		id : $(el).children('div').attr('id'),
	// 		children : []
	// 	}

	// 	$(el).children('ul').children('li').each(function(b){
	// 		estrutura.children.push(isto.estruturaArvore(this))
	// 	})

	// 	return estrutura
	// }
}


// classes de construcao da arvore
//classe mae de outros componentes
//segura conteudo e outras paginas
// class Pagina {
// 	constructor(name, source = false, children = [], html = false, lista = [], search = false, root = false, tabela = []) {
// 		this.name = name;
// 		this.source = source;
// 		this.children = children;
// 		this.html = html;
// 		this.lista = lista;
// 		this.search = search;
// 		this.root = root;
// 		this.tabela = tabela;
// 		this.childRoot = false
// 		this.open = false
// 		this.clicked = false
// 	}

// 	addChildren(child) {
// 		if (this.root && !this.html & !this.childRoot) {
// 			child.open = true
// 			this.childRoot = true
// 		}
// 		this.children.push(child)
// 	}

// 	addHtml(html) {
// 		this.html = html
// 	}

// 	setLista(lista) {
// 		this.lista = lista
// 		var aux = []

// 		if (this.html == false && this.getPessoas().length > 0) {
// 			var child = []
// 			this.getPessoas().forEach(function (el) {
// 				if (el.template) {
// 					aux = new Pagina(el.name)
// 					aux.addHtml(el.template)
// 					child.push(aux)
// 				}
// 			});
// 			this.children = child
// 		}
// 	}

// 	getLista() {
// 		return this.lista.lista
// 	}

// 	getEditorial() {
// 		return this.lista.editorial
// 	}

// 	getClube() {
// 		return this.lista.clube
// 	}


// 	getPessoas() {
// 		return this.lista.pessoa
// 	}

// 	getVagas() {
// 		return this.lista.vaga
// 	}

// 	getInputs() {
// 		return this.lista.inputs
// 	}

// 	getAccordion() {
// 		return this.lista.accordion
// 	}

// 	getMapa() {
// 		return this.lista.mapa
// 	}

// 	setTabela(tabela) {
// 		this.tabela = tabela
// 	}

// 	getTabela() {
// 		return this.tabela
// 	}

// 	getDestaques() {
// 		return this.lista.destaques
// 	}

// 	getNoticias() {
// 		return this.lista.noticias
// 	}

// 	getDestaquesEventos() {
// 		return this.lista.destaques_eventos
// 	}

// 	getEventos() {
// 		return this.lista.eventos
// 	}

// 	getBanners() {
// 		return this.lista.banners
// 	}

// 	getVideos() {
// 		return this.lista.videos
// 	}

// 	getAgendas() {
// 		return this.lista.agenda
// 	}

// 	setSearch(search) {
// 		this.search = search
// 	}

// 	getSearch() {
// 		return this.search
// 	}

// 	unclick() {
// 		this.children.forEach(function (el) {
// 			el.unclick()
// 		})
// 		this.clicked = false
// 	}

// }
