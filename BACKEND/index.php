<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <form method="POST" action="name.php" id="add_name" name="add_name">
    <ul class="nav nav-pills mb-3" id="pills-tab" name="pills-tab" role="tablist">
      <button type="button" id="add" name="add" class="btn btn-success"> Adicionar</button>
      <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
          aria-selected="true">Pedido 1</a>
      </li>
      <!-- <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false">Profile</a>
        </li>       -->
    </ul>
    <div class="tab-content" id="pills-tabContent" name="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <h1>Pedido 1</h1>
        <input type="hidden" name="pedido[0]" value="Pedido_0">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="Abacaxi" id="abacaxi" name="frutas0[0]">
          <label class="form-check-label" for="abacaxi">
            Abacaxi
          </label><br>
          <input class="form-check-input" type="checkbox" value="Morango" id="morango" name="frutas0[1]">
          <label class="form-check-label" for="abacaxi">
            Morango
          </label><br>
          <input class="form-check-input" type="checkbox" value="Chocolate" id="chocolate" name="caldas0[0]">
          <label class="form-check-label" for="chocolate">
            Chocolate
          </label>
        </div>
      </div>
      <!--   <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div> -->
    </div>
    <br><input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
  </form>
  <div id="content">

  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {

      var i = 0;

      $("#add").click(function () {

        i++

        $("#pills-tab").append('<li class="nav-item" id="nav-item-' + i + '"><a class="nav-link" id="pills-' +
          i +
          '-tab" data-toggle="pill" href="#pills-' + i + '" role="tab" aria-controls="pills-' + i +
          '" aria-selected="false">Pedido ' + (i + 1) + '</a><button type="button" name="remove" id="' + i +
          '" class="btn btn-danger btn_remove">X</button></li>')
        $('#pills-tabContent').append('<div class="tab-pane fade" id="pills-' + i +
          '" role="tabpanel" aria-labelledby="pills-' + i + '-tab"><h1>Pedido ' + (i + 1) +
          '</h1><input type="hidden" name="pedido[]" value="Pedido_'+i+'"><div class="form-check"><input class="form-check-input" type="checkbox" value="Abacaxi" id="abacaxi' +
          i + '" name="frutas'+i+'['+i+']"><label class="form-check-label" for="abacaxi' + i +
          '">Abacaxi</label><br><input class="form-check-input" type="checkbox" value="Chocolate" id="chocolate' +
          i + '" name="caldas'+i+'['+i+']"><label class="form-check-label" for="chocolate' + i +
          '">Chocolate</label></div></div>')
      });


      $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");
        $('#nav-item-' + button_id).remove();
        $('#pills-' + button_id).remove();
        i--;
      });

      $("#submit").click(function () {

        $.ajax({
          url: "name.php",
          method: "POST",
          data: $('#add_name').serialize(),
          success: function (data) {
            $('#content').append(data);
            $('#add_name')[0].reset();
          }
        });

      });

      



    });
  </script>
</body>

</html>