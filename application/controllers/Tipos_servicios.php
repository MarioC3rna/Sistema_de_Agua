<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipos_servicios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tipo_servicio_model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
    }

    // GET /tipos_servicios
    public function index()
    {
        $data['titulo'] = 'Tipos de Servicio';
        $data['menu_activo'] = 'tipos_servicios';
        $data['tipos'] = $this->Tipo_servicio_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('tipos_servicios/index', $data);
        $this->load->view('templates/footer');
    }

    // GET /tipos_servicios/crear  |  POST /tipos_servicios/crear
    public function crear()
    {
        $this->form_validation->set_rules('codigo', 'Código', 'required|trim|max_length[20]|is_unique[Tb_Tipos_Servicios.codigo]');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('volumen_incluido_litros', 'Volumen incluido (litros)', 'numeric');
        $this->form_validation->set_rules('es_servicio', 'Es servicio', 'required|in_list[0,1]');

        if ($this->form_validation->run() === FALSE) {
            $data['titulo'] = 'Nuevo Tipo de Servicio';
            $data['menu_activo'] = 'tipos_servicios';
            $this->load->view('templates/header', $data);
            $this->load->view('tipos_servicios/form', $data);
            $this->load->view('templates/footer');
            return;
        }

        $this->Tipo_servicio_model->insert([
            'codigo'                  => $this->input->post('codigo', TRUE),
            'nombre'                  => $this->input->post('nombre', TRUE),
            'volumen_incluido_litros' => $this->input->post('volumen_incluido_litros', TRUE) ?: NULL,
            'es_servicio'             => $this->input->post('es_servicio', TRUE),
        ]);

        $this->session->set_flashdata('mensaje', 'Tipo de servicio creado correctamente.');
        redirect('tipos_servicios');
    }

    // GET /tipos_servicios/eliminar/{id}
    public function eliminar($id)
    {
        if ($this->Tipo_servicio_model->tiene_dependencias($id)) {
            $this->session->set_flashdata('error', 'No se puede eliminar: este tipo de servicio tiene contadores o tarifas asociadas.');
            redirect('tipos_servicios');
            return;
        }

        $this->Tipo_servicio_model->delete($id);
        $this->session->set_flashdata('mensaje', 'Tipo de servicio eliminado.');
        redirect('tipos_servicios');
    }
}
