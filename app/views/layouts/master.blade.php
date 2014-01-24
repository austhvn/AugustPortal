<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>August Client Portal v0.0.1</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex, nofollow">

		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    </head>
	<body>

	    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		              <span class="sr-only">Toggle navigation</span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand" href="#">AugustPortal 0.0.1</a>
				</div>
				<div class="collapse navbar-collapse">
		            <ul class="nav navbar-nav navbar-left">
						<!-- <li class="active"><a href="/">Home</a></li> -->
						@if(!Auth::check())
							<li>{{ HTML::link('users/register', 'Register') }}</li>
							<li>{{ HTML::link('users/signin', 'Sign In') }}</li>
						@else
							<li>{{ HTML::link('users/dashboard', 'Dashboard') }}</li>
							<li>{{ HTML::link('clients', 'Clients') }}</li>
							<li>{{ HTML::link('contacts', 'Contacts') }}</li>
							<li>{{ HTML::link('projects', 'Projects') }}</li>
						@endif
		             </ul>

					 @if(Auth::check())
					 <ul class="nav navbar-nav navbar-right">
						<li>{{ HTML::link('users/signout', 'Sign Out') }}</li>
					</ul>
					@endif
				</div>
			</div>
		</div>

		<div class="container">
			@if(Session::has('message'))
				<p class="alert alert-warning">{{ Session::get('message') }}</p>
			@endif

			@yield('content')

		</div><!-- /.container -->

	</body>
</html>