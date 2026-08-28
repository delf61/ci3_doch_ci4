<!-- head section -->
<?= view("include/head");?>
<body id="site">
  <?= view("include/header");?>
  <link href="<?php echo base_url().'css/heslo.css'; ?>" rel="stylesheet">

  <!-- Content Row -->
  <div class="row">
    <div class="col-md-3 col-md-offset-3">
      <form class="form-heslo" action="<?php echo base_url().'c_uziv/heslo_act'; ?>" method="post">
        <div class="container">
          <div class="jumbotron" style="background-color:#ccc !important">
            <div class="container" style="margin:0px;">
              <div class="form-group">
                <label style="font:150% Roboto, sans-serif;">nové heslo</label>
                <input id="heslo" class="form-control" type="text" name="nove_heslo" active>
                <br>
                <div class="error">
                  <?php echo (\Config\Services::validation())->getError('nove_heslo'); ?>
                </div>
              </div>
              <br>
              <div class="form-group">
                <label style="font:150% Roboto, sans-serif;">zopakujte nové heslo</label>
                <input class="form-control" type="text" name="potvrd_heslo">
                <br>
                <div class="error">
                  <?php echo (\Config\Services::validation())->getError('potvrd_heslo'); ?>
                </div>
              </div>
              <br>
              <div class="col text-center">
                <button type="submit" class="btn btn-primary btn-default">Zmeniť heslo</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

<script type="text/javascript">
  $(document).ready(function() {
    $("#heslo").focus();
  });
</script>

<!-- Footer section -->
<?php
  echo view("include/footer" //, array( "name" => $name, "email_footer" => $email )
  )
?>