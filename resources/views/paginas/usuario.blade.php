@extends('elementos.templates')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="app" class="container-fluid">
	<div class="animated fadeIn">
		<gerenciar-usuarios-item :controller="this">
		</gerenciar-usuarios-item>
	</div>
</div>
@stop

{{-- <div class="card">
	<div class="card-body">
		<ul class="list-group">
			<li class="list-group-item">
				<h3>Dados</h3>
				<form class="form-horizontal" action="" method="post">
					<div class="form-group row">
						<div class="col-md-12">
							<div class="input-group">
								<span class="input-group-prepend">
									<button class="btn btn-danger" type="button">
										<i class="fa fa-header"></i></button>
								</span>
								<input class="form-control" type="text" name="input1-group2"
									placeholder="Título">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-4">
							<div class="input-group">
								<span class="input-group-prepend">
									<button class="btn btn-danger" type="button">
										<i class="fa fa-header"></i></button>
								</span>
								<input class="form-control" type="text" name="input1-group2" placeholder="CPF">
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group">
								<span class="input-group-prepend">
									<button class="btn btn-danger" type="button">
										<i class="fa fa-header"></i></button>
								</span>
								<input class="form-control" type="text" name="input1-group2"
									placeholder="CREFºs">
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group">
								<input class="form-control" type="text" name="input1-group2"
									placeholder="Tipo de Usuario">
								<div class="input-group-append">
									<button class="btn btn-secondary dropdown-toggle" type="button"
										data-toggle="dropdown" aria-expanded="false">
										<span class="caret"></span>
									</button>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
										style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
										<a class="dropdown-item" href="#">Administrador</a>
										<a class="dropdown-item" href="#">Home</a>
										<a class="dropdown-item" href="#">Noticias e Eventos</a>
										<a class="dropdown-item" href="#">Licitações</a>
										<a class="dropdown-item" href="#">Outro</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</li>
			<li class="list-group-item">
				<h3>Credenciais</h3>
				<form class="form-horizontal" action="createUser" method="get">

					<div class="form-group row">
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-prepend">
									<button class="btn btn-danger" type="button">
										<i class="fa fa-user"></i></button>
								</span>
								<input class="form-control" required type="text" name="name" placeholder="Nome">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-prepend">
									<button class="btn btn-danger" type="button">
										@
									</button>
								</span>
								<input class="form-control" type="email" name="email" placeholder="Email">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-prepend">
									<button class="btn btn-danger" type="button">
										<i class="fa fa-key"></i></button>
								</span>
								<input class="form-control" type="password" required name="password"
									placeholder="Senha">
								<span class="input-group-append">
									<button class="btn btn-secondary" type="button">
										<i class="fa fa-eye"></i></button>
								</span>
							</div>
						</div>
					</div>
			</li>
		</ul>
	</div>
	<div class="card-footer">
		<button class="btn btn-sm btn-success" type="submit">
			<i class="fa fa-dot-circle-o"></i> Enviar</button>
		<button class="btn btn-sm btn-secondary" type="reset">
			<i class="fa fa-ban"></i> Resetar </button>
		</form>
	</div>
</div> --}}