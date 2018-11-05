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
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Tamanho</label>
                          <select class="form-control" id="size_0" required oninvalid="this.setCustomValidity('Escolha o tamanho')"
                            oninput="this.setCustomValidity('')">
                            <option value="" disabled selected>Selecione</option>
                            <option value="1">option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                          </select>
                        </div>
                        <div class="form-check">
                          <h2>Frutas</h1>
                            <label>
                              <input type="checkbox" class="minimal" value="Abacaxi" name="frutas0[]">
                              Abacaxi
                            </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Banana" name="frutas0[]">
                            Banana
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Manga" name="frutas0[]">
                            Manga
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Morango" name="frutas0[]">
                            Morango
                          </label>
                        </div>
                        <div class="form-check">
                          <label>
                            <input type="checkbox" class="minimal" value="Kiwi" name="frutas0[]">
                            Kiwi
                          </label>
                        </div>
                      </div>
                    </div>
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