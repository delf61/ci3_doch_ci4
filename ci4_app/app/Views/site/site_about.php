<!-- head section -->
<?= view("include/head");?>
<body id="site">
  <style>
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }
    #content {
      flex: 0 0 700px;
    }
  </style>
  <?= view("include/header");?>
  <div class="container" style="margin-top:5%;margin-bottom:40px;">
    <div id="content" class="jumbotron" style="margin:0px;background-color:#ccc !important;padding-bottom: 5%;">
      <br><br><br>
      <div><h3>aplikácia web.Doch</h3></div>
      <h6>&copy; Delpharm s.r.o. 2019,2025</h6>
      <br><br><br>
      <div><h3>je vytvorená v open-source php frameworku CodeIgniter 3.x </h3></div>
      <br><br><br>
      <div><h3>a využíva technológie a komponenty : </h3></div>
      <br><br>
      <div><h3>jQuery, bootstrap 4, jQuery datatables,</h3></div>
      <br>
      <div><h3>jExcel, boo-datepicker3, gstatic.com/charts,</h3></div>
      <br>
      <div><h3>sweetalert2, jquery.drawrpalette, boo4 Toggle,</h3></div>
      <br>
      <div><h3>font-awesome, html, javascript a css</h3></div>
      <br><br><br><br><br><br>
      <h5>všetky použité technológie a komponenty sú</h5>
      <h5>poskytované v rámci open-source, resp. MIT licencie</h5>
    </div>
  </div>
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