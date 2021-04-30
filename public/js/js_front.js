
		function initiate(){

				$('.box-event').click(function(){
					$('.box-event').removeClass('clicked');
					$(this).addClass('clicked');
				})


				$("#mobile").css('height', (screen.height)+'px')

				$('.iconesearch').click(function(){
					var request = $('#pesquisar-site').val().replace(/ /g, '-').replace(/\//g, '-#-')
					if(request != ''){
						window.location.href = "/busca/"+request; 
					}else{
						request = $('#pesquisar-mobile').val().replace(/ /g, '-').replace(/\//g, '-#-')
						if(request != ''){
							window.location.href = "/busca/"+request; 
						}
					}
				})

				$('#pesquisar-site').keypress(function(event){
					var keycode = (event.keyCode ? event.keyCode : event.which);
					if(keycode == '13'){
						var request = $('#pesquisar-site').val().replace(/ /g, '-').replace(/\//g, '-#-')
						if(request != ''){
							window.location.href = "/busca/"+request; 
						}
					}
				});

				$('#pesquisar-mobile').keypress(function(event){
					var keycode = (event.keyCode ? event.keyCode : event.which);
					if(keycode == '13'){
						var request = $('#pesquisar-mobile').val().replace(/ /g, '-').replace(/\//g, '-#-')
						if(request != ''){
							window.location.href = "/busca/"+request; 
						}
					}
				});

		    	$( ".accordion" ).accordion({
					icons: { "header": false, "activeHeader": false }
				  });

			  	$(".holderform-searchtable").show();


				$('.conteudo-lg').on('click', function(e){
					    $('.menu-shiffter').removeClass('menu-active');
					});

		        $(".roll").on("click", function(){
		            $('html, body').animate({
		              scrollTop: ($('.folder-header').offset().top)
		          },500);
		        })

		        var sc_sz2 = 320;
				$( window ).scroll(function() {
				  	if ( sc_sz2  <= $(window).scrollTop() ){
				  		$('.holderRoll').addClass('fixed-roll');
				  	}else{
				  		$('.holderRoll').removeClass('fixed-roll');
				  	}
				});

		        var sc_sz_mb = 10 + $(".header-mb").height();
		        $( window ).scroll(function() {
		          	if ( sc_sz_mb  <= $(window).scrollTop() ){
		          		$('.mobile-head').addClass('fixed-menu-mobile');
		          	}else{
		          		$('.mobile-head').removeClass('fixed-menu-mobile');
		          	}
		        });

		        var sc_sz = 60 + $(".header-lg").height();
		        $( window ).scroll(function() {
		          	if ( sc_sz  <= $(window).scrollTop() ){
		          		$('.menu-lg').addClass('fixed-menu');
		          		$('.drop-menu-sub').addClass('margintop52px');
		          	}else{
		          		$('.menu-lg').removeClass('fixed-menu');
		          		$('.drop-menu-sub').removeClass('margintop52px');
		          	}
		        });

				$(".conteudo-lg .titulo").css('display', 'flex');

				// categoria de eventos
		        $("#view-method-event").click(function(){
		            var categoria = $(".cat-event-lg")
		            var evento = $(".event-lg")
		            $(this).toggleClass('fa-boxes');
		            $(this).toggleClass('fa-list');
		            if( (evento.css("display") !== 'block') || (categoria.css("display") !=='block')){
		            	categoria.toggle();
		            	evento.toggle();
		            }
		        })
		        
		        $(".box-event").click(function(){
		            var categoria = $(".cat-event-lg")
		            var evento = $(".event-lg")
		            $("#view-method-event").toggleClass('fa-boxes');
		            $("#view-method-event").toggleClass('fa-list');
		            if( (evento.css("display") !== 'block') || (categoria.css("display") !=='block')){
		            	categoria.toggle();
		            	evento.toggle();
		            }
		        })		

				// datapicker da licitacoes
				$( ".calendario-up" ).datepicker({
				    dateFormat: 'dd/mm/yy',
				    altField: '#dataUp',
				    altFormat: 'yymmdd',
				    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
				    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
				    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
				    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
				    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
				    onSelect: function(){
					    atualizarVuePicker('content')
					}
				});

				$( ".calendario-to" ).datepicker({
				    dateFormat: 'dd/mm/yy',
				    altField: '#dataTo',
				    altFormat: 'yymmdd',
				    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
				    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
				    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
				    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
				    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
				    onSelect: function(){
						atualizarVuePicker('content')
					},
				});	  	

				// metodo de visualização lista e tabela
		        $("#view-method").click(function(){
		            var pai = $(this).parent().parent().parent();
		            $(this).toggleClass('fa-list');
		            $(this).toggleClass('fa-th');
		            pai.find(".folder").toggle();
		            pai.find(".list").toggle();
		        })
			  	
			  	/*GALERIA CONTROLLERS*/
				 $('.slider-single').slick({
				    slidesToShow: 1,
				    slidesToScroll: 1,
				    arrows: true,
				    nextArrow: '<div class="nav-galeria"><i class="fa fa-chevron-right"></i></div>',
				    prevArrow: '<div class="nav-galeria"><i class="fa fa-chevron-left"></i></div>',
				    fade: false,
				    adaptiveHeight: true,
				    infinite: false,
				    useTransform: true,
				    speed: 400,
				    cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
				 });

				 $('.slider-nav')
				    .on('init', function(event, slick) {
				        $('.slider-nav .slick-slide.slick-current').addClass('is-active');
				    })
				    .slick({
				        slidesToShow: 4,
				        slidesToScroll: 4,
				        dots: false,
				        arrows: true,
				        nextArrow: '<div class="nav-galeria"><i class="fa fa-chevron-right"></i></div>',
				        prevArrow: '<div class="nav-galeria"><i class="fa fa-chevron-left"></i></div>',
				        focusOnSelect: false,
				        infinite: false,
				        responsive: [{
				            breakpoint: 1024,
				            settings: {
				                slidesToShow: 4,
				                slidesToScroll: 4,
				            }
				        }, {
				            breakpoint: 640,
				            settings: {
				                slidesToShow: 3,
				                slidesToScroll: 3,
				            }
				        }, {
				            breakpoint: 420,
				            settings: {
				                slidesToShow: 2,
				                slidesToScroll: 2,
				        }
				        }]
				    });

				 $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
				    $('.slider-nav').slick('slickGoTo', currentSlide);
				    var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
				    $('.slider-nav .slick-slide.is-active').removeClass('is-active');
				    $(currrentNavSlideElem).addClass('is-active');
				 });

				 $('.slider-nav').on('click', '.slick-slide', function(event) {
				    event.preventDefault();
				    var goToSingleSlide = $(this).data('slick-index');

				    $('.slider-single').slick('slickGoTo', goToSingleSlide);
				 });

				/*Video*/		
				$('.thumb-video').click(function(element) {
				    var attr = $(this).attr('data-video');
				    $('#idiframe').attr('src', "https://www.youtube.com/embed/" + attr + "?showinfo=0&autoplay=1");
				});

				var attr = $(".thumb-video").first().attr('data-video');
				$('#idiframe').attr('src', "https://www.youtube.com/embed/" + attr + "?showinfo=0&autoplay=1");

				/*Galeria*/		
				$('.thumb-galeria').click(function(element) {
				    var attr = $(this).attr('data-galeria');
				    $('#main-galeria').attr('style', attr);
				});

				var attr = $(".thumb-galeria").first().attr('data-galeria');
				$('#main-galeria').attr('style', attr);

			  	/*MENU*/
			  		$(".menu-down").hover( function(){
			  			//pega id
					 	var data = $(this).data("toggle");
					 	//mostra div id
					 	$("#"+data).toggle();
					 	//esconde outras
					 	$(".sub-menu-list").not("#"+data).hide();
					 	
					 	var displaymenu = $("#"+data).css("display");

					 	if(displaymenu != "none") {
					 		$(this).addClass("ativo");
					 		$(".menu-down").not(this).removeClass("ativo");
					 	}else{
					 		$(".menu-down").removeClass("ativo");

					 	}
					});

					if ($(".menu-down:hover").length > 0) {
						 	var t = $(".menu-down:hover")
				  			//pega id
						 	var data = t.data("toggle");
						 	//mostra div id
						 	$("#"+data).toggle();
						 	//esconde outras
						 	$(".sub-menu-list").not("#"+data).hide();
						 	
						 	var displaymenu = $("#"+data).css("display");

						 	if(displaymenu != "none") {
						 		t.addClass("ativo");
						 		$(".menu-down").not(t).removeClass("ativo");
						 	}else{
						 		$(".menu-down").removeClass("ativo");

						 	}
					}


					$('.menu-anchor').on('click', function(e){
					    $('.menu-shiffter').toggleClass('menu-active');
					    e.preventDefault();
					});

					$('.sub-menu ul').hide();
					$(".sub-menu a").click(function () {
						$(this).parent(".sub-menu").find("ul").toggle();
						$(this).find(".right").toggleClass("fa-chevron-right fa-chevron-down");
					});

			  	/*VER MAIS ACESSO RAPIDO*/
					$(".seemore a").click(function(){
						$(".itens-rapido").css("height", "auto");
						$(".acesso-rapido-lg .container").css("height", "auto");
						$(this).hide();
					})

			  	/*MODAL FEXAR E ABRIR*/
					$(".close").click(function(){
						var modal = $("#myModal");
						modal.css("display", "none");
					});

					$(".myImg").click(function(){
					 	var modal = $("#myModal");
					 	modal.css("display", "block"); 
					});

		}


		function share(item, method) {

			a = window.location.href;
			b = a.split('/');
			d = item.id + '-' + item.name.replace(/ /g, '-').replace(/\//g, '-')
			

			if(method === 'create'){	
				c = 'http://' + b[2] + '/' +d;
			}else if(method === 'update'){
				c = 'http://' + b[2] + '/' +d;
				$("#share").jsSocials("destroy");
			}else{
				c = 'http://' + b[2] + '/'+method+'/'+d;
			}
			

			$("#share").jsSocials({
				via: "crefsp",
				showLabel: false,
				text: item.name,   
				url: c,
				showCount: true,
				shareIn: "popup",
				shares: ["twitter", "facebook", "whatsapp"]
			});
		}

		function sumirDestaques(){
			$('.hideonfocus').fadeOut(500);
			$('.margin').css('margin-top', '30px');
		}

		function aparecerDestaques(){
			$('.hideonfocus').fadeIn(500);
			$('.margin').css('margin-top', '0');
		}

		function templateUpdated(){
			$('.thumb-video').off("click")
			$('.thumb-video').click(function(element) {
			    var attr = $(this).attr('data-video');
			    $('#idiframe').attr('src', "https://www.youtube.com/embed/" + attr + "?showinfo=0&autoplay=1");
			});

			if($( ".accordion" ).accordion( "instance" )){
				$(".accordion").accordion("destroy")
			}

			$('.accordion').accordion({
				icons: { "header": false, "activeHeader": false }
			  })

			evento_cep() 
		}

		function templateBeforeUpdate(){
			
		}

		function sizeofscreen(){
			return $(window).width()
		}

		function maxData(valor){
			var ano, mes, dia;
			Object.keys(valor).forEach(function(index, el, val){
				ano = index;
				Object.keys(valor[ano]).forEach(function(index, el, val){
					mes = index;
					Object.keys(valor[ano][mes]).forEach(function(index, el, val){
						dia = index;
					})
				})
			})
			
			mes-- // importante para o indice 0 da Date
			return new Date(ano, mes, dia)
		}


		function minData(valor){
			var ano, mes, dia;
			ano = Object.keys(valor)[0];
			mes = Object.keys(valor[ano])[0];
			dia = Object.keys(valor[ano][mes])[0]
			
			mes-- // importante para o indice 0 da Date
			return new Date(ano, mes, dia)
		}



		function atualizarVuePicker(){
			if( $("#datapicker").val() )
				content.datarange = $("#datapicker").val() 	
			if( $("#rangeUp").val() )
				content.rangeUp = $("#rangeUp").val()	
			if( $("#rangeTo").val() )
				content.rangeTo = $("#rangeTo").val()	
			if( $("#dataUp").val() )
				content.dataUp = $("#dataUp").val()	
			if( $("#dataTo").val() )
				content.dataTo = $("#dataTo").val()	
		}

		function evento_cep() {
			$("#CEP").off('blur')
            //Quando o campo cep perde o foco.
            $("#CEP").blur(function() {
                //Nova variável "CEP" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#Endereço").val("...");
                        $("#Bairro").val("...");
                        $("#Cidade").val("...");
                        $("#Estado").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#Endereço").val(dados.logradouro);
                                $("#Bairro").val(dados.bairro);
                                $("#Cidade").val(dados.localidade);
                                $("#Estado").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                alert("CEP não encontrado.");
                            }
                        });
                    } 
                    else {
                        alert("Formato de CEP inválido.");
                    }
                } 
                else {
                }
            });
        }

		
		/*BUSCA ABRIR*/
	  	function toggleSearch(){
	  		$(".holderform-searchtable").slideToggle();
		}

		function initFldrBf(){// AQUII
	  		$(".holderform-searchtable").show();
            $('html, body').animate({
              scrollTop: ($('.folder-content').offset().top - 203)
        	},500);	
		}

		function initFldrAf(){

			 $( ".calendario-up" ).datepicker({
			    dateFormat: 'dd/mm/yy',
			    altField: '#dataUp',
			    altFormat: 'yymmdd',
			    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
			    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
			    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
			    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
			    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
      			changeYear: true,
      			changeMonth: true,
			    onSelect: function(){
				    atualizarVuePicker('content')
				}
			});
			$( ".calendario-to" ).datepicker({
			    dateFormat: 'dd/mm/yy',
			    altField: '#dataTo',
			    altFormat: 'yymmdd',
			    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
			    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
			    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
			    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
			    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
      			changeYear: true,
      			changeMonth: true,
			    onSelect: function(){
					atualizarVuePicker('content')
				},
			});
		}
		
		function openHorarios(){
			$(".horario").removeClass('selected')
			$(".horario").off("click")			
			$(".horario").on("click", function(){
				if(!$(this).hasClass('invalid')){
					$(".horario").removeClass('selected')
					$(this).addClass('selected')
				}
			})
		}

/*GOOGLE MAPS*/
google.maps.event.addDomListener(window, 'load', init);

function init() {

	// var map = L.map('map').setView([-23.5462416,-46.6385919], 16);
	// L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=dthKCCqExwEEg6JfpVqZ', {
	// 	attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
	// }).addTo(map);
	// marker = L.marker([-23.5462416,-46.6385919]).addTo(map);
	// console.log(map);
	
    // var mapOptions = {
    //     zoom: 14,
    //     center: new google.maps.LatLng(-23.5462416,-46.6385919),
    //     styles: []
    // };

    // var mapElement = document.getElementById('map');

    // var map = new google.maps.Map(mapElement, mapOptions);

    // var marker = new google.maps.Marker({
    //     position: new google.maps.LatLng(-23.5462416,-46.6385919),
    //     map: map,
    //     title: 'CREF4/SP'
    // });

	
	var locations = window.objeto_mapa;
	// console.log(window);
	
    // var mapOptions = {
    //     zoom: 6,
    //     center: new google.maps.LatLng(-23.5462416,-46.6385919),
    //     styles: []
    // };

    // var mapElement = document.getElementById('map2');

    // var map = new google.maps.Map(mapElement, mapOptions);

    // var infowindow = new google.maps.InfoWindow();

    // var marker, i;

    // for (i = 0; i < locations.length; i++) {  
    //   marker = new google.maps.Marker({
    //     position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    //     map: map
    //   });

    //   google.maps.event.addListener(marker, 'click', (function(marker, i) {
    //     return function() {
    //       infowindow.setContent(locations[i][0]);
	// 	  infowindow.open(map, marker);
	// 	//   console.log(marker);
		  
    //     }
    //   })(marker, i));
	// }

	var map = L.map('map').setView([-23.5462416,-46.6385919], 6);
	L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=dthKCCqExwEEg6JfpVqZ', {
		attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
	}).addTo(map);

	
    for (i = 0; i < locations.length; i++) {  
	  marker = L.marker([locations[i][1], locations[i][2]]).addTo(map);
	  marker.bindPopup(locations[i][0]);
	}
}

