<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Realizar pedido
    </h1>
    <h6 class="pull-rigth"><i class="fa fa-user"></i> <?php echo htmlspecialchars( $user["nr_celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h6>
    <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-bookmark"></i> Home</a></li>
      <li><a href="#"><i class="fa fa-bookmark"></i> Pedido</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div id="error"></div>
    <!-- Default box -->
    <form id="orderForm">
      <div class="box">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs" id="nav-tabs">
                  <li class="active"><a href="#tab_0" class="tab_0" data-toggle="tab">Pedido 1</a></li>
                  <li class="pull-right" data-toggle="tooltip" data-placement="top" title="Adicionar"><a href="#" class="text-muted"
                      id="add"><i class="fa fa-plus"></i></a></li>
                  <li class="pull-right" data-toggle="tooltip" data-placement="top" title="Remover"><a href="#" class="text-muted"
                      id="close"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="tab-content" id="tab-content">
                  <div class="tab-pane active" id="tab_0">
                    <input type="hidden" name="pedido[]">
                    <!-- row 1 -->
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Tamanho</label>
                          <select class="form-control" id="size_0" required oninvalid="this.setCustomValidity('Escolha o tamanho')"
                            oninput="this.setCustomValidity('')">
                            <option value="" disabled selected>Selecione</option>
                            <?php $counter1=-1;  if( isset($size) && ( is_array($size) || $size instanceof Traversable ) && sizeof($size) ) foreach( $size as $key1 => $value1 ){ $counter1++; ?>

                            <option value="<?php echo htmlspecialchars( $value1["nm_tamanho"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nm_tamanho"], ENT_COMPAT, 'UTF-8', FALSE ); ?> (R$
                              <?php echo formatPrice($value1["vl_tamanho"]); ?>)</option>
                            <?php } ?>

                          </select>
                        </div>
                        <h2>Frutas</h1>
                          <?php $counter1=-1;  if( isset($fruit) && ( is_array($fruit) || $fruit instanceof Traversable ) && sizeof($fruit) ) foreach( $fruit as $key1 => $value1 ){ $counter1++; ?>

                          <div class="form-check checkbox checkbox-primary">
                            <input type="checkbox" id="fruitCheck<?php echo htmlspecialchars( $value1["cd_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="styled" value="<?php echo htmlspecialchars( $value1["nm_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="frutas0[]">
                            <label for="fruitCheck<?php echo htmlspecialchars( $value1["cd_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <?php echo htmlspecialchars( $value1["nm_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                            </label>
                          </div>
                          <?php } ?>

                          <?php $counter1=-1;  if( isset($icecream) && ( is_array($icecream) || $icecream instanceof Traversable ) && sizeof($icecream) ) foreach( $icecream as $key1 => $value1 ){ $counter1++; ?>

                          <div class="form-check checkbox checkbox-primary">
                            <h2><?php echo htmlspecialchars( $value1["nm_sorvete"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
                              <input type="checkbox" id="iceCreamCheckInt" class="styled" value="Inteiro" name="inteiro0[]">
                              <label for="iceCreamCheckInt">
                                Inteiro
                              </label>
                          </div>
                          <div class="form-check checkbox checkbox-primary">
                            <input type="checkbox" id="iceCreamMedium" class="styled" value="Meio-a-meio" name="meioAMeio0[]">
                            <label for="iceCreamMedium">
                              Meio-a-meio
                            </label>
                          </div>
                          <div class="input-group">
                            <label>
                              Bolas
                              <input type="number" class="form-control" maxlength="2" name="bola0[]" min="0" max="99">
                            </label>
                          </div>
                          <?php } ?>

                      </div>
                      <!-- Caldas -->
                      <div class="col-md-4">
                        <h2>Caldas</h1>
                          <?php $counter1=-1;  if( isset($syrup) && ( is_array($syrup) || $syrup instanceof Traversable ) && sizeof($syrup) ) foreach( $syrup as $key1 => $value1 ){ $counter1++; ?>

                          <div class="form-check checkbox checkbox-primary">
                            <input type="checkbox" class="styled" id="syrupCheck<?php echo htmlspecialchars( $value1["cd_calda"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["nm_calda"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="caldas0[]">
                            <label for="syrupCheck<?php echo htmlspecialchars( $value1["cd_calda"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <?php echo htmlspecialchars( $value1["nm_calda"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                            </label>
                          </div>
                          <?php } ?>

                      </div>
                      <!-- /. Caldas -->
                      <!-- Complementos -->
                      <div class="col-md-4">
                        <h2>Complementos</h2>
                        <?php $counter1=-1;  if( isset($complement) && ( is_array($complement) || $complement instanceof Traversable ) && sizeof($complement) ) foreach( $complement as $key1 => $value1 ){ $counter1++; ?>

                        <div class="form-check checkbox checkbox-primary">
                          <input type="checkbox" id="complementCheck<?php echo htmlspecialchars( $value1["cd_complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="styled" value="<?php echo htmlspecialchars( $value1["nm_complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                            name="complemento0[]">
                          <label for="complementCheck<?php echo htmlspecialchars( $value1["cd_complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <?php echo htmlspecialchars( $value1["nm_complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                          </label>
                        </div>
                        <?php } ?>

                  
                      </div>
                      <!-- /.Complementos -->
                    </div>
                    <!-- /.row 1 -->
                  
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>

              <!-- nav-tabs-custom -->
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-default pull-right">Enviar</button>
          </div>
    </form>


    <!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>

<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>


<!-- /.content-wrapper -->
<script type="text/javascript">
  $(document).ready(function () {

    let i = 0

    //Adicionar nova aba
    $('#add').click(function () {

      i++

      if (i < 0) i = 0

      if (i == 0) i = 1

      $('#nav-tabs').append('<li id="order_' + i + '"><a href="#tab_' + i + '" class="tab_' + i +
        '" data-toggle="tab">Pedido ' + (i + 1) + '</a></li>')
      $('#tab-content').append('<div class="tab-pane" id="tab_'+i+'"> <input type="hidden" name="pedido[]"> <div class="row"> <div class="col-md-4"> <div class="form-group"> <label>Tamanho</label> <select class="form-control" id="size_'+i+'" required oninvalid="this.setCustomValidity("Escolha o tamanho")" oninput="this.setCustomValidity("")"> <option value="" disabled selected>Selecione</option><?php $counter1=-1;  if( isset($size) && ( is_array($size) || $size instanceof Traversable ) && sizeof($size) ) foreach( $size as $key1 => $value1 ){ $counter1++; ?><option value="<?php echo htmlspecialchars( $value1["nm_tamanho"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nm_tamanho"], ENT_COMPAT, 'UTF-8', FALSE ); ?>(R$<?php echo formatPrice($value1["vl_tamanho"]); ?>)</option><?php } ?></select> </div><h2>Frutas</h1><?php $counter1=-1;  if( isset($fruit) && ( is_array($fruit) || $fruit instanceof Traversable ) && sizeof($fruit) ) foreach( $fruit as $key1 => $value1 ){ $counter1++; ?><div class="form-check checkbox checkbox-primary"> <input type="checkbox" id="fruitCheck'+i+'<?php echo htmlspecialchars( $value1["cd_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="styled" value="<?php echo htmlspecialchars( $value1["nm_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="frutas'+i+'[]"> <label for="fruitCheck'+i+'<?php echo htmlspecialchars( $value1["cd_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nm_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?></label> </div><?php } ?><?php $counter1=-1;  if( isset($icecream) && ( is_array($icecream) || $icecream instanceof Traversable ) && sizeof($icecream) ) foreach( $icecream as $key1 => $value1 ){ $counter1++; ?><div class="form-check checkbox checkbox-primary"> <h2><?php echo htmlspecialchars( $value1["nm_sorvete"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1> <input type="checkbox" id="iceCreamCheckInt'+i+'<?php echo htmlspecialchars( $value1["cd_sorvete"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="styled" value="Inteiro" name="inteiro'+i+'[]"> <label for="iceCreamCheckInt'+i+'<?php echo htmlspecialchars( $value1["cd_sorvete"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> Inteiro </label> </div><div class="form-check checkbox checkbox-primary"> <input type="checkbox" id="iceCreamMedium'+i+'<?php echo htmlspecialchars( $value1["cd_sorvete"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="styled" value="Meio-a-meio" name="meioAMeio'+i+'[]"> <label for="iceCreamMedium'+i+'<?php echo htmlspecialchars( $value1["cd_sorvete"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> Meio-a-meio </label> </div><div class="input-group"> <label> Bolas <input type="number" class="form-control" maxlength="2" name="bola'+i+'[]" min="0" max="99"> </label> </div><?php } ?></div><div class="col-md-4"> <h2>Caldas</h1><?php $counter1=-1;  if( isset($syrup) && ( is_array($syrup) || $syrup instanceof Traversable ) && sizeof($syrup) ) foreach( $syrup as $key1 => $value1 ){ $counter1++; ?><div class="form-check checkbox checkbox-primary"> <input type="checkbox" class="styled" id="syrupCheck'+i+'<?php echo htmlspecialchars( $value1["cd_calda"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["nm_calda"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="caldas'+i+'[]"> <label for="syrupCheck'+i+'<?php echo htmlspecialchars( $value1["cd_calda"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nm_calda"], ENT_COMPAT, 'UTF-8', FALSE ); ?></label> </div><?php } ?></div><div class="col-md-4"> <h2>Complementos</h2><?php $counter1=-1;  if( isset($complement) && ( is_array($complement) || $complement instanceof Traversable ) && sizeof($complement) ) foreach( $complement as $key1 => $value1 ){ $counter1++; ?><div class="form-check checkbox checkbox-primary"> <input type="checkbox" id="complementCheck'+i+'<?php echo htmlspecialchars( $value1["cd_complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="styled" value="<?php echo htmlspecialchars( $value1["nm_complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="complemento'+i+'[]"> <label for="complementCheck'+i+'<?php echo htmlspecialchars( $value1["cd_complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nm_complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></label> </div><?php } ?></div></div></div>')
      $('.tab_' + i).click()
    })

    //Fechar abas de pedido
    $('#close').click(function () {
      $('#order_' + i).remove();

      if ($('.tab_' + i).click()) {

        $('.tab_' + (i - 1)).click()

      }

      i--;
    })

  })
</script>