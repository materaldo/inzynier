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
	<!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
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
                    <a href="#">Archiwum</a>
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
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    
						<?php 
						
						if(Auth::guest()){}
							//echo 'true';
						//else
							//echo 'false';
							
						
						if(Auth::user()!==null)
						{
							//echo Auth::user()->username;
						}
						?>
					<div>
						@yield('content')
					</div>
					
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

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
