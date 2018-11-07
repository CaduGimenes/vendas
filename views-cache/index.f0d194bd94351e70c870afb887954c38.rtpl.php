<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Realizar pedido
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-bookmark"></i> Home</a></li>
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
                            <option value="Pequeno">Pequeno (R$ 7,00)</option>
                            <option value="Médio">Médio (R$ 10,00)</option>
                            <option value="Grande">Grande (R$ 14,00)</option>
                            <option value="Extra Grande">Extra Grande (R$ 23,00)</option>
                          </select>
                        </div>
                        <h2>Frutas</h1>
                          <?php $counter1=-1;  if( isset($fruit) && ( is_array($fruit) || $fruit instanceof Traversable ) && sizeof($fruit) ) foreach( $fruit as $key1 => $value1 ){ $counter1++; ?>

                          <div class="form-check">
                            <label>
                              <input type="checkbox" class="minimal" value="<?php echo htmlspecialchars( $value1["nm_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="frutas0[]">
                              <?php echo htmlspecialchars( $value1["nm_fruta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                            </label>
                          </div>
                          <?php } ?>


                          <div class="form-check">
                            <h2>Cupuaçu</h1>
                              <label>
                                <input type="checkbox" class="minimal" value="Inteiro" name="inteiro0[]">
                                Inteiro
                              </label>
                          </div>
                          <div class="form-check">
                            <label>
                              <input type="checkbox" class="minimal" value="Meio-a-meio" name="meioAMeio0[]">
                              Meio-a-meio
                            </label>
                          </div>
                          <div class="input-group">
                            <label>
                              Bolas
                              <input type="number" class="form-control" maxlength="2" name="bolaCupuacu0[]" min="0" max="99">
                            </label>
                          </div>
                      </div>
                      <!-- Caldas -->
                      <div class="col-md-4">
                        <div class="form-check">
                          <h2>Caldas</h1>
                            <label>
                              <input type="checkbox" class="minimal" value="Morango" name="caldas0[]">
                              Morango
                            </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Kiwi" name="caldas0[]">
                            Kiwi
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Chocolate" name="caldas0[]">
                            Chocolate
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Caramelo" name="caldas0[]">
                            Caramelo
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Leit Cond." name="caldas0[]">
                            Leit Cond.
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Doce de Leite" name="caldas0[]">
                            Doce de Leite
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Mel" name="caldas0[]">
                            Mel
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Groselha" name="caldas0[]">
                            Groselha
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Marácuja" name="caldas0[]">
                            Marácuja
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Açaí c/ guaraná" name="caldas0[]">
                            Açaí c/ guaraná
                          </label>
                        </div>
                      </div>
                      <!-- /. Caldas -->
                      <!-- Complementos -->
                      <div class="col-md-4">
                        <div class="form-check">
                          <h2>Complementos</h2>
                          <label>
                            <input type="checkbox" class="minimal" value="Bolinha de Chocolate" name="complemento0[]">
                            Bolinha de Chocolate
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Confete" name="complemento0[]">
                            Confete
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Bis" name="complemento0[]">
                            Bis
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Flocos de Arroz" name="complemento0[]">
                            Flocos de Arroz
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Granola" name="complemento0[]">
                            Granola
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Amendoin" name="complemento0[]">
                            Amendoin
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Paçoca" name="complemento0[]">
                            Paçoca
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Sucrilho" name="complemento0[]">
                            Sucrilho
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Leite em pó" name="complemento0[]">
                            Leite em pó
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Ovo Maltine" name="complemento0[]">
                            Ovo Maltine
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Suspiro" name="complemento0[]">
                            Suspiro
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Raspa de Choc. Branco" name="complemento0[]">
                            Raspa de Choc. Branco
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Raspa de Choc. Preto" name="complemento0[]">
                            Raspa de Choc. Preto
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Canudos Waffer" name="complemento0[]">
                            Canudos Waffer
                          </label>
                        </div>
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
<!-- /.content-wrapper -->