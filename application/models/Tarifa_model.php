<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarifa_model extends CI_Model
{
    private $tabla = 'Tb_Tarifas';

    public function __construct()
    {
        parent::__construct();
    }

    // Listado completo con el nombre del tipo de servicio (JOIN),
    // más recientes primero
    public function get_all_con_tipo()
    {
        return $this->db->select('Tb_Tarifas.*, Tb_Tipos_Servicios.nombre AS tipo_nombre, Tb_Tipos_Servicios.codigo AS tipo_codigo')
                         ->from($this->tabla)
                         ->join('Tb_Tipos_Servicios', 'Tb_Tipos_Servicios.id = Tb_Tarifas.tipo_servicio_id')
                         ->order_by('Tb_Tarifas.vigente_desde', 'DESC')
                         ->get()
                         ->result();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id', $id)
                         ->get($this->tabla)
                         ->row();
    }

    // Devuelve la tarifa vigente actual para un tipo de servicio dado
    // (vigente_hasta NULL = todavía activa)
    public function get_vigente_por_tipo($tipo_servicio_id)
    {
        return $this->db->where('tipo_servicio_id', $tipo_servicio_id)
                         ->where('vigente_hasta', NULL)
                         ->get($this->tabla)
                         ->row();
    }

    /**
     * Crea una nueva tarifa para un tipo de servicio.
     * Si ya existía una tarifa vigente para ese tipo, la cierra
     * (vigente_hasta = ahora) antes de insertar la nueva.
     * Las dos operaciones corren en una sola transacción: o se
     * aplican ambas, o ninguna.
     *
     * @return array ['exito' => bool, 'mensaje' => string]
     */
    public function crear_nueva_tarifa($tipo_servicio_id, $precio)
    {
        $this->db->trans_start();

        // 1. Cerrar la tarifa vigente anterior de ese tipo, si existe
        $this->db->where('tipo_servicio_id', $tipo_servicio_id)
                  ->where('vigente_hasta', NULL)
                  ->update($this->tabla, ['vigente_hasta' => date('Y-m-d H:i:s')]);

        // 2. Insertar la nueva tarifa como vigente
        $this->db->insert($this->tabla, [
            'tipo_servicio_id' => $tipo_servicio_id,
            'precio'           => $precio,
            'vigente_desde'    => date('Y-m-d H:i:s'),
            'vigente_hasta'    => NULL,
        ]);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return ['exito' => FALSE, 'mensaje' => 'Ocurrió un error al guardar la tarifa. No se aplicó ningún cambio.'];
        }

        return ['exito' => TRUE, 'mensaje' => 'Tarifa registrada correctamente.'];
    }

    // Una tarifa solo se puede borrar si nunca se usó en una lectura
    public function tiene_lecturas($id)
    {
        $en_base = $this->db->where('tarifa_base_id', $id)
                             ->count_all_results('Tb_Lecturas');

        $en_exceso = $this->db->where('tarifa_exceso_id', $id)
                               ->count_all_results('Tb_Lecturas');

        return ($en_base > 0 || $en_exceso > 0);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->tabla);
    }
}
