<!-- head section -->
<?= view("include/head");?>
<body id="site">
  <?= view("include/header");?>

  <button id="dia" class="btn btn-secondary pull-right"></button>
</body>

<script type="text/javascript">
  $(document).ready(function() {
    $("#dia").click();
  });
  $("#dia").on('click', function(){
    window.location.href = "<?php echo base_url().'c_site/update_data'?>";
  });
</script>

<!-- Footer section -->
<?php
  echo view("include/footer" //, array( "name" => $name, "email_footer" => $email )
  )
?>