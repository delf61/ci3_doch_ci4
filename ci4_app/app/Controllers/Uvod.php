<?php
namespace App\Controllers;
use CodeIgniter\Controller;


class Uvod extends BaseController {
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
    }

    public function index(){
        echo view('login');
    }
    function login(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // $this->form_validation->set_rules('username','Username','trim|required');
        // $this->form_validation->set_rules('password','Password','trim|required');

        $agent = 'CI4_Mock';

        $_SESSION['bro'] = $agent;
        $_SESSION['pla'] = 'CI4_Mock_Platform';

        $_SESSION['ipa'] = $_SERVER['REMOTE_ADDR'];
        if (false) {
            $ip = getenv("HTTP_CLIENT_IP");
        } elseif (false) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
            if ( strstr($ip, ',') ) {
                $tmp = explode(',', $ip);
                $ip = trim($tmp[0]);
            }
        } else {
            $ip = getenv("REMOTE_ADDR");
        }
        $_SESSION['ipb'] = $ip;

        if(true){
            if($username=='Vie Vénosová'){
                $where = array(
                    'MESO' => $username,
                    'HESO' => md5($password)
                );
            } else {
                $where = array(
                    'MESO' => $username,
                    'HESO' => md5($password)
                );
            }
            $data = (new \App\Models\M_site())->edit_data($where,'_uzivatelia');
            $d = (new \App\Models\M_site())->edit_data($where,'_uzivatelia')->getRow();
            $cek = $data->getNumRows();
            if($cek > 0){
                $session = array(
                    'id' => $d->id,
                    //'kod' => $d->KOD,
                    'uziv' => $d->MESO,
                    'prac' => $d->MENO,
                    'prio' => $d->PRIORITA,
                    'status' => 'login'
                );
                session()->set($session);
                $_SESSION['den'] = strtotime(date('Y-m-d'));
                $_SESSION['file'] = '';
                $_SESSION['path_to_file'] = '';
                $_SESSION['pom'] = '';
                $_SESSION['ae'] = '';
                $_SESSION['str'] = 0;
                $_SESSION['imp'] = 0;
                $_SESSION['upd'] = 0;
                $_SESSION['zme'] = 0;
                $_SESSION['log'] = 0;
                $_SESSION['d'] = date('Y.m.d');
                $_SESSION['z'] = ['','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''];
                $_SESSION['new'] = 1;
                $data = array(
                    'id_user' => $d->id,
                    'DATUM' => date('Y.m.d'),
                    'OD' => date("H:i:s"),
                    'DATUM_DO' => '',
                    'DO' => '',
                    'AGENT' => $agent,
                    'MENO' => $d->MENO,
                    'PLATFORM' => $_SESSION['pla'],
                    'IP' => $_SESSION['ipa'],
                    'IPB' => $_SESSION['ipb'],
                    'ARCINTCIS' => ''
                );
                $this->m_site->insert_data($data,'wuzivlog');

                // if($d->PRIORITA!=9){
                //     redirect(site_url('ulohy/list'));
                // }else{
                //     return redirect()->to(base_url('c_site/index'));
                // }
                return redirect()->to(base_url('c_site/index'));
            } else {
                $data = array(
                    'id_user' => 0,
                    'DATUM' => date('Y.m.d'),
                    'OD' => date("H:i:s"),
                    //'DATUM_DO' => '',
                    'DO' => '',
                    'AGENT' => $agent,
                    'MENO' => $username,
                    'PLATFORM' => $_SESSION['pla'],
                    'IP' => $_SESSION['ipa'],
                    'IPB' => $_SESSION['ipb'],
                    'ARCINTCIS' => ''
                );
                // $this->m_site->insert_data($data,'wuzivlogfake');

                return redirect()->to('/uvod?msg=faillogin');
            }
        } else {
            echo view('login');
        }
    }
}