<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>web.Doch &gt; Login</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'css/sb-admin-2.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'vendor/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('css/cidoch-modern-v3.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/cidoch-theme-toggle.css'); ?>">
    <script src="<?php echo base_url('js/cidoch-theme-toggle.js'); ?>"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().'css/signin1.css'; ?>" rel="stylesheet">
  </head>
  <body class="text-center">

  <form class="form-signin" method="post" action="<?php echo base_url().'uvod/login'; ?>">
    <div class="rotate-n-15">
      <!-- <i class="fas fa-car fa-4x"></i> -->
    </div>
    <h1 class="h3 mb-3 font-weight-normal">web.Doch</h1>
    <?php
      if(isset($_GET['msg'])){
          if($_GET['msg'] == "faillogin"){
              echo '<div class="alert alert-danger text-left" role="alert"><strong>Prihlásenie zlyhalo !</strong><br>Chybné meno alebo heslo !</div>';
          } else if($_GET['msg'] == "logout"){
              echo '<div class="alert alert-success text-left" role="alert">Odhlásenie z web.Doch OK!</div>';
          } else if($_GET['msg'] == "nologin"){
              echo '<div class="alert alert-warning text-left" role="alert">Najprv sa prihláste !</div>';
          }
      }
    ?>
    <br>
    <label for="inputUname" class="sr-only">Username</label>
    <input type="text" name="username" id="inputUname" class="form-control" placeholder="užívateľské meno" required autofocus>
        <?= isset($validation) ? $validation->getError('username') : '' ?>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="heslo" required>
        <?= isset($validation) ? $validation->getError('password') : '' ?>
    <button class="btn btn-lg btn-primary btn-block" value="Login" type="submit">Login</button>
    <!-- <p class="mt-5 mb-2 text-muted">&copy; Delpharm s.r.o. 2019</p> -->

    <h5 id="ip" class="mt-5 mb-2">IP</h5>

    <p class="mt-5 mb-2 text-muted">&copy; Delf-software, 2026</p>
    <!-- <img id="ci" src="<?php echo base_url().'/img/ciw.png'; ?>" width='151x' height='71px' href="https://codeigniter.com" target="_blank" onclick="myFunction()"> -->
    <script type="text/javascript">
        //document.getElementById("ci").style.cursor = "pointer";
        document.getElementById("ip").innerHTML = 'IP   ' + "<?php echo $_SERVER['REMOTE_ADDR']; ?>";
        //$iplog = $_SERVER['REMOTE_ADDR'];
    </script>
    <br>

    <!-- <p class="mt-5 mb-2 text-muted">&copy; Delpharm s.r.o. 2019, 2025</p> -->
    <!-- <img id="ci" src="<?php echo base_url().'/img/ciw.png'; ?>" width='151x' height='71px' href="https://codeigniter.com" target="_blank" onclick="myFunction()"> -->
    <!-- <script type="text/javascript">
        document.getElementById("ci").style.cursor = "pointer";
    </script> -->
    <br>
    <?php

    ?>
    <noscript>
        <style type="text/css">
            .pagecontainer {display:none;}
        </style>
        <div class="noscriptmsg"><font size='3' color='red'><b>
        je potrebné povoliť javascript pre web.Doch !!!
        </b></font></div>
    </noscript>
    <script type="text/javascript">
      if (navigator.cookieEnabled) {
      document.write("cookies povolené");
      } else
      {
      document.write("<font size='3' color='red'><b>" + "je potrebné povoliť cookies pre web.Doch !!!" + "</b></font>");
      }
    </script>
    <!-- <p class="mt-5 mb-2 text-muted">automatické odhlásenie po 5 minútach nečinnosti</p> -->
  </form>
</body>
</html>
<script type="text/javascript">
  function myFunction() {
    //window.location.href = "https://codeigniter.com";
    window.open('https://codeigniter.com', '_blank');
  };
</script>