<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class C_action extends BaseController {

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
    }
    public function get_all_data() {
        $this->m_action = new \App\Models\M_action();

        $data = $this->m_action->select_all_data();
        echo "<pre>";
        print_r($data);
    }
    public function update_data() {

        if ($this->m_action->update_table_data()) {
            echo "<h3>Data has been updated</h3>";
        }
    }
    public function get_users(){

        $data = $this->m_action->get_all_users_data();
        echo "<pre>";
        print_r($data);
    }
    public function delete_single_user(){

        echo $this->m_action->delete_specific_user();
    }
    public function condition(){

        //$data = $this->m_action->get_where_condition_query();
        //$data = $this->m_action->get_and_condition();
        $data = $this->m_action->get_where_in();
        echo "<pre>";
        print_r($data);
    }
    public function get_messages(){

        $data = $this->m_action->get_user_messages();
        echo "<pre>";
        print_r($data);
    }
}
