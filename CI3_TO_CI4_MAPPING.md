# CI3 to CI4 Mapping

| CI3 | CI4 |
| --- | --- |
| application/controllers | app/Controllers |
| application/models | app/Models |
| application/views | app/Views |
| application/config | app/Config |
| application/helpers | app/Helpers |
| application/libraries | app/Libraries |
| CI_Controller | BaseController |
| CI_Model | Model |
| $this->input->post() | $this->request->getPost() |
| $this->load->view() | view() |
| $this->db->get() | $db->table()->get() |
