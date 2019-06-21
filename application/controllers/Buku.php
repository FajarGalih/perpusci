<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Buku_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/buku/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/buku/index/';
            $config['first_url'] = base_url() . 'index.php/buku/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Buku_model->total_rows($q);
        $buku = $this->Buku_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'buku_data' => $buku,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','buku/tbl_buku_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Buku_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_buku' => $row->id_buku,
		'judul' => $row->judul,
		'penulis' => $row->penulis,
		'penerbit' => $row->penerbit,
		'tahun' => $row->tahun,
		'id_rak' => $row->id_rak,
	    );
            $this->template->load('template','buku/tbl_buku_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('buku/create_action'),
	    'id_buku' => set_value('id_buku'),
	    'judul' => set_value('judul'),
	    'penulis' => set_value('penulis'),
	    'penerbit' => set_value('penerbit'),
	    'tahun' => set_value('tahun'),
	    'id_rak' => set_value('id_rak'),
	);
        $this->template->load('template','buku/tbl_buku_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'penulis' => $this->input->post('penulis',TRUE),
		'penerbit' => $this->input->post('penerbit',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'id_rak' => $this->input->post('id_rak',TRUE),
	    );

            $this->Buku_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('buku'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Buku_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('buku/update_action'),
		'id_buku' => set_value('id_buku', $row->id_buku),
		'judul' => set_value('judul', $row->judul),
		'penulis' => set_value('penulis', $row->penulis),
		'penerbit' => set_value('penerbit', $row->penerbit),
		'tahun' => set_value('tahun', $row->tahun),
		'id_rak' => set_value('id_rak', $row->id_rak),
	    );
            $this->template->load('template','buku/tbl_buku_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_buku', TRUE));
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'penulis' => $this->input->post('penulis',TRUE),
		'penerbit' => $this->input->post('penerbit',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'id_rak' => $this->input->post('id_rak',TRUE),
	    );

            $this->Buku_model->update($this->input->post('id_buku', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('buku'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Buku_model->get_by_id($id);

        if ($row) {
            $this->Buku_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('buku'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('penulis', 'penulis', 'trim|required');
	$this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('id_rak', 'id rak', 'trim|required');

	$this->form_validation->set_rules('id_buku', 'id_buku', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-19 22:08:31 */
/* http://harviacode.com */