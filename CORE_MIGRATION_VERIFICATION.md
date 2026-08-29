# Core Migration Verification

| Test Case | CI3 Legacy | CI4 Migrated | Result |
| :--- | :--- | :--- | :--- |
| **`/login` Endpoint** | Renders HTML login form. Uses `form_error` properly. POST submission validates. | Returns HTTP 200. Renders identical HTML. Uses CI4 `$validation->getError()`. POST returns valid checks via `validation_show_error`. | **PASS** |
| **`/action/select-all` Endpoint** | Queries `users` with conditions. Outputs JSON/print_r array. | Returns HTTP 200. Uses `$builder->get()`. Connects to local `doch` database. Outputs identical structure mapped to `_uzivatelia`. | **PASS** |
| **`/action/users` Endpoint** | Queries `users` all data. Outputs JSON/print_r array. | Returns HTTP 200. Uses `$builder->get()`. Connects to local `doch` database. Outputs identical structure mapped to `_uzivatelia`. | **PASS** |
| **Authentication Flow** | Session created on login. `status == 'login'` unlocks pages. Failed login redirects to `?msg=faillogin`. | BaseController initialized. Filter check `session()->get('status')` functional. Redirects use `return redirect()->to()`. | **PASS** |
