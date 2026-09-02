<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarifas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tarifa_model');
        $this->load->model('Tipo_servicio_model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
    }

    // GET /tarifas
    public function index()
    {
        $data['titulo'] = 'Tarifas';
        $data['menu_activo'] = 'tarifas';
        $data['tarifas'] = $this->Tarifa_model->get_all_con_tipo();

        $this->load->view('templates/header', $data);
        $this->load->view('tarifas/index', $data);
        $this->load->view('templates/footer');
    }

    // GET /tarifas/crear  |  POST /tarifas/crear
    public function crear()
    {
        $this->form_validation->set_rules('tipo_servicio_id', 'Tipo de servicio', 'required|integer');
        $this->form_validation->set_rules('precio', 'Precio', 'required|numeric|greater_than[0]');

        if ($this->form_validation->run() === FALSE) {
            $data['titulo'] = 'Nueva Tarifa';
            $data['menu_activo'] = 'tarifas';
            $data['tipos'] = $this->Tipo_servicio_model->get_all();
            $this->load->view('templates/header', $data);
            $this->load->view('tarifas/form', $data);
            $this->load->view('templates/footer');
            return;
        }

        $tipo_servicio_id = $this->input->post('tipo_servicio_id', TRUE);
        $precio = $this->input->post('precio', TRUE);

        // Aviso previo: si ya existe una tarifa vigente para este tipo,
        // se va a cerrar automáticamente al guardar
        $resultado = $this->Tarifa_model->crear_nueva_tarifa($tipo_servicio_id, $precio);

        if ($resultado['exito']) {
            $this->session->set_flashdata('mensaje', $resultado['mensaje']);
        } else {
            $this->session->set_flashdata('error', $resultado['mensaje']);
        }

        redirect('tarifas');
    }

    // GET /tarifas/eliminar/{id}
    public function eliminar($id)
    {
        if ($this->Tarifa_model->tiene_lecturas($id)) {
            $this->session->set_flashdata('error', 'No se puede eliminar: esta tarifa ya fue usada en al menos una lectura.');
            redirect('tarifas');
            return;
        }

        $this->Tarifa_model->delete($id);
        $this->session->set_flashdata('mensaje', 'Tarifa eliminada.');
        redirect('tarifas');
    }
}
