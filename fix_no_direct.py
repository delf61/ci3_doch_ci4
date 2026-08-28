import glob
import os
for root, _, files in os.walk('ci4_app/app/Views'):
    for file in files:
        if file.endswith(".php"):
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()

            if "No direct script access allowed" in content:
                content = content.replace("<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>", "")
                content = content.replace("defined('BASEPATH') OR exit('No direct script access allowed');", "")

            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(content)
