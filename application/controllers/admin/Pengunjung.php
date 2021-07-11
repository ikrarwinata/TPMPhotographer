<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengunjung extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata("id") == NULL){
            redirect("Home");
        };
        $this->load->model('Pengunjung_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/Pengunjung/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Pengunjung/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Pengunjung/index';
            $config['first_url'] = base_url() . 'admin/Pengunjung/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pengunjung_model->total_rows($q);
        $pengunjung = $this->Pengunjung_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pengunjung_data' => $pengunjung,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten'=>'admin/pengunjung/pengunjung_list'
        );
        $this->load->view('admin/container', $data);
    }

    public function this_month()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/Pengunjung/this_month?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Pengunjung/this_month?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Pengunjung/this_month';
            $config['first_url'] = base_url() . 'admin/Pengunjung/this_month';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pengunjung_model->total_rows_month($q);
        $pengunjung = $this->Pengunjung_model->this_month($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->session->set_flashdata('message', 'Menampilkan Pengunjung Bulan ini');

        $data = array(
            'pengunjung_data' => $pengunjung,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten'=>'admin/pengunjung/pengunjung_list'
        );
        $this->load->view('admin/container', $data);
    }

    public function this_year()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/Pengunjung/this_year?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Pengunjung/this_year?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Pengunjung/this_year';
            $config['first_url'] = base_url() . 'admin/Pengunjung/this_year';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pengunjung_model->total_rows_year($q);
        $pengunjung = $this->Pengunjung_model->this_year($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->session->set_flashdata('message', 'Menampilkan Pengunjung Tahun ini');

        $data = array(
            'pengunjung_data' => $pengunjung,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten'=>'admin/pengunjung/pengunjung_list'
        );
        $this->load->view('admin/container', $data);
    }

    public function read($id) 
    {
        $row = $this->Pengunjung_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'ip' => $row->ip,
		'useragent' => $row->useragent,
		'timestamps' => $row->timestamps,
	    );
            $this->load->view('pengunjung/pengunjung_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengunjung'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pengunjung_model->get_by_id($id);

        if ($row) {
            $this->Pengunjung_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengunjung'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengunjung'));
        }
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pengunjung.xls";
        $judul = "pengunjung";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
    	xlsWriteLabel($tablehead, $kolomhead++, "Ip");
    	xlsWriteLabel($tablehead, $kolomhead++, "Useragent");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

	foreach ($this->Pengunjung_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->ip);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->useragent);
    	    xlsWriteLabel($tablebody, $kolombody++, date("d - m - Y", $data->timestamps));

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pengunjung.doc");

        $data = array(
            'pengunjung_data' => $this->Pengunjung_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('admin/pengunjung/pengunjung_doc',$data);
    }

}

/* End of file Pengunjung.php */
/* Location: ./application/controllers/Pengunjung.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-30 05:42:47 */
/* http://harviacode.com */