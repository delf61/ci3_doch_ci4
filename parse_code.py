import os
import re

ci3_path = "ci3_source"

methods = set()
for root, dirs, files in os.walk(os.path.join(ci3_path, "application/models")):
    for file in files:
        if file.endswith(".php"):
            with open(os.path.join(root, file), 'r') as f:
                content = f.read()
                matches = re.findall(r"\$this->db->\w+\(", content)
                methods.update(matches)

print("DB Methods:", methods)
