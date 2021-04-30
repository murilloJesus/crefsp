
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> CREF4/SP Administração Site </title>

  <!-- Icons-->
  <link href="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/@coreui/icons/css/coreui-icons.min.css"
    rel="stylesheet">
  <link href="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/flag-icon-css/css/flag-icon.min.css"
    rel="stylesheet">
  <link href="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/font-awesome/css/font-awesome.min.css"
    rel="stylesheet">
  <link
    href="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/simple-line-icons/css/simple-line-icons.css"
    rel="stylesheet">
  <!-- Main styles for this application-->
  <link href="{{ request()->getSchemeAndHttpHost() }}/public/css/all.css" rel="stylesheet">
  <link href="{{ request()->getSchemeAndHttpHost() }}/public/css/jquery-ui.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="{{ request()->getSchemeAndHttpHost() }}/public/css/style.css" rel="stylesheet">
  <link href="{{ request()->getSchemeAndHttpHost() }}/public/vendors/pace-progress/css/pace.min.css"
    rel="stylesheet">
  <link rel="shortcut icon" href="{{ request()->getSchemeAndHttpHost() }}/public/img/favicon.ico">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
  <div id="loading" ></div>
  <header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
      <img class="navbar-brand-full" src="{{ request()->getSchemeAndHttpHost() }}/public/img/icn_crefsp.png"
        width="98" height="50">
      <img class="navbar-brand-minimized" src="{{ request()->getSchemeAndHttpHost() }}/public/img/favicon.ico"
        width="30" height="30">
    </a>
    <ul class="nav navbar-nav d-md-down-none">
    </ul>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img class="img-avatar" src="{{ request()->getSchemeAndHttpHost() }}/public/img/avatar.png"
            alt="admin@bootstrapmaster.com">
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Conta</strong>
          </div>
          <a class="dropdown-item" href="{{ request()->getSchemeAndHttpHost() }}/api/mudarSenha">
            <i class="fa fa-key"></i> Mudar Senha</a>
          <a class="dropdown-item" href="{{ request()->getSchemeAndHttpHost() }}/api/logoutUser">
            <i class="fa fa-lock"></i> Sair</a>
        </div>
      </li>
    </ul>
  </header>
  <div class="app-body">
    @yield('menu')
    <main class="main">
      <!-- Breadcrumb-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
      </ol>
      <div class="container-fluid">
        @yield('content')
      </div>

    </main>

  </div>
  <footer class="app-footer">
    <!-- <div>
      <a href="https://coreui.io">CoreUI</a>
      <span>&copy; 2018 creativeLabs.</span>
    </div> -->
    <div class="ml-auto">
      <span>Desenvolvido por</span>
      <a href="https://evoluasempre.com.br">Evolua Sempre</a>
    </div>
  </footer>
  <div id="pdf">
    
  </div>
  <?php

    if( isset($editar) ) : 

    ?>
      <script>
        window.editar = {{$editar}}
      </script>
    <?php
  
    endif;

  ?>
  <!-- CoreUI and necessary plugins-->
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/jquery/dist/jquery.min.js"></script>

  <script src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/popper.js/dist/umd/popper.min.js">
  </script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/bootstrap/dist/js/bootstrap.min.js">

  </script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/pace-progress/pace.min.js"></script>
  <script
    src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js">
  </script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/@coreui/coreui/dist/js/coreui.min.js">
  </script>
  <!-- Plugins and scripts required by this view-->
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/chart.js/dist/Chart.min.js"></script>
  <script
    src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js">
  </script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/js/main.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/js/jquery-ui.js"></script>
  {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/js/axios.min.js"></script>
  {{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}

  {{-- <script src="{{ request()->getSchemeAndHttpHost() }}/public/js/jspdf/jspdf.js"></script>   --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/js/vue.js"></script>
  @yield('templates')
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/js/vue_app.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/controller/vue_controller_gerenciador.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/controller/vue_controller_gerenciador_filho.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/controller/vue_controller_gerenciador_pagina.js"></script>

  <script src="{{ request()->getSchemeAndHttpHost() }}/public/controller/vue_controller_datapresent.js"></script>

  <script src="{{ request()->getSchemeAndHttpHost() }}/public/controller/vue_controller_input.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/controller/vue_controller_input_selectors.js"></script>

  <script src="{{ request()->getSchemeAndHttpHost() }}/public/controller/vue_controller_output.js"></script>
  
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/controller/vue_controller_form.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/controller/vue_controller_form_pagina.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/controller/vue_controller_form_filho.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/controller/vue_controller_form_link.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/controller/vue_controller_form_search.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/controller/vue_controller_form_upload.js"></script>


  <script src="{{ request()->getSchemeAndHttpHost() }}/public/js/js.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/public/js/class.js"></script>
  <script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
  {{-- <script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> --}}
  {{-- <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script> --}}
</body>

</html>