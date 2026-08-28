import re
with open("ci4_app/app/Controllers/Uvod.php", "r", encoding="utf-8") as f:
    content = f.read()

# Update Validation using CI4 syntax
validation_block = """
        if (!$this->validate([
            'username' => 'required|trim',
            'password' => 'required|trim'
        ])) {
            return view('login', ['validation' => $this->validator]);
        }
"""
content = re.sub(r"// \$this->form_validation->set_rules\('username','Username','trim\|required'\);\n\s*// \$this->form_validation->set_rules\('password','Password','trim\|required'\);\n\s*if\([^)]+\)\{", validation_block, content)

# In login() method, there was a query: $this->m_site->edit_data($where, "_uzivatelia");
# We need to map this carefully. Since $agent isn't used as heavily as it used to be due to CI4 lacking the UserAgent library out of the box in the exact same way, we can mock or load it.
content = content.replace("$agent = 'CI4_Mock';", "$agent = $this->request->getUserAgent()->getAgentString();")

# The session check and redirect
# Replace direct redirect with returning the redirect
content = content.replace("redirect(base_url().'doch/mesa');", "return redirect()->to(base_url('doch/mesa'));")
content = content.replace("redirect(base_url().'doch/rozhr');", "return redirect()->to(base_url('doch/rozhr'));")
content = content.replace("redirect(base_url().'uvod/index?msg=err');", "return redirect()->to(base_url('uvod/index?msg=err'));")

with open("ci4_app/app/Controllers/Uvod.php", "w", encoding="utf-8") as f:
    f.write(content)
