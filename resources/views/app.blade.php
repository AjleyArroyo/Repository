<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="apple-touch-icon" sizes="76x76" href="img/icono-banner.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/icono-banner.png">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title>Catalogo</title>

	{!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/app.css')!!}
	{!!Html::style('css/animate.min.css')!!}
	{!!Html::style('css/paper-dashboard.css')!!}
	{!!Html::style('css/demo.css')!!}


	<!-- Fonts and icons-->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	{!!Html::style('css/themify-icons.css')!!}
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

		<!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->

		<div class="sidebar-wrapper">
			<div class="logo">
				<a href="http://www.creative-tim.com" class="simple-text">
					PANEL
				</a>
			</div>

			<ul class="nav">
				<li class="active">
					<a href="home">
						<i class="ti-home"></i>
						<p>Inicio</p>
					</a>
				</li>
				<li>
					<a href="catalogos">
						<i class="ti-book"></i>
						<p>Catalogos</p>
					</a>
				</li>
				<li>
					<a href="categorias">
						<i class="ti-view-list-alt"></i>
						<p>Categorias</p>
					</a>
				</li>
				<li>
					<a href="muebles">
						<i class="ti-dropbox"></i>
						<p>Muebles</p>
					</a>
				</li>
				<li>
					<a href="sucursals">
						<i class="ti-direction"></i>
						<p>Sucursal</p>
					</a>
				</li>
				<li>
					<a href="ubicacions">
						<i class="ti-map"></i>
						<p>Ubicacion</p>
					</a>
				</li>

			</ul>
		</div>
	</div>
	<div class="main-panel">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar bar1"></span>
						<span class="icon-bar bar2"></span>
						<span class="icon-bar bar3"></span>
					</button>
					<a class="navbar-brand" href="#">Catalogo con Realidad Aumentada</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li>
								<a href="/auth/login" class="dropdown-toggle">
									<i class="ti-key"></i>
									<p>Iniciar Sesion</p>
								</a>
							</li>
							<li><a href="/auth/register" class="dropdown-toggle" >
									<i class="ti-receipt"></i>
									<p>Registrar</p>
								</a>
							</li>
						@else
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="ti-panel"></i>
								<p>Stats</p>
							</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="ti-bell"></i>
								<p class="notification">5</p>
								<p>Notifications</p>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Notification 1</a></li>
								<li><a href="#">Notification 2</a></li>
								<li><a href="#">Notification 3</a></li>
								<li><a href="#">Notification 4</a></li>
								<li><a href="#">Another notification</a></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="ti-user"></i>
								<p>{{ Auth::user()->name }}</p>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="/auth/logout">Salir</a></li>
							</ul>
						</li>
						@endif
					</ul>

				</div>
			</div>
		</nav>
		@yield('content')
		<footer class="footer">
		<div class="container-fluid">
			<nav class="pull-left">
				<ul>

					<li>
						<a href="http://www.creative-tim.com">
							Creative Tim
						</a>
					</li>
					<li>
						<a href="http://blog.creative-tim.com">
							Blog
						</a>
					</li>
					<li>
						<a href="http://www.creative-tim.com/license">
							Licenses
						</a>
					</li>
				</ul>
			</nav>
			<div class="copyright pull-right">
				&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
			</div>
		</div>
	</footer>
	</div>
</div>



</body>
		<!--   Core JS Files   -->
		{!!Html::script('js/jquery-1.10.2.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}

		<!--  Checkbox, Radio & Switch Plugins -->
{!!Html::script('js/bootstrap-checkbox-radio.js')!!}

		<!--  Charts Plugin -->
{!!Html::script('js/chartist.min.js')!!}


		<!--  Notifications Plugin    -->
{!!Html::script('js/bootstrap-notify.js')!!}


		<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

		<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
{!!Html::script('js/paper-dashboard.js')!!}


		<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
{!!Html::script('js/demo.js')!!}

<script>
	$(function() {

		// We can attach the `fileselect` event to all file inputs on the page
		$(document).on('change', ':file', function() {
			var input = $(this),
					numFiles = input.get(0).files ? input.get(0).files.length : 1,
					label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			input.trigger('fileselect', [numFiles, label]);
		});

		// We can watch for our custom `fileselect` event like this
		$(document).ready( function() {
			$(':file').on('fileselect', function(event, numFiles, label) {

				var input = $(this).parents('.input-group').find(':text'),
						log = numFiles > 1 ? numFiles + ' files selected' : label;

				if( input.length ) {
					input.val(log);
				} else {
					if( log ) alert(log);
				}

			});
		});

	});
</script>

</html>
