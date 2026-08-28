<!-- head section -->
<?= view("include/head");?>
<body id="site">
  <?= view("include/header");?>

  <table cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td width = "2%">CR</td>
      <td width = "3%">POPIS</td>
      <td width = "40%">S3</td>
      <td width = "5%">S4</td>
      <td width = "5%">S5</td>
      <td width = "5%">S6</td>
      <td width = "5%">S7</td>
      <td width = "5%">S8</td>
      <td width = "5%">S9</td>
      <td width = "5%">S10</td>
      <td width = "5%">S11</td>
      <td width = "5%">S12</td>
      <td width = "5%">S13</td>
      <td width = "5%">S14</td>
    </tr>
      <?php foreach($csvData as $field){?>
          <tr>
              <td><?php echo $field['CR']?></td>
              <td><?php echo $field['POPIS']?></td>
              <td><?php echo $field['S3']?></td>
              <td><?php echo $field['S4']?></td>
              <td><?php echo $field['S5']?></td>
              <td><?php echo $field['S6']?></td>
              <td><?php echo $field['S7']?></td>
              <td><?php echo $field['S8']?></td>
              <td><?php echo $field['S9']?></td>
              <td><?php echo $field['S10']?></td>
              <td><?php echo $field['S11']?></td>
              <td><?php echo $field['S12']?></td>
              <td><?php echo $field['S13']?></td>
              <td><?php echo $field['S14']?></td>
          </tr>
      <?php }?>
  </table>
</body>

<script type="text/javascript">
  $(document).ready(function() {
  //  $("#dia").click();
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