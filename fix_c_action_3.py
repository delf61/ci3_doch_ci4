import re
with open("ci4_app/app/Controllers/C_action.php", "r", encoding="utf-8") as f:
    content = f.read()

content = content.replace("public function initController(\\CodeIgniter\\HTTP\\RequestInterface $request, \\CodeIgniter\\HTTP\\ResponseInterface $response, \\Psr\\Log\\LoggerInterface $logger)\n    {\n        parent::initController($request, $response, $logger);\n    }\n        \n    }", "public function initController(\\CodeIgniter\\HTTP\\RequestInterface $request, \\CodeIgniter\\HTTP\\ResponseInterface $response, \\Psr\\Log\\LoggerInterface $logger)\n    {\n        parent::initController($request, $response, $logger);\n    }")

with open("ci4_app/app/Controllers/C_action.php", "w", encoding="utf-8") as f:
    f.write(content)
