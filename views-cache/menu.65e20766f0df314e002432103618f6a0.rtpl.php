<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cárdapio
    </h1>
    <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-bookmark"></i> Home</a></li>
      <li><a href="/menu"></a> Cardápio</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div id="error"></div>
    <!-- Default box -->
    <div class="box box-dark">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs" id="nav-tabs">
                <li class="active"><a href="#tabAcai" data-toggle="tab">Açaí</a></li>
                <li><a href="#tabFruit" data-toggle="tab">Frutas</a></li>
                <li><a href="#tabSyrup" data-toggle="tab">Caldas</a></li>
                <li><a href="#tabComplement" data-toggle="tab">Complementos</a></li>
                <li><a href="#tabIceCream" data-toggle="tab">Sorvetes</a></li>
              </ul>
              <div class="tab-content" id="tab-content">
                <!-- acai tab -->
                <div class="tab-pane active" id="tabAcai">
                  <div class="box-header">
                    <a href="/menu/size/create" class="btn btn-success">Cadastrar Tamanho</a>
                  </div>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Açai</th>
                        <th>Preço</th>
                        <th style="width: 240px">&nbsp;</th>
                      </tr>

                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($size) && ( is_array($size) || $size instanceof Traversable ) && sizeof($size) ) foreach( $size as $key1 => $value1 ){ $counter1++; ?>

                      <tr>
                        <td><?php echo htmlspecialchars( $value1["cd_tamanho"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["nm_tamanho"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>R$<?php echo formatPrice($value1["vl_tamanho"]); ?></td>
                        <td>
                          <a href="/menu/size/update/<?php echo htmlspecialchars( $value1["cd_tamanho"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>
                            Editar</a>
                          <a href="/menu/size/delete/<?php echo htmlspecialchars( $value1["cd_tamanho"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')"
                            class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                        </td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
                <!--  /.cai tab  -->

                <!-- fruit tab -->
                <div class="tab-pane" id="tabFruit">
                  <div class="box-header">
                    <a href="/menu/fruit/create" class="btn btn-success">Cadastrar Fruta</a>
                  </div>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Nome da Fruta</th>
                        <th style="width: 240px">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($fruit) && ( is_array($fruit) || $fruit instanceof Traversable ) && sizeof($fruit) ) foreach( $fruit as $key1 => $value1 ){ $counter1++; ?>

                      <tr>
                        <td><?php echo htmlspecialchars( $value1["cd_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["nm_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>
                          <a href="/menu/fruit/update/<?php echo htmlspecialchars( $value1["cd_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>
                            Editar</a>
                          <a href="/menu/fruit/delete/<?php echo htmlspecialchars( $value1["cd_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')"
                            class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                        </td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
                <!--  /.fruit tab  -->

                <!-- syrup tab -->
                <div class="tab-pane" id="tabSyrup">
                  <div class="box-header">
                    <a href="/menu/syrup/create" class="btn btn-success">Cadastrar Calda</a>
                  </div>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Nome da Calda</th>
                        <th style="width: 240px">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($syrup) && ( is_array($syrup) || $syrup instanceof Traversable ) && sizeof($syrup) ) foreach( $syrup as $key1 => $value1 ){ $counter1++; ?>

                      <tr>
                        <td><?php echo htmlspecialchars( $value1["cd_calda"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["nm_calda"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>
                          <a href="/menu/syrup/update/<?php echo htmlspecialchars( $value1["cd_calda"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>
                            Editar</a>
                          <a href="/menu/syrup/delete/<?php echo htmlspecialchars( $value1["cd_calda"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')"
                            class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                        </td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
                <!--  /.syrup tab  -->

                <!-- complement tab -->
                <div class="tab-pane" id="tabComplement">
                  <div class="box-header">
                    <a href="/menu/complement/create" class="btn btn-success">Cadastrar Complemento</a>
                  </div>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Nome da Complemento</th>
                        <th style="width: 240px">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($complement) && ( is_array($complement) || $complement instanceof Traversable ) && sizeof($complement) ) foreach( $complement as $key1 => $value1 ){ $counter1++; ?>

                      <tr>
                        <td><?php echo htmlspecialchars( $value1["cd_complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["nm_complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>

                          <a href="/menu/complement/update/<?php echo htmlspecialchars( $value1["cd_complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i
                              class="fa fa-edit"></i>
                            Editar</a>
                          <a href="/menu/complement/delete/<?php echo htmlspecialchars( $value1["cd_complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')"
                            class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                        </td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
                <!--  /.complement tab  -->

                <!-- iceCream tab -->
                <div class="tab-pane" id="tabIceCream">
                  <div class="box-header">
                    <a href="/menu/icecream/create" class="btn btn-success">Cadastrar Sorvete</a>
                  </div>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Nome do sorvete</th>
                        <th style="width: 240px">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($icecream) && ( is_array($icecream) || $icecream instanceof Traversable ) && sizeof($icecream) ) foreach( $icecream as $key1 => $value1 ){ $counter1++; ?>

                      <tr>
                        <td><?php echo htmlspecialchars( $value1["cd_sorvete"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["nm_sorvete"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>
                          <a href="/menu/icecream/update/<?php echo htmlspecialchars( $value1["cd_sorvete"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>
                            Editar</a>
                          <a href="/menu/icecream/delete/<?php echo htmlspecialchars( $value1["cd_sorvete"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')"
                            class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                        </td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
                <!--  /.complement tab  -->

                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>

            <!-- nav-tabs-custom -->
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->