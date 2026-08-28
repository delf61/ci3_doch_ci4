<div class="mynav">
  <nav class="navbar navbar-expand-md fixed-top" style="background-color: #555; color:#eee;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="#navbarSupportedContent" aria-expanded=false aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
        <svg width="30" height="30">
          <path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
          <path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
          <path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
        </svg>
      </span>
    </button>
    <a class="navbar-brand" href="<?php echo site_url('home') ?>">web.Doch<i class="fa fa-fw fa-home"></i></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div>

      </div>
      <ul class="navbar-nav">


        <li id="bell" class="nav-item dropdown no-arrow mx-1" style="display:none">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">3+</span>
          </a>
        </li>

      </ul>

      <form class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
          <i class="fa fa-fw fa-user"></i><span> <?php echo $this->session->userdata('prac'); ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow" id="user" aria-labelledby="userDropdown" style="background-color: #555; color:#eee;">
          <a class="dropdown-item nav-item" id="user_team" href="<?php echo site_url('uziv/list'); ?>" style="display:none;background-color: #555; color:#eee;">
            <i class="fas fa-users fa-sm fa-fw mr-2"></i>
            Editácia používateľov</a>
          <a class="dropdown-item nav-item" id="user1" href="<?php echo base_url().'c_uziv/heslo'; ?>" style="display:none;background-color: #555; color:#eee;">
            <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
            zmeniť heslo</a>
          <!-- <div class="dropdown-divider"></div> -->
          <a class="dropdown-item nav-item" id="user2" href="<?php echo site_url('logout') ?>" style="background-color: #555; color:#eee;">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
            odhlásiť</a>
        </div>
      </form>
    </div>
  </nav>
</div>

<script type="text/javascript">
  var prio = "<?php echo $this->session->userdata('prio'); ?>";
  var eduz = "<?php echo $this->session->userdata('eduzi'); ?>";
  // var eduz = "<?php //echo $this->session->userdata('eduzi'); ?>";
  // if(eduz==0){
  //   if(prio<7){document.getElementById("team").style="display:none;";};
  // }
  if(prio>6 || (eduz==1 && prio!=6)){
    $("#user_team").show();
  }
  $("#user1").show();
  if(prio>8){$("#bell").show();};
  var a = window.location.href;
  localStorage.setItem("isyt_prd", a.indexOf('/localhost'));
  if(a.indexOf('/localhost')===0){
    // $.ajax({
    //   url: "<?php //echo base_url().'c_ria/spi'?>",
    //   data: {},
    //   type: "post"
    // });
  }
  var kofi = "<?php echo $this->session->userdata('kod'); ?>";
  if(kofi==3){$('#posta').hide();$('#kofi1').show();};
</script>
<script type="text/javascript">
  $(document).ready(function() {
    if("<?php echo $_SESSION['new'];?>"==1){
      $("#new").html("nové certifikáty");
      setTimeout(function() { $("#new").hide(); }, 9000);
      "<?php $_SESSION['new'] = 0;?>"
    }
  });
</script>