<div class="login-box">
    <div class="login-logo">
        <!--<p><b>INEI - OTED</b></p>-->
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">ACCESO AL SISTEMA</p>
        <form action="<?php echo base_url('login') ?>" method="POST" style="margin-bottom: 20px;" id="form_login_usuario" autocomplete="off">
            <div class="form-group has-feedback">
                <input type="text" name="sendUser" class="form-control" id="userLogeo" placeholder="Ingrese usuario"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="sendPass" id="userPass" class="form-control" placeholder="Ingresa contraseña"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-7"></div>
                <div class="col-xs-5">
                    <button type="submit" class="btn btn-block btn-primary btn-flat" id="btnLogeoIngresar">Entrar <span class="fa fa-sign-in"></span></button>
                </div>
            </div>
        </form>
        <div class="alert-message"></div>
        <?php
        $usuIncorrecto = $this->session->flashdata('usuario_incorrecto');
        if ($usuIncorrecto) {
            ?>
            <div class="alert-message-error">
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close text-warning" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Atención...!</h4>
                    <strong><?php echo $usuIncorrecto ?></strong>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="text-version">
            <p>Versión v1.0</p>
        </div>
    </div>
</div>
