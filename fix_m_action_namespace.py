import re
with open("ci4_app/app/Models/M_action.php", "r", encoding="utf-8") as f:
    content = f.read()

content = content.replace("<?php", "<?php\nnamespace App\\Models;\nuse CodeIgniter\\Model;")
content = content.replace("class M_action extends \\\\CodeIgniter\\\\Model", "class M_action extends Model")
content = content.replace("$this->load->database();", "$this->db = \\Config\\Database::connect();")

with open("ci4_app/app/Models/M_action.php", "w", encoding="utf-8") as f:
    f.write(content)
