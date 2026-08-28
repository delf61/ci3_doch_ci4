<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class C_site extends BaseController {
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
    }
    }
    function getdata()
    {
        ini_set('session.cache_limiter','public');
        session_cache_limiter(false);
    }
    function logout(){
        $id = $this->m_uziv->get_last_login(session()->get('id'),$_SESSION['d'],$_SESSION['ipa'],$_SESSION['ipb'],$_SESSION['pla']);
        // print_r($id.'  '.session()->get('kod').'  '.$_SESSION['d'].'  '.$_SESSION['ipa'].'  '.$_SESSION['ipb'].'  '.$_SESSION['pla']);
        if($id!=0){
            $data = array(
                "DATUM_DO" => date('Y.m.d'),
                "DO" => date("H:i:s")
            );$this->m_uziv->upd_log($data,$id);
        }
        session()->destroy();
        redirect(base_url().'uvod?msg=logout');
    }
    function index() {
        $this->m_site = new \App\Models\M_site();
        $message = $this->m_site->run_my_query();
        $info_array = array(
            "name" => "Learn CodeIgniter",
            "email" => "ci@gmail.com",
            "author" => "SK",
            "message" => $message
        );
        //echo view("include/header"); // header section
        //echo view("site/site_index"); // body section
        //echo view("include/footer", $info_array); // footer

        echo view("home_doch", $info_array);
    }
    function about() {
        echo view("site/site_about");
    }
    function contact_info() {
        echo "<h1>This is contact us page</h1>";
    }
    function product($name = "") {
        echo "<h3>Product name: </h3>" . $name;
    }
    function service($id = "", $name = "") {
        echo "<h3>This is our service page</h3><p>ID: " . $id . " AND Service Name: " . $name;
    }
    function zaloha() {
        ini_set('memory_limit', '2048M');
        $this->load->dbutil();
        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();

        // Load the file helper and write the file to your server
        $this->load->helper('file');
        write_file(site_url('/mybackup.gz'), $backup);

        // Load the download helper and send the file to your desktop
        // $this->load->helper('download');
        // force_download('mybackup.gz', $backup);

        ini_set('memory_limit', '128M');
    }
    // insert data into db table
    function insert_data_into_table() {
        $data = array(
            "name" => "Learn CodeIgniter",
            "email" => "ci@gmail.com",
            "amount" => "120"
        );
        echo $this->m_site->insert_table_data($data);
    }
    function update_data() {
        header("Cache-Control: no-cache, must-revalidate");
        //$c = get_time_limit;
        //echo $c;
        set_time_limit(0); // I added unlimited time limit here, because the records I imported were in the hundreds of thousands.

        ini_set('max_execution_time', 0);
        $akt_tab = 0;
        $tables = [];
        $limit = ini_get('memory_limit');
        ini_set('memory_limit', -1);
        // ... do heavy stuff
        foreach ($tables as $table)
        { //echo $table;
            $pocet_tab = count( $tables );
            $akt_tab = ($akt_tab + 1);
            $this->db->select("*");
            $this->db->from($table);
            $query = $this->db->get();
            $fields = $query->field_data();
            $cnt = $query->num_fields();
            $tab = $query->result();
            $r_cnt = $query->num_rows();
            ob_flush();
            flush(); // to tell the operating system to flush it's buffers to the user.
            //sleep(1);
            ob_clean();
            //echo "tabulka: " . $table ."<br/>";
            //echo "<pre>";
            //print_r($fields);
            //print_r($cnt);
            //echo "</pre>";
            $ok = 0;
            if($_SESSION['imp'] == 0){
                $ok = 0;
                $naz = substr( $table, 0, 7 );
                // if (  //or ($naz == 'wkalkul')  or ($naz == 'wprijem')
                //     )
                //     {
                //         $ok = 0;
                //     };
                $naz = substr( $table, 0, 8 );
                //if (($naz == 'wdo20190') or ($naz == 'wdochzak')) { $ok = 0; };

                if ($table == 'wprijemky'){$ok = 1;}
                if ($table == 'wvydajky'){$ok = 1;}

                //$ok = 0;
                // if ($table == '_uzivatelia') {$ok = 1;}
                //if ($table == 'wdochzak') {$ok = 0;}
                //if ($table == 'csviatky') {$ok = 1;}

                if ($table == 'csv_obj_imp') {$ok = 0;}
                if ($table == 'csv_poh_imp') {$ok = 0;}

            }
            if($_SESSION['imp'] == 1){
                if ($table == 'zwfingera'){$ok = 1;};
                if($_SESSION['log'] == 333){$ok = 0;}
            }
            if(($_SESSION['imp'] == 2) || ($_SESSION['imp'] == 20)){
                if ($table == 'ztudajo'){$ok = 1;};
                if ($table == 'zweviobj'){$ok = 1;};
                if ($table == 'zwobjed'){$ok = 1;};
                if ($table == 'zwprijemky'){$ok = 1;};
                if ($table == 'zwvydajky'){$ok = 1;};
                // $ok = 0;
                if($_SESSION['log'] == 333){$ok = 0;}
            }
            if ($ok == 1){
                echo $akt_tab . " / " . $pocet_tab . "      tabulka: " . $table . "    "  . $cnt . " stlpcov  " . $r_cnt . "   viet    " . date("h:i:sa") . "<br/>";
                foreach ($fields as $field){
                    $typ = $field->type;
                    $name = $field->name;
                    //echo "typ: " . $typ . "    pole: " . $name . "<br/>";

                    if( $typ == 'varchar'){
                    //$znak = array("¾", "å", "¼", "è", "È", "Ò");
                        $znak = array("¾", "~", "¼", "¤", "µ", "¶", "©", "®", "ò", "ï", "•", "†", "‡", "°", "«", "»");
                        $nahr = array("ľ", "ĺ", "Ľ", "č", "Č", "Ň", "ť", "Ť", "ň", "ď", "ě", "&", ">", "'", "<", "Á");
                        $pocet = count($znak);

                        //echo "tabulka: " . $table . "    stlpcov: " . $cnt .  "    viet " . $r_cnt . "    typ: " . $typ . "    pole: " . $name . "<br/>";

                        //for($x = 0; $x < $pocet; $x++) {
                        for($x = 0; $x < $pocet; $x++) {
                            $this->db->select("id," . $name );
                            $this->db->from($table);
                            $this->db->like($name, $znak[$x], "both");
                            $query1 = $this->db->get();
                            // echo "<pre>";
                            // //print_r($query1);
                            // echo "</pre>";
                            $tab1 = $query1->result();
                            $cnt1 = $query1->num_rows();
                            $cnt2 = $query->num_fields();
                            // echo "<pre>";
                            // print_r($tab1);
                            // echo "</pre>";

                            //echo "tabulka: " . $table . "    stlpcov: " . $cnt .  "    viet " . $r_cnt . "    typ: " . $typ . "    pole: " . $name . "<br/>";
                            if ($cnt1 > 0){
                                //echo "tabulka: " . $table . "    stlpcov: " . $cnt .  "    viet " . $r_cnt .
                                //     "znak: " . $znak[$x] . "     pole: " . $name . "    viet " . $cnt1 . "<br/>";
                                //echo "<pre>";
                                //print_r($tab1);
                                //echo "</pre>";
                                // echo $id;
                                foreach ($tab1 as $index => $hodnota) {
                                    // echo "<pre>";
                                    // print_r($hodnota);
                                    // echo "</pre>";
                                    $id = $tab1[$index]->id;
                                    $ret1 = $hodnota->$name;  // =   $ret = $tab1[$index]->$name;
                                    $ret2 = str_replace($znak[$x], $nahr[$x], $ret1);
                                    //echo $id . "   " . $ret1 . "   " . $ret2 . "<br/>";
                                    $this->m_zakazky->_updateQuery($table, $name, $id, $ret2);
                                }
                                "<br/>";
                            }
                        }
                    }
                    // if( $typ == 'float'){
                    //     $this->db->select("id," . $name );
                    //     $this->db->from($table);
                    //     $query1 = $this->db->get();
                    //     // echo "<pre>";
                    //     // print_r($query1);
                    //     // echo "</pre>";
                    //     $tab1 = $query1->result();
                    //     $cnt1 = $query1->num_rows();
                    //     if ($cnt1 > 0){
                    //         foreach ($tab1 as $index => $hodnota) {
                    //             // echo "<pre>";
                    //             // print_r($hodnota);
                    //             // echo "</pre>";
                    //             $id = $tab1[$index]->id;
                    //             $ret1 = $hodnota->$name;  // =   $ret = $tab1[$index]->$name;
                    //             if(($name != 'KOD') and ($name != 'KOD_ZADAL') and ($name != 'OS_CISLO') and ($name != 'PRIORITA')
                    //                 and ($name != 'KONTKOD') and ($name != 'KOD_UPRAVA') and ($name != 'SK') and ($ret1 != 0)){
                    //                 $ret2 = ($ret1 / 100);
                    //                 //echo $id . "   " . $ret1 . "   " . $ret2 . "<br/>";
                    //                 $this->m_zakazky->_updateQuery($table, $name, $id, $ret2);
                    //             }
                    //         }
                    //         "<br/>";
                    //     }
                    // }
                }
            }
        }
        set_time_limit(0);
    }

    function w1250_to_utf8() {
        $fn = "wDochZak.xml";
        $content = file_get_contents($fn);
        $conv = mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-2', true));

        file_put_contents($fn, $conv);

        //return mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-2', true));
    }

    function w1250_to_utf8___() {
        //$text = file_get_contents ("./_Uzivatelia.xml");
        //echo $text;
        //echo file_get_contents ("./_Uzivatelia.xml");

        // map based on:
        // http://konfiguracja.c0.pl/iso02vscp1250en.html
        // http://konfiguracja.c0.pl/webpl/index_en.html#examp
        // http://www.htmlentities.com/html/entities/
        $map = array(
            chr(0x8A) => chr(0xA9),
            chr(0x8C) => chr(0xA6),
            chr(0x8D) => chr(0xAB),
            chr(0x8E) => chr(0xAE),
            chr(0x8F) => chr(0xAC),
            chr(0x9C) => chr(0xB6),
            chr(0x9D) => chr(0xBB),
            chr(0xA1) => chr(0xB7),
            chr(0xA5) => chr(0xA1),
            chr(0xBC) => chr(0xA5),
            chr(0x9F) => chr(0xBC),
            chr(0xB9) => chr(0xB1),
            chr(0x9A) => chr(0xB9),
            chr(0xBE) => chr(0xB5),
            chr(0x9E) => chr(0xBE),
            chr(0x80) => '&euro;',
            chr(0x82) => '&sbquo;',
            chr(0x84) => '&bdquo;',
            chr(0x85) => '&hellip;',
            chr(0x86) => '&dagger;',
            chr(0x87) => '&Dagger;',
            chr(0x89) => '&permil;',
            chr(0x8B) => '&lsaquo;',
            chr(0x91) => '&lsquo;',
            chr(0x92) => '&rsquo;',
            chr(0x93) => '&ldquo;',
            chr(0x94) => '&rdquo;',
            chr(0x95) => '&bull;',
            chr(0x96) => '&ndash;',
            chr(0x97) => '&mdash;',
            chr(0x99) => '&trade;',
            chr(0x9B) => '&rsquo;',
            chr(0xA6) => '&brvbar;',
            chr(0xA9) => '&copy;',
            chr(0xAB) => '&laquo;',
            chr(0xAE) => '&reg;',
            chr(0xB1) => '&plusmn;',
            chr(0xB5) => '&micro;',
            chr(0xB6) => '&para;',
            chr(0xB7) => '&middot;',
            chr(0xBB) => '&raquo;',
        );
        //echo html_entity_decode(mb_convert_encoding(strtr($text, $map), 'UTF-8', 'ISO-8859-2'), ENT_QUOTES, 'UTF-8');
        //return html_entity_decode(mb_convert_encoding(strtr($text, $map), 'UTF-8', 'ISO-8859-2'), ENT_QUOTES, 'UTF-8');
    }
    function read_csv(){    //readExcel
        $this->load->library('csvreader');
        //$result = $this->csvreader->parse_file('importy/objednavky.txt');
        $result = $this->csvreader->parse_file('importy/obj-web.csv');//
        $data['csvData'] =  $result;
        print_r($data);
        //echo view("site/form_csv", $data);
    }
    function alter_id(){
        echo $this->m_site->alter_id();
    }
}
?>