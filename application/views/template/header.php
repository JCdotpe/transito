<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title><?php echo (isset($titulo) and $titulo != "") ? $titulo . " | " : ""; ?>Administrador</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php echo put_headersCss() ?>
        <script type="text/javascript">
            var CI = {
                'base_url' : '<?php echo base_url(); ?>',
                'site_url' : '<?php echo site_url(); ?>'
            };
        </script>
        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>" ></script>
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <?php if ($this->session->userdata('idUserLogin')) { ?>
        <script type="text/javascript">
            $(document).on('ready', function () {
                var url = window.location;
                var rutaMain = $('#main-nav a[href="' + url + '"]');
                rutaMain.parent().addClass('active');
                rutaMain.parent().parent('ul.treeview-menu').css('display', 'block');
                rutaMain.parent().parent('ul.treeview-menu').parent('li.treeview').addClass('active');
                $('#main-nav a').filter(function () {
                    return this.href === url;
                }).parent().addClass('active');
            });
        </script>
        <?php } ?>
    </head>
    <body class="<?php echo ($this->uri->segment(1)=='login')? 'login-page' : 'skin-red  fixed'?> ">
        <div class="wrapper">
        <?php if ($this->session->userdata('idUserLogin')) { ?>
            <header class="main-header">
                <a href="<?php echo base_url() ?>" class="logo">TRANSITO</a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"></a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ion ion-person"></i>
                                    <span class="hidden-xs"><?php echo $this->session->userdata('userNameUsuario') ?> <i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="<?php echo base_url('assets/img/boy.png')?>" class="img-circle" alt="<?php echo $this->session->userdata('user') ?>" />
                                        <p>
                                            <?php echo $this->session->userdata('userNameUsuario') ?>
                                            <small><?php echo $this->session->userdata('userNameRol') ?></small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="<?php echo base_url('logout')?>" class="btn btn-default btn-flat"><span class="ion ion-close-circled text-red"></span> Salir</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
        <?php }
            
        