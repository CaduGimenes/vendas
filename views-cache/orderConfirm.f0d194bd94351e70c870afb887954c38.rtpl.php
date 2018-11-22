<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Realizar pedido
    </h1>
    <h6><i class="fa fa-user"></i> <?php echo htmlspecialchars( $user["nr_celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h6>
    <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-bookmark"></i> Home</a></li>
      <li><a href="/order/make"> Pedido</a></li>
      <li><a href="#"> Confirmar Pedido</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div id="error"></div>
    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Collapsable</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body" id="content">
                <?php echo htmlspecialchars( print($content), ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </div>
              <!-- /.box-body -->
            </div>

          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-default pull-right">Enviar</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  </section>
  <!-- /.content -->
</div>