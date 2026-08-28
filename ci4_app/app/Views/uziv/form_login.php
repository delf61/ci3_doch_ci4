<!-- head section -->
<?= view("include/head");?>
<body id="team">
  <?= view("include/header");?>
  <style> div.error{color: red;}</style>
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-0" style="top:55px">
      <h2 class="text-left" style="display:none">Zoznam prihlásení do web.ISyT</h2>
    </div>
    <div class="col-sm-2" style="top:55px">
      <div class="row">
      </div>
    </div>
    <div class="col-sm-3"></div>
    <div class="col-sm-2" style="top:55px">
      <a id="zz" type="button" class="btn btn-primary btn-zak pull-right disabled" style="display:none;" href="#">Editovať označený riadok</a>
    </div>
    <div class="col-sm-2" style="top:55px">
      <a id="papa" type="button" class="btn btn-danger btn-zak pull-right" href="#" style="display:none;">Nové heslá</a>
    </div>
    <div class="col-sm-1" style="top:55px">
      <a id="uzi" type="button" class="btn btn-primary btn-zak pull-right" href="<?php echo site_url('uziv/list') ?>">Team</a>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-7" id="c" style="top:20px">
      <form id="div_data" method="post" action="javascript:void(0)" style="width: 100%">
        <table id="zakazky" class="table display table-responsive table-striped table-hover table-bordered compact order-column nowrap" style="display:none;">
          <thead>
            <tr class="success">
              <th>kod</th>
              <th>meno</th>
              <th>dátum</th>
              <th>prihl.</th>
              <th>odhl.</th>
              <th>info</th>
              <th>os</th>
              <th>ip</th>
              <th>ip1</th>
              <th>cloudflare</th>
            </tr>
          </thead>
          <tbody id="show_data">
          </tbody>
        </table>
      </form>
      <script type="text/javascript">
        $(document).ready(function () {
          var prio = "<?php echo $this->session->userdata('prio'); ?>";
          $('#zakazky').dataTable({
              "ajax": {
                  url : '<?php echo site_url('c_uziv/get_login')?>',
                  type: "GET",
                  dataSrc: ""
              },
              select:'single',
              order: [],
              dom:  '<"top"B>fitr<"bottom"p><"clear">', // <"bottom"pl>
              buttons: [],
              hover:      true,
              //processing: true,
              compact:    true,
              autoWidth:  false,
              paging:     true,
              pagingType:  'numbers',
              pageLength: 25,
              //lengthMenu: [ 10, 20, 50 ],
              language: {
                  lengthMenu: "zobrazené: _MENU_ záznamov",
                  zeroRecords: "žiadne dáta",
                  //info: "strana _PAGE_ z _PAGES_",
                  sInfo:	"Záznamy _START_ až _END_ z celkom _TOTAL_",
                  //infoEmpty: "No records available",
                  sInfoEmpty:	"Záznamy 0 až 0 z celkom 0 ",
                  //infoFiltered: "(filtered from _MAX_ total records)",
                  sInfoFiltered:	"(vyfiltrované spomedzi _MAX_ záznamov)",
                  sInfoPostFix:	"",
                  sInfoThousands:	",",
                  sLengthMenu:	"Zobrazené: _MENU_ záznamov",
                  sLoadingRecords:	"Načítavam...",
                  sProcessing:	"Pracujem...",
                  Select:	"Hľadať:",
                  sSearch:	"Hľadať:",
                  //Paginate
                  First:	"Prvá",
                  Last:	"Posledná",
                  Next:	"Nasledujúca",
                  Previous:	"Predchádzajúca",
                  //Aria
                  sSortAscending:	": aktivujte na zoradenie stĺpca vzostupne",
                  sSortDescending:	": aktivujte na zoradenie stĺpca zostupne",
                  select: {
                    rows: { _: ""
                        // _: "You have selected %d rows",
                        // 0: "Click a row to select it",
                        // 1: "Only 1 row selected"
                  }}
              },
              columns: [
                  { "data": "KOD","visible": false },
                  { "data": "MENO" },
                  { "data": "DATUM" },
                  { "data": 'OD' },
                  { "data": 'DO' },
                  { "data": 'AGENT' },
                  { "data": 'PLATFORM',"visible": false },
                  { "data": 'IP',"visible": false },
                  { "data": 'IPB',"visible": false },
                  { "data": 'cloudflare',"visible": false }
              ],
              columnDefs: [{targets: 1, width: '300px'}],
              stateSave:  false
              });

              $(document).ready(function () {
                var table = $('#zakazky').DataTable();
                new $.fn.dataTable.Buttons( table, {
                  buttons: [{ extend: 'excel', text: 'Excel', exportOptions: { modifier: { search: 'applied' }, columns: ':visible'}}]
                } );
                table.buttons( 0, null ).container().prependTo( table.table().container() );

                if(prio>8){
                  // Get the column API object
                  //var column = table.column( $(this).attr('data-column') );
                  var column = table.column( 'kod' );
                  table.columns( [0,6,7,8] ).visible( true );
                  //column.visible( ! column.visible() ); // Toggle the visibility
                }
              });
          $('#zakazky').show();
        });
      </script>
    </div>
  </div>
  <div class="container-fluid" id="r3">
    <form id="prace_form" action="javascript:void(0)" method="post">
      <div class="row" id="r30">
        <div class="col-sm-1"></div>
        <div class="input-group date col-sm-1" style="top:-25px">
          <input id="d6" type="text" class="form-control" value="<?php echo date('d.m.Y', $_SESSION['den']); ?>" data-date-end-date="0d">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script type="text/javascript">
  $(document).ready(function(){
    $('#d6').datepicker({
      todayBtn: true,
      language: "sk",
      keyboardNavigation: false,
      forceParse: false,
      daysOfWeekHighlighted: "0,6",
      calendarWeeks: true,
      autoclose: true,
      format: 'dd.mm.yyyy',
      todayHighlight: true
    });
    $('#d6').on('changeDate', function(){
      localStorage.setItem("isyt_d6", $('#d6').datepicker('getFormattedDate'));

      var s1 = '<?php echo site_url('c_uziv/get_login/')?>' + $('#d6').datepicker('getFormattedDate');
      $('#zakazky').DataTable().ajax.url(s1).load();
    });
  });
</script>

<script type="text/javascript">
  $(window).resize(function() {
    if ($(this).height() >= 1080) {
      // $('#zakazky').datatable().page.len(20).draw();
    } else {
      // $('#zakazky').datatable().page.len(10).draw();
    };
  });
  $('#pa').on("click", function(e){
    e.preventDefault();
    //var url = $(this).attr('href');
    swal.fire({
      title: "Naozaj chcete nahradiť aktuálne heslá novými ?", //text: "Údaje sa po vymazaní nedajú obnoviť !",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Áno',
      cancelButtonText: "Nie",
      confirmButtonClass: "btn-danger"
    }).then((result) => {
      if (result.value) {//Swal.fire('Deleted!','Your imaginary file has been deleted.','success')

    //    window.location.href = "<?php echo site_url('c_uziv/gen_hesla') ?>";

        var s1 = '<?php echo site_url('c_uziv/listh/1/a')?>';
        $('#zakazky').DataTable().ajax.url(s1).load();
        // $("#zzrem").addClass('disabled');
        // $("#zzedi").addClass('disabled');
        // $("#zzadd").removeClass('disabled');
      } else if (result.dismiss === Swal.DismissReason.cancel) {//Swal.fire('Cancelled','Your imaginary file is safe :)','error')
      }
    });
  });
  $("#team").keydown(function(event){
    // if(event.which == 113){if (localStorage.isyt_zze == 1){$("#zzadd").click();} //$("div").html("Key: " + event.which);  // F2
    //   return false;
    // };
    if(event.which == 49 && event.altKey ){ // Alt + 1 alert('alt + 1');
      $('#p1').click();
    };
    if(event.which == 50 && event.altKey ){
      $('#p2').click();
    };
    if(event.which == 51 && event.altKey ){
      $('#p3').click();
    };
    if(event.which == 52 && event.altKey ){
      if(prio>8 || $("#prio").val()==0 ){$('#p4').click();};
    };
    if(event.which == 120){ // F9
      var table = $('#zakazky').DataTable();
      $('#zakazky').dataTable().fnFilter('');
      $('div.dataTables_filter input', table.table().container()).focus();
      return false;
    };
  });
</script>

<!-- Footer section -->
<?php
  echo view("include/footer" //, array( "name" => $name, "email_footer" => $email )
  )
?>
