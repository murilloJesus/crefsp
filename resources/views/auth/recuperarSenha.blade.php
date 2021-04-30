<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CREF4/SP Administração - Login</title>
    
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="{{ request()->getSchemeAndHttpHost() }}/public/css/style.css" rel="stylesheet">
  <link href="{{ request()->getSchemeAndHttpHost() }}/public/vendors/pace-progress/css/pace.min.css"
    rel="stylesheet">
  <link rel="shortcut icon" href="{{ request()->getSchemeAndHttpHost() }}/public/img/favicon.ico">

    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">

                @if (session('naoExiste'))
                    <div class="alert alert-info">
                        {{ session('naoExiste') }}
                    </div>
                @endif      
                <h1>Redefinir senha</h1>
                <p class="text-muted">Entre seu email</p>
                <form action="/admin/login/redefinir-senha" method="post">
                    @csrf
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="icon-user"></i>
                        </span>
                    </div>

                    <input class="form-control" name="email" type="email" placeholder="email@email.com" required>
                    </div>
                    
                    <div class="row">
                      <div class="col-6">
                          <button class="btn btn-primary px-4" type="submit">Enviar</button>
                      </div>
                    </div>
                </form>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Sign up</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <button class="btn btn-primary active mt-3" type="button">Register Now!</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/pace-progress/pace.min.js"></script>
    <script src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="{{ request()->getSchemeAndHttpHost() }}/public/node_modules/@coreui/coreui/dist/js/coreui.min.js">
  </body>
  
</html>
