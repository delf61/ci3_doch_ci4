<?php
namespace App\Models;
use CodeIgniter\Model;



class M_site extends Model {

    private $owt;

    public function __construct() {
        parent::__construct();
        //$this->owt = $this->load->database("owt", TRUE);
        $this->db = \Config\Database::connect();
    }
    function run_my_query() {
        return "This is message from m-site model file";
    }
    function insert_table_data($data) {
        //return $this->db->query("Insert into tbl_users (name,email,phone_no) Values ('Sample','sample@gmail.com','2316546121')");

        ///return $this->owt->insert("tbl_books", $data);
        //return $this->db->insert("tbl_users", $data);
    }
    function edit_data($where, $table){
        // echo "<pre>";
        // print_r($where);
        // echo "</pre>";
        return $this->db->table($table)->getWhere($where);
    }
    function get_data($table){
        $builder = $this->db->table($table);
        $pr = $builder->get();
        return $pr->getResult();
    }
    function get_zak($table){
        $builder = $this->db->table($table);
        $builder->select("CISZAK");
        $builder->groupBy("CISZAK");
        $pr=$builder->get();
        return $pr->getResult();
    }
    function insert_data($data, $table){
        $builder = $this->db->table($table);
        $builder->insert($data);
    }
    function update_data($where, $data, $table){
        $builder = $this->db->table($table);
        $builder->where($where);
        $builder->update($data);
    }
    function delete_data($where, $table){
        $builder = $this->db->table($table);
        $builder->where($where);
        $builder->delete();
    }
    function delete_day($table){
        $builder = $this->db->table($table);
        $builder->where('D', date('d.m.Y'));
        $builder->delete();
    }
    function delete_all($table){
        $builder = $this->db->table($table);
        $builder->truncate();
    }
    function _updateRowWhere($table, $where = array(), $data = array()) {
        $builder = $this->db->table($table);
        $builder->where($where);
        $builder->update($data);
    }
    function _updateQuery_ok() {
        $builder = $this->db->table("wevizak");
        $builder->like("PREDMET", "¾", "both");
        $builder->set("PREDMET", "OKKKKKKKKKKKKKKK");
        $builder->update();
        return True;
    }
    function _updateQuery($table, $field, $str1, $str2) {
        $builder = $this->db->table($table);
        $builder->where("id =", $str1);
        $builder->set($field, $str2);
        $builder->update();
        return True;
    }
    function w1250_to_utf8($fn) {
        //$fn = "wDochZak.xml";
        $content = file_get_contents($fn);
        $conv = mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-2', true));

        file_put_contents($fn, $conv);

        //return mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-2', true));
    }
    function w1250_to_utf8___($fn) {
        //$text = file_get_contents ("./_Uzivatelia.xml");
        //echo $text;
        //echo file_get_contents ("./_Uzivatelia.xml");

        $text = file_get_contents($fn);

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
        $conv = html_entity_decode(mb_convert_encoding(strtr($text, $map), 'UTF-8', 'ISO-8859-2'), ENT_QUOTES, 'UTF-8');

        file_put_contents($fn, $conv);
        //return html_entity_decode(mb_convert_encoding(strtr($text, $map), 'UTF-8', 'ISO-8859-2'), ENT_QUOTES, 'UTF-8');
    }
    function alter_id(){
        $tables = $this->db->listTables();
        foreach ($tables as $table){
            echo $table."<br>";
            if ($this->db->fieldExists('id', $table)){

                    $this->db->query('ALTER TABLE '.$table.' MODIFY COLUMN id INT(11) NOT NULL AUTO_INCREMENT');

            }
        }
    }
}
?>
