import re
with open("ci4_app/app/Views/login.php", "r", encoding="utf-8") as f:
    content = f.read()

# Make it completely plain PHP temporarily for errors
content = content.replace("<?= validation_errors('username') ?>", "<?= isset($validation) ? $validation->getError('username') : '' ?>")
content = content.replace("<?= validation_errors('password') ?>", "<?= isset($validation) ? $validation->getError('password') : '' ?>")

with open("ci4_app/app/Views/login.php", "w", encoding="utf-8") as f:
    f.write(content)
