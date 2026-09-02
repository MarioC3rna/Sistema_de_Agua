<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_servicio_model extends CI_Model
{
    private $tabla = 'Tb_Tipos_Servicios';

    public function __construct()
    {
        parent::__construct();
    }

    // Devuelve todos los tipos de servicio, ordenados por nombre
    public function get_all()
    {
        return $this->db->order_by('nombre', 'ASC')
                         ->get($this->tabla)
                         ->result();
    }

    // Devuelve solo los que son "servicio" real (es_servicio = 1),
    // excluyendo el tipo "exceso" — útil para el dropdown de contadores
    public function get_servicios()
    {
        return $this->db->where('es_servicio', 1)
                         ->order_by('nombre', 'ASC')
                         ->get($this->tabla)
                         ->result();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id', $id)
                         ->get($this->tabla)
                         ->row();
    }

    public function insert($data)
    {
        $this->db->insert($this->tabla, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)
                         ->update($this->tabla, $data);
    }

    // Antes de borrar, verifica que ningún contador o tarifa lo esté usando
    public function tiene_dependencias($id)
    {
        $en_contadores = $this->db->where('tipo_servicio_id', $id)
                                   ->count_all_results('Tb_Contadores');

        $en_tarifas = $this->db->where('tipo_servicio_id', $id)
                                ->count_all_results('Tb_Tarifas');

        return ($en_contadores > 0 || $en_tarifas > 0);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->tabla);
    }
}
