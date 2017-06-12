<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset = "utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
	<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<META HTTP-EQUIV="EXPIRES" CONTENT="0">
    <meta name="author" content="">
	
	{{ HTML::style('css/style2.css', array('type' => 'text/css')) }}
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/simple-sidebar.css') }}
	
    <title>Cmentarz</title>
	<!-- <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
    {{ HTML::style('css/style.css'); }} -->
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    @yield('header')

</head>

<body>	
	
    <div id="wrapper">
	
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/">
                        Wyszukiwarka
                    </a>
                </li>
                <li>
                    <a href="/graves">Dodaj grób</a>
                </li>
                <li>
                    <a href="/buried">Dodaj pochowanego</a>
                </li>
                <li>
                    <a href="/dispatchers">Dodaj dysponenta</a>
                </li>
				<li>
                    <a href="/places">Stwórz miejsce</a>
                </li>
				<li>
                    <a href="/data">Wszystkie dane</a>
                </li>
                <li>
                    <a href="/map">Mapa cmentarza</a>
                </li>
				<li>
                    <a href="/users/create">Dodaj zarządcę</a>
                </li>
                <li>
                    <a href="/users/logout">Wyloguj</a>
                </li>
            </ul>
			
			<?php 
				$cem = DB::table('cemeteries')->where('id', 1)->first();
			?>
			<div style="position:fixed; bottom:0; left:0; color: white;">
			
			{{$cem->name}} <br>
			{{$cem->post_code}} {{$cem->city}} <br>
			{{$cem->street}} {{$cem->building}}
			
			</div>
			
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row"> 
					<div>
						@yield('content')
					</div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
			
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
