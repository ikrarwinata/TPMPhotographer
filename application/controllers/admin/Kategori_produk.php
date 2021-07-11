<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata("id") == NULL){
            redirect("Home");
        };
        $this->load->model('Kategori_produk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/Kategori_produk/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Kategori_produk/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Kategori_produk/index';
            $config['first_url'] = base_url() . 'admin/Kategori_produk/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kategori_produk_model->total_rows_produk($q);
        $kategori_produk = $this->Kategori_produk_model->get_limit_data_produk($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kategori_produk_data' => $kategori_produk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten'=>'admin/kategori_produk/kategori_produk_list'
        );
        $this->load->view('admin/container', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'kategori' => $this->input->post('kategori',TRUE),
    	    );

            $this->Kategori_produk_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil menambahkan kategori');
            redirect(site_url('admin/Kategori_produk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
    		'kategori' => $this->input->post('kategori',TRUE),
    	    );

            $this->Kategori_produk_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect(site_url('kategori_produk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategori_produk_model->get_by_id($id);

        if ($row) {
            $this->Kategori_produk_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            redirect(site_url('admin/Kategori_produk'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/Kategori_produk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kategori_produk.php */
/* Location: ./application/controllers/Kategori_produk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-30 05:42:47 */
/* http://harviacode.com */