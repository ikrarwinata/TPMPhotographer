<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata("id") == NULL){
            redirect("Home");
        };
    }
    
	public function index()
	{
		$this->load->model('Pengunjung_model');
		$this->load->model('Booking_model');

		$booked = $this->Booking_model->db->where("status", "Sedang diproses")->from("booking")->count_all_results();

		$this->session->set_userdata("booked", $booked);

		$data = array(
			'konten'=>'admin/home',
			'totalpengunjung'=>$this->Pengunjung_model->total_rows_pengunjung(),
			'pengunjung'=>$this->Pengunjung_model->data_tahunan(),
			'totalbooking' => $this->Booking_model->total_rows_booking(),
			'booking' => $this->Booking_model->data_tahunan(),
		);
		$this->load->view('admin/container', $data);
	}
}
