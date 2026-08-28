import re
with open('ci4_app/app/Config/Database.php', 'r') as f:
    content = f.read()

content = re.sub(r"public array \$default = \[\s*'DSN'\s*=> '',\s*'hostname'\s*=> 'localhost',\s*'username'\s*=> '',\s*'password'\s*=> '',\s*'database'\s*=> '',",
"    public array $default = [\n        'DSN'          => '',\n        'hostname'     => 'localhost',\n        'username'     => 'jules',\n        'password'     => '',\n        'database'     => 'doch',", content)

with open('ci4_app/app/Config/Database.php', 'w') as f:
    f.write(content)
