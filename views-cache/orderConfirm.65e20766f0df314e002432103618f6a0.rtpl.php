<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- =============================================== -->
<style>
.total{

padding-bottom: 30px;

}

.inline{

    display: inline;

}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Confirmar <b>Pedido</b>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-bookmark"></i> Home</a></li>
            <li><a href="#"> Pedidos</a></li>
            <li><a href="#"> Confirmar pedido</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="callout callout-success">
                                <h4>Pedidos</h4>

                                <ol>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Consectetur adipiscing elit</li>
                                    <li>Integer molestie lorem at massa</li>
                                    <li>Facilisis in pretium nisl aliquet</li>
                                    <li>Nulla volutpat aliquam velit
                                        <ol>
                                            <li>Phasellus iaculis neque</li>
                                            <li>Purus sodales ultricies</li>
                                            <li>Vestibulum laoreet porttitor sem</li>
                                            <li>Ac tristique libero volutpat at</li>
                                        </ol>
                                    </li>
                                    <li>Faucibus porta lacus fringilla vel</li>
                                    <li>Aenean sit amet erat nunc</li>
                                    <li>Eget porttitor lorem</li>
                                </ol>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <h1 class="total">Total: <?php echo formatPrice($total); ?></h1>
                            <form action="" method="post" class="total">
                                <label for="clientValue"> Valor pago:</label>
                                <input class="form-control" type="text" name="clientValue" id="clientValue">
                            </form>
                            <h2>Troco:</h2>
                            <h1 id="change"></h1>
                        </div>

                    </div>
                    <!-- /.box-body -->


                </div>
                <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery input mask -->
<script src="/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

<script>
    $(document).ready(function () {
        $.noConflict();

        $('#clientValue').mask("#.###,00", {
            reverse: true
        })

        $('#clientValue').focus()

        $('#clientValue').keyup(function () {

            let dados = $('#clientValue').val();

            $('#change').empty()

            console.log(dados)

            $.ajax({
                type: 'POST',
                url: '../dist/functions/getChange.php',
                async: true,
                data: {
                    clientValue: dados
                },
                success: function (response) {
                    $('#change').append(response)
                }
            });

        })

    })
</script>