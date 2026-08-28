import os
import glob
for root, _, files in os.walk('ci4_app/app/Views'):
    for file in files:
        if file.endswith(".php"):
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()

            content = content.replace("form_error(", "(\\Config\\Services::validation())->getError(")
            content = content.replace("$this->load->view(", "echo view(")
            content = content.replace("<?php echo view(", "<?= view(")
            content = content.replace("<?php  echo view(", "<?= view(")

            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(content)
