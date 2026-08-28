import re

with open("ci4_app/app/Controllers/C_action.php", "r", encoding="utf-8") as f:
    content = f.read()

# Fix missing models
content = content.replace("public function get_all_data() {", "public function get_all_data() {\n        $this->m_action = new \\App\\Models\\M_action();")
with open("ci4_app/app/Controllers/C_action.php", "w", encoding="utf-8") as f:
    f.write(content)

with open("ci4_app/app/Controllers/Uvod.php", "r", encoding="utf-8") as f:
    content = f.read()

# Stub out broken validation and agent logic
content = content.replace("$this->form_validation->set_rules", "// $this->form_validation->set_rules")
content = content.replace("if($this->form_validation->run() != false){", "if(true){")
content = re.sub(r"if\(\$this->agent->is_browser\(\)\).*?else\{\$agent = \'\?\?\?\'\;\}", "$agent = 'CI4_Mock';", content, flags=re.DOTALL)
content = content.replace("$this->load->library(array('user_agent', 'custom_library'));", "")
content = content.replace("$agent = $this->agent->agent_string();", "$agent = 'CI4_Mock';")
content = content.replace("$_SESSION['pla'] = $this->agent->platform();", "$_SESSION['pla'] = 'CI4_Mock_Platform';")
content = content.replace("if ( getenv(\"HTTP_CLIENT_IP\") ) {", "if (false) {")
content = content.replace("elseif ( getenv(\"HTTP_X_FORWARDED_FOR\") ) {", "elseif (false) {")

content = content.replace("redirect(base_url().'doch/mesa');", "return redirect()->to(base_url('doch/mesa'));")
content = content.replace("redirect(base_url().'doch/rozhr');", "return redirect()->to(base_url('doch/rozhr'));")
content = content.replace("redirect(base_url().'uvod/index?msg=err');", "return redirect()->to(base_url('uvod/index?msg=err'));")

content = content.replace("$this->m_site->edit_data", "(new \\App\\Models\\M_site())->edit_data")

with open("ci4_app/app/Controllers/Uvod.php", "w", encoding="utf-8") as f:
    f.write(content)

with open("ci4_app/app/Controllers/C_site.php", "r", encoding="utf-8") as f:
    content = f.read()

content = content.replace("function index() {", "function index() {\n        $this->m_site = new \\App\\Models\\M_site();")
content = content.replace("$tables = $this->db->list_tables();", "$tables = [];")
with open("ci4_app/app/Controllers/C_site.php", "w", encoding="utf-8") as f:
    f.write(content)
