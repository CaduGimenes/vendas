<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Confirmar dados do <b>CLIENTE</b>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/"><i class="fa fa-bookmark"></i> Home</a></li>
                    <li><a href="#"> Confirmar dados</a></li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div id="error"></div>
                <!-- Default box -->
                <form action="/order/update/address" method="POST">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nm_cliente">Nome</label>
                                            <input type="text" class="form-control" name="nm_cliente" id="nm_cliente"
                                                placeholder="Nome" value="<?php echo htmlspecialchars( $user["nm_cliente"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nr_celular">Celular</label>
                                            <input type="tel" class="form-control" name="nr_celular" id="nr_celular"
                                                placeholder="(00) 0.0000-0000" value="<?php echo htmlspecialchars( $user["nr_celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="16" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nm_logradouro">Rua</label>
                                            <input type="text" class="form-control" name="nm_logradouro" id="nm_logradouro"
                                                placeholder="Rua" value="<?php echo htmlspecialchars( $user["nm_logradouro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nm_bairro">Bairro</label>
                                            <input type="text" class="form-control" name="nm_bairro" value="<?php echo htmlspecialchars( $user["nm_bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="nm_bairro" placeholder="Bairro"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nr_casa">Número (Casa/APT)</label>
                                            <input type="text" class="form-control" name="nr_casa" value="<?php echo htmlspecialchars( $user["nr_casa"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="nr_casa" placeholder="Número da casa ou apartamento"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nm_bloco">Bloco (Somento para apt)</label>
                                            <input type="text" class="form-control" name="nm_bloco" value="<?php echo htmlspecialchars( $user["nm_bloco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="nm_bloco" placeholder="Número da bloco"
                                            readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a href="/order/update/address" class="btn btn-warning pull-left">Alterar Endereço</a>
                                <button type="submit" class="btn btn-success pull-right">Continuar</button>
                            </div>
                </form>
                <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        </section>
        <!-- /.content -->
        </div>
        