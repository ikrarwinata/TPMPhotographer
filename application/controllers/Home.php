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
		
	}
	
	public function index()
	{		
		if ($this->session->userdata('ipsaved')!=TRUE) {
			$this->load->library('user_agent');
			$this->load->model('Pengunjung_model');

			$agent = $this->agent->platform().", ";
			if ($this->agent->is_browser())
			{
			        $agent .= $this->agent->browser().' '.$this->agent->version();
			}
			elseif ($this->agent->is_robot())
			{
			        $agent .= $this->agent->robot();
			}
			elseif ($this->agent->is_mobile())
			{
			        $agent .= $this->agent->mobile();
			}
			else
			{
			        $agent = 'Unidentified User Agent';
			}

			$ip = $this->input->ip_address();

			$ip_data["ip"] = $ip;
			$ip_data["ipsaved"] = TRUE;
			$this->session->set_userdata($ip_data);

			$date = new DateTime();
			$s = array(
				'ip'=>$ip,
				'useragent'=>$agent,
				'tahun'=>date("Y"),
				'bulan'=>date("m"),
				'timestamps'=>$date->getTimestamp()
			);
			$this->Pengunjung_model->insert($s);
		}

		$this->load->model('News_model');
		$this->load->model('Produk_model');
		$this->load->model('Gallery_model');
		$this->load->helper('default_helper');

        $config['per_page'] = 6;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Produk_model->total_rows_produk();
        $produk = $this->Produk_model->get_limit_data_produk($config['per_page'], 0);

		$data = array(
			'konten'=>'home',
            'produk_data' => $produk,
			'news'=>$this->News_model->get_all(),
			'gallery'=>$this->Gallery_model->get_limit_data_gallery(),
			'judul' => "Beranda"
		);
		$this->load->view('container', $data);
	}

	public function gallery(){
		$this->load->model('Gallery_model');
		$this->load->helper('default_helper');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/Gallery/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Gallery/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Gallery/index';
            $config['first_url'] = base_url() . 'admin/Gallery/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Gallery_model->total_rows($q);
        $gallery = $this->Gallery_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'gallery' => $gallery,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
			'judul' => "Gallery",
			'konten'=>'gallery'
		);
		$this->load->view('container', $data);
	}

	public function help()
	{
		$data = array(
			'judul' => "Bantuan",
			'konten' => 'help'
		);
		$this->load->view('container', $data);
	}

	public function about()
	{
		$data = array(
			'judul' => "Tentang Kami",
			'konten' => 'about'
		);
		$this->load->view('container', $data);
	}

	public function product(){
        $this->load->model('Produk_model');
        $this->load->model('Kategori_produk_model');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));


        if ($q <> '') {
            $config['base_url'] = base_url() . 'Home/product?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Home/product?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Home/product';
            $config['first_url'] = base_url() . 'Home/product';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Produk_model->total_rows_produk($q);
        $produk = $this->Produk_model->get_limit_data_produk($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

		$data = array(
			'konten'=>'products',
			'judul' => "Produk",
            'produk_data' => $produk,
            'kategori_data' => $this->Kategori_produk_model->get_all(),
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
		);
		$this->load->view('container', $data);		
	}

	public function product_detail($id){
        $this->load->helper('default_helper');
        $this->load->model('Produk_model');
        $this->load->model('Kategori_produk_model');
        $p = $this->Produk_model->get_by_id($id);

		$data = array(
			'konten'=>'products_detail',
			'judul' => "Detail Produk",
			'kategori'=>$this->Kategori_produk_model->get_id($p->kategori),
            'produk_data' => $p,
            'gambar_data' => $this->Produk_model->get_gambar($id),
		);
		$this->load->view('container', $data);		
	}

	public function kategori($idk){
        $this->load->model('Produk_model');
        $this->load->model('Kategori_produk_model');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));


        if ($q <> '') {
            $config['base_url'] = base_url() . 'Home/kategori?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Home/kategori?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Home/kategori';
            $config['first_url'] = base_url() . 'Home/kategori';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Produk_model->total_rows_produk_kategori($idk, $q);
        $produk = $this->Produk_model->get_limit_data_produk_kategori($idk, $config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

		$data = array(
			'konten'=>'products',
			'judul' => "Produk",
            'produk_data' => $produk,
            'kategori' => $this->Kategori_produk_model->get_by_id($idk)->kategori,
            'kategori_data' => $this->Kategori_produk_model->get_all(),
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
		);
		$this->load->view('container', $data);
	}

	public function register()
	{
		$this->load->library('form_validation');

		$data = array(
			'username' => set_value('username'),
			'password' => set_value('password'),
			'id' => set_value('nik'),
			'nama' => set_value('nama'),
			'tempat_lahir' => set_value('tempat_lahir'),
			'tanggal_lahir' => set_value('tanggal_lahir'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'hp' => set_value('hp'),
			'alamat' => set_value('alamat'),
			'konten' => 'register',
			'judul' => "Daftar Akun",
		);
		$this->load->view('container', $data);
	}

	public function profil()
	{
		$this->load->library('form_validation');
		$this->load->helper('default_helper');
		$this->load->model("Users_model");
		
		$row = $this->Users_model->get_by_id($this->session->userdata("id"));
		$d = format_date($row->tanggallahir);
		$data = array(
			'username' => set_value('username', $row->username),
			'password' => set_value('password'),
			'id' => set_value('nik', $row->id),
			'nama' => set_value('nama', $row->nama),
			'tempat_lahir' => set_value('tempat_lahir', $row->tempatlahir),
			'tanggal_lahir' => set_value('tanggal_lahir', get_year($d)."-".get_month($d)."-".get_day($d)),
			'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
			'hp' => set_value('hp', $row->hp),
			'alamat' => set_value('alamat', $row->alamat),
			'konten' => 'profile',
			'judul' => "Ubah Profile",
		);
		$this->load->view('container', $data);
	}

	public function profile_action()
	{
		$this->load->model("Users_model");
		$this->load->helper("default_helper");

		$data = array(
			'nama' => $this->input->post('nama', TRUE),
			'tempatlahir' => $this->input->post('tempat_lahir', TRUE),
			'tanggallahir' => format_date($this->input->post('tanggal_lahir', TRUE)),
			'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
			'hp' => $this->input->post('hp', TRUE),
			'alamat' => $this->input->post('alamat', TRUE),
			'level' => "user",
		);
		if($this->input->post('password', TRUE) != NULL){
			$data["password"] = md5($this->input->post('password', TRUE));
		}
		$this->Users_model->update($this->session->userdata("id"), $data);

		$this->session->set_userdata($data);

		redirect("Home");
	}

	public function register_action()
	{
		$this->load->model("Users_model");
		$this->load->helper("default_helper");

		$checkID = $this->Users_model->db->where("id", $this->input->post('nik', TRUE))->from($this->Users_model->table)->count_all_results();
		$checkUsername = $this->Users_model->db->where("username", $this->input->post('username', TRUE))->from($this->Users_model->table)->count_all_results();

		$valid = TRUE;
		if($checkID >= 1){
			$this->session->set_flashdata('register_id', 'Nomor Identitas ini sudah digunakan !');
			$valid = FALSE;
		}else {
			$this->session->set_flashdata('register_id', "");
		}

		if ($checkUsername >= 1) {
			$this->session->set_flashdata('register_username', 'Username ini sudah digunakan ! silahkan gunakan username lain');
			$valid = FALSE;
		} else {
			$this->session->set_flashdata('register_username', "");
		}
		if(!$valid) {
			$this->register();
			return TRUE;
		}

		$data = array(
			'id' => $this->input->post('nik', TRUE),
			'username' => $this->input->post('username', TRUE),
			'password' => md5($this->input->post('password', TRUE)),
			'nama' => $this->input->post('nama', TRUE),
			'tempatlahir' => $this->input->post('tempat_lahir', TRUE),
			'tanggallahir' => format_date($this->input->post('tanggal_lahir', TRUE)),
			'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
			'hp' => $this->input->post('hp', TRUE),
			'alamat' => $this->input->post('alamat', TRUE),
			'level' => "user",
		);
		$this->Users_model->insert($data);

		$this->session->set_userdata($data);

		redirect("Home");
	}

	public function booking(){
		$this->load->model("Booking_model");

		$tanggal = $this->input->post("tanggal") . date(":s");
		$data = array(
			'id' => strtotime("now"),
			'id_produk' => $this->input->post("id"),
			'username' => $this->session->userdata("username"),
			'tanggal' => strtotime($tanggal),
		);

		$this->Booking_model->insert($data);
		redirect("Home/cart");
		return TRUE;
	}

	public function cart()
	{
		$this->load->helper("default_helper");
		$this->load->model("Booking_model");
		$this->load->library('form_validation');

		$belum_bayar = $this->Booking_model->db->select("produk.id AS id_produk, produk.judul, SUM(booking.uang_muka) AS DP, produk.harga, booking.id, booking.tanggal, booking.status, booking.bukti_pembayaran")->join("produk", "booking.id_produk=produk.id")->where("username", $this->session->userdata("username"))->group_by("booking.id")->get($this->Booking_model->table)->result();
		$data = array(
			'data_cart_belum_bayar' => $belum_bayar,
			'konten' => 'cart',
			'judul' => "Keranjang Saya",
		);
		$this->load->view('container', $data);
	}

	public function bayar($id){
		$id = urldecode($id);
		$n = $this->input->post("n");
		$config['upload_path']          = 'files/pembayaran/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['max_width']            = 13660;
		$config['max_height']           = 7680;

		$this->load->library('upload', $config);

		$data = array(
			'uang_muka' => $n
		);
		if ($this->upload->do_upload('b')) {
			$udata = $this->upload->data();
			$foto1 = $config["upload_path"] . "bb_" . strtotime("now") . $udata["file_ext"];
			rename($udata["full_path"], $foto1);
			$data["bukti_pembayaran"] = $foto1;
		}

		$this->load->model("Booking_model");
		$this->Booking_model->update($id, $data);
		redirect("Home/cart");
	}

	public function cart_remove($id)
	{
		$this->db->where("id", $id)->delete("booking");
		$this->cart();
		return TRUE;
	}

	public function login()
	{
		$u = $this->input->post("username");
		$p = $this->input->post("password");
		$this->load->model("Users_model");
		$akun_data = $this->Users_model->get_akun($u, $p);

		if ($akun_data) {
			$sess_data['username'] = $u;
			$sess_data['password'] = $p;
			$sess_data['id'] = $akun_data->id;
			$sess_data['nama'] = $akun_data->nama;
			$sess_data['level'] = $akun_data->level;
			$this->session->set_userdata($sess_data);

			switch ($akun_data->level) {
				case 'admin':
					redirect('admin/Home');
					break;
				default:
					redirect('Home');
					break;
			}
		} else {
			echo '<script type="text/javascript">alert("Username atau password yang anda masukan salah!");history.go(-1)</script>';
		}
	}

	public function logout()
	{
		$this->session->unset_userdata("username");
		$this->session->unset_userdata("password");
		$this->session->unset_userdata("id");
		$this->session->unset_userdata("nama");
		$this->session->unset_userdata("level");
		$this->session->sess_destroy();
		redirect("Home");
	}
}
