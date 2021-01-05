<?php
class M_pengelola extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_datapengelola()
    {
        $this->db->order_by('id_pengelola', 'asc');
        $data = $this->db->get('tb_pengelola')->result_array();
        return $data;
    }
    public function get_datapengelola_byId($id)
    {
        $this->db->where('id_pengelola', $id);
        $pengelola = $this->db->get('tb_pengelola')->row_array();
        return $pengelola;
    }
    public function save_datapengelola($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update_datapengelola($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete($id)
    {
        $this->db->where('post_id', $id);
        $action = $this->db->delete('post');
        return $action;
    }
}
