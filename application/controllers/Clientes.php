<?php
class Clientes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Cliente_model');
    }

    // Pantalla principal (Ver)
    public function index() {
        $data['clientes'] = $this->Cliente_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('clientes/index', $data);
        $this->load->view('templates/footer');
    }

    // Pantalla Crear
    public function crear() {
        $this->load->view('templates/header');
        $this->load->view('clientes/crear');
        $this->load->view('templates/footer');
    }

    // Acción de guardar
    public function guardar() {
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'telefono' => $this->input->post('telefono'),
            'direccion_principal' => $this->input->post('direccion_principal')
        );
        $this->Cliente_model->insert($data);
        redirect('clientes');
    }

    // Pantalla Editar
    public function editar($id) {
        $data['cliente'] = $this->Cliente_model->get_cliente($id);
        $this->load->view('templates/header');
        $this->load->view('clientes/editar', $data);
        $this->load->view('templates/footer');
    }

    // Acción de actualizar
    public function actualizar($id) {
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'telefono' => $this->input->post('telefono'),
            'direccion_principal' => $this->input->post('direccion_principal')
        );
        $this->Cliente_model->update($id, $data);
        redirect('clientes');
    }
}