<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Anggota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/anggota/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/anggota/index/';
            $config['first_url'] = base_url() . 'index.php/anggota/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Anggota_model->total_rows($q);
        $anggota = $this->Anggota_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'anggota_data' => $anggota,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','anggota/tbl_anggota_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_anggota' => $row->id_anggota,
		'nama' => $row->nama,
		'kelas' => $row->kelas,
		'jurusan' => $row->jurusan,
		'angkatan' => $row->angkatan,
		'alamat' => $row->alamat,
	    );
            $this->template->load('template','anggota/tbl_anggota_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('anggota/create_action'),
	    'id_anggota' => set_value('id_anggota'),
	    'nama' => set_value('nama'),
	    'kelas' => set_value('kelas'),
	    'jurusan' => set_value('jurusan'),
	    'angkatan' => set_value('angkatan'),
	    'alamat' => set_value('alamat'),
	);
        $this->template->load('template','anggota/tbl_anggota_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'jurusan' => $this->input->post('jurusan',TRUE),
		'angkatan' => $this->input->post('angkatan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Anggota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('anggota'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('anggota/update_action'),
		'id_anggota' => set_value('id_anggota', $row->id_anggota),
		'nama' => set_value('nama', $row->nama),
		'kelas' => set_value('kelas', $row->kelas),
		'jurusan' => set_value('jurusan', $row->jurusan),
		'angkatan' => set_value('angkatan', $row->angkatan),
		'alamat' => set_value('alamat', $row->alamat),
	    );
            $this->template->load('template','anggota/tbl_anggota_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_anggota', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'jurusan' => $this->input->post('jurusan',TRUE),
		'angkatan' => $this->input->post('angkatan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Anggota_model->update($this->input->post('id_anggota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('anggota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $this->Anggota_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('anggota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
	$this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required');
	$this->form_validation->set_rules('angkatan', 'angkatan', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

	$this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-19 20:56:20 */
/* http://harviacode.com */