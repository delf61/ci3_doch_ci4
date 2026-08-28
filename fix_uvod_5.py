import re
with open("ci4_app/app/Controllers/Uvod.php", "r", encoding="utf-8") as f:
    content = f.read()

content = content.replace("return redirect()->to(base_url('uvod?msg=faillogin'));", "return redirect()->to('/uvod?msg=faillogin');")
content = content.replace("return redirect()->to(base_url('uvod/index?msg=err'));", "return redirect()->to('/uvod/index?msg=err');")

with open("ci4_app/app/Controllers/Uvod.php", "w", encoding="utf-8") as f:
    f.write(content)
