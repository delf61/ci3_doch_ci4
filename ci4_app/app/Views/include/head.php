
 <!DOCTYPE html>
  <html lang="sk">
    <head>
      <?php //kontrola prihlasenia
        if($this->session->userdata('status') != 'login'){
            redirect(base_url().'uvod?msg=nologin');
        }
      ?>
      <?php //echo smiley_js(); ?>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- automat. odhlasenie po xx sekundach necinnosti -->
      <meta http-equiv="refresh" content="2*60;url=../uvod?msg=nologin" />

      <title>web.Doch</title>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" crossorigin="anonymous"></script>

      <script type="text/javascript" src="<?php echo base_url('js/resize.js'); ?>"></script>

      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css"> -->

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>

      <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/bootstrap-datepicker3.css'); ?>"/>

      <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

      <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/site.css'); ?>"/>

      <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/globalize/1.4.2/globalize-runtime.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/globalize/1.4.2/globalize-runtime/number.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/globalize/1.4.2/globalize-runtime/currency.js"></script>

      <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <link rel="stylesheet" href="<?php echo base_url('css/cidoch-modern-v3.css'); ?>">
      <link rel="stylesheet" href="<?php echo base_url('css/cidoch-theme-toggle.css'); ?>">
      <script src="<?php echo base_url('js/cidoch-theme-toggle.js'); ?>"></script>
    </head>
