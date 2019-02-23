$(document).ready(function () {

    $('#clientValue').prop('disabled', true)

    $('#paymentMethod').change(function () {

        if ($('#paymentMethod').val() != "Dinheiro") {

            $('#clientValue').prop('disabled', true)
            $('#change').empty()
            $('#change').append('R$0,00')
            $('#changeValue').val(0)

        } else {

            $('#clientValue').prop('disabled', false)
            $('#change').empty()
            $('#change').append('R$')

        }

    });

})