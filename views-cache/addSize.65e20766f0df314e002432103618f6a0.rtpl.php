<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Adicionar novo <b>TAMANHO</b>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-bookmark"></i> Home</a></li>
            <li><a href="/menu"> Cardápio</a></li>
            <li><a href="#"> Adicionar Tamanho</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div id="error"></div>
        <!-- Default box -->
        <form action="/menu/size/create" method="POST">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="newSizeName">Nome</label>
                                    <input type="text" class="form-control" name="nm_tamanho" id="newSizeName"
                                        placeholder="Nome da tamanho" required>
                                </div>
                                <div class="form-group">
                                    <label for="newSizeValue">Valor</label>
                                    <input type="text" class="form-control" name="vl_tamanho" id="newSizeValue"
                                        placeholder="Valor" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">Cadastrar</button>
                    </div>
        </form>


        <!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->