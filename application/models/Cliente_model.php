<?php
class Cliente_model extends CI_Model {
    
    // Ver todos
    public function get_all() {
        return $this->db->get('Tb_Clientes')->result();
    }

    // Ver uno específico para editar
    public function get_cliente($id) {
        return $this->db->where('id', $id)->get('Tb_Clientes')->row();
    }

    // Crear
    public function insert($data) {
        return $this->db->insert('Tb_Clientes', $data);
    }

    // Editar
    public function update($id, $data) {
        return $this->db->where('id', $id)->update('Tb_Clientes', $data);
    }
}