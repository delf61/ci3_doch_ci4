<!-- head section -->

<?php
// $config['upload_path'] = './upload/';
// $config['allowed_types'] = 'gif|jpg|png';
// $config['max_size']     = '100';
// $config['max_width'] = '1024';
// $config['max_height'] = '768';
// // $this->upload->initialize($config);
// $this->load->library('upload', $config);
// $file_name = "c:/delphi-helmet.png";
// $this->upload->do_upload($file_name);

// if ( ! $this->upload->do_upload('$file_name'))  //here see the file name
// {
//     $error = array('error' => $this->upload->display_errors());
//     print_r( $error );die;
// }
?>
<?= view("include/head") ?>

<body id="upload">

    <?= view("include/header") ?>

    <form action="<?php echo site_url('upload-files') ?>" method="POST" role="form" enctype="multipart/form-data">

      <div class="container" >
        <label>Vyberte súbor pre odoslanie :</label>
        <input type="file" name="file_2_upload"/>

        <br><br>
        <button>Odošli súbor</button>
      </div>
    </form>

</body>
<!-- Footer section -->
<?php
  echo view("include/footer" //, array( "name" => $name, "email_footer" => $email )
  )
?>
</html>