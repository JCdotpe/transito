<?php
$rol = $this->session->userdata('userIdRol');
if (!isset($sidebar)) {
    ?>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url('assets/img/boy.png') ?>" class="img-circle" alt="" />
                </div>
                <div class="pull-left info">
                    <p><?php echo $this->session->userdata('userNameUsuario') ?></p>
                    <a href="javascript:;"><i class="fa fa-circle text-success"></i> Conectado</a>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="active treeview">
                    <a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> <span>Portada</span></a>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('cargar-archivo') ?>"><i class="fa fa-cloud-upload"></i> <span>Cargar archivo</span></a>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('local-de-aplicacion') ?>"><i class="fa fa-building"></i> <span>Local de aplicación</span></a>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('postulantes') ?>"><i class="fa fa-male"></i> <span>Postulantes</span></a>
                </li>
                <?php if ($rol == 1) { ?>
                    <li class="treeview">
                        <a href="<?php echo base_url('usuarios') ?>"><i class="fa fa-users"></i> <span>Usuarios</span></a>
                    </li>
                <?php } ?>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        <?php
    } 