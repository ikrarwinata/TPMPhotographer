<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Booking_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/Booking/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Booking/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Booking/index';
            $config['first_url'] = base_url() . 'admin/Booking/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $this->Booking_model->db->join("users", "booking.username=users.username")->join("produk", "produk.id = booking.id_produk");
        $config['total_rows'] = $this->Booking_model->total_rows($q);
        $this->Booking_model->db->select("booking.*, produk.judul, users.nama, users.id AS nik, users.hp")->join("users", "booking.username=users.username")->join("produk", "produk.id = booking.id_produk");
        $booking = $this->Booking_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'booking_data' => $booking,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'admin/booking/booking_list'
        );
        $this->load->view('admin/container', $data);
    }

    public function read($id) 
    {
        $row = $this->Booking_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id' => $row->id,
            'id_produk' => $row->id_produk,
            'username' => $row->username,
            'tanggal' => $row->tanggal,
            'id_transaksi' => $row->id_transaksi,
            'konten' => 'admin/booking/booking_read'
        );
        $this->load->view('admin/container', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Admin/Booking'));
        }
    }

    public function accept($id)
    {
        $data = array("status" => "Diterima");
        $this->Booking_model->update($id, $data);
        redirect(site_url('Admin/Booking'));
    }

    public function delete($id)
    {
        $row = $this->Booking_model->get_by_id($id);

        if ($row) {
            $this->Booking_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/Booking'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/Booking'));
        }
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "booking.xls";
        $judul = "booking";
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
        xlsWriteLabel($tablehead, $kolomhead++, "#");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Produk");
        xlsWriteLabel($tablehead, $kolomhead++, "Username");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Pelanggan");
        xlsWriteLabel($tablehead, $kolomhead++, "HP");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Peserta");

        $this->Booking_model->db->select("booking.*, produk.judul, users.nama, users.id AS nik, users.hp")->join("users", "booking.username=users.username")->join("produk", "produk.id = booking.id_produk");
	    foreach ($this->Booking_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteLabel($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->judul);
            xlsWriteLabel($tablebody, $kolombody++, $data->username);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->hp);
            xlsWriteLabel($tablebody, $kolombody++, date("d M Y H:i", $data->tanggal));
            xlsWriteLabel($tablebody, $kolombody++, $data->jumlah_peserta);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=booking.doc");

        $data = array(
            'booking_data' => $this->Booking_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('booking/booking_doc',$data);
    }

    public function statistik(){
        $this->load->model('Booking_model');

        $data = array(
            'totalbooking' => $this->Booking_model->total_rows_booking(),
            'booking' => $this->Booking_model->data_tahunan(),
        );
        $this->load->view('admin/booking/statistik', $data);
    }

}

/* End of file Booking.php */
/* Location: ./application/controllers/Booking.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-20 11:46:54 */
/* http://harviacode.com */