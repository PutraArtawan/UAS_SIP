<?php
class M_berita extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $data = array();
        $this->db->select('*');
        $this->db->where('post.post_posting_by = tb_user.user_id');
        $this->db->where('post.post_category_id = post_category.post_category_id');
        $this->db->order_by('post.post_id desc');
        $Q = $this->db->get('post, tb_user, post_category');

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $Q->free_result();
        return $data;
    }

    function get_detail_by_id($id)
    {
        $data = array();
        $this->db->select('*');
        $this->db->where('post.post_posting_by = tb_user.user_id');
        $this->db->where('post.post_id', $id);
        $Q = $this->db->get('post, tb_user');

        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function get_category()
    {
        $data = array();
        $this->db->select('*');
        $Q = $this->db->get('post_category');

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $Q->free_result();
        return $data;
    }

    function add()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_sekarang = date('Y-m-d H:i:s');

        $data = array();
        $this->db->select('*');
        $this->db->where('tb_user.email', $this->session->userdata("email"));
        $Q = $this->db->get('tb_user');

        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();

        $user_id = "1";

        $judul = $this->input->post('post_title');
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $judul);
        $trim = trim($string);
        $pre_slug = strtolower(str_replace(" ", "-", $trim));
        $slug = $pre_slug . '.html';

        $data = array(
            'post_title' => "$judul",
            'post_slug' => "$slug",
            'post_description' => $this->input->post('post_description'),
            'post_category_id' => $this->input->post('post_category'),
            'post_posting_date' => "$tgl_sekarang",
            'post_posting_by' => "$user_id",
            'post_status' => $this->input->post('post_status'),
        );
        $action = $this->db->insert('post', $data);
        return $action;
    }

    function update($id)
    {
        $data = array(
            'post_title' => $this->input->post('post_title'),
            'post_description' => $this->input->post('post_description'),
            'post_category_id' => $this->input->post('post_category'),
            'post_status' => $this->input->post('post_status'),
        );
        $this->db->where('post_id', $id);
        $action = $this->db->update('post', $data);
        return $action;
    }

    function delete($id)
    {
        $this->db->where('post_id', $id);
        $action = $this->db->delete('post');
        return $action;
    }
}
