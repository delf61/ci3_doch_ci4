<?php
namespace App\Models;
use CodeIgniter\Model;

class M_action extends Model {

    protected $db;
    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function select_all_data() {

        // it will select all data from table
        //$this->db->select("*");
        //$query = $this->db->get("users"); //tbl_users
        // select * from tbl_users

        /* $this->db->select("name,email");
          $this->db->from("users"); // tbl_users
          $query = $this->db->get(); */

        $builder = $this->db->table('_uzivatelia');
        $builder->select('*');
        $builder->where('id', 2);
        $query = $builder->get();

        return $result = $query->getResult();
    }

    public function update_table_data() {

        $data = array(
            "name" => "Online Web Tutor",
            "email" => "onlinewebtutorhub@gmail.com",
            "phone_no" => "1231654981"
        );

        $builder = $this->db->table("users");
        $builder->where("id", 1);
        $builder->update($data);

        return True;
    }

    public function get_all_users_data() {

        $builder = $this->db->table('_uzivatelia');
        $builder->select('*');
        $query = $builder->get();
        // select * from tbl_users where id = 1
        return $result = $query->getResultArray();
    }

    public function delete_specific_user() {

        //$this->db->where("id",4);
        //return $this->db->delete("users");
        // delete from tbl_users where id =4
        $builder = $this->db->table("users");
        $builder->where("id", 3);
        return $builder->delete();
    }

    public function get_where_condition_query() {

        $builder = $this->db->table("users");
        $builder->select("*");
        $builder->where("salary >=", 4500);
        $query = $builder->get();
        // select * from tbl_users where salary >= 4500
        return $result = $query->getResult();
    }

    public function get_and_condition() {

        $builder = $this->db->table("users");
        $builder->select("*");
        $builder->where("id", 1);
        $builder->orWhere("email", "onlinewebtutorhub@gmail.com1");
        $query = $builder->get();
        return $result = $query->getResult();
        // select * from tbl_users where id = 1 AND email = 'onlinewebtutorhub@gmail.com'
        // select * from tbl_users where id = 1 OR email = 'onlinewebtutorhub@gmail.com'
    }

    public function get_where_in() {

        $builder = $this->db->table("tbl_users");
        $builder->select("*");
        $builder->like("email", "rahul", "after");
        $query = $builder->get();
        return $result = $query->getResult();
    }

    public function get_user_messages() {

        $builder = $this->db->table("tbl_users as user");
        $builder->select("user.*,message.message");
        $builder->join("tbl_messages as message", "user.id = message.user_id", "inner");
        $query = $builder->get();
        // select user.*,message.message from tbl_users as user INNER JOIN tbl_messages as message ON user.id = message.user_id
        return $result = $query->getResult();
    }

}
?>