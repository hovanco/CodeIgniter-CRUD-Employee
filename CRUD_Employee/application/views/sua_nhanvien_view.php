<!DOCTYPE html>
<html lang="en">

<head>
  <title>Show List Employee</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- use bootstrap and css -->
  <script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>

<body>
  <div class="container">
    <div class="text-xs-center">
      <h3 class="display-6">Update Employee</h3>
      <hr />
    </div>
    <form action="<?=base_url()?>./index.php/nhansu/update_nhansu" method="post" enctype="multipart/form-data" 
      style=" padding-right: 176px; padding-top: 50px; background: pink; border-radius: 12px; 
      box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, 
      rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, 
      rgba(0, 0, 0, 0.09) 0px -3px 5px;
      background-image: linear-gradient(#009fff,#ec2f4b);"
      >
      <!-- start form -->
      <?php foreach ($dulieukq as $key => $value): ?>
      <div class="form-group row">
        <!-- Text Avatar -->
        <label for="avatar" class="col-sm-4 form-control-label text-xs-right"><b>Avatar</b></label>
        <div class="col-sm-8">
          <!-- show image update -->
          <img src="<?=$value['avatar']?>" alt="" class="ing-fluid">
          <!-- get avatar new when user want to update new file image -->
          <input name="avatar2" type="text" value="<?=$value['avatar']?>" class="form-control" id="avatar">
          <input name="id" hidden  type="text" class="form-control" value="<?=$value['id']?>" placeholder="1" id="id">
          <!-- get old image when user doesn't update image -->
          <input name="avatar" type="file" class="form-control" placeholder="Upload avatar" id="avatar">
        </div>
      </div>

      <div class="form-group row">
        <label for="name" class="col-sm-4 form-control-label text-xs-right"><b>Name</b></label>
        <div class="col-sm-8">
          <input name="name" type="text" class="form-control" placeholder="Rain" id="name" value="<?=$value['name']?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="age" class="col-sm-4 form-control-label text-xs-right"><b>Age</b></label>
        <div class="col-sm-8">
          <input name="age" type="number" class="form-control" placeholder="12" id="age" value="<?=$value['age']?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="phone" class="col-sm-4 form-control-label text-xs-right"><b>Phone</b></label>
        <div class="col-sm-8">
          <input name="phone" type="number" class="form-control" placeholder="1053787878" id="phone"
            value="<?=$value['phone']?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="order_number" class="col-sm-4 form-control-label text-xs-right"><b>Order Number</b></label>
        <div class="col-sm-8">
          <input name="order_number" type="number" class="form-control" placeholder="5" id="order_number"
            value="<?=$value['order_number']?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="linkfb" class="col-sm-4 form-control-label text-xs-right"><b>Facebook</b></label>
        <div class="col-sm-8">
          <input name="linkfb" type="text" class="form-control" placeholder="www.facebook.com" id="linkfb"
            value="<?=$value['linkfb']?>">
        </div>
      </div>
      <?php endforeach ?>

      <div class="form-group row">
        <div class="col-sm-8">
          <p></p>
          <div class="form-group row" style="margin-left: 50%;">
            <button type="submit" class="btn btn-primary" style="margin-left: 15px;">Save</button>
            <div class="col-sm-8">
              <!-- <button type="reset" class="btn btn-danger">Close</button> -->
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</body>

</html>