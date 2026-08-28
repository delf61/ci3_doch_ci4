<!-- head section -->
<?= view("include/head");?>
    <body id="team">
      <?= view("include/header");?>
      <?php $uziv_skup = $_SESSION['uziv_skup'];?>
      <?php $uziv_iso = $_SESSION['uziv_iso'];?>
      <?php $uziv_2 = $_SESSION['uziv_2'];?>
      <style> div.error{color: red;}</style>
      <script type="text/javascript">
        localStorage.setItem("isyt_xhj", 'a');
        localStorage.setItem("isyt_xa", 'a');
      </script>
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-0" style="top:55px">
          <h2 class="text-left" style="display:none">Zoznam pracovníkov a firiem</h2>
        </div>
        <div class="col-sm-2" style="top:55px">
          <div class="row">
            <a id="zhj" type="button" class="btn btn-warning btn-liv" name="liv" href="#" style="display:none;margin-left:-45px">H + JB</a>
            <a id="zh" type="button" class="btn btn-info btn-liv" name="liv" href="#" style="display:none;margin-left:15px">Hronec</a>
            <a id="zj" type="button" class="btn btn-info btn-liv" name="liv" href="#" style="display:none;">JB</a>
            <div id="cbc" class="col-sm-1"></div>
            <div>
              <input id="cb" type="checkbox" checked data-toggle="toggle" data-onstyle="info" data-on="akt." data-off="neakt.">
              <div id="console-event"></div>
            </div>
          </div>
        </div>
        <div class="col-sm-2" style="top:55px">
          <a id="zz" type="button" class="btn btn-primary btn-zak pull-right disabled" style="display:none;" href="#">Editovať označený riadok</a>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-1" style="top:55px">
          <a id="lo" type="button" class="btn btn-primary btn-zak pull-right" style="display:none;" href="<?php echo base_url().'c_uziv/login'?>">Login</a>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-1" style="top:55px">
          <a id="pa" type="button" class="btn btn-outline-primary btn-zak pull-right" style="display:none;" href="<?php echo base_url().'uziv/hesla'?>">Heslá</a>
          <div><span><small class="text-muted pull-right">test</small></span></div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2" id="c" style="top:60px">
          <form id="div_data" method="post" action="javascript:void(0)" style="width: 100%">
            <table id="zakazky" class="table display table-responsive table-striped table-hover table-bordered compact order-column nowrap" style="display:none;">
              <thead>
                <tr class="success">
                  <th></th>
                  <th>Meno</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="show_data">
              </tbody>
            </table>
          </form>
          <script type="text/javascript">
            $(document).ready(function () {
              $('#zakazky').dataTable({
                  "ajax": {
                      url   : '<?php echo site_url('c_uziv/lista/1/a')?>',
                      type: "GET",
                      dataSrc: ""
                  },
                  select:'single',
                  order: [1, 'asc'],
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
                      { "data": "id","visible": false },
                      { "data": "MENO" },
                      { "data": 'KOD',"visible": false }
                  ],
                  columnDefs: [{targets: 1, width: '300px'}],
                  stateSave:  true,
                  stateSaveCallback: function ( settings, data ) {
                    localStorage.setItem( 'team', JSON.stringify( data ) );
                  },
                  stateLoadCallback: function ( ) {
                    try {
                        return JSON.parse( localStorage.getItem( 'team' ) );
                    } catch (e) {}
                  }
                  });

        // select row
              var selected = [];
              var table = $('#zakazky').DataTable();
              $('#zakazky tbody').on('click', 'tr', function () {
                var id = this.id;
                var index = $.inArray(id, selected);
                var tr = $(this).parents('tr');
                row_id = table.row( this ).index();
                var row = table.row( this ).id();
                var pom = table.row( this ).data().id;
                var kod = table.row( this ).data().KOD;
                if ( index === -1 ) {
                    selected.push( id );
                } else {
                    selected.splice( index, 1 );
                };
                if(localStorage.isyt_edi > 0){
                  $('#save_add').hide();
                  $('#save_upd').hide();
                  $('#cancel').hide();
                };
                localStorage.setItem("isyt_edi", 0);
                $(this).toggleClass('selected');
                var ri = table.rows('.selected').count();
                if(ri === 0){
                    $("#zz").addClass('disabled');
                    localStorage.removeItem("isyt_rzus");
                    localStorage.removeItem("isyt_pzus");
                    document.getElementById("zz").href="#";
                    localStorage.setItem("isyt_kodo", localStorage.isyt_kod);
                    localStorage.setItem("isyt_kod", -1);
                    localStorage.setItem("isyt_prac", '');
                    $("#zzedi").addClass('disabled');
                    $("#zzrem").addClass('disabled');
                } else {
                    $("#zz").removeClass('disabled');
                    var p = table.page();
                    localStorage.setItem("isyt_pzus", p);
                    localStorage.setItem("isyt_izus", pom);
                    localStorage.setItem("isyt_kodo", localStorage.isyt_kod);
                    localStorage.setItem("isyt_kod", kod);
                    localStorage.setItem("isyt_prac", table.row( this ).data().MENO);
                    localStorage.setItem("isyt_rzus", table.row(this).index());
                    localStorage.setItem("isyt_id", table.row(this).data().id);
                    $("#zzedi").removeClass('disabled');
                    $("#zzrem").removeClass('disabled');
                    $.ajax({
                      url: "<?php echo base_url().'c_uziv/list1/'?>" + localStorage.isyt_kod,
                      data: {},
                      type: "post",
                      success: function(data){
                        $uzi = JSON.parse(data);
                        $("#t1").val($uzi[0].MESO);
                        var prio = "<?php echo $this->session->userdata('prio'); ?>";
                        if(prio>7){
                          $("#prioc").removeClass('col-sm-1');
                          $("#prioc").addClass('col-sm-0');
                          $("#priol").show();
                          $("#prio").show();
                        };
                        $("#prio").val($uzi[0].PRIORITA);
                        $("#osc").val($uzi[0].OS_CISLO);
                        $("#t2").val($uzi[0].MENO);
                        $("#t3").val($uzi[0].PRACE_MENO);
                        $("#t4").val($uzi[0].MAIL);
                        $("#pw").val($uzi[0].ARCINTCIS);

                        $("#prof").val($uzi[0].PROFESIA);

                        if($uzi[0].SKUPINA.substr(0,2)=='JB'){$("#miesto").val(2);}else{$("#miesto").val(1);};
                        if($uzi[0].AKTUALNY==1){$(function(){ $('#cb1').bootstrapToggle('on') });}else{$(function(){ $('#cb1').bootstrapToggle('off') })};
                        if($uzi[0].VALIDACIA==1){$(function(){ $('#cb2').bootstrapToggle('on') });}else{$(function(){ $('#cb2').bootstrapToggle('off') })};
                        if($uzi[0].POZICIA!=null){
                          if($uzi[0].POZICIA.toLowerCase()=='szčo'){$(function(){ $('#cb3').bootstrapToggle('on') });}else{$(function(){ $('#cb3').bootstrapToggle('off') })};
                        };
                        if($uzi[0].AUTO_REZIA==1){$(function(){ $('#cb4').bootstrapToggle('on') });}else{$(function(){ $('#cb4').bootstrapToggle('off') })};
                        $("#isofn").val($uzi[0].KOD_ISO);
                        $("#skup").val($uzi[0].KOD_SKU);
                        $("#skupv").val($uzi[0].KOD_SKU);
                        $("#sel2").val($uzi[0].KOD_PRACE);
                        $("#sel2a").val($uzi[0].KOD_PRACE1);
                        $("#sel2b").val($uzi[0].KOD_PRACE2);
                        $("#sel2c").val($uzi[0].KOD_PRACE3);
                        if($uzi[0].EDIT_POSTA==1){$(function(){ $('#cb21').bootstrapToggle('on') });}else{$(function(){ $('#cb21').bootstrapToggle('off') })};
                        if($uzi[0].EDIT_UZIVA==1){$(function(){ $('#cb212').bootstrapToggle('on') });}else{$(function(){ $('#cb212').bootstrapToggle('off') })};
                        if($uzi[0].EDIT_POST1==1){$(function(){ $('#cb22').bootstrapToggle('on') });}else{$(function(){ $('#cb22').bootstrapToggle('off') })};
                        if($uzi[0].EDIT_PRACE==1){$(function(){ $('#cb222').bootstrapToggle('on') });}else{$(function(){ $('#cb222').bootstrapToggle('off') })};
                        if($uzi[0].EDIT_KALKU==1){$(function(){ $('#cb23').bootstrapToggle('on') });}else{$(function(){ $('#cb23').bootstrapToggle('off') })};
                        if($uzi[0].ZADAVANIE_==1){$(function(){ $('#cb232').bootstrapToggle('on') });}else{$(function(){ $('#cb232').bootstrapToggle('off') })};
                        if($uzi[0].EDIT_ZAKAZ==1){$(function(){ $('#cb24').bootstrapToggle('on') });}else{$(function(){ $('#cb24').bootstrapToggle('off') })};
                        if($uzi[0].EDIT_SVOJE==1){$(function(){ $('#cb25').bootstrapToggle('on') });}else{$(function(){ $('#cb25').bootstrapToggle('off') })};
                        if($uzi[0].ZOBRAZ_POS==1){$(function(){ $('#cb31').bootstrapToggle('on') });}else{$(function(){ $('#cb31').bootstrapToggle('off') })};
                        if($uzi[0].ZOBRAZ_PO1==1){$(function(){ $('#cb32').bootstrapToggle('on') });}else{$(function(){ $('#cb32').bootstrapToggle('off') })};
                        if($uzi[0].ZOBRAZ_KAL==1){$(function(){ $('#cb33').bootstrapToggle('on') });}else{$(function(){ $('#cb33').bootstrapToggle('off') })};
                        if($uzi[0].ZOBRAZ_ZAK==1){$(function(){ $('#cb34').bootstrapToggle('on') });}else{$(function(){ $('#cb34').bootstrapToggle('off') })};
                        if($uzi[0].ZOBRAZ_OBJ==1){$(function(){ $('#cb342').bootstrapToggle('on') });}else{$(function(){ $('#cb342').bootstrapToggle('off') })};
                        if($uzi[0].ZOBRAZ_LEN==1){$(function(){ $('#cb35').bootstrapToggle('on') });}else{$(function(){ $('#cb35').bootstrapToggle('off') })};
                      }
                    });
                }
              });
                  $(document).ready( function () {
                    $.fn.dataTable.Api.register( 'page.jumpToData()', function ( data, column ) {
                      var pos = this.column(column, {order:'current'}).data().indexOf( data );
                      if ( pos >= 0 ) {
                          var page = Math.floor( pos / this.page.info().length );
                          this.page( page ).draw( false );
                      }
                      return this;
                    });
                    var table = $('#zakazky').DataTable();
                    row_id = table.row( this ).index();
                    var row = table.row( this ).id();
                    var p = localStorage.isyt_pzus;
                    var r = localStorage.isyt_rzus;
                    if(r != null){
                      table.row( r, { page: p }).select();
                      if(table.rows('.selected').count() === 1){
                          if ($("#zz").hasClass('disabled')) {
                            $("#zz").removeClass('disabled');
                            var x = localStorage.isyt_izus;
                            document.getElementById("zz").href="<?php echo base_url().'zobraz/zakazka/'?>" + x + "<?php ; ?>";
                          };
                          if(typeof(x) != 'undefined'){
                            pom = x.toString();
                            if (table.page() != p){table.page.jumpToData(pom, 1);};
                            //console.log( table.page() );
                          } else {
                          };
                        }
                      }
                    }
                  );
                  $(document).ready(function () {
                    var table = $('#zakazky').DataTable();
                    new $.fn.dataTable.Buttons( table, {
                      buttons: [{ extend: 'excel', text: 'Excel', exportOptions: { modifier: { search: 'applied' }, columns: ':visible'}}]
                    } );
                    table.buttons( 0, null ).container().prependTo( table.table().container() );
                  });
              $('#zakazky').show();
            });
          </script>
          <div class="row" id="r2">
            <div id="zzremc" class="col-sm-3" style="top:10px;display:none">
              <a id="zzrem" type="button" class="btn btn-danger btn-zak disabled" href="#"><i class="fas fa-trash"></i> Odstrániť</a>
            </div>
            <div id="c1" class="col-sm-1"></div>
            <div class="col-sm-3" style="top:10px">
              <a id="zzadd" type="button" class="btn btn-success btn-zak disabled" href="#"><i class="fas fa-plus"></i>  Pridať    </a>
            </div>
            <div id="c2" class="col-sm-1"></div>
            <div class="col-sm-3" style="top:10px">
              <a id="zzedi" type="button" class="btn btn-primary btn-zak disabled" href="#"><i class="fas fa-edit"></i> Editovať</a>
            </div>
          </div>
        </div>

        <div class="row col-sm-9" id="d" style="top:40px">
          <div class="col-sm-6" style="top:55px">
            <h3 id="nadpis" class="text-center" style="display:none">Hronec + Jaslovské Bohunice</h3>
          </div>
          <div class="col-sm-12" style="top:55px">
            <form id="uziv_form" action="javascript:void(0)" method="post">
              <div class="pagination-container">
                <div data-page="1">
                  <div class="container" style="margin-top:60px;margin-bottom:40px;">
                    <div class="jumbotron" style="margin:0px;background-color:#ccc !important;padding-bottom: 15px;">
                      <div class="container" style="margin:0px;">
                        <div class="form-group row">
                          <h5>    1 - základné údaje</h5>
                        </div>
                        <hr><br>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label text-right" for="t2" style="top:-10px">titul meno priezvisko / názov firmy</label>
                          <div class="col-sm-9">
                              <input aria-describedby="t2HelpBlock" id="t2" name="t2" type="text" onchange="selcint();" placeholder="" class="form-control input-sm" required="" readonly>
                              <!-- <small id="t2HelpBlock" class="text-muted">pre tlačové zostavy</small> -->
                              <span id="t2_error" class="text-danger"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label text-right" for="t3" style="top:-10px">priezvisko meno, upresnenie</label>
                          <div class="col-sm-9">
                              <input aria-describedby="t3HelpBlock" id="t3" name="t3" type="text" placeholder="" class="form-control input-sm" readonly>
                              <small id="t3HelpBlock" class="text-muted">pre správne abecedné zoradenie (napr. tabuľka vľavo)</small>
                          </div>
                        </div>
                        <div class="form-group row" style="top:10px">
                          <label class="col-sm-2 col-form-label text-right" for="t1">prihlasovacie meno</label>
                          <div class="col-sm-4 active">
                            <input aria-describedby="t1HelpBlock" id="t1" name="t1" type="text" placeholder="" class="form-control input-sm active" readonly>
                            <!-- <small id="t1HelpBlock" class="text-muted">min. 8 znakov</small> -->
                            <span id="t1_error" class="text-danger"></span>
                          </div>
                          <div id="prioc" class="col-sm-0"></div>
                          <label class="col-sm-1 col-form-label text-right" for="osc" style="top:-10px">os. číslo Fingera</label>
                          <div class="col-sm-2 disabled">
                            <input id="osc" name="osc" type="text" placeholder="" class="form-control input-sm text-right" readonly>
                            <span id="osc_error" class="text-danger"></span>
                          </div>
                          <label id="priol" class="col-sm-1 col-form-label text-right" for="prio">priorita</label>
                          <div class="col-sm-1 disabled">
                            <input id="prio" name="prio" type="text" placeholder="" class="form-control input-sm text-right" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label text-right" for="t4">mail</label>
                          <div class="col-sm-5">
                              <input aria-describedby="t4HelpBlock" id="t4" name="t4" type="text" placeholder="" class="form-control input-sm" readonly>
                              <!-- <small id="t4HelpBlock" class="text-muted"></small> -->
                              <!-- <span id="t4_error" class="text-danger"></span> -->
                          </div>
                          <div class="col-sm-1"></div>
                          <label class="col-sm-1 col-form-label text-right" for="miesto">miesto</label>
                          <div class="col-sm-2">
                            <select id="miesto" name="miesto" class="form-control" readonly>
                              <option value="<?php echo 1 ?>"><?php echo 'Hronec' ?></option>
                              <option value="<?php echo 2 ?>"><?php echo 'J. Bohunice' ?></option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-1"></div>
                          <label class="col-sm-1 col-form-label text-right" for="cb1">aktuálny/a</label>
                          <div class="col-sm-1">
                            <input id="cb1" name="cb1" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                          <label class="col-sm-1 col-form-label text-right" for="cb3">živnosť</label>
                          <div class="col-sm-1">
                            <input id="cb3" name="cb3" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                          <label id="lprof" class="col-sm-1 col-form-label text-right disabled" for="prof">profesia</label>
                          <div class="col-sm-2">
                            <input id="prof" name="prof" type="text" placeholder="JB" class="form-control input-sm disabled" readonly>
                            <div><span><small class="text-muted pull-left">test</small></span></div>
                          </div>
                          <label class="col-sm-2 col-form-label text-right" for="cb4">auto. réžia v prácach</label>
                          <div class="col-sm-1">
                            <input id="cb4" name="cb4" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label text-right" for="isofn">ISO funkcia</label>
                          <div class="col-sm-3">
                            <select id="isofn" name="isofn" class="form-control" readonly>
                              <?php foreach ($uziv_iso as $r) :?>
                                <option value="<?php echo $r->KOD_ISO;?>"><?php echo $r->ESO;?></option>
                              <?php endforeach;?>
                            </select>
                            <!-- <small class="text-muted">výber ISO funkcie</small> -->
                          </div>
                          <div class="col-sm-1"></div>
                          <label class="col-sm-1 col-form-label text-right" for="skup">zaradenie</label>
                          <div class="col-sm-3">
                            <select id="skup" name="skup" class="form-control" required="required" readonly>
                              <?php foreach ($uziv_skup as $g) :?>
                                <option value="<?php echo $g->KOD_SKU;?>"><?php echo $g->SKUPINA;?></option>
                              <?php endforeach;?>
                            </select>
                            <span id="skup_error" class="text-danger"></span>
                            <input aria-describedby="t5HelpBlock" id="t5" name="t5" type="text" placeholder="" class="form-control input-sm" style="display:none">
                            <!-- <small id="t5HelpBlock" class="text-muted">výber / zadanie skupiny (zaradenia)</small> -->
                            <!-- <span id="t5_error" class="text-danger"></span> -->
                          </div>
                          <div class="col-sm-1" style="display:none">
                            <input id="cbskup" name="cbskup" type="checkbox" checked data-toggle="toggle" data-onstyle="info" data-on="výb." data-off="zad.">
                          </div>
                        </div>
                        <br>
                      </div>
                    </div>
                  </div>
                </div>
                <div data-page="3" style="display:none">
                  <div class="container" style="margin-top:60px;margin-bottom:40px;">
                    <div class="jumbotron" style="margin:0px;background-color:#ccc !important;padding-bottom: 15px;">
                      <div class="container" style="margin:0px;">
                        <div class="form-group row">
                          <h5>    3 - editácia údajov povolená</h5>
                        </div>
                        <hr><br><br>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right" for="cb21">v došlej pošte</label>
                          <div class="col-sm-1">
                            <input id="cb21" name="cb21" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                          <div class="col-sm-1"></div>
                          <label class="col-sm-3 col-form-label text-right" for="cb212">v teame</label>
                          <div class="col-sm-1">
                            <input id="cb212" name="cb212" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right" for="cb22">v odoslanej pošte</label>
                          <div class="col-sm-1">
                            <input id="cb22" name="cb22" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                          <div class="col-sm-1"></div>
                          <label class="col-sm-3 col-form-label text-right" for="cb222">v prácach teamu</label>
                          <div class="col-sm-1">
                            <input id="cb222" name="cb222" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right" for="cb23">v kalkuláciách</label>
                          <div class="col-sm-1">
                            <input id="cb23" name="cb23" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                          <div class="col-sm-1"></div>
                          <label class="col-sm-3 col-form-label text-right" for="cb232">v úlohách teamu</label>
                          <div class="col-sm-1">
                            <input id="cb232" name="cb232" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right" for="cb24">v zákazkách</label>
                          <div class="col-sm-1">
                            <input id="cb24" name="cb24" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                          <div class="col-sm-1"></div>
                          <label class="col-sm-3 col-form-label text-right" for="cb2">validácia zákaziek</label>
                          <div class="col-sm-1">
                            <input id="cb2" name="cb2" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                        </div>
                        <br><br><br>
                        <hr>
                        <br><br>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right" for="cb25">len vo svojich dokladoch a dokumentoch</label>
                          <div class="col-sm-1">
                            <input id="cb25" name="cb25" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                          <div class="col-sm-1"></div>

                        </div>
                        <br><br>
                      </div>
                    </div>
                  </div>
                </div>
                <div data-page="2" style="display:none;">
                  <div class="container" style="margin-top:60px;margin-bottom:40px;">
                    <div class="jumbotron" style="margin:0px;background-color:#ccc !important;padding-bottom: 15px;">
                      <div class="container" style="margin:0px;">
                        <div class="form-group row">
                          <h5>    2 - prezeranie údajov povolené</h5>
                        </div>
                        <hr><br><br>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label text-right" for="cb31">v došlej pošte</label>
                          <div class="col-sm-1">
                            <input id="cb31" name="cb31" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                          <div class="col-sm-0"></div>
                          <label class="col-sm-3 col-form-label text-right" for="sel2t">práce môže zadávať</label>
                          <div class="col-sm-3">
                            <select id="sel2" name="sel2" class="form-control" required="required" readonly>
                              <option value="0"></option>
                              <?php foreach ($uziv_2 as $u2) :?>
                                <option value="<?php echo $u2->KOD;?>"><?php echo $u2->PRACE_MENO;?></option>
                              <?php endforeach;?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label text-right" for="cb32">v odoslanej pošte</label>
                          <div class="col-sm-1">
                            <input id="cb32" name="cb32" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                          <label class="col-sm-3 col-form-label text-right" for="sel2a">práce môže zadávať</label>
                          <div class="col-sm-3">
                            <select id="sel2a" name="sel2a" class="form-control" required="required" readonly>
                              <option value="0"></option>
                              <?php foreach ($uziv_2 as $u2) :?>
                                <option value="<?php echo $u2->KOD;?>"><?php echo $u2->PRACE_MENO;?></option>
                              <?php endforeach;?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label text-right" for="cb33">v kalkuláciách</label>
                          <div class="col-sm-1">
                            <input id="cb33" name="cb33" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                          <div class="col-sm-0"></div>
                          <label class="col-sm-3 col-form-label text-right" for="sel2b">práce môže zadávať</label>
                          <div class="col-sm-3">
                            <select id="sel2b" name="sel2b" class="form-control" required="required" readonly>
                              <option value="0"></option>
                              <?php foreach ($uziv_2 as $u2) :?>
                                <option value="<?php echo $u2->KOD;?>"><?php echo $u2->PRACE_MENO;?></option>
                              <?php endforeach;?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label text-right" for="cb34">v zákazkách</label>
                          <div class="col-sm-1">
                            <input id="cb34" name="cb34" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                          <div class="col-sm-0"></div>
                          <label class="col-sm-3 col-form-label text-right" for="sel2c">práce môže zadávať</label>
                          <div class="col-sm-3">
                            <select id="sel2c" name="sel2c" class="form-control" required="required" readonly>
                              <option value="0"></option>
                              <?php foreach ($uziv_2 as $u2) :?>
                                <option value="<?php echo $u2->KOD;?>"><?php echo $u2->PRACE_MENO;?></option>
                              <?php endforeach;?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label text-right" for="cb342">objednávky v zákazkách</label>
                          <div class="col-sm-1">
                            <input id="cb342" name="cb342" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                        </div>
                        <hr>
                        <br><br>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right" for="cb35">len vo svojich dokladoch a dokumentoch</label>
                          <div class="col-sm-1">
                            <input id="cb35" name="cb35" type="checkbox" data-toggle="toggle" data-on="OK" data-off="nie" data-size="sm">
                          </div>
                          <label class="col-sm-2 col-form-label text-right" for="nove_heslo">nové heslo</label>
                          <div class="col-sm-2" style="margin-top:-20px">
                            <input id="nove_heslo" name="nove_heslo" type="text" placeholder="ponechajte prázdne" class="form-control input text-center" readonly>
                            <span id="heslo_error" class="text-danger"></span>
                          </div>
                          <label class="col-sm-2 col-form-label text-right" for="pw">prvotné heslo</label>
                          <div class="col-sm-2" style="margin-top:-20px">
                            <input id="pw" name="pw" type="text" placeholder="" class="form-control input text-center" readonly>
                          </div>
                        </div>
                        <br><br>
                      </div>
                    </div>
                  </div>
                </div>
                <div data-page="4" style="display:none;">
                  <div class="container" style="margin-top:60px;margin-bottom:40px;">
                    <div class="jumbotron" style="margin:0px;background-color:#ccc !important;padding-bottom: 15px;">
                      <div class="container" style="margin:0px;">
                        <div class="form-group row">
                          <h5>    4 - zadávanie prác</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pagination pagination-centered" style="justify-content:center;">
                  <ul class="pagination" style="display:none">
                    <li data-page="1" class="page-item active"><a id="p1" class="page-link" href="#">1</a></li>
                    <li data-page="2" class="page-item"><a id="p2" class="page-link" href="#">2</a></li>
                    <li data-page="3" class="page-item"><a id="p3" class="page-link" href="#">3</a></li>
                    <li data-page="4" class="page-item"><a id="p4" class="page-link" href="#" style="display:none">4</a></li>
                  </ul>
                </div>
              </div>
              <div class="form-group row" style="margin-top:20px">
                <div class="col-sm-2"></div>
                <!-- type="submit" -->
                <button id="save_add" type="submit" class="col-sm-2 btn btn-primary" style="display:none"><i class="fas fa-save"></i> Uložiť nové údaje</button>
                <button id="save_upd" type="submit" class="col-sm-2 btn btn-primary" style="display:none"><i class="fas fa-save"></i> Uložiť údaje</button>
                <div class="col-sm-4"></div>
                <button id="cancel" class="col-sm-2 btn btn-warning" style="display:none"><i class="fas fa-window-close"></i> Zrušiť</button>
              </div>
              <div class="form-group row" style="margin-top:20px">
                <div class="col-sm-1"></div>
                <div class="col-sm-9">
                  <span id="success_message"></span>
                </div>
              </div>
            </form>
           </div>
        </div>
      </div>
    </body>

    <script type="text/javascript">
      $(window).resize(function() {
        if ($(this).height() >= 1080) {
          // $('#zakazky').datatable().page.len(20).draw();
        } else {
          // $('#zakazky').datatable().page.len(10).draw();
        };
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        var prio = "<?php echo $this->session->userdata('prio'); ?>";
        if(prio==6){localStorage.setItem("isyt_xhj", 'j');
          localStorage.setItem("isyt_xa", 'a');
          var s1 = "<?php echo site_url('c_uziv/lista/1/j')?>";
          $('#zakazky').DataTable().ajax.url(s1).load();
        };
        var eduz = "<?php echo $this->session->userdata('eduzi'); ?>";
        if(prio>6 || (eduz==1 && prio!=6)){
          $("#zhj").show();$("#zh").show();$("#zj").show(); $('#nadpis').show();
        }else{
          $("#cbc").removeClass('col-sm-2');
          $("#cbc").addClass('col-sm-8');
        };
        if(prio>=8){$("#pa").show();};
        if(prio>=7){$("#lo").show();};
        $(".pagination").show();
        $(function() {
          $('#cb').change(function() {
            if($(this).prop('checked')){
              localStorage.setItem("isyt_xa",'a');
              var s1 = "<?php echo site_url('c_uziv/lista/1/a')?>";
              if(localStorage.isyt_xhj=='h'){
                var s1 = "<?php echo site_url('c_uziv/lista/1/h')?>";
              };
              if(localStorage.isyt_xhj=='j'){
                var s1 = "<?php echo site_url('c_uziv/lista/1/j')?>";
              };
            }else{
              localStorage.setItem("isyt_xa",'e');
              var s1 = "<?php echo site_url('c_uziv/lista/0/a')?>";
              if(localStorage.isyt_xhj=='h'){
                var s1 = "<?php echo site_url('c_uziv/lista/0/h')?>";
              };
              if(localStorage.isyt_xhj=='j'){
                var s1 = "<?php echo site_url('c_uziv/lista/0/j')?>";
              };
            };
            $('#zakazky').DataTable().ajax.url(s1).load();
            $('#zakazky').show();
          });
        });
        $(function() {
          $('#cbskup').change(function() {
            if($(this).prop('checked')){
              $('#skup').show();$('#t5').hide();
            }else{
              $('#skup').hide();$('#t5').show();
            }
          });
        });
        $('#zhj').on("click", function() {
          $('#zhj').addClass('btn-warning');
          $('#zj').removeClass('btn-warning');
          $('#zj').addClass('btn-info');
          $('#zh').removeClass('btn-warning');
          $('#zh').addClass('btn-info');
          $('#nadpis').html('Hronec + Jaslovské Bohunice');
          localStorage.setItem("isyt_xhj", 'a');
          if(localStorage.isyt_xa=='a'){
            var s1 = "<?php echo site_url('c_uziv/lista/1/a')?>";
          }else{
            var s1 = "<?php echo site_url('c_uziv/lista/0/a')?>";
          }
          $('#zakazky').DataTable().ajax.url(s1).load();
          $('#zakazky').show();
          $("#zzadd").removeClass('disabled');
          $("#zzrem").removeClass('disabled');
        });
        $('#zh').on("click", function() {
          $('#zh').addClass('btn-warning');
          $('#zj').removeClass('btn-warning');
          $('#zj').addClass('btn-info');
          $('#zhj').removeClass('btn-warning');
          $('#zhj').addClass('btn-info');
          $('#nadpis').html('Hronec');
          localStorage.setItem("isyt_xhj", 'h');
          if(localStorage.isyt_xa=='a'){
            var s1 = "<?php echo site_url('c_uziv/lista/1/h')?>";
          }else{
            var s1 = "<?php echo site_url('c_uziv/lista/0/h')?>";
          }
          $('#zakazky').DataTable().ajax.url(s1).load();
          $('#zakazky').show();
          $("#zzadd").removeClass('disabled');
          $("#zzrem").removeClass('disabled');
        });
        $('#zj').on("click", function() {
          $('#zj').addClass('btn-warning');
          $('#zh').removeClass('btn-warning');
          $('#zh').addClass('btn-info');
          $('#zhj').removeClass('btn-warning');
          $('#zhj').addClass('btn-info');
          $('#nadpis').html('Jaslovské Bohunice');
          localStorage.setItem("isyt_xhj", 'j');
          if(localStorage.isyt_xa=='a'){
            var s1 = "<?php echo site_url('c_uziv/lista/1/j')?>";
          }else{
            var s1 = "<?php echo site_url('c_uziv/lista/0/j')?>";
          }
          $('#zakazky').DataTable().ajax.url(s1).load();
          $('#zakazky').show();
          $("#zzadd").removeClass('disabled');
          $("#zzrem").removeClass('disabled');
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#zzadd').on("click", function(){
          localStorage.setItem("isyt_edi", 1);
          $("#zzedi").addClass('disabled');
          $("#zzrem").addClass('disabled');
          $("#zzadd").addClass('disabled');
          $('#don').html('Nové údaje');
          $('#t1').val('');$('#t1').prop('readonly', false); //$('#t1').prop('required', true);
          $('#t2').val('');$('#t2').prop('readonly', false); $('#t2').prop('required', true);
          $('#isofn').val(0);$('#isofn').attr('readonly', false);
          $('#skup').val(0);$('#skup').attr('readonly', false); $('#skup').attr('required', true);
          $('#sel2').val(0);$('#sel2').attr('readonly', false);
          $('#sel2a').val(0);$('#sel2a').attr('readonly', false);
          $('#sel2b').val(0);$('#sel2b').attr('readonly', false);
          $('#sel2c').val(0);$('#sel2c').attr('readonly', false);
          $('#skupv').val(0);
          $('#skupt').val('');
          $('#nove_heslo').val('');$('#nove_heslo').prop('readonly', false);
          $("#cbskup").attr('disabled', 'disabled');
          $('#prio').val(0);$('#prio').prop('readonly', false);
          $('#osc').val(0);$('#osc').prop('readonly', false);
          $('#t3').val('');$('#t3').prop('readonly', false);
          $('#t4').val('');$('#t4').prop('readonly', false);
          if(localStorage.isyt_xhj=='j'){$("#miesto").val(2);}else{$("#miesto").val(1);};

            $('#prof').attr('readonly', false); $("#prof").removeClass('disabled');

          //$("#miesto").attr('disabled', 'disabled');
          $(function(){ $('#cb1').bootstrapToggle('on')});
          $(function(){ $('#cb2').bootstrapToggle('off')});
          $(function(){ $('#cb3').bootstrapToggle('off')});
          $(function(){ $('#cb4').bootstrapToggle('off')});
          //$('#t5').val('');$('#t5').prop('readonly', false); $('#t5').prop('required', true);
          $(function(){ $('#cb21').bootstrapToggle('off')});
          $(function(){ $('#cb212').bootstrapToggle('off')});
          $(function(){ $('#cb22').bootstrapToggle('off')});
          $(function(){ $('#cb222').bootstrapToggle('off')});
          $(function(){ $('#cb23').bootstrapToggle('off')});
          $(function(){ $('#cb24').bootstrapToggle('off')});
          $(function(){ $('#cb25').bootstrapToggle('off')});
          $(function(){ $('#cb31').bootstrapToggle('off')});
          $(function(){ $('#cb32').bootstrapToggle('off')});
          $(function(){ $('#cb33').bootstrapToggle('off')});
          $(function(){ $('#cb34').bootstrapToggle('off')});
          $(function(){ $('#cb342').bootstrapToggle('off')});
          $(function(){ $('#cb35').bootstrapToggle('off')});
          $('#save_upd').hide();
          $('#save_add').show();
          $('#cancel').show();
          var prio = "<?php echo $this->session->userdata('prio'); ?>";
          if(prio>7){
            $("#prioc").removeClass('col-sm-1');
            $("#prioc").addClass('col-sm-0');
            $("#priol").show();
            $("#prio").show();
          };
          $("#t2").focus();
        });
        $('#zzedi').on("click", function(){
          localStorage.setItem("isyt_edi", 2);
          $("#zzedi").addClass('disabled');
          $("#zzrem").addClass('disabled');
          $("#zzadd").addClass('disabled');
          $('#t1').prop('readonly', false);
          $('#t2').prop('readonly', false); $('#t2').prop('required', true);
          $('#t3').prop('readonly', false);
          $('#t4').prop('readonly', false);
          $('#nove_heslo').prop('readonly', false);
          //$("#miesto").attr('readonly', false);
          $('#prio').prop('readonly', false);
          $('#isofn').attr('readonly', false);
          $('#skup').attr('readonly', false); $('#skup').attr('required', true);

          $('#prof').attr('readonly', false); $("#prof").removeClass('disabled');


          $('#sel2').attr('readonly', false);
          $('#sel2a').attr('readonly', false);
          $('#sel2b').attr('readonly', false);
          $('#sel2c').attr('readonly', false);
          $('#osc').prop('readonly', false);
          $('#save_upd').show();
          $('#save_add').hide();
          $('#cancel').show();
          $("#t2").focus();
        });
        function encr(message = '', key = ''){
          var message = CryptoJS.AES.encrypt(message, 'TySI.bew');
          return message.toString();
        };
        function decr(message = '', key = ''){
          var code = CryptoJS.AES.decrypt(message, 'TySI.bew');
          var decryptedMessage = code.toString(CryptoJS.enc.Utf8);
          return decryptedMessage;
        };
        // console.log(encrypt('Hello World'));
        // console.log(decrypt('U2FsdGVkX1/0oPpnJ5S5XTELUonupdtYCdO91v+/SMs='));
        $("#save_add").on('click', function() {
          $.ajax({
            url: "<?php echo base_url().'c_uziv/validation/a'?>",
            data: $('#uziv_form').serialize(),
            dataType: "json",
            async: 'true',
            cache: 'false',
            type: 'post',
            beforeSend:function(){
              $('#miesto').attr('readonly', false);
              //$('#uziv_form').attr('disabled', 'disabled');
              $('#sel2').attr('readonly', false);
              $('#sel2a').attr('readonly', false);
              $('#sel2b').attr('readonly', false);
              $('#sel2c').attr('readonly', false);
            },
            success:function(data){
              if(data.error){
                if(data.t1_error != ''){
                  $('#t1_error').html(data.t1_error);
                }else{
                  $('#t1_error').html('');
                }
                if(data.t2_error != ''){
                  $('#t2_error').html(data.t2_error);
                }else{
                  $('#t2_error').html('');
                }
                if(data.t4_error != ''){
                  $('#t4_error').html(data.t4_error);
                }else{
                  $('#t4_error').html('');
                }
                if(data.skup_error != ''){
                  $('#skup_error').html(data.skup_error);
                }else{
                  $('#skup_error').html('');
                }
                if(data.osc_error != ''){
                  $('#osc_error').html(data.osc_error);
                }else{
                  $('#osc_error').html('');
                }
              }
              if(data.success){
                //$('#t1').val('');$('#t1').prop('readonly', true);
                //$('#t2').val('');$('#t2').prop('readonly', true);
                $('#t1_error').html('');
                $('#t2_error').html('');
                $('#t4_error').html('');
                $('#skup_error').html('');
                $('#osc_error').html('');
                localStorage.setItem("isyt_k", "<?php echo $this->session->userdata('kod'); ?>");
                localStorage.setItem("isyt_m", "<?php echo $this->session->userdata('uziv'); ?>");
                var s1 = "<?php echo base_url().'c_uziv/adduziv/'?>" + localStorage.isyt_xhj;
                if(localStorage.isyt_xhj=='h'){s1 = s1 + '/h';};
                if(localStorage.isyt_xhj=='j'){s1 = s1 + '/j';};
                $.ajax({
                  //url: "<?php //echo base_url().'c_uziv/adduziv/'?>" + localStorage.isyt_kod + '/' + localStorage.isyt_d6 + '/' + "<?php //echo $this->session->userdata('kod'); ?>" + '/' + localStorage.isyt_id,
                  url: s1,
                  data: $('#uziv_form').serialize(),
                  dataType: "json",
                  async: 'true',
                  cache: 'false',
                  type: 'post'
                  // success: function( response ) {
                  //   console.log(response);
                  //   console.log(response.success);
                  // }
                });
                if(localStorage.isyt_xhj=='h'){
                  var s1 = "<?php echo site_url('c_uziv/lista/0/h')?>";
                };
                if(localStorage.isyt_xhj=='j'){
                  var s1 = "<?php echo site_url('c_uziv/lista/0/j')?>";
                };
                $('#zakazky').DataTable().ajax.url(s1).load();
                var table = $('#zakazky').DataTable();
                // table.search( document.getElementById("t1").value ).draw();
                $("#zzadd").removeClass('disabled');
                $('#save_add').hide();
                $('#save_upd').hide();
                $('#cancel').hide();
                $('#t1_error').hide();
                $('#t2_error').hide();
                $('#t4_error').hide();
                $('#skup_error').hide();
                $('#osc_error').hide();
                $('#uziv_form')[0].reset();
                $('#t1').prop('required', false);
                $('#t2').prop('required', false);
                $('#t4').prop('required', false);
                $('#t1').prop('readonly', true);
                $('#t2').prop('readonly', true);
                $('#t3').prop('readonly', true);
                $('#t4').prop('readonly', true);
                $('#t3').prop('readonly', true);
                $('#prof').attr('readonly', true); $("#prof").addClass('disabled');
                $("#prio").prop('readonly', true);
                $('#isofn').attr('readonly', true);
                $('#skup').attr('readonly', true); $('#skup').attr('required', false);
                $('#sel2').attr('readonly', true);
                $('#sel2a').attr('readonly', true);
                $('#sel2b').attr('readonly', true);
                $('#sel2c').attr('readonly', true);
                $('#osc').prop('readonly', true);
                $("#miesto").attr('readonly', true);
                localStorage.setItem("isyt_edi", 0);
                <?php $uziv_skup = $_SESSION['uziv_skup'];?>
                <?php $uziv_iso = $_SESSION['uziv_iso'];?>
                <?php $uziv_2 = $_SESSION['uziv_2'];?>
                //$('#success_message').html(data.success);
                $('#success_message').html('<div class="alert alert-success text-center">nový člen teamu ' + "<?php echo $_SESSION['pom'];?>" + ' úspešne pridaný</div>');
                $("#success_message").show();
                setTimeout(function() { $("#success_message").hide(); }, 5000);
                //alert('prvotne heslo pre ' + "<?php echo $_SESSION['pom'];?>" + ' je: ' + "<?php echo $_SESSION['ae'];?>");
                //e.preventDefault();
                //var url = $(this).attr('href');
                swal.fire({
                  title: "heslo pre " + "<?php echo $_SESSION['pom'];?>",
                  text: "<?php echo $_SESSION['ae'];?>",
                  type: "warning",
                  showCancelButton: false,
                  confirmButtonColor: '#DD6B55',
                  confirmButtonText: 'OK',
                  //cancelButtonText: "Nie",
                  confirmButtonClass: "btn-danger"
                }).then((result) => {if (result.value) {} });
              }
              $('#uziv_form').attr('disabled', false);
            }
          });
        });
        $("#save_upd").on('click', function() {
          $.ajax({
            url: "<?php echo base_url().'c_uziv/validation/e'?>",
            data: $('#uziv_form').serialize(),
            dataType: "json",
            async: 'true',
            cache: 'false',
            type: 'post',
            beforeSend:function(){
              $('#miesto').attr('readonly', false);
              //$('#uziv_form').attr('disabled', 'disabled');
              $('#sel2').attr('readonly', false);
              $('#sel2a').attr('readonly', false);
              $('#sel2b').attr('readonly', false);
              $('#sel2c').attr('readonly', false);
            },
            success:function(data){
              if(data.error){
                if(data.t1_error != ''){
                  $('#t1_error').html(data.t1_error);
                }else{
                  $('#t1_error').html('');
                }
                if(data.t2_error != ''){
                  $('#t2_error').html(data.t2_error);
                }else{
                  $('#t2_error').html('');
                }
                if(data.t4_error != ''){
                  $('#t4_error').html(data.t4_error);
                }else{
                  $('#t4_error').html('');
                }
                if(data.skup_error != ''){
                  $('#skup_error').html(data.skup_error);
                }else{
                  $('#skup_error').html('');
                }
                if(data.osc_error != ''){
                  $('#osc_error').html(data.osc_error);
                }else{
                  $('#osc_error').html('');
                }
              }
              if(data.success){
                //$('#t1').val('');$('#t1').prop('readonly', true);
                //$('#t2').val('');$('#t2').prop('readonly', true);
                $('#t1_error').html('');
                $('#t2_error').html('');
                $('#t4_error').html('');
                $('#skup_error').html('');
                $('#osc_error').html('');
                localStorage.setItem("isyt_k", "<?php echo $this->session->userdata('kod'); ?>");
                localStorage.setItem("isyt_m", "<?php echo $this->session->userdata('uziv'); ?>");
                var s1 = "<?php echo base_url().'c_uziv/upduziv/'?>" + localStorage.isyt_id + "/" + localStorage.isyt_kod;
                $.ajax({
                  //url: "<?php //echo base_url().'c_uziv/adduziv/'?>" + localStorage.isyt_kod + '/' + localStorage.isyt_d6 + '/' + "<?php //echo $this->session->userdata('kod'); ?>" + '/' + localStorage.isyt_id,
                  url: s1,
                  data: $('#uziv_form').serialize(),
                  dataType: "json",
                  async: 'true',
                  cache: 'false',
                  type: 'post'
                  // success: function( response ) {
                  //   console.log(response);
                  //   console.log(response.success);
                  // }
                });
                if(localStorage.isyt_xa=='a'){
                  var s1 = "<?php echo site_url('c_uziv/lista/1/a')?>";
                  if(localStorage.isyt_xhj=='h'){
                    var s1 = "<?php echo site_url('c_uziv/lista/1/h')?>";
                    $("#zzadd").removeClass('disabled');
                  };
                  if(localStorage.isyt_xhj=='j'){
                    var s1 = "<?php echo site_url('c_uziv/lista/1/j')?>";
                    $("#zzadd").removeClass('disabled');
                  };
                }else{
                  var s1 = "<?php echo site_url('c_uziv/lista/0/a')?>";
                  if(localStorage.isyt_xhj=='h'){
                    var s1 = "<?php echo site_url('c_uziv/lista/0/h')?>";
                  };
                  if(localStorage.isyt_xhj=='j'){
                    var s1 = "<?php echo site_url('c_uziv/lista/0/j')?>";
                  };
                };
                $('#zakazky').DataTable().ajax.url(s1).load();
                var table = $('#zakazky').DataTable();
                // table.search( document.getElementById("t1").value ).draw();
                $('#save_add').hide();
                $('#save_upd').hide();
                $('#cancel').hide();
                $('#t1_error').hide();
                $('#t2_error').hide();
                $('#t4_error').hide();
                $('#skup_error').hide();
                $('#osc_error').hide();
                $('#uziv_form')[0].reset();
                $('#t1').prop('required', false);
                $('#t2').prop('required', false);
                $('#t4').prop('required', false);
                $('#t1').prop('readonly', true);
                $('#t2').prop('readonly', true);
                $('#t3').prop('readonly', true);
                $('#t4').prop('readonly', true);
                $('#nove_heslo').val('');
                $('#nove_heslo').prop('readonly', true);
                $('#t3').prop('readonly', true);
                $('#prof').attr('readonly', true); $("#prof").addClass('disabled');
                $("#prio").prop('readonly', true);
                $('#isofn').attr('readonly', true);
                $('#skup').attr('readonly', true); $('#skup').attr('required', false);
                $('#sel2').attr('readonly', true);
                $('#sel2a').attr('readonly', true);
                $('#sel2b').attr('readonly', true);
                $('#sel2c').attr('readonly', true);
                $('#osc').prop('readonly', true);
                $("#miesto").attr('readonly', true);
                localStorage.setItem("isyt_edi", 0);
                $('#success_message').html('<div class="alert alert-success text-center">úpravy údajov ' + localStorage.isyt_prac + ' úspešne uložené</div>');
                $("#success_message").show();
                setTimeout(function() { $("#success_message").hide(); }, 5000);
                <?php $uziv_skup = $_SESSION['uziv_skup'];?>
                <?php $uziv_iso = $_SESSION['uziv_iso'];?>
                <?php $uziv_2 = $_SESSION['uziv_2'];?>
              }
              $('#uziv_form').attr('disabled', false);
            }
          });
        });
        $("#cancel").on('click', function(){
          var table = $('#zakazky').DataTable();
          var ri = table.rows('.selected').count();
          if(ri === 0){
            $("#zzedi").addClass('disabled');
            //$("#zzrem").addClass('disabled');
            if(localStorage.isyt_edi == 1){
              $("#zzadd").removeClass('disabled');
            };
          };
          $('#save_add').hide();
          $('#save_upd').hide();
          $('#cancel').hide();
          if(localStorage.isyt_edi == 2){
            $("#zzedi").removeClass('disabled');
          };
          $('#t1').val('');$('#t1').prop('readonly', true); $('#t1').prop('required', false);
          $('#t2').val('');$('#t2').prop('readonly', true); $('#t2').prop('required', false);
          $('#t4').val('');$('#t4').prop('readonly', true); $('#t4').prop('required', false);
          $('#nove_heslo').val('');$('#nove_heslo').prop('readonly', true);
          $("#prio").prop('readonly', true);
          $('#isofn').attr('readonly', true);
          $('#skup').attr('readonly', true); $('#skup').attr('required', false);

          $('#t3').prop('readonly', true);
          $('#prof').attr('readonly', true); $("#prof").addClass('disabled');

          $('#sel2').attr('readonly', true);
          $('#sel2a').attr('readonly', true);
          $('#sel2b').attr('readonly', true);
          $('#sel2c').attr('readonly', true);
          $('#osc').prop('readonly', true);
          $("#miesto").attr('disabled', false);
          $('#t1_error').hide();
          $('#t2_error').hide();
          $('#t4_error').hide();
          $('#skup_error').hide();
          $('#osc_error').hide();
          $('#uziv_form')[0].reset();
          localStorage.setItem("isyt_edi", 0);
        });
        $('#zzrem').on("click", function(e){
          e.preventDefault();
          //var url = $(this).attr('href');
          swal.fire({
            title: "Naozaj chcete odstrániť údaje ?", //text: "Údaje sa po vymazaní nedajú obnoviť !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Áno',
            cancelButtonText: "Nie",
            confirmButtonClass: "btn-danger"
          }).then((result) => {
            if (result.value) {//Swal.fire('Deleted!','Your imaginary file has been deleted.','success')
              var s1 = "<?php echo base_url().'c_uziv/deluziv/'?>" + localStorage.isyt_izus + "<?php ; ?>";
              $('#zakazky').DataTable().ajax.url(s1).load();

              var s1 = '<?php echo site_url('c_uziv/lista/1/a')?>';
              $('#zakazky').DataTable().ajax.url(s1).load();
              // $("#zzrem").addClass('disabled');
              // $("#zzedi").addClass('disabled');
              // $("#zzadd").removeClass('disabled');
            } else if (result.dismiss === Swal.DismissReason.cancel) {//Swal.fire('Cancelled','Your imaginary file is safe :)','error')
            }
          });
          $('#save_add').hide();
          $('#save_upd').hide();
          $('#cancel').hide();

          localStorage.setItem("isyt_edi", 0);
        });
      });
    </script>
    <script>
      var paginationHandler = function(){
          // store pagination container so we only select it once
          var $paginationContainer = $(".pagination-container"),
              $pagination = $paginationContainer.find('.pagination ul');
          // click event
          $pagination.find("li a").on('click.pageChange',function(e){
              e.preventDefault();
              // get parent li's data-page attribute and current page
          var parentLiPage = $(this).parent('li').data("page"),
          currentPage = parseInt( $(".pagination-container div[data-page]:visible").data('page') ),
          numPages = $paginationContainer.find("div[data-page]").length;
          // make sure they aren't clicking the current page
          if ( parseInt(parentLiPage) !== parseInt(currentPage) ) {
          // hide the current page
          $paginationContainer.find("div[data-page]:visible").hide();
          localStorage.setItem("isyt_pag", parentLiPage);
          $pagination.find("li[data-page="+ currentPage +"]").removeClass('active');
          $pagination.find("li[data-page="+ parentLiPage +"]").addClass('active');
          if ( parentLiPage === '+' ) {
                      // next page
              $paginationContainer.find("div[data-page="+( currentPage+1>numPages ? numPages : currentPage+1 )+"]").show();
          } else if ( parentLiPage === '-' ) {
                      // previous page
              $paginationContainer.find("div[data-page="+( currentPage-1<1 ? 1 : currentPage-1 )+"]").show();
          } else {
              // specific page
              $paginationContainer.find("div[data-page="+parseInt(parentLiPage)+"]").show();
                  }
              }
          });
      };
      $( document ).ready( paginationHandler );
    </script>

    <script type="text/javascript">
      var dia = "áäčďéíľĺňóôŕšťúýÁČĎÉÍĽĹŇÓŠŤÚÝŽ";
      var nodia = "aacdeillnoorstuyACDEILLNOSTUYZ";
      function diaConvert(text) {
        var convertText = "";
        for(i=0; i<text.length; i++) {
            if(dia.indexOf(text.charAt(i))!=-1) {
              convertText += nodia.charAt(dia.indexOf(text.charAt(i)));
            }
            else {
              convertText += text.charAt(i);
            }
        }
        return convertText;
      };
      function selcint(){
        var s = document.getElementById("t2").value;
        localStorage.setItem("isyt_prac", s);
        //console.log(s);
        if(s != ''){
          s = diaConvert(s);
          var poc = s.match(/\w+/g).length;
          var posb = s.indexOf(".");
          var posc = s.indexOf(",");
          var posm = s.indexOf(" ");
          //console.log(poc + '   ' + posb + '   ' + posc + '   ' + posm);
          if (posm>0){
            if(posc>0){//trim(copy(dm.ffManazeriMESO.Value, medzera + 1, ciarka - medzera - 1)) + ' ' + copy(dm.ffManazeriMESO.Value, 1, medzera - 1) +
                       //copy(dm.ffManazeriMESO.Value, ciarka, 10)
              var s1 = s.substr(posm, posc - posm);
              var s2 = s.substr(0, posm);
              var s3 = s.substr(posc, 10);
              document.getElementById("t3").value = s1.trim() + s2.trim() + s3;
            }else{//trim(copy(dm.ffManazeriMESO.Value, medzera + 1, 30)) + ' ' + copy(dm.ffManazeriMESO.Value, 1, medzera - 1);
              var s1 = s.substr(posm, 30);
              var s2 = s.substr(0, posm);
              document.getElementById("t3").value = s1.trim() + s2.trim();
            }
          }else{
            document.getElementById("t3").value = s;
          };
        }else{
          document.getElementById("t3").value = '';
        };
      };
      var prio = "<?php echo $this->session->userdata('prio'); ?>";
      var eduz = "<?php echo $this->session->userdata('eduzi'); ?>";
      if(prio == 9 || eduz){
        $('#zzremc').show();
      }else{$('#zzremc').hide(); $('#c1').hide(); $('#c2').removeClass("col-sm-1"); $('#c2').addClass("col-sm-3");};
      $('#r2').show();

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
