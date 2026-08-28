import re

with open('ci3_source/application/config/routes.php', 'r') as f:
    lines = f.readlines()

for line in lines:
    if '$route' in line and not line.strip().startswith('//') and not line.strip().startswith('/*'):
        print(line.strip())
