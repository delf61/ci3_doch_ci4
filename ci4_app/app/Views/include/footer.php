        <?php

        ?>

        <div class="mynav1">

        <nav class="navbar navbar-expand fixed-bottom" style="background-color: #555; color:#eee;">

            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="#navbarSupportedContent" aria-expanded=false aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->

            <a class="navbar-brand" href="<?php echo site_url('about') ?>"><i class="fa fa-fw fa-info-circle"></i></a>

            <div>
                <p id="dat" style="margin: 0;top: 50%;"></p>
            </div>
            <div>
                <p id="cas" style="margin: 0;top: 50%;"></p>
            </div>

            <div class="collapse1 navbar-collapse" id="navbarSupportedContent1">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('upload-form') ?>">Upload</a>
                    </li> -->
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="<?php echo site_url('my-uri') ?>">my-uri</a> -->
                    </li>
                </ul>
            </div>
        <!--
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
            <!-- <form class="nav-item form-inline my-2 my-lg-0"> -->

            <div class="nav-item">
                <a class="nav-link" href="<?php echo site_url('logout') ?>">
                <i class="fa fa-fw fa-times"></i> Ukončiť</a>
            </div>
        </nav>

        </div>
    </body>

    <footer>
        <!-- <p>All the codes developed by <?php //echo $name ?></p>
        <p>Email: <?php //echo $email; ?></p> -->

        <?php
            // setTimeout(function () {
            //     location.reload();
            // }, 30000);
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                var myVar = setInterval(myTimer, 1000);
                function myTimer() {
                    var d = new Date();
                    var c = d.toLocaleDateString();
                    $("#dat").text( c + '    ');
                    $("#cas").text(d.toLocaleTimeString() + '    ');
                    localStorage.setItem("isyt_logd", c);
                    localStorage.setItem("isyt_logc", d.toLocaleTimeString());
                }
            })
        </script>

        <script type="text/javascript">
            function autoRefreshPage(){
                //window.location = window.location.href;
            }
            setInterval('autoRefreshPage()', 30000);
        </script>

        <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js" data-auto-replace-svg="nest"></script>

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        <script type="text/javascript" src="<?php echo base_url('js/popper.min.js'); ?>"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/svg.js/3.0.13/svg.min.js"></script>

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/fontawesome.min.js"></script> -->

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>

        <!-- <script type="text/javascript" src="https://cdnjs.com/libraries/pdf.js"></script> -->

        <script type="text/javascript" src="<?php echo base_url('js/ellipsis.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/percentageBars.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('js/external/google-code-prettify/prettify.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('js/numeric-input-example.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-datepicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-datepicker.sk.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/md5.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('js/jquery.drawrpalette-min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/xlsx.full.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('js/html2canvas.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/Canvas2Image.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('js/site.js'); ?>"></script>
    </footer>
</html>