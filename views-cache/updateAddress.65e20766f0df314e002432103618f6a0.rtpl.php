<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Alterar cadastro de <b>CLIENTES</b>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-bookmark"></i> Home</a></li>
                <li><a href="/"> Pedido</a></li>
                <li><a href="#"> Alterar Cadastro</a></li>
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
                                            placeholder="Nome" value="<?php echo htmlspecialchars( $user["nm_cliente"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nr_celular">Celular</label>
                                        <input type="tel" class="form-control" name="nr_celular" id="nr_celular"
                                            placeholder="(00) 0.0000-0000" value="<?php echo htmlspecialchars( $user["nr_celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="16" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nr_cep">CEP</label>
                                        <input type="text" class="form-control" value="<?php echo htmlspecialchars( $user["nr_cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="nr_cep" id="nr_cep" placeholder="00000-000"
                                            maxlength="9">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nm_logradouro">Rua</label>
                                        <input type="text" class="form-control" value="<?php echo htmlspecialchars( $user["nm_logradouro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="nm_logradouro" id="nm_logradouro"
                                            placeholder="Rua" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nm_bairro">Bairro</label>
                                        <input type="text" class="form-control"  value="<?php echo htmlspecialchars( $user["nm_bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="nm_bairro" id="nm_bairro" placeholder="Bairro"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nr_casa">Número (Casa/APT)</label>
                                        <input type="text" class="form-control" value="<?php echo htmlspecialchars( $user["nr_casa"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="nr_casa" id="nr_casa" placeholder="Número da casa ou apartamento"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nm_bloco">Bloco (Somento para apt)</label>
                                        <input type="text" class="form-control" value="<?php echo htmlspecialchars( $user["nm_bloco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="nm_bloco" id="nm_bloco" placeholder="Número da bloco"
                                            >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success pull-right">Alterar</button>
                        </div>
            </form>
            <!-- /.box-footer-->
    </div>
    <!-- /.box -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- /.content-wrapper -->
    <script src="/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <!-- Mask Js-->
    <script src="/dist/js/masks.js"></script>
    
    <script>
    
    $(document).ready(function(){
    
    $('#nr_cep').mask("00000-000")
    
     function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#nm_logradouro").val("");
            $("#nm_bairro").val("");
        
        }
        
        //Quando o campo cep perde o foco.
        $("#nr_cep").blur(function() {
    
            //Nova variável "cep" somente com dígitos.
            var cep = $('#nr_cep').val().replace(/\D/g, '');
    
            //Verifica se campo cep possui valor informado.
            if (cep != "") {
    
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
    
                //Valida o formato do CEP.
                if(validacep.test(cep)) {
    
                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#nm_logradouro").val("...");
                    $("#nm_bairro").val("...");
    
                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
    
                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#nm_logradouro").val(dados.logradouro);
                            $("#nm_bairro").val(dados.bairro);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    
    })
    
    </script>