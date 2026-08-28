    <!-- head section -->
    <?= view("include/head") ?>

    <body id="home" onbeforeunload="myFunction()" onClose="sessionClose()">

        <!-- header section -->
        <?= view("include/header") ?>

        <!-- content section -->
        <?= view("site/home_content") ?>

    </body>

    <script>
        function myFunction() {
            //return "Write something clever here...";
            // var skup = "<?php //$uziv_skup = $_SESSION['uziv_skup'];?>";
            // if(skup!='admin'){window.location.href = "<?php echo site_url('logout') ?>";};
        }
    </script>
    <script type="text/javascript">

        // $.get('https://www.cloudflare.com/cdn-cgi/trace', function(data) {
        //     console.log(data)
        // });

        function sessionClose(){
            // do session close stuff
            session_destroy();
        }
    </script>
    <!-- Footer section -->
    <?= view("include/footer")
    // echo view("include/footer", array(
    //     "name" => $name,
    //     "email_footer" => $email
    // ))
    ?>
