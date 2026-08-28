import re

with open("ci4_app/app/Models/M_site.php", "r", encoding="utf-8") as f:
    content = f.read()

content = content.replace("<?php", "<?php\nnamespace App\\Models;\nuse CodeIgniter\\Model;")
content = re.sub(r"class (\w+) extends CI_Model", r"class \1 extends Model", content)
content = content.replace("$this->load->database();", "$this->db = \\Config\\Database::connect();")
content = content.replace("->result()", "->getResult()")
content = content.replace("->result_array()", "->getResultArray()")

with open("ci4_app/app/Models/M_site.php", "w", encoding="utf-8") as f:
    f.write(content)
