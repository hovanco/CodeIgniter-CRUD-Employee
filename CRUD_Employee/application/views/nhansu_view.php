<!DOCTYPE html>
<html lang="en">

<head>
  <title>Show List Employee</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- use bootstrap and css -->
  <script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>jQueryFileUpload/js/vendor/jquery.ui.widget.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>jQueryFileUpload/js/jquery.fileupload.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>1.css" />

  <!-- <script src="jquery-3.5.1.min.js"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
</head>

<body>
  <div class="container">
    <div class="text-xs-center">
      <h3 class="display-6">List Employee</h3>
      <hr />
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="card-deck-wrapper">
        <div class="card-deck">
          <?php foreach ($mangketqua as $key =>
                        $value): ?>
          <div class="col-sm-4">
            <div class="card">
              <img class="card-img-top img-fluid" src="<?=$value['avatar']?>" alt="Card image cap" />
              <div class="card-block">
                <h4 class="card-title name">
                  Name:
                  <?=$value['name']?>
                </h4>
                <p class="card-text age">
                  <b>Age: </b><?=$value['age']?>
                </p>
                <p class="card-text phone">
                  <b>Phone:</b>
                  <?=$value['phone']?>
                </p>
                <p class="card-text orde_nuber">
                  <b>Order number:</b><?=$value['order_number']?>
                </p>
                <p class="card-text linkfb">
                  <small><a href="#linkfb" class="btn btn-secondary btn-xs"><?=$value['linkfb']?><i
                        class="fa fa-chevron-right"></i></a>
                  </small>
                </p>
                <p class="card-text edit">
                  <small><a href="<?=base_url()?>./index.php/nhansu/sua_nhansu/<?=$value['id']?>"
                      class="btn btn-warning btn-xs">Edit <i class="fa fa-pencil"></i></a>
                  </small>
                  <small><a href="<?=base_url()?>./index.php/nhansu/xoa_nhansu/<?=$value['id']?>"
                      class="btn btn-outline-danger btn-xs">Remove <i class="fa fa-remove"></i></a>
                  </small>
                </p>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        </div>
      </div>

      <div class="container">
        <!-- start container -->
        <div class="text-xs-center">
          <h3 class="display-6">Add New Employee</h3>
          <hr />
        </div>
        <!-- <form action="" method="" enctype="" style=" padding-right: 176px; padding-top: 50px; background: pink; border-radius: 12px; 
          box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, 
          rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, 
          rgba(0, 0, 0, 0.09) 0px -3px 5px;
          background-image: linear-gradient(#009fff,#ec2f4b);"> -->
        <!-- start form -->
        <div style="
							padding-right: 176px;
							padding-top: 50px;
							background: pink;
							border-radius: 12px;
							box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
								rgba(0, 0, 0, 0.12) 0px -12px 30px,
								rgba(0, 0, 0, 0.12) 0px 4px 6px,
								rgba(0, 0, 0, 0.17) 0px 12px 13px,
								rgba(0, 0, 0, 0.09) 0px -3px 5px;
							background-image: linear-gradient(#009fff, #ec2f4b);
						"
						>
          <div class="form-group row">
						<!-- Text Avatar -->
            <label for="avatar" class="col-sm-4 form-control-label text-xs-right"><b>Avatar</b></label>
            <div class="col-sm-8">
							<!-- chose file image -->
              <input name="files[]" type="file" class="form-control" id="avatar" />
            </div>
          </div>

          <div class="form-group row">
            <label for="name" class="col-sm-4 form-control-label text-xs-right"><b>Name</b></label>
            <div class="col-sm-8">
              <input name="name" type="text" class="form-control" placeholder="Rain" id="name" />
            </div>
          </div>

          <div class="form-group row">
            <label for="age" class="col-sm-4 form-control-label text-xs-right"><b>Age</b></label>
            <div class="col-sm-8">
              <input name="age" type="number" class="form-control" placeholder="12" id="age" />
            </div>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-4 form-control-label text-xs-right"><b>Phone</b></label>
            <div class="col-sm-8">
              <input name="phone" type="number" class="form-control" placeholder="0355682567" id="phone" />
            </div>
          </div>

          <div class="form-group row">
            <label for="order_number" class="col-sm-4 form-control-label text-xs-right"><b>Order Number</b></label>
            <div class="col-sm-8">
              <input name="order_number" type="number" class="form-control" placeholder="5" id="order_number" />
            </div>
          </div>

          <div class="form-group row">
            <label for="linkfb" class="col-sm-4 form-control-label text-xs-right"><b>Facebook</b></label>
            <div class="col-sm-8">
              <input name="linkfb" type="text" class="form-control" placeholder="www.facebook.com" id="linkfb" />
              <p></p>
              <div class="form-group row">
                <button type="button" class="btn btn-primary nutxulyajax" style="margin-left: 15px">
                  Save (by ajax)
                </button>
                <div class="col-sm-8">
                  <!-- <button type="" class="btn btn-danger">Close</button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- </form>end form -->
      </div>
      <!-- end container -->
    </div>
  </div>
  <!-- url: './ajax_add', -->

  <script>

  // upload file by ajax
	duongdan = '<?php echo base_url() ?>';
	// name file at js: fileupload,
	$('#avatar').fileupload({
		url: duongdan + 'index.php/nhansu/uploadfile',
		dataType: 'json',
		done: function (e, data) {
			$.each(data.result.files, function(index, file) {
				console.log(file.url);
				tenfile = file.url;
			});
		}
	});

  $('.nutxulyajax').click(function(event) {
    $.ajax({
        url: 'ajax_add',
        type: 'POST',
        dataType: 'json',
        data: {
          name: $('#name').val(),
					avatar: tenfile,
          age: $('#age').val(),
          phone: $('#phone').val(),
          order_number: $('#order_number').val(),
          linkfb: $('#linkfb').val()
        },
      })
      .done(function() {
        console.log('success');
      })
      .fail(function() {
        console.log('error');
      })
      .always(function() {
        console.log('complete');
        noidung = '<div class="col-sm-4">';
        noidung += '<div class="card">';
        noidung +=
          '<img class="card-img-top img-fluid" src="'+tenfile+'" alt="Card image cap" />';
        noidung += '<div class="card-block">';
        noidung += ' <h4 class="card-title name">Name: </b>' + $('#name').val() + '</h4>';
        noidung += '<p class="card-text age"><b>Age: </b>' + $('#age').val() + '</p>';
        noidung += '<p class="card-text phone"><b>Phone: </b>' + $('#phone').val() + '</p>';
        noidung += '<p class="card-text order_number"><b>Number: </b>' + $('#order_number').val() + '</p>';
        noidung +=
          '<p class="card-text linkfb"><small><a href="' + $('#linkfb')
          .val() +
          '" class="btn btn-secondary btn-xs">Facebook<i class="fa fa-chevron-right"></i></a></small></p>';
				noidung +='	<p class="card-text edit">';
        noidung +=
          '<small><a href="<?=base_url()?>index.php/nhansu/sua_nhansu/<?=$value['id']?>" class="btn btn-warning btn-xs">Edit<i class="fa fa-chevron-pencil"></i></a></small>';
        noidung +=
          '<small><a href="<?=base_url()?>index.php/nhansu/xoa_nhansu/<?=$value['id']?>" class="btn btn-outline-danger btn-xs" style="margin-left:5px;">Remove<i class="fa fa-remove"></i></a></small>';
				noidung +=	'</p>';
				
				
        noidung += ' </div>';
        noidung += ' </div>';
        noidung += ' </div>';

        $('.card-deck').append(noidung); // tu dong load sau khi them
        // reset form
        $('#name').val(''),
          $('#age').val(''),
          $('#phone').val(''),
          $('#order_number').val(''),
          $('#linkfb').val('')
      });
  });
  </script>
</body>

</html>