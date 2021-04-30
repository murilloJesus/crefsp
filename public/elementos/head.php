	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="format-detection" content="telephone=no">

        <script src='https://www.google.com/recaptcha/api.js'></script>
		<!-- <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"></script>
		<script>
			Es6Promise.polyfill()
		</script> -->
		
	    <!-- Bootstrap CSS -->
	    <link href="<?= $rota ?>/public/css/fontsans.css" rel="stylesheet">
	    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> -->
        <link href="<?= $rota ?>/public/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		
		
		
		
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAk2gZLXWMTkxDRVubi8kl7Mix7Zc7RtQ4"></script>
		<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />

		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
		
		<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
		<link rel="stylesheet" href="<?= $rota ?>/public/css/all.css">
		<link rel="stylesheet" href="<?= $rota ?>/public/css/fontawesome-4.7.css"> <!--font awesome 4-->
		<!-- <link rel="stylesheet" href="https://use.fontawesome.com/01f35a5da2.css"> font awesome 4 -->
		<!-- <script src="https://use.fontawesome.com/aab14cd81a.js"></script> -->
	   	
	   	<!-- Jquery Ui Css -->
		<link href="<?= $rota ?>/public/css/jquery-ui.css" rel="stylesheet">
		
    	<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" /> -->

	   	<!-- Galeria Plugins -->
	    <link rel="stylesheet" type="text/css" href="<?= $rota ?>public/css/slick.css">
	    <link rel="stylesheet" type="text/css" href="<?= $rota ?>public/css/slick-theme.css">

	    <!-- Our CSS-->		
	    <link rel="stylesheet" type="text/css" href="<?= $rota ?>public/css/css.css">
	    <link rel="stylesheet" type="text/css" href="<?= $rota ?>public/css/home-elements.css">
	    <link rel="stylesheet" type="text/css" href="<?= $rota ?>public/css/mobile-elements.css">
	    <link rel="stylesheet" type="text/css" href="<?= $rota ?>public/css/component-elements.css">
	    <link rel="stylesheet" type="text/css" href="<?= $rota ?>public/css/media-queries.css">

	    <link rel="stylesheet" type="text/css" href="<?= $rota ?>public/css/jssocials.css">
	    <link rel="stylesheet" type="text/css" href="<?= $rota ?>public/css/jssocials-theme-plain.css">
		
		<link rel="stylesheet" type="text/css" href="<?= $rota ?>public/css/contrast.css">

	    <title>CREF4/SP | Conselho Regional de Educação Física da 4ª Região | Estado de São Paulo - O CREF4/SP é órgão de representação, normatização, disciplina, defesa e fiscalização dos Profissionais de Educação Física, bem como das Pessoas Jurídicas prestadoras de serviços nas áreas de atividades físicas, desportivas e similares.</title>
	    <link rel="shortcut icon" href="img/favicon.ico">

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146919286-1"></script> -->
		<!-- <script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-146919286-1');
		</script> -->
		<script type="text/javascript">
			function fMasc(objeto,mascara) {
				obj=objeto
				masc=mascara
				setTimeout("fMascEx()",1)
			}
			function fMascEx() {
				obj.value=masc(obj.value)
			}
			function mTel(tel) {
				tel=tel.replace(/\D/g,"")
				tel=tel.replace(/^(\d)/,"($1")
				tel=tel.replace(/(.{3})(\d)/,"$1)$2")
				if(tel.length == 9) {
					tel=tel.replace(/(.{1})$/,"-$1")
				} else if (tel.length == 10) {
					tel=tel.replace(/(.{2})$/,"-$1")
				} else if (tel.length == 11) {
					tel=tel.replace(/(.{3})$/,"-$1")
				} else if (tel.length == 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				} else if (tel.length > 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				}
				return tel;
			}
			function mCNPJ(cnpj){
				cnpj=cnpj.replace(/\D/g,"")
				cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
				cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
				cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
				cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
				return cnpj
			}
			function mCPF(cpf){
				cpf=cpf.replace(/\D/g,"")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
				return cpf
			}
			function mCEP(cep){
				cep=cep.replace(/\D/g,"")
				cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
				cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
				return cep
			}
			function mNum(num){
				num=num.replace(/\D/g,"")
				return num
			}
		</script>