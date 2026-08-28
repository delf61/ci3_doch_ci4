import re
with open("ci4_app/app/Models/M_action.php", "r", encoding="utf-8") as f:
    content = f.read()

content = content.replace("$this->db->select(\"*\");\n        $this->db->from(\"users\");\n        //$this->db->where(\"email\",\"sanjay@gmail.com\");\n        $this->db->where(array(\n            \"id\" => 2,\n            \"email\" => \"Rakesh@gmail.com\"\n        ));\n        $query = $this->db->get();",
"$builder = $this->db->table('_uzivatelia');\n        $builder->select('*');\n        $builder->where('id', 2);\n        $query = $builder->get();")
content = content.replace("return $result = $query->result();", "return $result = $query->getResult();")

with open("ci4_app/app/Models/M_action.php", "w", encoding="utf-8") as f:
    f.write(content)
