<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-bookmark"></i> Home</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="login-box">
            <div class="login-logo">
                <b>Pedido</b>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Informe o número de contato para continuar.</p>
                <form action="/" method="post">
                    <div class="form-group has-feedback">
                        <input type="tel" class="form-control" name="nr_celular" id="nr_celular" placeholder="(00) 0.0000-0000"
                            maxlength="16" required>
                        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                        <h6 class="text-yellow">Por favor, preencha o campo adicionando o DDD.</h6>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-success pull-right">Continuar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.box-body -->
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- /.content-wrapper -->
<script src="/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<!-- Mask Js-->
<script src="/dist/js/masks.js"></script>