<?php
class Pengelola extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('url');
        $this->load->model('M_pengelola');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title']     = "Halaman Pengelola";
        $data['sub_judul'] = "Daftar Posting";
        $data['hasil'] = $this->M_pengelola->get_datapengelola();
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/topbar', $data);
        $this->load->view('admin/list_pengelola', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_berita()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->form_validation->set_rules('post_title', 'judul', 'trim|required|xss_clean');
            $this->form_validation->set_rules('post_description', 'isi', 'trim|required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $data['title']     = "Halaman Tambah Berita";
                $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
                $this->load->view('admin/template/header', $data);
                $this->load->view('admin/template/sidebar', $data);
                $this->load->view('admin/template/topbar', $data);
                $this->load->view("admin/tambah_berita", $data);
                $this->load->view('admin/template/footer');
            } else {
                $aksi = $this->M_pengelola->add();
                if ($aksi) {
                    redirect('berita', 'refresh');
                } else {
                    redirect('berita/tambah_berita', 'refresh');
                }
            }
        }
        $data['title']     = "Halaman Tambah Berita";
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = "Berita";
        $data['sub_judul'] = "Tambah Data Berita";
        $data['contents'] = 'admin/tambah_berita';
        $data['hasil'] = $this->M_pengelola->get_category();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/topbar', $data);
        $this->load->view("admin/tambah_berita", $data,);
        $this->load->view('admin/template/footer');
    }

    public function edit_berita($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data_post = $this->M_pengelola->get_detail_by_id($id);
            if (count($data_post) > 0) {
                $aksi = $this->M_pengelola->update($id);
                if ($aksi) {
                    redirect('berita', 'refresh');
                }
            } else {
                redirect('berita/edit_berita/' . $id, 'refresh');
            }
        } else {
            $data['title']     = "Halaman Edit Berita";
            $data_post = $this->M_pengelola->get_detail_by_id($id);
            $data['judul'] = "Posting";
            $data['sub_judul'] = "Edit Data Post";
            $data['old_value'] = $this->M_pengelola->get_detail_by_id($id);
            $data['hasil'] = $this->M_pengelola->get_category();
            $data['user'] = $this->db->get_where('tb_user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['contents'] = 'admin/edit_berita';
            $data['title']     = "Halaman Edit Berita";
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/template/topbar', $data);
            $this->load->view("admin/edit_berita", $data);
            $this->load->view('admin/template/footer');
        }
    }

    public function delete($id = 0)
    {
        $data_post = $this->M_pengelola->get_detail_by_id($id);
        if (count($data_post) > 0) {
            $aksi = $this->M_pengelola->delete($id);
            if ($aksi) {
                redirect('berita', 'refresh');
            } else {
                redirect('berita/', 'refresh');
            }
        } else {
            redirect('berita/', 'refresh');
        }
    }
}
