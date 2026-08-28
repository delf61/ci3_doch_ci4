import re

def migrate(path):
    with open(path, 'r', encoding='utf-8') as f:
        content = f.read()

    # Generic
    content = content.replace("<?php", "<?php\nnamespace App\\Controllers;\nuse CodeIgniter\\Controller;")
    content = content.replace("defined('BASEPATH') OR exit('No direct script access allowed');", "")
    content = re.sub(r"class (\w+) extends CI_Controller", r"class \1 extends BaseController", content)
    content = re.sub(r"\$this->load->view\s*\(\s*([^,;]+)\s*,\s*([^,;]+)\s*\)", r"echo view(\1, \2)", content)
    content = re.sub(r"\$this->load->view\s*\(\s*([^,;]+)\s*\)", r"echo view(\1)", content)
    content = content.replace("$this->input->post", "$this->request->getPost")
    content = content.replace("$this->session->userdata", "session()->get")
    content = content.replace("$this->session->set_userdata", "session()->set")
    content = content.replace("$this->session->sess_destroy", "session()->destroy")
    content = re.sub(r"\$this->load->model\s*\(\s*(['\"][a-zA-Z0-9_]+['\"])\s*\);", "", content)

    # Use string replacement instead of regex replacement for fixed strings to avoid escaping errors
    replacement = "public function initController(\\CodeIgniter\\HTTP\\RequestInterface $request, \\CodeIgniter\\HTTP\\ResponseInterface $response, \\Psr\\Log\\LoggerInterface $logger)\n    {\n        parent::initController($request, $response, $logger);\n    }"

    content = re.sub(r"(public )?function\s+__construct\s*\(\)\s*\{.*?\}", lambda m: replacement, content, flags=re.DOTALL)

    with open(path, 'w', encoding='utf-8') as f:
        f.write(content)

migrate("ci4_app/app/Controllers/Uvod.php")
migrate("ci4_app/app/Controllers/C_action.php")
migrate("ci4_app/app/Controllers/C_site.php")
