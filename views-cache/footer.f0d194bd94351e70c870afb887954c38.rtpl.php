<?php if(!class_exists('Rain\Tpl')){exit;}?><footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; <year id="year"></year> <a href="https://adminlte.io">Carlos Gimenes</a>.</strong> todos os
    direitos
    reservados.
    
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- jQuery input mask -->
<script src="/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<!-- iCheck plugin -->
<script src="/plugins/icheck/icheck.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- Add order-->
<script src="/dist/js/order.js"></script>
<!-- Mask Js-->
<script src="/dist/js/masks.js"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()

        let date = new Date()

        $('#year').append(date.getFullYear())

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-purple',
            radioClass: 'iradio_minimal-purple'
        })

    })
</script>
</body>

</html>