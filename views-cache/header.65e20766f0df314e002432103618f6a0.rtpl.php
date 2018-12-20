<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?> | Vendas</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/skin-purple.css">
    <!-- AwesomeCheck plugin-->
    <link rel="stylesheet" href="/plugins/awesomeCheck/awesome-bootstrap-checkbox.css">
    <!-- DataTables -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <link rel="icon" href="/dist/img/favicon.ico" type="image/x-icon" />

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-purple sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>V</b>EN</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Ven<b>das</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </nav>
        </header>
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU DE NAVEGAÇÃO</li>
                    <li class="<?php echo htmlspecialchars( $order, ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="menuItem">
                        <a href="/">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Pedido</span>
                        </a>
                    </li>
                    <li class="<?php echo htmlspecialchars( $menu, ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="menuItem">
                        <a href="/menu">
                            <i class="fa fa-cutlery"></i>
                            <span>Cardápio</span>
                        </a>
                    </li>
                    <li class="<?php echo htmlspecialchars( $district, ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="menuItem">
                        <a href="/district">
                            <i class="fa fa-map-marker"></i>
                            <span>Bairros</span>
                        </a>
                    </li>
                    <li class="<?php echo htmlspecialchars( $client, ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="menuItem">
                        <a href="/clients">
                            <i class="fa fa-group"></i>
                            <span>Clientes</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>