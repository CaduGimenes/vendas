<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Consultar <b>CLIENTES</b>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-bookmark"></i> Home</a></li>
      <li><a href="#"> Clientes</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tabela de Clientes</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <table id="clientTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>CEP</th>
                  <th>Bairro</th>
                  <th>Rua</th>
                  <th>Bloco</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter1=-1;  if( isset($clientList) && ( is_array($clientList) || $clientList instanceof Traversable ) && sizeof($clientList) ) foreach( $clientList as $key1 => $value1 ){ $counter1++; ?>

                <tr>
                  <td><?php echo htmlspecialchars( $value1["cd_cliente"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["nm_cliente"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["nr_celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["nr_cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["nm_bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["nm_logradouro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["nr_casa"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["nm_bloco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                </tr>
                <?php } ?>

              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>CEP</th>
                  <th>Bairro</th>
                  <th>Rua</th>
                  <th>Bloco</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->


        </div>
        <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>

<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    $.noConflict();
    $('#clientTable').DataTable({
      "language": {
        "url": "/plugins/dataTables/dataTables.portuguese.lang.json"
      }
    });
  });
</script>