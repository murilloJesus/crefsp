<!doctype html>

<html lang="pt-br">

	<head>

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

		<?php



    $rota = '';



    require "public/elementos/head.php";



    require "public/elementos/css.phtml";



    ?>

	</head>

  	<body>

    <?php require "public/elementos/mobile.php"; ?>



    <?php require "public/elementos/header.php"; ?>



    <?php require "public/elementos/menu.php"; ?>



		<?php require "public/paginas/home.php"; ?>



		<?php require "public/elementos/footer.php"; ?>



    <?php require "public/elementos/foot.php"; ?>



    <div style="display: none;" id="json">

      {{ $home }}

    </div>



  </body>



    <script type="text/javascript">

      window.rota = '<?=$rota?>'

   </script>



    <script type="text/javascript">

 	$( ".menu-anchor" ).click(function() {
		$(".menu-shiffter").css("transform","translateX(0)").show();
	});
 	$( ".button-menu-shiffter" ).click(function() {
		$(".menu-shiffter").toggle("slide", {direction: "left"});
	});

    var treeData = new Pagina($.parseJSON($('#json').html()), true)



		Vue.component('home-component', {

		  template: '<div class="event-lg">'+

                    '<div class="event" v-for="evento in data">'+

                      '<p class="event-head">'+

                        '<i class="fa fa-calendar" v-if="evento.data"></i> @{{ evento.dataFormatada }}'+

                      '</p>'+

                      '<a :href="evento.href" class="event-desc"> '+

                      '<p>'+

                        '<b class="red" > @{{ evento.categoria }} </b> <i class="fas fa-angle-double-right"></i>'+

                          '@{{ evento.name }}'+

                        '</p>'+

                      '</a>'+

                    '</div>'+

                  '</div>',

		  props: {

		    data: Array,

		  }

		})



    Vue.component('multimidia-item', {

      template: '<div class="videos" v-if="data">'+

                  '<div class=" video-box" v-for="video in data">'+

                    '<a :href="video.href" target="_BLANK">'+

                      '<img class="video-image" :src="video.imagem.source">'+

                      '<p class="video-name">'+

                        '@{{video.name}}'+

                      '</p>'+

                    '</a>'+

                  '</div>'+

                '</div>',

      props: {

        data: Array,

      }

    })



		Vue.component('noticias-item', {

		  template: '<div>'+

                  '<p class="title-section" >'+

                    'Notícias'+

                  '</p>'+

                  '<div class="noticia" v-for="noticia in data">'+

                      '<p class="p-new-cabecario">'+

                        '<i class="fa fa-calendar"></i> @{{ noticia.dataFormatada }} '+

                      '</p>'+

                      '<a :href="noticia.href" class="chamada-noticia">'+

                        '<p>'+

                          '<b class="red" v-if="noticia.destaque"> Destaques <i class="fas fa-angle-double-right"></i></b>'+

                          '<b class="red" v-else-if="noticia.categoria"> @{{ noticia.categoria }} <i class="fas fa-angle-double-right"></i></b>'+

                         '@{{ noticia.name }}'+

                        '</p>'+

                      '</a>'+

                  '</div>'+

                '</div>',

		  props: {

		    data: Array,

		  }

		})



    Vue.component('banner-item', {

      template: '<div class="carousel-lg">'+

                      '<div class="container">'+

                        '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">'+

                        '<ol class="carousel-indicators">'+

                          '<li data-target="#carouselExampleIndicators" :class="{ active : index == 0}" :data-slide-to="index" v-for="(el, index) in data"></li>'+

                        '</ol>'+

                        '<div class="carousel-inner">'+

                          '<a class="carousel-item carousel-fix" :class="{ active : index == 0}" v-for="(el, index) in data" :href="el.href" :style="el.imagem.backgroundSource"></a>'+

                        '</div>'+

                        '<a class="carousel-control-prev" v-if="data.length > 1" href="#carouselExampleIndicators" role="button" data-slide="prev">'+

                          '<div class="arrowholder"><i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i></div>'+

                        '</a>'+

                        '<a class="carousel-control-next"  v-if="data.length > 1" href="#carouselExampleIndicators" role="button" data-slide="next">'+

                          '<div class="arrowholder"><i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></div>'+

                        '</a>'+

                      '</div> '+

                      '</div>'+

                  '</div>',

      props: {

        data: Array,

      }

    })



    Vue.component('acesso-item', {

      template: '<div class="container">'+

                  '<p class="title-section">Acesso Rápido</p>'+

                  '<div class="itens-rapido-holder">'+

                    '<div class="itens-rapido">'+

                      '<div class="item-rapido" v-for="acesso in data">'+

                        '<div>'+

                          '<a href="javascript: void(0);" @click="count(acesso.id, acesso.source)">'+

                            '<div class="img-item-rapido" :style="acesso.imagem.backgroundSource"></div>'+

                          '</a>'+

                        '</div>'+

                      '</div>'+

                    '</div>'+

                  '</div>'+

                  '<div class="seemore">'+

                  '<a href="javaScript: void();" data-target="itens-rapido"> VEJA MAIS..</a>'+

                  '</div>'+

                '</div>',

      props: {

        data: Array,

      },

      methods: {

        async count(id, redir){

						data = await axios.get(

							window.rota + 'acessos/count/'+id

						).then(function(response) {

              window.location = redir

							return response.data.data

						}).catch(function(){

            })



				}

      }

    })



$(function(){

		var app = new Vue({

			  el: '#home_id',

			  data: {

          search: '',

			  	item : treeData

			  },

        mounted() {

          $("#home_id").show();

          initiate();

        },

			  computed: {

			  	eventos() {

			  		return this.item.getEventos().length ? this.item.getEventos().filter(evento => {

              return evento.categoria.toLowerCase().includes(this.search.toLowerCase())

            }).slice(0, 4) : false

			  	},

          noticias(){

            return this.item.getNoticias().length ? this.item.getNoticias().slice(0, 7) : false

          },

          banners(){

            return this.item.getBanners().length ? this.item.getBanners() : false

          },

          acessos(){

            return this.item.getAcessos().length ? this.item.getAcessos() : false

          },

          multimidia(){

            return this.item.getVideos().length ? this.item.getVideos().slice(0, 4) : false

          },

      },

			methods:{

			  	cat_evento(search) {

			  		return this.search = search;

			  	},

			  	outros() {

			  		return this.search = '';

          },



			  }

			})

  });

  </script>

</html>
