<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Peminjaman_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/peminjaman/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/peminjaman/index/';
            $config['first_url'] = base_url() . 'index.php/peminjaman/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Peminjaman_model->total_rows($q);
        $peminjaman = $this->Peminjaman_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'peminjaman_data' => $peminjaman,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','peminjaman/tbl_peminjaman_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Peminjaman_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_peminjaman' => $row->id_peminjaman,
		'tgl_pinjam' => $row->tgl_pinjam,
		'tgl_kembali' => $row->tgl_kembali,
		'id_petugas' => $row->id_petugas,
		'id_anggota' => $row->id_anggota,
		'id_buku' => $row->id_buku,
	    );
            $this->template->load('template','peminjaman/tbl_peminjaman_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('peminjaman/create_action'),
	    'id_peminjaman' => set_value('id_peminjaman'),
	    'tgl_pinjam' => set_value('tgl_pinjam'),
	    'tgl_kembali' => set_value('tgl_kembali'),
	    'id_petugas' => set_value('id_petugas'),
	    'id_anggota' => set_value('id_anggota'),
	    'id_buku' => set_value('id_buku'),
	);
        $this->template->load('template','peminjaman/tbl_peminjaman_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_pinjam' => $this->input->post('tgl_pinjam',TRUE),
		'tgl_kembali' => $this->input->post('tgl_kembali',TRUE),
		'id_petugas' => $this->input->post('id_petugas',TRUE),
		'id_anggota' => $this->input->post('id_anggota',TRUE),
		'id_buku' => $this->input->post('id_buku',TRUE),
	    );

            $this->Peminjaman_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('peminjaman'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Peminjaman_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('peminjaman/update_action'),
		'id_peminjaman' => set_value('id_peminjaman', $row->id_peminjaman),
		'tgl_pinjam' => set_value('tgl_pinjam', $row->tgl_pinjam),
		'tgl_kembali' => set_value('tgl_kembali', $row->tgl_kembali),
		'id_petugas' => set_value('id_petugas', $row->id_petugas),
		'id_anggota' => set_value('id_anggota', $row->id_anggota),
		'id_buku' => set_value('id_buku', $row->id_buku),
	    );
            $this->template->load('template','peminjaman/tbl_peminjaman_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_peminjaman', TRUE));
        } else {
            $data = array(
		'tgl_pinjam' => $this->input->post('tgl_pinjam',TRUE),
		'tgl_kembali' => $this->input->post('tgl_kembali',TRUE),
		'id_petugas' => $this->input->post('id_petugas',TRUE),
		'id_anggota' => $this->input->post('id_anggota',TRUE),
		'id_buku' => $this->input->post('id_buku',TRUE),
	    );

            $this->Peminjaman_model->update($this->input->post('id_peminjaman', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('peminjaman'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Peminjaman_model->get_by_id($id);

        if ($row) {
            $this->Peminjaman_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('peminjaman'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_pinjam', 'tgl pinjam', 'trim|required');
	$this->form_validation->set_rules('tgl_kembali', 'tgl kembali', 'trim|required');
	$this->form_validation->set_rules('id_petugas', 'id petugas', 'trim|required');
	$this->form_validation->set_rules('id_anggota', 'id anggota', 'trim|required');
	$this->form_validation->set_rules('id_buku', 'id buku', 'trim|required');

	$this->form_validation->set_rules('id_peminjaman', 'id_peminjaman', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Peminjaman.php */
/* Location: ./application/controllers/Peminjaman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-20 03:17:27 */
/* http://harviacode.com */