<div id = "admin" class="welcome" style="display: none">
    <div class="container" style="width: 80%">
        <!-- <a class="btn btn-primary pull-right" href="<?php echo site_url('dbf_import_x.php') ?>">import dbf dát</a> -->
        <!-- <a class="btn btn-primary pull-right" href="<?php echo site_url('c_site/zaloha') ?>">záloha dát</a> -->
        <!-- <h3>Welcome to Online Web Tutor</h3> -->
        <h4><?php //echo $message; ?></h4>
        <!-- <p>This is the playlist of Codeigniter Framework v3.1.10</p> -->
        <!-- <h4 class="text-center"><?php echo $_SESSION['den'].'   =   '. date('d.m.Y', $_SESSION['den']); ?></h4> -->
    </div>
</div>
<!--
<script src="https://bossanova.uk/jexcel/v3/jexcel.js"></script>
<link rel="stylesheet" href="https://bossanova.uk/jexcel/v3/jexcel.css" type="text/css" />
<script src="https://bossanova.uk/jexcel/v4/jexcel.js"></script>
<link rel="stylesheet" href="https://bossanova.uk/jexcel/v4/jexcel.css" type="text/css" />
<script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>
<link rel="stylesheet" href="https://bossanova.uk/jsuites/v2/jsuites.css" type="text/css" /> -->

<!-- <link rel="stylesheet" type="text/css" href="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css" /> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<!-- <script src="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script> -->

<script type="text/javascript" src="<?php echo base_url('js/jexcel.js'); ?>"></script>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('css/jexcel.css'); ?>"/>
<script type="text/javascript" src="<?php echo base_url('js/jsuites.js'); ?>"></script>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('css/jsuites.css'); ?>"/>

<!-- <script src="https://bossanova.uk/jspreadsheet/v4/jexcel.js"></script>
<script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
<link rel="stylesheet" href="https://bossanova.uk/jspreadsheet/v4/jexcel.css" type="text/css" /> -->

<script type="text/javascript" src="<?php echo base_url('js/jquery-clockpicker.min.js'); ?>"></script>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('css/jquery-clockpicker.min.css'); ?>"/>

<script>
    localStorage.setItem("do_us", '');
    localStorage.setItem("do_ria", '');
    localStorage.setItem("do_stl", '');
    localStorage.setItem("doch_clk", '');
    localStorage.setItem("do_pom", 0);
    localStorage.setItem('miesto_rad', 1 );
    localStorage.setItem('vypl_rad', 1 );
    localStorage.setItem('miesto_od', "" );
    localStorage.setItem('miesto_do', "" );
    var d = "<?php echo date('d.m.Y'); ?>";
    localStorage.setItem('doch_datum', d);
    localStorage.setItem('doch_uvod', 1 );
</script>

<div class="container col-sm-12" style="top:20px">

    <button id="cidochThemeToggle" class="cidoch-theme-toggle"
            type="button" title="Prepnúť vzhľad"
            aria-label="Prepnúť vzhľad">
        <i class="fas fa-sun"></i>
    </button>


    <div class="row col-sm-12" style="top:5px">
        <div class="container-fluid col-sm-2">
            <div class="row col-sm-12" style="top:-25px">
                <div class="col-sm-0"></div>
                <div id="cbc" class="col-sm-2" style="top:0px">
                    <h2 id="den">Evidencia dochádzky  <?php echo date('m.Y', $_SESSION['den'])?></h2>
                </div>
            </div>
            <div class="row col-sm-12" style="top:-15px; left:40px">
                <div id="kalendar" class="col-sm-4" data-date="<?php echo date('d.m.Y', $_SESSION['den']); ?>" style="top:0px;left:-20px" data-date-end-date="+0m"></div>
                <!-- data-date-start-date="-1m" -->
            </div>
            <div class="row col-sm-12" style="top:0px">
                <!-- <div class="col-sm-2"></div> -->
                <div id="uziv" class="col-sm-12" style="display:none; left: -90px"></div>
            </div>
            <div id="cb" class="row col-sm-12" style="top:10px">
                <div class="col-sm-4"></div>
                <input id="cb1" name="cb1" type="checkbox" data-toggle="toggle" data-on="výplata" data-off="dochádzka" data-size="m" onchange="selcint();" style="width: 800px; !important;">
            </div>
            <div class="row col-sm-12" style="top:25px">
                <div class="col-sm-2"></div>
                <a id="gen" type="button" class="btn btn-warning center" style="display:none" href="#">generuj novú dochádzku</a>
            </div>
            <div class="row col-sm-12" style="top:50px">
                <div class="col-sm-2"></div>
                <a id="kon" type="button" class="btn btn-warning center" style="display:none" href="#">kontrola hodín - <?php echo date('m.Y', $_SESSION['den'])?></a>
            </div>
            <div class="row col-sm-12" style="top:75px">
                <div class="col-sm-2"></div>
                <a id="btn_edit_uziv" type="button" class="btn btn-info center" style="display:none" href="<?php echo site_url('uziv/list'); ?>">Editácia používateľov</a>
            </div>
        </div>
        <div id="div_doch_zam" class="container-fluid col-sm-4" style="top:-25px">
            <table id="doch_zam" class="row col-sm-12 table display table-responsive table-striped table-hover table-bordered compact order-column nowrap" style="display:none" width="100%">
                <thead>
                  <tr class="success" style="max-width: 100%">
                    <th></th>
                    <!-- <th></th> -->
                    <th>dátum</th>
                    <th>deň</th>
                    <th>od</th>
                    <th>do</th>
                    <th>hod.</th>
                    <th>obed</th>
                    <th>± hod.</th>
                    <th>h.Dan.</th>
                    <th>poznámka</th>
                    <th>sviatok</th>
                  </tr>
                </thead>
                <tbody id="show_data">
                </tbody>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th colspan="3" style="text-align:right">spolu</th>
                    <th style="text-align:right"></th>
                    <th style="text-align:right"></th>
                    <th style="text-align:right"></th>
                  </tr>
                </tfoot>
            </table>
            <script type="text/javascript">
                $(document).ready(function () {
                    var prio = "<?php echo $this->session->userdata('prio'); ?>";
                    var eduz = "<?php echo $this->session->userdata('eduzi'); ?>";
                    if (prio > 6 || (eduz == 1 && prio != 6)) {
                        $('#btn_edit_uziv').show();
                    }
                    $('#doch_zam').dataTable({
                      "ajax": {
                          url: "<?php echo base_url().'c_doch/get_doch/'?>" + localStorage.doch_datum + "/0/x",
                          type: "GET",
                          dataSrc: ""
                      },
                      select: 'single',
                      dom:  '<"top">tr<"bottom"p><"clear">',
                      //"buttons": [],
                      hover:      true,
                      //processing: true,
                      compact:    true,
                      autoWidth:  false,
                      pageLength: 32,
                      pagingType:  'numbers',
                      language: { lengthMenu: "zobrazené: _MENU_ záznamov",
                                  sLoadingRecords:	"Načítavam...",
                                  sProcessing:	"moment ...",
                                  sInfo:	"Záznamy _START_ až _END_ z celkom _TOTAL_",
                                  //infoEmpty: "No records available",
                                  sInfoEmpty:	"Záznamy 0 až 0 z celkom 0 ",
                                  zeroRecords: "žiadne dáta",
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
                      "createdRow": function ( row, data, rowData ) {
                            var r = localStorage.doch_rz;
                            if(r != null){
                                if (rowData == r){
                                    if(localStorage.doch_uvod == 1){
                                        if(table.rows('.selected').count() === 1){
                                            $('#pozn_form').show();
                                        }
                                    } else {
                                        this.api().row($(row)).select();
                                        this.api().row($(row)).deselect();
                                        this.api().row($(row)).select();

                                        localStorage.setItem('doch_uvod', data );

                                        $('#meno_kal').show();
                                        $("#print_d").show();
                                        $("#print_h").show();

                                        $("#pridaj_hod").val('pridaj hodiny pre ' + localStorage.doch_pom);
                                        document.getElementById("pridaj_hod").innerHTML = 'pridaj hodiny pre ' + localStorage.doch_pom;
                                        localStorage.setItem("doch_datum", localStorage.doch_pom);
                                        $('#pridaj_hod').show();
                                        $("#print_d").show();
                                        $("#print_h").show();

                                        if(table.rows('.selected').count() === 1){

                                            $('#pozn').show();
                                            $("#textarea").val(data.POZN);
                                            $('#textarea').show();
                                            $('#uprav_pozn').show();
                                            $("#cancel_pozn").hide();
                                            $("#save_pozn").hide();
                                            $("#textarea").attr("readonly", true);

                                            $('#pozn_form').show();
                                            $('#pozn_form').hide();
                                            $('#pozn_form').show();

                                            var s1 = "<?php echo base_url().'c_doch/get_doch_den/'?>" + localStorage.doch_pom + '/' + localStorage.zam_id;
                                            $('#doch_den').DataTable().ajax.url(s1).load();
                                            $('#doch_den').show();
                                            if( $('#vypl_form').is(":visible")){
                                                $('#doch_den').hide();
                                                $('#pridaj_hod').hide();
                                            }
                                        };
                                    }
                                };
                            };
                      },
                      "columns": [
                        // {  "className": 'details-control',
                        //     "orderable": false,
                        //     "data": null,
                        //     "defaultContent": '',
                        //     "render": function(){},
                        //     width:"15px","visible": false
                        // },
                        { "data": "id","visible": false },
                        // { "data": "KOD","visible": false },
                        { "data": "DATUM","className": 'dt-body-center',"width": '10px' },
                        { "data": "DEN","className": 'dt-body-center',"width": '1px' },
                        { "data": "PRICHOD","className": 'dt-body-center',"width": '1px'},
                        { "data": "ODCHOD","className": 'dt-body-center',"width": '1px'},
                        { "data": 'HODINY',"className": 'dt-body-right',"width": '1px', "render":function(data){if(data==0){return '';}else{return parseFloat(data).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$& ');}}},
                        { "data": 'OBED',  "render": function ( data, type, row ) {
                            if (data == 1){
                                return '●';
                            } else {
                                return '-';
                            }
                        }, "className": 'dt-body-center',"width": '1px' },
                        { "data": 'NADCAS',"className": 'dt-body-right',"width": '1px',
                          "render":function( data, row ){
                            if(data==0){
                                if(row.PRICHOD == ''){
                                    return ''
                                } else {
                                    return ''; //0.0;
                                }
                            } else {
                                return parseFloat(data).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$& ');
                        }}},
                        { "data": 'HODINY_DN',"visible": false,"className": 'dt-body-right',"width": '10px', "render":function(data){if(data==0){return '';}else{return parseFloat(data).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$& ');}}},
                        { "data": 'POZN',"width": '50px',
                          "render": function(data, type, row) {
                                if (type === 'display' && data != null) {
                                    data = data.replace(/<(?:.|\\n)*?>/gm, '');
                                    if(data.length > 50) {
                                    return '<span class=\"show-ellipsis\">' + data.substr(0, 50) + '</span><span class=\"no-show\">' + data.substr(20) + '</span>';
                                    } else {
                                    return data;
                                    }
                                } else {
                                    return data;
                                } } },
                        { "data": "SVIATOK","visible": false }
                      ],
                      columnDefs: [
                      //{"width": "1%", "targets": 3},
                        { targets: [ 1, 2, 9 ],
                            createdCell: function (td, Data, row, col) {
                                if (( Data == 'So' ) || ( Data == 'Ne' )) {
                                    $(td).css('color', 'red')
                                } else {
                                    // $(td).css('color', 'green')
                                }
                                if ( row.SVIATOK > 0 ) {
                                    $(td).css('background-color', '#C8EFD4')
                                } else {
                                    //$(td).css('color', 'red')
                                    var result = row.POZN.indexOf("dovolenka");
                                    if ( result > -1 ) {
                                        $(td).css('background-color', '#FFFCCC');
                                    }
                                    // localStorage.id_miesto_akt_uziv
                                }
                                if ( row.MIESTO > 0 ) {
                                    $(td).css('background-color', '#C6DAE3')
                                }
                            }
                        }
                      ],
                      footerCallback: function ( row, data, start, end, display ) {
                        var api = this.api(), data;
                        // Remove the formatting to get integer data for summation
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };
                        total = api
                          .column(5, { search: 'applied' })
                          .data()
                          .reduce(function (a, b) {
                          return intVal(a) + intVal(b);
                        }, 0);
                        totaln = api
                          .column(7, { search: 'applied' })
                          .data()
                          .reduce(function (a, b) {
                          return intVal(a) + intVal(b);
                        }, 0);
                        totaln = api
                          .column(8, { search: 'applied' })
                          .data()
                          .reduce(function (a, b) {
                          return intVal(a) + intVal(b);
                        }, 0);
                        $( api.column( 1 ).footer() ).html('spolu');
                        $( api.column( 5 ).footer() ).html(total.toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$& '));
                        $( api.column( 7 ).footer() ).html(totaln.toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$& '));
                        $( api.column( 8 ).footer() ).html(totaln.toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$& '));
                      }
                  });
// select row
                  var selected = [];
                  var table = $('#doch_zam').DataTable();
                  $('#doch_zam tbody').on('click', 'tr', function () {
                    var id = this.id;
                    var index = $.inArray(id, selected);
                    var tr = $(this).parents('tr');
                    row_id = table.row( this ).index();
                    var row = table.row( this ).id();
                    var pom = table.row( this ).data().DATUM;
                    localStorage.setItem("doch_pom", pom);

                    $("#prace_form").hide();

                    $(this).toggleClass('selected');
                    var ri = table.rows('.selected').count();
                    if(ri === 0){

                        $("#zz").addClass('disabled');
                        localStorage.removeItem("doch_rz");

                        $('#pozn').hide();
                        $('#textarea').hide();
                        $('#uprav_pozn').hide();
                        $('#doch_den').hide();
                        $('#r3').hide();
                        $('#pridaj_hod').hide();
                        // $("#print_d").hide();
                        // $('#meno_kal').hide();
                        $("#cancel_pozn").hide();
                        $("#save_pozn").hide();
                        $("#textarea").attr("readonly", true);

                        // $("#zzedi").addClass('disabled');
                        // $("#zzrem").addClass('disabled');
                        // $("#zzadd").addClass('disabled');
                    } else {

                        localStorage.setItem("doch_rz", table.row(this).index());

                        if (localStorage.doch_d3 != 0){
                            $('#cancel').click();
                        }

                        localStorage.setItem("id_den", table.row( this ).data().id);

                        document.getElementById("pozn").innerHTML = 'poznámka k ' + table.row( this ).data().DATUM;
                        $('#pozn').show();
                        $("#textarea").val(table.row( this ).data().POZN);
                        $('#textarea').show();
                        $('#uprav_pozn').show();
                        $("#cancel_pozn").hide();
                        $("#save_pozn").hide();
                        $("#textarea").attr("readonly", true);

                        localStorage.setItem("doch_pozn", table.row( this ).data().POZN);

                        $("#pridaj_hod").val('pridaj hodiny pre ' + table.row( this ).data().DATUM);
                        document.getElementById("pridaj_hod").innerHTML = 'pridaj hodiny pre ' + table.row( this ).data().DATUM;
                        localStorage.setItem("doch_datum", table.row( this ).data().DATUM);
                        $('#pridaj_hod').show();
                        $("#print_d").show();
                        $("#print_h").show();

                        $('#pozn_form').show();

                        document.getElementById("meno_kal").innerHTML = '';
                        var id = "<?php echo $this->session->userdata('id'); ?>";
                        var zam_id = 0;
                        var s1 = "<?php echo base_url().'c_doch/get_doch_den/'?>" + localStorage.doch_datum;
                        if((id == 1) || (id == 10)) {
                            if(localStorage.do_us==''){
                                zam_id = table.row( this ).data().id_uziv;
                            } else {
                                zam_id = localStorage.do_us; }
                        } else {
                            zam_id = id;
                        }
                        s1 = s1 + '/' + zam_id;
                        localStorage.setItem("zam_id", zam_id);
                        $.ajax({
                            url: "<?php echo base_url().'c_doch/get_uziv_data/'?>" + zam_id,
                            data: '',
                            dataType: "json",
                            async: 'true',
                            cache: 'false',
                            type: 'post',
                            success:function(data){
                                document.getElementById("meno_kal").innerHTML = data[0].MENO;
                                $('#meno_kal').show();
                                document.getElementById("meno_mie").innerHTML = data[0].id_miesto;
                                localStorage.setItem( 'miesto_rad', data[0].id_miesto );
                                // if{data[0].id_miesto < 4}{
                                    $.ajax({
                                        url: "<?php echo base_url().'c_doch/get_mie_data/'?>" + data[0].id_miesto,
                                        data: '',
                                        dataType: "json",
                                        async: 'true',
                                        cache: 'false',
                                        type: 'post',
                                        success:function(data){
                                            // var d = new Date(localStorage.doch_datum.substr(7,4)+'-'+localStorage.doch_datum.substr(3,2)+'-'+localStorage.doch_datum.substr(0,2) + " T00:00:00");
                                            var d = new Date(localStorage.doch_datum.substr(3,2) + '.' + localStorage.doch_datum.substr(0,2) + '.' + localStorage.doch_datum.substr(7,4) + ' 00:00:00');
                                            // localStorage.setItem('s', d );
                                            var s = d.getDay();
                                            localStorage.setItem('s', d );
                                            var za = '';
                                            var ko = '';
                                            if(s==0){za=''}else if(s==1){za=data[0].OD_1}else if(s==2){za=data[0].OD_2}else if(s==3){za=data[0].OD_3}else if(s==4){za=data[0].OD_4}else if(s==5){za=data[0].OD_5}else if(s==6){za=data[0].OD_6};
                                            if(s==0){ko=''}else if(s==1){ko=data[0].DO_1}else if(s==2){ko=data[0].DO_2}else if(s==3){ko=data[0].DO_3}else if(s==4){ko=data[0].DO_4}else if(s==5){ko=data[0].DO_5}else if(s==6){ko=data[0].DO_6};
                                            document.getElementById("meno_od").innerHTML = za;
                                            document.getElementById("meno_do").innerHTML = ko;
                                            localStorage.setItem('miesto_od', za );
                                            localStorage.setItem('miesto_do', ko );
                                        }
                                    })
                                // }
                            }
                        });
                        $('#pozn_form').show();

                        $('#doch_den').DataTable().ajax.url(s1).load();
                        $('#doch_den').show();
                        $('#r3').show();
                    }
                  });

                  $(document).ready(function () {
                    var table = $('#doch_zam').DataTable();
                    var id = "<?php echo $this->session->userdata('id'); ?>";

                    if((id == 1) || (id == 5) || (id == 10)){
                        table.columns( [8] ).visible( true );
                    }
                    if((localStorage.meno_zml == 'd') || (localStorage.meno_zml == '4')){
                        table.columns( [6] ).visible( false );
                    } else {
                        table.columns( [6] ).visible( true );
                    }
                    if(localStorage.meno_zml == 'd'){

                    }
                  });

                //   if ($("#zz").hasClass('disabled')){} else {$('#doch_zam').show();};

                  var daysInCurrentMonth = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate();
                  var table = $('#doch_zam').DataTable();
                  var id = "<?php echo $this->session->userdata('id'); ?>";
                  if((id == 1) || (id == 5) || (id == 10)) {
                    table.page.len( daysInCurrentMonth).draw();
                  } else {
                    table.page.len( daysInCurrentMonth + 1 ).draw();
                  }

                  $('#doch_zam').show();
                });
            </script>

            <div class="container-fluid">
                <form id="pozn_den" action="javascript:void(0)" methko="post">
                    <div id="pozn_form" class="form-group row col-sm-12" style="top:-25px" style="display:none">
                        <div class="col-sm-9">
                            <a id="pozn" class="row col-sm-12" style="left:20px">poznámka</a>
                            <textarea class="row col-sm-12 form-control" id="textarea" name="textarea" rows="2" cols="25" maxlength="510" readonly style="top:10px; left:30px; resize:none"></textarea>
                        </div>
                        <div class="col-sm-3" style="top:25px">
                            <a id="uprav_pozn" type="button" class="row col-s-12 btn btn-warning center" href="#"><i class="fas fa-edit"></i> upraviť poznámku</a>
                            <button id="cancel_pozn" class="row col-s-12 btn btn-warning" style="display:none; top:0px"><i class="fas fa-window-close"></i> zrušiť úpravu</button>
                            <button id="save_pozn" class="row col-s-12 btn btn-success" style="display:none; top:0px"><i class="fas fa-save"></i> uložiť poznámku</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="div_doch" class="container-fluid col-sm-4" style="display:none; top:-15px">
            <div id="doch" class="row col-sm-12" style="top:0px; left:10px"></div>
        </div>

        <div class="container-fluid col-sm-3" style="top:0px; left: -100px">

            <div class="row col-sm-12" style="top:-20px; height: 15px !important">
                <a id="meno_kal" type="text" class="col-sm-3 center" style="display:none"> meno</a>
                <a id="meno_mie" type="text" class="col-sm-0 center" style="display:none"> mie</a>
                <a id="meno_od" type="text" class="col-sm-0 center" style="display:none"> od</a>
                <a id="meno_do" type="text" class="col-sm-0 center" style="display:none"> do</a>
                <div class="col-sm-0"></div>
                <button id="print_h" type="button" class="btn btn-warning col-sm-4 center" style="display:none; height: 35px !important; top: 0px !important;" href="#"><i class="fas fa-print"></i> Had</button>
                <button id="print_d" type="button" class="btn btn-warning col-sm-4 center" style="display:none; height: 35px !important; top: 0px !important;" href="#"><i class="fas fa-print"></i> Danica</button>
            </div>

            <div class="row col-sm-12" style="top:15px">
                <div class="col-sm-3"></div>
                <button id="pridaj_hod" type="button" class="btn btn-warning col-sm-8 center" style="display:none; height: 35px !important; top: 0px !important;" href="#"><i class="fas fa-clock"></i> pridaj hodiny</button>
            </div>

            </br>
            <div class="container-fluid" id="r_vypl" style="background-color:lightgrey !important;">
                <form id="vypl_form" action="javascript:void(0)" methko="post" style="display:none">
                    <div class="form-group row" id="r20_vypl">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-1 col-form-label text-right" style="top:10px">od</label>
                        <div class="col-sm-4" style="top:-10px"></div>
                        <label class="col-sm-1 col-form-label text-right" style="top:10px">do</label>
                        <div class="col-sm-3" style="top:-10px"></div>
                    </div>
                    <div class="form-group row" id="r200_vypl">
                        <div class="col-sm-0"></div>
                        <div class="col-sm-5" style="top:-25px">
                            <input type="date" placeholder="dd.MM.yyyy" min="1997-01-01" max="2030-12-31" value="" class="form-control input-sm text-center" id="datum_od_vypl" name="datum_od_vypl">
                        </div>
                        <div class="col-sm-5" style="top:-25px">
                            <input type="date" placeholder="dd.MM.yyyy" min="1997-01-01" max="2030-12-31" value="" class="form-control input-sm text-center" id="datum_do_vypl" name="datum_do_vypl">
                        </div>
                    </div>
                    <div class="form-group row" id="r200_v" style="display:none">
                        <div class="col-sm-0"></div>
                        <div class="col-sm-5" style="display:none">
                            <input type="text" value="" class="form-control input-sm text-center" id="d_o_v" name="d_o_v">
                        </div>
                        <div class="col-sm-5" style="display:none">
                            <input type="text" value="" class="form-control input-sm text-center" id="d_d_v" name="d_d_v">
                        </div>
                    </div>
                    <div class="form-group row" id="r30_vypl">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-1 col-form-label text-right" style="top:-20px">od</label>
                        <div class="col-sm-4" style="top:-20px"></div>
                        <label class="col-sm-1 col-form-label text-right" style="top:-20px">do</label>
                        <div class="col-sm-3" style="top:-20px"></div>
                        <label class="col-sm-2 col-form-label" style="top:-20px">hod.</label>
                    </div>
                    <div class="form-group row" id="r300_vypl">
                        <div class="col-sm-0"></div>
                        <div class="col-sm-5" style="top:-55px">
                            <input type="time" value="07:30" class="form-control input-sm text-center" id="hodiny_od_vypl" name="hodiny_od_vypl" onchange="tohodiny_vypl();">
                        </div>
                        <div class="col-sm-5" style="top:-55px">
                            <input type="time" value="16:00" class="form-control input-sm text-center" id="hodiny_do_vypl" name="hodiny_do_vypl" onchange="tohodiny_vypl();">
                        </div>
                        <label class="col-sm-2 col-form-label" id="hodiny_spolu_vypl" style="top:-40px">8.5</label>
                    </div>
                    <div class="form-group row" id="r31_vypl">
                        <div class="col-sm-1"></div>
                        <div class="col-md-5" style="top:-35px">
                            <div class="radio">
                                <input id="radio_0_vypl" type="radio" checked name="optionsRadios" value="1" class="indicator" onchange="selcintfradio_vypl(value);"><label>  lekáreň</label>
                            </div>
                            <div class="radio">
                                <input id="radio_5_vypl" type="radio" name="optionsRadios" value="8" class="indicator" onchange="selcintfradio_vypl(value);"><label>  dovolenka</label>
                            </div>
                            <div class="radio">
                                <input id="radio_6_vypl" type="radio" name="optionsRadios" value="14" class="indicator" onchange="selcintfradio_vypl(value);"><label>  náhradné voľno</label>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-md-5" style="top:-35px">
                            <div class="radio">
                                <input id="radio_7_vypl" type="radio" name="optionsRadios" value="9" class="indicator" onchange="selcintfradio_vypl(value);"><label>  PN</label>
                            </div>
                            <div class="radio">
                                <input id="radio_8_vypl" type="radio" name="optionsRadios" value="10" class="indicator" onchange="selcintfradio_vypl(value);"><label>  návšteva lekára</label>
                            </div>
                            <div class="radio">
                                <input id="radio9_vypl" type="radio" name="optionsRadios" value="7" class="indicator" onchange="selcintfradio_vypl(value);"><label>  OČR</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="r32_vypl">
                        <a id="pozn_hod_vypl" class="row col-sm-9" style="left:20px;top:-45px">poznámka</a>
                        <textarea class="row col-sm-11 form-control responsive" id="textarea_hod_vypl" name="textarea_hod_vypl" rows="2" cols="50" maxlength="450" style="top:-35px; left:30px; resize:none"></textarea>
                    </div>
                    <div class="form-group row" id="r33_vypl">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-0" style="top:30px">
                            <a id="zzrem_vypl" type="button" class="btn btn-danger btn-zak pull-right" style="display:none" href="#"><i class="fas fa-trash"></i></a>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4" style="top:-20px">
                            <a id="zzadd_vypl" type="button" class="btn btn-success btn-zak " href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add"><i class="fas fa-plus"></i> Generuj dochádzku podľa zadania</a>
                        </div>
                        <div class="col-sm-0"></div>
                        <div class="col-sm-0" style="top:30px">
                            <a id="zzedi_vypl" type="button" class="btn btn-primary btn-zak pull-right" style="display:none" href="#"><i class="fas fa-edit"></i></a>
                        </div>
                    </div>

                    <div class="form-group row" style="margin-top:20px">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-9">
                            <span id="success_message_vypl"></span>
                        </div>
                    </div>

                </form>
            </div>

            <div class="container-fluid" id="sum_vypl" style="background-color:lightgrey !important;">
                <form id="sum_vypl_form" action="javascript:void(0)" methko="post" style="display:none">
                    </br>
                    <h5 id="mesiac">hodiny do zostavy za mesiac   <?php echo date('m.Y', $_SESSION['den'])?></h5>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-1 col-form-label text-right" style="top:0px">  lekáreň</label>
                        <div class="col-sm-4" style="top:0px"></div>
                        <label class="col-sm-1 col-form-label text-right" style="top:0px">PN</label>
                        <div class="col-sm-3" style="top:0px"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-0"></div>
                        <div class="col-sm-5" style="top:-35px">
                            <input type="text" value="0" class="form-control input-sm text-center" id="lek_vypl" name="lek_vypl">
                        </div>
                        <div class="col-sm-5" style="top:-35px">
                            <input type="text" value="0" class="form-control input-sm text-center" id="pn_vypl" name="pn_vypl">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-1 col-form-label text-right" style="top:-50px">dovolenka</label>
                        <div class="col-sm-3" style="top:0px"></div>
                        <label class="col-sm-4 col-form-label text-right" style="top:-50px">návšteva lekára</label>
                        <div class="col-sm-0" style="top:0px"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-0"></div>
                        <div class="col-sm-5" style="top:-85px">
                            <input type="text" value="0" class="form-control input-sm text-center" id="dov_vypl" name="dov_vypl">
                        </div>
                        <div class="col-sm-5" style="top:-85px">
                            <input type="text" value="0" class="form-control input-sm text-center" id="nlek_vypl" name="nlek_vypl">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-0"></div>
                        <label class="col-sm-4 col-form-label text-right" style="top:-100px">náhradné voľno</label>
                        <div class="col-sm-2" style="top:0px"></div>
                        <label class="col-sm-1 col-form-label text-right" style="top:-100px">OČR</label>
                        <div class="col-sm-3" style="top:0px"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-0"></div>
                        <div class="col-sm-5" style="top:-135px">
                            <input type="text" value="0" class="form-control input-sm text-center" id="nv_vypl" name="nv_vypl">
                        </div>
                        <div class="col-sm-5" style="top:-135px">
                            <input type="text" value="0" class="form-control input-sm text-center" id="ocr_vypl" name="ocr_vypl">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2" style="top:-125px"></div>
                        <div class="col-sm-5" style="top:-125px">
                            <button id="save_vypl" class="row col-s-10 btn btn-success"><i class="fas fa-save"></i> uložiť hodiny do zostavy za mesiac "<?php echo date('m.Y', $_SESSION['den'])?>"</button>
                        </div>
                    </div>
                </form>
            </div>


            <table id="doch_den" class="row col-sm-12 table display table-responsive table-striped table-hover table-bordered compact order-column nowrap" width="100%">
                <thead>
                  <tr class="success" style="top:-40px; max-width: 100%">
                    <th></th>
                    <th>od</th>
                    <th>do</th>
                    <th>hod.</th>
                    <th>miesto</th>
                    <th>poznámka</th>
                  </tr>
                </thead>
                <tbody id="show_data">
                </tbody>
                <!-- <tfoot>
                  <tr>
                    <th></th>
                    <th colspan="3" style="text-align:right">spolu</th>
                    <th style="text-align:right"></th>
                  </tr>
                </tfoot> -->
            </table>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#doch_den').dataTable({
                      "ajax": {
                          url: "<?php echo base_url().'c_doch/get_doch_den/01.01.2000/0'?>",
                          type: "GET",
                          dataSrc: ""
                      },
                      select: 'single',
                      order: [1, 'asc'],
                      dom:  '<"top">tr<"bottom"><"clear">',
                      //"buttons": [],
                      hover:      true,
                      //processing: true,
                      compact:    true,
                      autoWidth:  false,
                      pageLength: 5,
                      pagingType:  'numbers',
                      language: { lengthMenu: "zobrazené: _MENU_ záznamov",
                                  sLoadingRecords:	"Načítavam...",
                                  sProcessing:	"moment ...",
                                  sInfo:	"Záznamy _START_ až _END_ z celkom _TOTAL_",
                                  //infoEmpty: "No records available",
                                  sInfoEmpty:	"Záznamy 0 až 0 z celkom 0 ",
                                  zeroRecords: "žiadne dáta",
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
                      "columns": [
                        { "data": "id","visible": false },
                        // { "data": "DATUM","className": 'dt-body-center',"width": '1%' },
                        // { "data": "DEN","width": '1%' },
                        { "data": "OD","className": 'dt-body-center',"width": '1%'},
                        { "data": "DO","className": 'dt-body-center',"width": '1%'},
                        { "data": 'HODINY',"className": 'dt-body-right',"width": '1%', "render":function(data){if(data==0){return '';}else{return parseFloat(data).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$& ');}}},
                        { "data": 'id_miesto',
                            "render": function ( data, type, row ) {
                                             if (data == 1){return 'Zelený had';};
                                             if (data == 2){return 'Danica ZV';};
                                             if (data == 3){return 'Danica DN';};
                                             if (data == 13){return 'školenie';};
                                             if (data == 8){return 'dovolenka';};
                                             if (data == 14){return 'NV';};
                                             if (data == 9){return 'PN';};
                                             if (data == 10){return 'u lekára';};
                                             if (data == 7){return 'OČR';};
                                             if (data == 15){return 'paragraf';};
                                             if (data == 11){return 'absencia';};
                                             if (data == 16){return 'home-office';};
                                           },
                            "className": 'dt-body-center',"width": '30px' },
                        { "data": 'POZN',
                            "render": function(data, type, row) {
                                    if (type === 'display' && data != null) {
                                      data = data.replace(/<(?:.|\\n)*?>/gm, '');
                                      if(data.length > 50) {
                                        return '<span class=\"show-ellipsis\">' + data.substr(0, 50) + '</span><span class=\"no-show\">' + data.substr(50) + '</span>';
                                      } else {
                                        return data;
                                      }
                                    } else {
                                      return data;
                                    } } }
                      ],
                      footerCallback: function ( row, data, start, end, display ) {
                        var api = this.api(), data;
                        // Remove the formatting to get integer data for summation
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };
                        total = api
                          .column(5, { search: 'applied' })
                          .data()
                          .reduce(function (a, b) {
                          return intVal(a) + intVal(b);
                        }, 0);
                        $( api.column( 4 ).footer() ).html('Spolu');
                      }
                  });
    // select row
                  var selected = [];
                  var table = $('#doch_den').DataTable();
                  $('#doch_den tbody').on('click', 'tr', function () {
                    var id = this.id;
                    var index = $.inArray(id, selected);
                    var tr = $(this).parents('tr');
                    row_id = table.row( this ).index();
                    var row = table.row( this ).id();
                    var pom = table.row( this ).data().DATUM;
                    localStorage.setItem("doch_pom", pom);

                    $("#prace_form").hide();

                    $(this).toggleClass('selected');
                    var ri = table.rows('.selected').count();

                    if(ri === 0){

                        $('#zzedi').hide();
                        $("#zzrem").hide();
                    } else {
                        localStorage.setItem("id_hod", table.row( this ).data().id);

                        $("#prace_form").show();
                        $("#textarea_hod").val(table.row( this ).data().POZN);
                        $("#hodiny_od").val(table.row( this ).data().OD);
                        $("#hodiny_do").val(table.row( this ).data().DO);

                        var rad = table.row( this ).data().id_miesto;
                        localStorage.setItem("miesto_rad", rad);
                        if(localStorage.miesto_rad == 1){document.getElementById("radio_1").checked = true;}
                        if(localStorage.miesto_rad == 2){document.getElementById("radio_2").checked = true;}
                        if(localStorage.miesto_rad == 3){document.getElementById("radio_3").checked = true;}
                        if(localStorage.miesto_rad == 13){document.getElementById("radio_4").checked = true;}
                        if(localStorage.miesto_rad == 8){document.getElementById("radio_5").checked = true;}
                        if(localStorage.miesto_rad == 14){document.getElementById("radio_6").checked = true;}

                        if(localStorage.miesto_rad == 9){document.getElementById("radio_7").checked = true;}
                        if(localStorage.miesto_rad == 10){document.getElementById("radio_8").checked = true;}
                        if(localStorage.miesto_rad == 7){document.getElementById("radio_9").checked = true;}
                        if(localStorage.miesto_rad == 15){document.getElementById("radio_10").checked = true;}
                        if(localStorage.miesto_rad == 11){document.getElementById("radio_11").checked = true;}
                        if(localStorage.miesto_rad == 16){document.getElementById("radio_12").checked = true;}

                        tohodiny();

                        $('#zzedi').show();
                        $("#zzrem").show();

                    }
                  });

                //   if ($("#zz").hasClass('disabled')){} else {$('#doch_den').show();};

                //   $('#doch_den').show();
                });
            </script>
            </br>
            <div id="doch" class="row col-sm-12" style="display:none; top:0px; left:10px"></div>

            <div class="container-fluid" id="r3" style="display:none; background-color:lightgrey !important;">
                <form id="prace_form" action="javascript:void(0)" methko="post" style="display:none">
                    <div class="form-group row" id="r30">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-1 col-form-label text-right" style="top:10px">od</label>
                        <div class="col-sm-4" style="top:-10px">
                        </div>
                        <label class="col-sm-1 col-form-label text-right" style="top:10px">do</label>
                        <div class="col-sm-3" style="top:-10px">
                        </div>
                        <label class="col-sm-2 col-form-label text" style="top:10px">hod.</label>
                    </div>
                    <div class="form-group row" id="r30">
                        <div class="col-sm-0"></div>
                        <div class="col-sm-5" style="top:-25px">
                            <input type="time" value="07:30" class="form-control input-sm text-center" id="hodiny_od" name="hodiny_od" readonly onchange="tohodiny();">
                        </div>
                        <div class="col-sm-5" style="top:-25px">
                            <input type="time" value="16:00" class="form-control input-sm text-center" id="hodiny_do" name="hodiny_do" readonly onchange="tohodiny();">
                        </div>
                        <label class="col-sm-2 col-form-label text" id="hodiny_spolu" style="top:-10px">8.5</label>
                    </div>
                    <div class="form-group row" id="r31">
                        <div class="col-sm-1"></div>
                        <div class="col-md-5" style="top:-5px">
                            <div class="radio">
                                <input id="radio_1" type="radio" name="optionsRadios" value="1" checked class="indicator" onchange="selcintfradio(value);"><label>  u Zeleného hada Zv</label>
                            </div>
                            <div class="radio">
                                <input id="radio_2" type="radio" name="optionsRadios" value="2" class="indicator" onchange="selcintfradio(value);"><label>  Danica Zv</label>
                            </div>
                            <div class="radio">
                                <input id="radio_3" type="radio" name="optionsRadios" value="3" class="indicator" onchange="selcintfradio(value);"><label>  Danica DN</label>
                            </div>
                            <div class="radio">
                                <input id="radio_4" type="radio" name="optionsRadios" value="13" class="indicator" onchange="selcintfradio(value);"><label>  školenie</label>
                            </div>
                            <div class="radio">
                                <input id="radio_5" type="radio" name="optionsRadios" value="8" class="indicator" onchange="selcintfradio(value);"><label>  dovolenka</label>
                            </div>
                            <div class="radio">
                                <input id="radio_6" type="radio" name="optionsRadios" value="14" class="indicator" onchange="selcintfradio(value);"><label>  náhradné voľno</label>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-md-5" style="top:-5px">
                            <div class="radio">
                                <input id="radio_7" type="radio" name="optionsRadios" value="9" class="indicator" onchange="selcintfradio(value);"><label>  PN</label>
                            </div>
                            <div class="radio">
                                <input id="radio_8" type="radio" name="optionsRadios" value="10" class="indicator" onchange="selcintfradio(value);"><label>  návšteva lekára</label>
                            </div>
                            <div class="radio">
                                <input id="radio9" type="radio" name="optionsRadios" value="7" class="indicator" onchange="selcintfradio(value);"><label>  OČR</label>
                            </div>
                            <div class="radio">
                                <input id="radio_10" type="radio" name="optionsRadios" value="15" class="indicator" onchange="selcintfradio(value);"><label>  paragraf</label>
                            </div>
                            <div class="radio">
                                <input id="radio_11" type="radio" name="optionsRadios" value="11" class="indicator" onchange="selcintfradio(value);"><label>  absencia</label>
                            </div>
                            <div class="radio">
                                <input id="radio_12" type="radio" name="optionsRadios" value="16" class="indicator" onchange="selcintfradio(value);"><label>  home-office</label>
                            </div>
                        </div>
                    </div>
                    </br></br>
                    <div class="form-group row" id="r32">
                        <a id="pozn_hod" class="row col-sm-9" style="left:20px; top:-40px">poznámka</a>
                        <textarea class="row col-sm-11 form-control" id="textarea_hod" name="textarea_hod" rows="2" cols="50" maxlength="510" readonly style="top:-30px; left:30px; resize:none"></textarea>
                    </div>
                    <div class="form-group row" id="r33">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-2" style="top:0px">
                            <a id="zzrem" type="button" class="btn btn-danger btn-zak pull-right" style="display:none" href="#"><i class="fas fa-trash"></i> Odstrániť</a>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-1" style="top:0px">
                            <a id="zzadd" type="button" class="btn btn-success btn-zak pull-right" style="display:none" href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add"><i class="fas fa-plus"></i> Pridať</a>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3" style="top:0px">
                            <a id="zzedi" type="button" class="btn btn-primary btn-zak pull-right" style="display:none" href="#"><i class="fas fa-edit"></i> Editovať</a>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top:0px">
                        <div class="col-sm-3"></div>
                        <!-- type="submit" -->
                        <button id="cancel" class="col-sm-3 btn btn-warning" style="display:none; top:0px"><i class="fas fa-window-close"></i> Zrušiť</button>
                        <div class="col-sm-1"></div>
                        <button id="save_add_upd" class="col-sm-3 btn btn-success" style="display:none; top:0px"><i class="fas fa-save"></i> Uložiť údaje</button>
                    </div>

                    <div class="form-group row" style="margin-top:20px">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-9">
                            <span id="success_message"></span>
                        </div>
                    </div>
                    </br>
                    </br>

                </form>
            </div>
        </div>


        <div class="row col-sm-12">
            <div id="demo" class="col-sm-4" data-date="<?php echo date('d.m.Y', $_SESSION['den']); ?>" style="top:0px;left:-30px"></div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#kalendar').datepicker({
            //todayBtn: true,
            language: "sk",
            keyboardNavigation: false,
            forceParse: false,
            daysOfWeekHighlighted: "0,6",
            calendarWeeks: false,
            autoclose: true,
            format: 'dd.mm.yyyy',
            minViewMode : 1,
            todayHighlight: false
        });

        var id = "<?php echo $this->session->userdata('id'); ?>";

        $('#kalendar').on('changeDate', function() {
            $('#my_hidden_input').val($('#kalendar').datepicker('getFormattedDate'));
            var d = $('#kalendar').datepicker('getFormattedDate');
            document.getElementById("den").innerHTML = 'Evidencia dochádzky  ' + d.substr(3,7);
            document.getElementById("kon").innerHTML = 'kontrola hodín  ' + d.substr(3,7);
            document.getElementById("mesiac").innerHTML = 'hodiny do zostavy za mesiac   ' + d.substr(3,7);

            var daysInCurrentMonth = new Date(parseInt(d.substr(7,4)), d.substr(3,2), 0).getDate();

            localStorage.setItem('dni_v_mesiaci', daysInCurrentMonth);

            if( $('#vypl_form').is(":visible")){
                $('#doch_den').hide();
                $("#datum_od_vypl").val(d.substr(6,4) + "-" + d.substr(3,2) + "-" + "01");
                // $("#datum_od_vypl").min("<?php echo date('Y', $_SESSION['den'])?>" + "-" +
                //                         "<?php echo date('m', $_SESSION['den'])?>" + "-" + "01");
                var x = localStorage.dni_v_mesiaci;
                var dni = x.toString();
                $("#datum_do_vypl").val(d.substr(6,4) + "-" + d.substr(3,2) + "-" + dni);
                mes_vypl();
            }

            var table = $('#doch_zam').DataTable();
            table.page.len( daysInCurrentMonth ).draw();

            $datum = $('#kalendar').datepicker('getFormattedDate');
            if($datum == ''){
                $datum = localStorage.doch_datum;
            }

            if((id == 1) || (id == 5) || (id == 10)) {
                if(localStorage.do_us==''){
                    get_data(1, 0);
                    var s1 = "<?php echo base_url().'c_doch/get_doch/'?>" + $datum + '/0/x';
                }else{
                    get_data(1, localStorage.do_us);
                    var s1 = "<?php echo base_url().'c_doch/get_doch/'?>" + $datum + '/' + localStorage.do_us + '/x';
                }
                if( $('#vypl_form').is(":visible")){
                    $('#doch_den').hide();
                    mes_vypl();
                }
            }else{
                get_data(1, id);
                var s1 = "<?php echo base_url().'c_doch/get_doch/'?>" + $datum + '/' + id + '/x';

                localStorage.setItem('id_akt_uziv', id);
                $.ajax({
                    url: "<?php echo base_url().'c_doch/get_uziv_data/'?>" + id,
                    data: '',
                    dataType: "json",
                    async: 'true',
                    cache: 'false',
                    type: 'post',
                    success:function(data){
                        localStorage.setItem('id_miesto_akt_uziv', data[0].id_miesto);
                        localStorage.setItem('meno_zml', data[0].ARCINTCIS);
                    }
                })

            }
            $('#doch_zam').DataTable().ajax.url(s1).load();

            $('#pozn').hide();
            $('#textarea').hide();
            $('#uprav_pozn').hide();
            $('#doch_den').hide();
            $('#r3').hide();

            $('#pridaj_hod').hide();
            $("#print_d").hide();
            $("#print_h").hide();

            $("#cancel_pozn").hide();
            $("#save_pozn").hide();

        });

        if((id == 1) || (id == 5) || (id == 10)) {
            $('#uziv').show();
            $('#log').show();
            $('#vym').show();
            get_data(0, 0);
            // $('#doch').show();
        }else{
            get_data(0, "<?php echo $this->session->userdata('id'); ?>");
        }

        var i = 0;
        if((id == 1) || (id == 10)) {
            if(localStorage.do_us == ''){ } else { i = localStorage.do_us; }
        } else { i = id; $('#cb').hide(); }
        var s1 = "<?php echo base_url().'c_doch/get_doch/'?>" + localStorage.doch_datum + '/' + i + '/x';
        $('#doch_zam').DataTable().ajax.url(s1).load();

        $('#pozn').hide();
        $('#textarea').hide();
        $('#uprav_pozn').hide();
        $('#doch_den').hide();
        $('#r3').hide();

        $('#pridaj_hod').hide();
    });
</script>

<script>
    function get_data(par,i){
        var d = $('#kalendar').datepicker('getFormattedDate');
        if(localStorage.do_pom==1){
//            if(i==0){$('#gen').show();}else{$('#gen').hide();}
            if(i==0){$('#kon').show();}else{$('#kon').hide();}
        }
        $.ajax({
            url: "<?php echo base_url().'c_doch/get_doch/'?>" + d + '/' + i + '/v',
            data: '',
            dataType: "json",
            async: 'true',
            cache: 'false',
            type: 'post',
            success:function(data){
                if(par==0){
                    localStorage.setItem("sum_vyplata", <?php echo $_SESSION['upd']?>);
                    localStorage.setItem("sum_vypl", 0);
                    get_tab(data);
                }else{
                    $('#doch').jexcel('setData',data);
                    if(i==0){
                        $('#print_d').hide();
                        $("#print_h").hide();
                        $('#meno_kal').hide();
                        localStorage.setItem('meno_zml', '');
                    } else {
                        $('#print_d').show();
                        $("#print_h").show();
                        $('#meno_kal').show();
                    }
                }
            }
        });
    }
    function formatHTime(){
        var h = new Date().getHours();
        var m = new Date().getMinutes();
        var hs = h.toString();
        var ms = m.toString();
        if(h<10){hs='0'+hs;}
        if(m<10){ms='0'+ms;}
        return hs+':'+ms;
    };
    function tonadcas(){
        var str=document.getElementById("hodiny_spolu").value;
        var s=str.replace(',','.');
        var h=parseFloat(s);
        if(h>8){
            h = (h-8);
            document.getElementById("nadcas").value = h;
            localStorage.setItem("h", h);
            localStorage.setItem("doch_d2",h);
            //console.log(str + '   ' + s + '   ' + h);
        } else {
            localStorage.setItem("h0", h);
        };
        return h;
    };
    function tohod(){
        var h=document.getElementById("hodiny_spolu").value;
        var m=(parseInt(h.substr(3,2)) / 60); h=parseInt(h.substr(0,2));
        document.getElementById("toh").value = h + m;
        return h+m;
    };
    function tohodiny_vypl(){
        var h_od = document.getElementById("hodiny_od_vypl").value;
        var h_do = document.getElementById("hodiny_do_vypl").value;
        var m_od = (parseInt(h_od.substr(3,2)) / 60); h_od=parseInt(h_od.substr(0,2));
        var m_do = (parseInt(h_do.substr(3,2)) / 60); h_do=parseInt(h_do.substr(0,2));
        localStorage.setItem("hodiny", ((h_do + m_do) - (h_od + m_od)).toFixed(2).toString());
        document.getElementById("hodiny_spolu_vypl").innerHTML = ((h_do + m_do) - (h_od + m_od)).toFixed(2).toString();
        return ((h_do + m_do) - (h_od + m_od)).toFixed(2);
    };
    function tohodiny(){
        var h_od = document.getElementById("hodiny_od").value;
        var h_do = document.getElementById("hodiny_do").value;
        var m_od = (parseInt(h_od.substr(3,2)) / 60); h_od=parseInt(h_od.substr(0,2));
        var m_do = (parseInt(h_do.substr(3,2)) / 60); h_do=parseInt(h_do.substr(0,2));
        localStorage.setItem("hodiny", ((h_do + m_do) - (h_od + m_od)).toFixed(2).toString());
        document.getElementById("hodiny_spolu").innerHTML = ((h_do + m_do) - (h_od + m_od)).toFixed(2).toString();
        return ((h_do + m_do) - (h_od + m_od)).toFixed(2);
    };
    function ulozCell(hod){
        // colHeaders:['id', 'id_uziv', 'dátum', 'deň', 'od', 'od pc', 'do', 'do pc', 'poznámka', '', '', '' ],
        var y = localStorage.do_ria;
        //var id=$('#doch').jexcel('getValue','A'+y);
        var id = myTable.getValue('A'+y);
        localStorage.setItem("doch_id", id);
        var uz=localStorage.do_us;
        if(localStorage.do_us==''){
            var uz=$('#doch').jexcel('getValue','B'+y);
        }
        $.ajax({
                url: "<?php echo base_url().'c_doch/sav_cel/'?>" + id + '/' + localStorage.do_stl + '/' + hod,
                data: '',
                dataType: "json",
                async: 'true',
                cache: 'false',
                type: 'post',
                success:function(data){
                }
        })
    };
    var selectRiaDen = function(instance, x1, y1, x2, y2, origin) {
        var cellName1 = jexcel.getColumnNameFromId([x1, y1]);
        var cellName2 = jexcel.getColumnNameFromId([x2, y2]);
        var id = "<?php echo $this->session->userdata('id'); ?>";
        var stl = 'B';
        $("#print_d").hide();
        $("#print_h").hide();
        if((id == 1) || (id == 10)) {stl = 'C';}
        var v = '';
        if(cellName1==cellName2){
            v = $('#doch').jexcel('getValue','A'+(y1+1));
            localStorage.setItem("do_stl", cellName1.substr(0, 1));
            if(localStorage.do_ria==''){
                $('#doch').jexcel('setStyle', stl+(y1+1), 'background-color', '#FFFCCC');
                localStorage.setItem("do_ria", ''+(y1+1));
                $("#ins").removeClass('disabled');
                $("#rem").removeClass('disabled');
                //get_data(1, v);
            }else{
                $('#doch').jexcel('setStyle', stl+localStorage.do_ria, 'background-color', '#FFF');
                if(localStorage.do_ria==''+(y1+1)){
                    $("#ins").addClass('disabled');
                    $("#rem").addClass('disabled');
                    //get_data(1, 0);
                }else{
                    $('#doch').jexcel('setStyle', stl+(y1+1), 'background-color', '#FFFCCC');
                    localStorage.setItem("do_ria", ''+(y1+1));
                    $("#ins").removeClass('disabled');
                    $("#rem").removeClass('disabled');
                    //get_data(1, v);
                }
            }
        }else{
            localStorage.setItem("do_ria", '');
            localStorage.setItem("do_stl", '');
            $("#ins").addClass('disabled');
            $("#rem").addClass('disabled');
        }
        // $('#log').append('The selection from ' + cellName1 + ' to ' + cellName2 + ' ' + v + '         ');
    }
    var savechangea = function(instance, cell, x, y, value) {
        if(localStorage.doch_clk != 'c'){
            // var po=document.getElementsByClassName('popover');
            // localStorage.setItem("doch_", po);
            // po.closest("div").remove();
            // document.getElementsByClassName('popover').closest("div").remove();
            // $('.popover').remove();
            var cellName = jexcel.getColumnNameFromId([x,y]);
            // $('#log').append('New change on cell ' + cellName + ' to: ' + value + '');

            // colHeaders:['id', 'id_uziv', 'dátum', 'deň', 'od', 'od pc', 'do', 'do pc', 'poznámka', '', '', '' ],
            var id=$('#doch').jexcel('getValue','A'+(parseInt(y)+1));
            var uz=localStorage.do_us;
            if(localStorage.do_us==''){
                var uz=$('#doch').jexcel('getValue','B'+(parseInt(y)+1));
            }
            // var da=$('#doch').jexcel('getValue','C'+(parseInt(y)+1));
            // var de=$('#doch').jexcel('getValue','D'+(parseInt(y)+1));
            // var ko=$('#doch').jexcel('getValue','E'+(parseInt(y)+1));
            var po=$('#doch').jexcel('getValue','G'+(parseInt(y)+1));
            $.ajax({
                    url: "<?php echo base_url().'c_doch/sav_cel/'?>" + id + '/' + localStorage.do_stl + '/' + po,
                    data: '',
                    dataType: "json",
                    async: 'true',
                    cache: 'false',
                    type: 'post',
                    success:function(data){
                    }
            })
        }
    }

    function get_tab(data){
        var customColumn = {
            // Methods
            closeEditor : function(cell, save) {
                // var value = cell.children[0].value;
                // cell.innerHTML = value;
                // return value;
            },
            openEditor : function(cell) {
                localStorage.setItem("doch_clk", 'c');
                // Create input
                var element = document.createElement('input');
                element.setAttribute('id', 'abc');
                element.value = cell.innerHTML;

                if(cell.innerHTML==''){element.value = formatHTime();}
                localStorage.setItem("doch_prd", cell.innerHTML);

                // Update cell
                cell.classList.add('editor');
                cell.innerHTML = '';
                cell.appendChild(element);
                $(element).clockpicker({
                    donetext: 'uložiť',
                    autoclose: true,
                    beforeHide:function() {
                        localStorage.setItem("doch_clk", '');
                        localStorage.setItem("doch_prd", document.getElementsByClassName('clockpicker-span-hours')[0].innerHTML + ':' +
                                                         document.getElementsByClassName('clockpicker-span-minutes')[0].innerHTML );
                        // To avoid double call
                        if (cell.children[0]) {
                            //myTable.closeEditor(cell, true);
                            cell.innerHTML = localStorage.doch_prd;
                            ulozCell(localStorage.doch_prd);
                        }
                        $('#abc').remove();
                        $('.popover').remove();
                    }
                });
                // Focus on the element
                element.focus();
            },
            getValue : function(cell) {
                //slocalStorage.setItem("doch_prd", element.value);
                //return cell.innerHTML;
            },
            setValue : function(cell, value) {
                cell.innerHTML = value;
            }
        }

        var id = "<?php echo $this->session->userdata('id'); ?>";
        if((id == 1) || (id == 10)) {
            myTable = jexcel(document.getElementById('doch'), {
                data: data,
                // footers: [['','','','','','','spolu','','','',localStorage.sum_vypl]],
                rowResize: false,
                updateTable:function(instance, cell, col, row, val, label, cellName) {
                    if (cell.innerHTML == 'So' || cell.innerHTML == 'Ne') {
                        cell.parentNode.style.backgroundColor = '#fffaa3';
                    }
                    if (col == 10) {
                        if (parseFloat(label) > 10) {
                            cell.style.color = 'red';
                        }  else {
                            cell.style.color = 'green';
                        }
                    }
                },
                columnSorting:false,
                allowInsertColumn:false,
                allowDeleteColumn:false,
                allowDeleteRow:false,
                allowInsertRow:false,
                tableOverflow:true,
                tableHeight:'930px',
                rowDrag:false,
                columnDrag:false,
                // colHeaders:['id', 'id_uziv', 'dátum', 'deň', 'od', 'od pc', 'do', 'do pc', 'poznámka', '', '', 'obed, 'hodiny', 'nadcas', '' ],
                // colWidths: [  -1,        -1,      150,    60,   60,      60,   60,      60,        300, -1, -1, -1 ],
                columns: [
                    { type: 'text', title:'',         width:  -1, readOnly:true },
                    { type: 'text', title:'',         width:  -1, readOnly:true },
                    { type: 'text', title:'dátum',    width:  90, readOnly:true },
                    { type: 'text', title:'deň',      width:  40, readOnly:true },
                    { type: 'text', title:'od',       width:  60 , editor:customColumn },
                    // { type: 'text', title:'od pc',    width:  -1 }, //editor:customColumn },
                    { type: 'text', title:'do',       width:  60 , editor:customColumn },
                    // { type: 'text', title:'do pc',    width:  -1 }, //editor:customColumn },
                    { type: 'text', title:'poznámka', width: 150, footer: 'spolu' },
                    { type: 'text', title:'',         width:  -1 },
                    { type: 'text', title:'',         width:  -1 },
                    { type: 'boolean', title:'obed',  width:  -1, type: 'checkbox'},
                    { type: 'text', title:'hodiny',   width:  100},
                    // mask:'##,##', decimal:',',
                    { type: 'text', title:'nadcas',   width:  -1, readOnly:true },
                    { type: 'text', title:'',         width:  -1, readOnly:true },
                    { type: 'text', title:'',         width:  -1, readOnly:true }
                ],
                onchange: savechangea,
                // onbeforechange: beforeChange,
                onselection: selectRiaDen,
                // contextMenu: function() {
                //     return false;
                // }
            });
        }
    }
</script>

<script>
    var changed = function(instance, cell, x, y, value) {
        var cellName = jexcel.getColumnNameFromId([x,y]);
        var id = "<?php echo $this->session->userdata('id'); ?>";
        if(id == 1) {
            // $('#log').append('New change on cell ' + cellName + ' to: ' + value + '');
            var id=$('#uziv').jexcel('getValue','A'+(parseInt(y)+1));
            var me=$('#uziv').jexcel('getValue','B'+(parseInt(y)+1));
            var pr=$('#uziv').jexcel('getValue','C'+(parseInt(y)+1));
            var he=$('#uziv').jexcel('getValue','D'+(parseInt(y)+1));
            var od=$('#uziv').jexcel('getValue','E'+(parseInt(y)+1));
            var ko=$('#uziv').jexcel('getValue','F'+(parseInt(y)+1));
            var zam=$('#uziv').jexcel('getValue','H'+(parseInt(y)+1));
            // $('#log').append(cellName + ' id=' + id + ' ria=' + y + ' stl=' + x + ' ' + me + ' ' + pr);
            $.ajax({
                    url: "<?php echo base_url().'c_uziv/sav_cel/'?>" + id + '/' + me +
                         '/' + pr + '/' + he + '/' + od + '/' + ko + '/' + zam,
                    data: '',
                    dataType: "json",
                    async: 'true',
                    cache: 'false',
                    type: 'post',
                    success:function(data){
                    }
            })
        }
    }
    var beforeChange = function(instance, cell, x, y, value) {
        var cellName = jexcel.getColumnNameFromId([x,y]);
        // $('#log').append('The cell ' + cellName + ' will be changed');
    }
    var selectionActive = function(instance, x1, y1, x2, y2, origin) {
        var cellName1 = jexcel.getColumnNameFromId([x1, y1]);
        var cellName2 = jexcel.getColumnNameFromId([x2, y2]);
        $("#print_d").hide();
        $("#print_h").hide();
        var id = '';
        if(y1==y2){
            $('#pozn').hide();
            $('#textarea').hide();
            $('#uprav_pozn').hide();
            $('#doch_den').hide();
            $('#r3').hide();

            $('#pridaj_hod').hide();
            $("#print_d").hide();
            $("#print_h").hide();

            $("#cancel_pozn").hide();
            $("#save_pozn").hide();

            if( $('#vypl_form').is(":visible")){
                $('#doch_den').hide();
                $('#pridaj_hod').hide();
            }

            document.getElementById("meno_kal").innerHTML = '';

            id = $('#uziv').jexcel('getValue', 'A'+(y1+1));

            localStorage.setItem('id_akt_uziv', '');

            localStorage.setItem('meno_zml', '');
            localStorage.setItem('id_akt_uziv', id);
            $.ajax({
                url: "<?php echo base_url().'c_doch/get_uziv_data/'?>" + id,
                data: '',
                dataType: "json",
                async: 'true',
                cache: 'false',
                type: 'post',
                success:function(data){
                    localStorage.setItem('id_miesto_akt_uziv', data[0].id_miesto);
                    localStorage.setItem('meno_zml', data[0].ARCINTCIS);
                }
            })
            $('#doch_den').hide();
            $('#pridaj_hod').hide();
            if(localStorage.do_us==''){
                $('#uziv').jexcel('setStyle', 'A'+(y1+1), 'background-color', '#6BD089');
                $('#uziv').jexcel('setStyle', 'B'+(y1+1), 'background-color', '#6BD089');
                $('#uziv').jexcel('setStyle', 'C'+(y1+1), 'background-color', '#6BD089');
                $('#uziv').jexcel('setStyle', 'E'+(y1+1), 'background-color', '#6BD089');

                document.getElementById("meno_kal").innerHTML = $('#uziv').jexcel('getValue', 'B'+(y1+1));

                localStorage.setItem("do_us", ''+id);
                get_data(1, id);

                $('#pridaj_hod').hide();

                localStorage.setItem("zam_id", id);

                localStorage.setItem( 'doch_uvod', 0 );

                var s1 = "<?php echo base_url().'c_doch/get_doch/'?>" + $('#kalendar').datepicker('getFormattedDate') + '/' + id + '/x';
                $('#doch_zam').DataTable().ajax.url(s1).load();
            }else{
                for (var i = - localStorage.do_us; i < 2; i++){
                    $('#uziv').jexcel('setStyle', 'A'+(localStorage.do_us+i), 'background-color', '#FFF');
                    $('#uziv').jexcel('setStyle', 'B'+(localStorage.do_us+i), 'background-color', '#FFF');
                    $('#uziv').jexcel('setStyle', 'C'+(localStorage.do_us+i), 'background-color', '#FFF');
                    $('#uziv').jexcel('setStyle', 'E'+(localStorage.do_us+i), 'background-color', '#FFF');
                }
                if(localStorage.do_us==''+id){
                    localStorage.setItem("do_us", '');
                    get_data(1, 0);

                    localStorage.setItem( 'doch_uvod', 1 );

                    var s1 = "<?php echo base_url().'c_doch/get_doch/'?>" + $('#kalendar').datepicker('getFormattedDate') + '/0/x';
                    $('#doch_zam').DataTable().ajax.url(s1).load();

                }else{
                    $('#uziv').jexcel('setStyle', 'A'+(y1+1), 'background-color', '#6BD089');
                    $('#uziv').jexcel('setStyle', 'B'+(y1+1), 'background-color', '#6BD089');
                    $('#uziv').jexcel('setStyle', 'C'+(y1+1), 'background-color', '#6BD089');
                    $('#uziv').jexcel('setStyle', 'E'+(y1+1), 'background-color', '#6BD089');
                    localStorage.setItem("do_us", ''+id);
                    get_data(1, id);

                    localStorage.setItem( 'doch_uvod', 1 );

                    var s1 = "<?php echo base_url().'c_doch/get_doch/'?>" + $('#kalendar').datepicker('getFormattedDate') + '/' + id + '/x';
                    $('#doch_zam').DataTable().ajax.url(s1).load();
                }
            }
            if(localStorage.do_us==''+id){
                selcint();
            } else {
                if( $('#print_h').is(":visible")){} else {$('#vypl_form').hide(); $('#sum_vypl_form').hide();}
            }
        }
        // $('#log').append('The selection from ' + cellName1 + ' to ' + cellName2 + ' ' + v + '         ');
    }
    $.ajax({
        url: "<?php echo base_url().'c_uziv/get_all'?>",
        data: '',
        dataType: "json",
        async: 'true',
        cache: 'false',
        type: 'post',
        success:function(data){
            myTable1 = jexcel(document.getElementById('uziv'), {
                data: data,
                rowResize: false,
                columnSorting:false,
                allowInsertColumn:false,
                allowDeleteColumn:false,
                tableHeight:'300px',
                columns:[
                    { title:'id', width:20 },
                    { title:'meno', width:120 },
                    { title:'prihlas', width:60 },
                    { title:'heslo', width:-1 },
                    { title:'od', width:70 },
                    { title:'do', width:70 },
                    { title:'mie', width:-1 },
                    { title:'zam', width:30 },
                ],
                onchange: changed,
                onbeforechange: beforeChange,
                onselection: selectionActive,
            });
        }
    });
</script>

<script>
    var options = {
        minDimensions:[10,10],
        tableOverflow:true,
    }
    //$('#uziv').jexcel(options);
    //$('#spreadsheet').jexcel(options);
</script>

<script>
    $('#ins').on("click", function(){

    //var id=$('#doch').jexcel('getValue','A'+(parseInt(y)+1));

    //$('#log').append('cell ' + cellName + ' id ' + id + '');

    })
    $('#rem').on("click", function(){
        swal.fire({
            title: "Naozaj chcete odstrániť riadok ?", //text: "Údaje sa po vymazaní nedajú obnoviť !",
            type: "question",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Áno',
            cancelButtonText: "Nie",
            confirmButtonClass: "btn-danger"
        }).then((result) => {
            if (result.value) {//Swal.fire('Deleted!','Your imaginary file has been deleted.','success')
                //var id=$('#doch').jexcel('getValue','A'+(parseInt(y)+1));

                //$('#log').append('cell ' + cellName + ' id ' + id + '');
            }
        })
    })
    $('#kon').on("click", function(){
        var d = $('#kalendar').datepicker('getFormattedDate');
        $("*").css("cursor", "progress");
        $.ajax({
            url: "<?php echo base_url().'c_doch/kontroluj_hod/'?>" + d,
            data: '',
            dataType: "json",
            async: 'true',
            cache: 'false',
            type: 'post',
            success:function(data){
                var s2 = "<?php echo base_url().'c_doch/get_doch/'?>" + localStorage.doch_datum + '/' + localStorage.zam_id + '/x';
                $('#doch_zam').DataTable().ajax.url(s2).load();
                var s2 = "<?php echo base_url().'c_doch/get_doch/'?>" + localStorage.doch_datum + '/' + localStorage.zam_id + '/x';
                $('#doch_zam').DataTable().ajax.url(s2).load();
                var s2 = "<?php echo base_url().'c_doch/get_doch/'?>" + localStorage.doch_datum + '/' + localStorage.zam_id + '/x';
                $('#doch_zam').DataTable().ajax.url(s2).load();
                var s2 = "<?php echo base_url().'c_doch/get_doch/'?>" + localStorage.doch_datum + '/' + localStorage.zam_id + '/x';
                $('#doch_zam').DataTable().ajax.url(s2).load();
                $("*").css("cursor", "default");
                $("*").css("cursor", "default");
            }
        });
        $("*").css("cursor", "default");
    })
    $('#gen').on("click", function(){
        swal.fire({
            title: "Naozaj chcete nahradiť aktuálne údaje v dochádzke novými ?", //text: "Údaje sa po vymazaní nedajú obnoviť !",
            type: "question",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Áno',
            cancelButtonText: "Nie",
            confirmButtonClass: "btn-danger"
        }).then((result) => {
            if (result.value) {//Swal.fire('Deleted!','Your imaginary file has been deleted.','success')
                var d = $('#kalendar').datepicker('getFormattedDate');
                $("*").css("cursor", "progress");
                $.ajax({
                    url: "<?php echo base_url().'c_doch/generuj_doch/'?>" + d + '/0',
                    data: '',
                    dataType: "json",
                    async: 'true',
                    cache: 'false',
                    type: 'post',
                    success:function(data){
                        //get_tab(data);
                        window.location.href = "<?php echo base_url().'c_site/index'?>";
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {//Swal.fire('Cancelled','Your imaginary file is safe :)','error')
                location.reload();
            }
            $("*").css("cursor", "default");
        })
    })
    $('#uprav_pozn').on("click", function(){
        $('#uprav_pozn').hide();
        // document.getElementById("uprav_pozn").innerHTML = 'zrušiť úpravu';
        $("#textarea").attr("readonly", false);
        $("#cancel_pozn").show();
        $("#save_pozn").show();
        $("#pridaj_hod").addClass('disabled');
    })
    $('#cancel_pozn').on("click", function(){
        $('#uprav_pozn').show();
        $("#textarea").attr("readonly", true);
        $("#cancel_pozn").hide();
        $("#save_pozn").hide();
        $("#textarea").val(localStorage.doch_pozn);
        $("#pridaj_hod").removeClass('disabled');
    })
    $('#save_pozn').on("click", function(){
        $('#uprav_pozn').show();
        $("#textarea").attr("readonly", true);
        $("#cancel_pozn").hide();
        $("#save_pozn").hide();
        $("#pridaj_hod").removeClass('disabled');

        var id = "<?php echo $this->session->userdata('id'); ?>";
        if((id == 1) || (id == 10)) {
            id = localStorage.zam_id;
        }
        $.ajax({
            url: "<?php echo base_url().'c_doch/upd_den_pozn/'?>" + localStorage.doch_datum + '/' + id + '/' + localStorage.id_den,
            data: $('#pozn_den').serialize(),
            dataType: "json",
            async: 'true',
            cache: 'false',
            type: 'post',
                success:function(data){
                    if(data.success){
                        $('#success_message').html('<div class="alert alert-success text-center">úpravy údajov boli úspešne uložené</div>');
                        $("#success_message").show();
                        setTimeout(function() { $("#success_message").hide(); }, 3000); //location.reload();
                    };
                }
        });
        var s2 = "<?php echo base_url().'c_doch/get_doch/'?>" + localStorage.doch_datum + '/' + localStorage.zam_id + '/x';
        $('#doch_zam').DataTable().ajax.url(s2).load();

        var s2 = "<?php echo base_url().'c_doch/get_doch/'?>" + localStorage.doch_datum + '/' + localStorage.zam_id + '/x';
        $('#doch_zam').DataTable().ajax.url(s2).load();
        var s2 = "<?php echo base_url().'c_doch/get_doch/'?>" + localStorage.doch_datum + '/' + localStorage.zam_id + '/x';
        $('#doch_zam').DataTable().ajax.url(s2).load();
    })

    $('#zzedi').on("click", function(){
        $('#zzedi').hide();
        $('#zzrem').hide();
        localStorage.setItem("doch_d3", 2);
        $("#pridaj_hod").addClass('disabled');
        $("#uprav_pozn").addClass('disabled');

        $("#textarea_hod").attr("readonly", false);
        $("#hodiny_od").attr("readonly", false);
        $("#hodiny_do").attr("readonly", false);

        $("#div_doch_zam").addClass('disabled');

        $('#save_add_upd').show();
        $('#cancel').show();
    })
    $('#zzrem').on("click", function(e){
        e.preventDefault();
        $('#zzedi').hide();
        $('#zzrem').hide();
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
            $.ajax({
                url: "<?php echo base_url().'c_doch/del_hod/'?>" + localStorage.id_hod,
                data: '',
                dataType: "json",
                async: 'true',
                cache: 'false',
                type: 'post',
                    success:function(data){
                        if(data.success){
                            var s1 = "<?php echo base_url().'c_doch/get_doch_den/'?>" + localStorage.doch_datum + '/' + localStorage.zam_id;
                            $('#doch_den').DataTable().ajax.url(s1).load();
                            var id = "<?php echo $this->session->userdata('id'); ?>";
                            if((id == 1) || (id == 10)) {
                                id = localStorage.zam_id;
                            }
                            $.ajax({
                                url: "<?php echo base_url().'c_doch/upd_den/'?>" + localStorage.doch_datum + '/' + id + '/' + localStorage.id_den,
                                data: '',
                                dataType: "json",
                                async: 'true',
                                cache: 'false',
                                type: 'post',
                                    success:function(data){
                                        if(data.success){
                                            $('#success_message').html('<div class="alert alert-success text-center">úpravy údajov boli úspešne uložené</div>');
                                            $("#success_message").show();
                                            setTimeout(function() { $("#success_message").hide(); }, 3000); //location.reload();
                                        };
                                    }
                            });

                            var s2 = "<?php echo base_url().'c_doch/get_doch/'?>" + localStorage.doch_datum + '/' + localStorage.zam_id + '/x';
                            $('#doch_zam').DataTable().ajax.url(s2).load();

                            $('#success_message').html('<div class="alert alert-success text-center">veta bola úspešne zmazaná</div>');
                            $("#success_message").show();
                            setTimeout(function() { $("#success_message").hide(); }, 3000); //location.reload();

                            $('#cancel').click();
                            $("#prace_form").hide();

                            location.href = location.href;
                            // location.reload();
                        };
                    }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {//Swal.fire('Cancelled','Your imaginary file is safe :)','error')
            var table = $('#doch_den').DataTable();
            table.rows().deselect();
            $('#cancel').click();
            $("#prace_form").hide();
        }
        });
    });

    $('#print_h').on("click", function(){
        uloz_mes_vypl();
        if($('#cb1').prop('checked') == true){
            location.href = "<?php echo site_url('c_doch/phf_report/v')?>";
        } else {
            location.href = "<?php echo site_url('c_doch/phf_report/x')?>";
        }

    });
    $('#print_d').on("click", function(){
        uloz_mes_vypl();
        if($('#cb1').prop('checked') == true){
            location.href = "<?php echo site_url('c_doch/pdf_report/v')?>";
        } else {
            location.href = "<?php echo site_url('c_doch/pdf_report/x')?>";
        }
    });

    $('#pridaj_hod').on("click", function(){
        localStorage.setItem("doch_d3", 1);

        $("#prace_form").hide();
        $("#prace_form").show();
        $("#textarea_hod").val("");
        $("#hodiny_od").val("07:30");
        $("#hodiny_do").val("16:00");

        $("#hodiny_od").val(localStorage.miesto_od);
        $("#hodiny_do").val(localStorage.miesto_do);

        if(localStorage.miesto_rad == 1){document.getElementById("radio_1").checked = true;}
        if(localStorage.miesto_rad == 2){document.getElementById("radio_2").checked = true;}
        if(localStorage.miesto_rad == 3){document.getElementById("radio_3").checked = true;}
        if(localStorage.miesto_rad == 13){document.getElementById("radio_4").checked = true;}
        if(localStorage.miesto_rad == 8){document.getElementById("radio_5").checked = true;}
        if(localStorage.miesto_rad == 14){document.getElementById("radio_6").checked = true;}

        if(localStorage.miesto_rad == 9){document.getElementById("radio_7").checked = true;}
        if(localStorage.miesto_rad == 10){document.getElementById("radio_8").checked = true;}
        if(localStorage.miesto_rad == 7){document.getElementById("radio_9").checked = true;}
        if(localStorage.miesto_rad == 15){document.getElementById("radio_10").checked = true;}
        if(localStorage.miesto_rad == 11){document.getElementById("radio_11").checked = true;}
        if(localStorage.miesto_rad == 16){document.getElementById("radio_12").checked = true;}

        tohodiny();

        $("#pridaj_hod").addClass('disabled');
        $("#uprav_pozn").addClass('disabled');

        $("#textarea_hod").attr("readonly", false);
        $("#hodiny_od").attr("readonly", false);
        $("#hodiny_do").attr("readonly", false);

        $("#div_doch_zam").addClass('disabled');

        $('#save_add_upd').show();
        $('#cancel').show();
    })
    $('#save_vypl').on("click", function(){
        uloz_mes_vypl();
    })
    $('#zzadd_vypl').on("click", function(){
        var d = $('#kalendar').datepicker('getFormattedDate');
        $("*").css("cursor", "progress");
        $("#d_o_v").val($("#datum_od_vypl").val().substr(8,2) + '.' + $("#datum_od_vypl").val().substr(5,2) + '.' + $("#datum_od_vypl").val().substr(0,4));
        $("#d_d_v").val($("#datum_do_vypl").val().substr(8,2) + '.' + $("#datum_do_vypl").val().substr(5,2) + '.' + $("#datum_do_vypl").val().substr(0,4));
        uloz_mes_vypl();
        $.ajax({
            url: "<?php echo base_url().'c_doch/generuj_doch_vypl/'?>" + d + '/'  + localStorage.do_us + '/' + localStorage.vypl_rad,
            data: $('#vypl_form').serialize(),
            dataType: "json",
            async: 'true',
            cache: 'false',
            type: 'post',
            success:function(data){
                //get_tab(data);
                // window.location.href = "<?php //echo base_url().'c_site/index'?>";
                // selcint();
                if(data.success){
                    localStorage.setItem("do_ria", "<?php echo $_SESSION['ae']?>");
                    $('#success_message').html('<div class="alert alert-success text-center">Generovanie dochádzky podľa zadania bolo úspešne dokončené</div>');
                    $("#success_message").show();
                    setTimeout(function() { $("#success_message").hide(); }, 3000); //location.reload();
                };
                get_data(1, localStorage.do_us);
                mes_vypl();
            }
        });
        $("*").css("cursor", "default");
    })
    $('#cancel').on("click", function(){
        localStorage.setItem("doch_d3", 0);
        $("#pridaj_hod").removeClass('disabled');
        $("#uprav_pozn").removeClass('disabled');

        $("#textarea_hod").attr("readonly", true);
        $("#hodiny_od").attr("readonly", true);
        $("#hodiny_do").attr("readonly", true);

        $("#div_doch_zam").removeClass('disabled');

        $('#save_add_upd').hide();
        $('#cancel').hide();
        $("#prace_form").hide();
    })
    $('#save_add_upd').on("click", function(){
        var id = "<?php echo $this->session->userdata('id'); ?>";
        if((id == 1) || (id == 10)) {
            id = localStorage.zam_id;
        }
        if (localStorage.doch_d3 == 1){  // add
            $.ajax({
                url: "<?php echo base_url().'c_doch/add_hod/'?>" + localStorage.doch_datum + '/' + id + '/' + localStorage.miesto_rad + '/' + localStorage.hodiny + '/0/' + localStorage.id_den,
                data: $('#prace_form').serialize(),
                dataType: "json",
                async: 'true',
                cache: 'false',
                type: 'post',
                success:function(data){
                    if(data.success){
                        $('#cancel').click();
                        $('#success_message').html('<div class="alert alert-success text-center">úpravy údajov boli úspešne uložené</div>');
                        $("#success_message").show();
                        setTimeout(function() { $("#success_message").hide(); }, 3000); //location.reload();
                    };
                }
            });
        }
        if (localStorage.doch_d3 == 2){  // update
            $.ajax({
                url: "<?php echo base_url().'c_doch/upd_hod/'?>" + localStorage.doch_datum + '/' + id + '/' + localStorage.miesto_rad + '/' + localStorage.hodiny + '/' + localStorage.id_hod + '/' + localStorage.id_den,
                data: $('#prace_form').serialize(),
                dataType: "json",
                async: 'true',
                cache: 'false',
                type: 'post',
                success:function(data){
                    if(data.success){
                        $('#cancel').click();
                        $('#success_message').html('<div class="alert alert-success text-center">úpravy údajov boli úspešne uložené</div>');
                        $("#success_message").show();
                        setTimeout(function() { $("#success_message").hide(); }, 3000); //location.reload();
                    };
                }
            });
        }

        $.ajax({
            url: "<?php echo base_url().'c_doch/upd_den/'?>" + localStorage.doch_datum + '/' + id + '/' + localStorage.id_den,
            data: '',
            dataType: "json",
            async: 'true',
            cache: 'false',
            type: 'post',
                success:function(data){
                    if(data.success){
                        $('#success_message').html('<div class="alert alert-success text-center">úpravy údajov boli úspešne uložené</div>');
                        $("#success_message").show();
                        setTimeout(function() { $("#success_message").hide(); }, 3000); //location.reload();
                    };
                }
        });

        var s1 = "<?php echo base_url().'c_doch/get_doch_den/'?>" + localStorage.doch_datum + '/' + localStorage.zam_id;
        $('#doch_den').DataTable().ajax.url(s1).load();

        var s1 = "<?php echo base_url().'c_doch/get_doch_den/'?>" + localStorage.doch_datum + '/' + localStorage.zam_id;
        $('#doch_den').DataTable().ajax.url(s1).load();

        $.ajax({
            url: "<?php echo base_url().'c_doch/upd_den/'?>" + localStorage.doch_datum + '/' + id + '/' + localStorage.id_den,
            data: '',
            dataType: "json",
            async: 'true',
            cache: 'false',
            type: 'post',
                success:function(data){
                    if(data.success){
                        $('#success_message').html('<div class="alert alert-success text-center">úpravy údajov boli úspešne uložené</div>');
                        $("#success_message").show();
                        setTimeout(function() { $("#success_message").hide(); }, 3000); //location.reload();
                    };
                }
        });

        var s2 = "<?php echo base_url().'c_doch/get_doch/'?>" + localStorage.doch_datum + '/' + localStorage.zam_id + '/x';
        $('#doch_zam').DataTable().ajax.url(s2).load();

        var s2 = "<?php echo base_url().'c_doch/get_doch/'?>" + localStorage.doch_datum + '/' + localStorage.zam_id + '/x';
        $('#doch_zam').DataTable().ajax.url(s2).load();

        $('#cancel').click();
        $("#prace_form").hide();

        // var table = $('#doch_zam').DataTable();
        // table.rows().select();

        // var table = $('#doch_den').DataTable();
        // table.rows().select();

    })
</script>

<?php
    if(isset($_GET['heslo'])){
        if($_GET['heslo'] == 'OK'){
            echo '<div id="alert" class="alert alert-success text-center" style="margin-top:100px"><h4>Nové heslo bolo úspešne uložené.</h4></div>';
        }
    }
?>

<script type="text/javascript">
  $(document).ready(function() {
    document.body.style.cursor = 'default';

    var d = $('#kalendar').datepicker('getFormattedDate');
    var daysInCurrentMonth = new Date(parseInt(d.substr(7,4)), d.substr(3,2), 0).getDate();

    localStorage.setItem('dni_v_mesiaci', daysInCurrentMonth);

    if( $('#vypl_form').is(":visible")){

        $("#datum_od_vypl").val(d.substr(6,4) + "-" + d.substr(3,2) + "-" + "01");
        // $("#datum_od_vypl").min("<?php echo date('Y', $_SESSION['den'])?>" + "-" +
        //                         "<?php echo date('m', $_SESSION['den'])?>" + "-" + "01");
        var x = localStorage.dni_v_mesiaci;
        var dni = x.toString();
        $("#datum_do_vypl").val(d.substr(6,4) + "-" + d.substr(3,2) + "-" + dni);
    }


    localStorage.setItem("do_pom", 1);

    setTimeout(function() { $("#alert").hide(); }, 5000);
    var skup = "<?php echo $this->session->userdata('skup'); ?>";
    if(skup=='admin'){$('#admin').show();};

    setTimeout(function() { $('#ins').show(); }, 1500);
    setTimeout(function() { $('#rem').show(); }, 1500);

    var id = "<?php echo $this->session->userdata('id'); ?>";
    if(id == 1) {
        setTimeout(function() { $('#gen').show(); }, 2000);
        setTimeout(function() { $('#kon').show(); }, 2000);
        setTimeout(function() { $('#cb').show(); }, 2000);
    }
    $(window).on('beforeunload', function(){
        $('*').css("cursor", "default");
    });
  });
</script>

<script type="text/javascript">
      function selcast(){
        var s = '';
        if(document.getElementById("zakazka").value == ''){
          document.getElementById("zakazka").value = 0;
          document.getElementById("cast").value = 0;
          document.getElementById("cast_popis").value = '';
        }else{
          if(localStorage.doch_zakcast != ''){s = $('#cast').text();}
        }
        document.getElementById("cast_popis").value = s;
        document.getElementById("skratka").value = ' ';
      };
      function uloz_mes_vypl(){
        var d = $('#kalendar').datepicker('getFormattedDate');
        $("*").css("cursor", "progress");
        $.ajax({
            url: "<?php echo base_url().'c_doch/uloz_mes_vypl/'?>" + d + '/'  + localStorage.do_us,
            data: $('#sum_vypl_form').serialize(),
            dataType: "json",
            async: 'true',
            cache: 'false',
            type: 'post',
            success:function(data){
                if(data.success){
                    localStorage.setItem("do_ria", "<?php echo $_SESSION['ae']?>");
                    $('#success_message').html('<div class="alert alert-success text-center">hodiny do zostavy za mesiac "<?php echo date('m.Y', $_SESSION['den'])?>" boli úspešne dokončené</div>');
                    $("#success_message").show();
                    setTimeout(function() { $("#success_message").hide(); }, 3000); //location.reload();
                };

            }
        });
        $("*").css("cursor", "default");
      };
      function mes_vypl(){
        $('#lek_vypl').val(0);
        $('#dov_vypl').val(0);
        $('#nv_vypl').val(0);
        $('#pn_vypl').val(0);
        $('#nlek_vypl').val(0);
        $('#ocr_vypl').val(0);
        var d = $('#kalendar').datepicker('getFormattedDate');
        $("*").css("cursor", "progress");
        $.ajax({
            // url: "<?php //echo base_url().'c_doch/get_mes_vypl/'?>" + d + '/',
            url: "<?php echo base_url().'c_doch/get_mes_vypl/'?>" + d + '/' + localStorage.zam_id,
            data: '',
            dataType: "json",
            async: 'true',
            cache: 'false',
            type: 'post',
            success:function(data){
                if(data != null){
                    $('#lek_vypl').val(data[0].HODINY);
                    $('#dov_vypl').val(data[0].HODINY_DOVOL);
                    $('#nv_vypl').val(data[0].HODINY_NV);
                    $('#pn_vypl').val(data[0].HODINY_PN);
                    $('#nlek_vypl').val(data[0].HODINY_LEKAR);
                    $('#ocr_vypl').val(data[0].HODINY_OCR);
                }
            }
        });
        $("*").css("cursor", "default");
      }
      function selcint(){
        localStorage.setItem("do_cb1", $('#cb1').prop('checked'));
        $("*").css("cursor", "progress");
        if($('#cb1').prop('checked') == true){
            $('#div_doch_zam').hide();
            $('#pridaj_hod').hide();
            get_data(1, localStorage.do_us);
            $('#div_doch').show();
            $('#doch_den').hide();
            $('#prace_form').hide();
            if(localStorage.do_us!=''){
                $('#vypl_form').show();
                $('#sum_vypl_form').show();
                mes_vypl();

                $('#meno_kal').show();

                $("#datum_od_vypl").val("<?php echo date('Y', $_SESSION['den'])?>" + "-" +
                                        "<?php echo date('m', $_SESSION['den'])?>" + "-" + "01");
                // $("#datum_od_vypl").min("<?php echo date('Y', $_SESSION['den'])?>" + "-" +
                //                         "<?php echo date('m', $_SESSION['den'])?>" + "-" + "01");
                var x = localStorage.dni_v_mesiaci;
                var dni = x.toString();
                $("#datum_do_vypl").val("<?php echo date('Y', $_SESSION['den'])?>" + "-" +
                                        "<?php echo date('m', $_SESSION['den'])?>" + "-" + dni);
            }else{
                $('#meno_kal').hide();
            }
        } else {
            $('#vypl_form').hide();
            $('#sum_vypl_form').hide();
            $('#div_doch').hide();
            $('#div_doch_zam').show();
            // $('#pridaj_hod').show();
            // $('#doch_den').show();
        }
        $("*").css("cursor", "default");
      };

      function selcinm(){
        if(document.getElementById("zakazka").value != ''){
          localStorage.setItem("doch_zak", document.getElementById("zakazka").value);
          localStorage.setItem("doch_zakcast", document.getElementById("cast").value);
        };
        var d = document.getElementById("cinm");
        var s = d.options[d.selectedIndex].text;
        document.getElementById("cast_popis").value = s;
        document.getElementById("skratka").value = document.getElementById("cinm").value;
        document.getElementById("zakazka").value = ' ';
        document.getElementById("cast").value = ' ';
      };
      function aky_den() {
        //var d = new Date("<?php //echo date('m.d.Y', $_SESSION['den']); ?>"); var s = d.getDay(); var ko='';
        var d = new Date($('#demo').datepicker('getFormattedDate')); var s = d.getDay(); var ko='';
        if(s==0){ko='Ne'}else if(s==1){ko='Po'}else if(s==2){ko='Ut'}else if(s==3){ko='St'}else if(s==4){ko='Št'}else if(s==5){ko='Pi'}else if(s==6){ko='So'};
        localStorage.setItem("akyden", skr);
        document.getElementById("akyden").value = skr;
      };
      function formatTime(date){
        d = new Date(date);
        var h=d.getHours(),m=d.getMinutes(),l="AM";
        if(h > 12){h = h - 12;}
        if(h < 10){h = '0'+h;}
        if(m < 10){m = '0'+m;}
        if(d.getHours() >= 12){l="PM"}else{l="AM"}
        return h+':'+m+' '+l;
      };
      function encr(message = '', key = ''){
        var message = CryptoJS.AES.encrypt(message, 'TySI.bew');
        return message.toString();
      };
      function decr(message = '', key = ''){
        var code = CryptoJS.AES.decrypt(message, 'TySI.bew');
        var decryptedMessage = code.toString(CryptoJS.enc.Utf8);
        return decryptedMessage;
      };
      function selcintfradio(rad){
        localStorage.setItem( 'miesto_rad', rad );
      };
      function selcintfradio_vypl(rad){
        localStorage.setItem( 'vypl_rad', rad );
      };
      // console.log(encrypt('Hello World'));
      // console.log(decrypt('U2FsdGVkX1/0oPpnJ5S5XTELUonupdtYCdO91v+/SMs='));
</script>