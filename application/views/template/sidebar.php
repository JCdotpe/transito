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
                    <a href="<?php echo base_url('empresa') ?>"><i class="fa fa-building-o"></i> <span>Empresa</span></a>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('categoria') ?>"><i class="fa fa-cubes"></i> <span>Categoría</span></a>
                </li>
                <li class="treeview">
                    <a href="<?php echo base_url('ubicacion') ?>"><i class="fa fa-map-marker"></i> <span>Ubicación</span></a>
                </li>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        <?php
    } 