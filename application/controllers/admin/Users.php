<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata("id") == NULL){
            redirect("Home");
        };
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->load->helper("default_helper");
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/Users/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Users/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Users/index';
            $config['first_url'] = base_url() . 'admin/Users/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $this->Users_model->db->where("level", "user");
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $this->Users_model->db->where("level", "user");
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten'=>'admin/users/users_list'
        );
        $this->load->view('admin/container', $data);
    }

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'username' => $row->username,
    		'password' => $row->password,
    		'id' => $row->id,
    		'nama' => $row->nama,
    		'tempatlahir' => $row->tempatlahir,
    		'tanggallahir' => $row->tanggallahir,
    		'jenis_kelamin' => $row->jenis_kelamin,
    		'hp' => $row->hp,
    		'alamat' => $row->alamat,
    		'level' => $row->level,
            'konten'=> 'admin/users/users_read'
    	    );
            $this->load->view('admin/container', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/Users'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('admin/Users/create_action'),
    	    'username' => set_value('username'),
    	    'password' => set_value('password'),
    	    'id' => set_value('id'),
    	    'nama' => set_value('nama'),
    	    'tempatlahir' => set_value('tempatlahir'),
    	    'tanggallahir' => set_value('tanggallahir'),
    	    'jenis_kelamin' => set_value('jenis_kelamin'),
            'hp' => set_value('hp'),
    	    'alamat' => set_value('alamat'),
            'level' => set_value('level'),
            'konten'=> 'admin/users/users_form'
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
            'id' => $this->input->post('newid',TRUE),
    		'username' => $this->input->post('username',TRUE),
    		'password' => md5($this->input->post('password',TRUE)),
    		'nama' => $this->input->post('nama',TRUE),
    		'tempatlahir' => $this->input->post('tempatlahir',TRUE),
    		'tanggallahir' => format_date($this->input->post('tanggallahir',TRUE)),
    		'jenis_kelamin' => format_date($this->input->post('jenis_kelamin',TRUE)),
            'hp' => format_date($this->input->post('hp', TRUE)),
    		'alamat' => $this->input->post('alamat',TRUE),
    		'level' => "admin",
    	    );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Akun berhasil ditambahkan');
            redirect(site_url('admin/Users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $t = format_date($row->tanggallahir);
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('admin/Users/update_action'),
        		'username' => set_value('username', $row->username),
        		'password' => set_value('password', $row->password),
        		'id' => set_value('id', $row->id),
        		'nama' => set_value('nama', $row->nama),
        		'tempatlahir' => set_value('tempatlahir', $row->tempatlahir),
        		'tanggallahir' => set_value('tanggallahir', get_month($t)."/".get_day($t)."/".get_year($t)),
        		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
                'hp' => set_value('hp', $row->hp),
        		'alamat' => set_value('alamat', $row->alamat),
                'level' => set_value('level', "admin"),
                'konten'=> 'admin/users/users_form'
           );
            $this->load->view('admin/container', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/Users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
            'id' => $this->input->post('newid',TRUE),
            'username' => $this->input->post('username',TRUE),
            'password' => md5($this->input->post('password',TRUE)),
            'nama' => $this->input->post('nama',TRUE),
            'tempatlahir' => $this->input->post('tempatlahir',TRUE),
            'tanggallahir' => format_date($this->input->post('tanggallahir',TRUE)),
            'jenis_kelamin' => format_date($this->input->post('jenis_kelamin',TRUE)),
            'hp' => format_date($this->input->post('hp', TRUE)),
            'alamat' => $this->input->post('alamat',TRUE),
                'level' => "admin",
            );

            $this->Users_model->update($this->input->post('id', TRUE), $data);

            if($this->session->userdata("id") == $this->input->post('id', TRUE)){                
                $sess_data['username'] = $this->input->post('username',TRUE);
                $sess_data['password'] = $this->input->post('password',TRUE);
                $sess_data['id'] = $this->input->post('newid',TRUE);
                $sess_data['nama'] = $this->input->post('nama',TRUE);
                $sess_data['level'] = "admin";

                $this->session->set_userdata($sess_data);
            }

            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect(site_url('admin/Users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Akun berhasil dihapus');
            redirect(site_url('admin/Users'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/Users'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('tempatlahir', 'tempatlahir', 'trim|required');
	$this->form_validation->set_rules('tanggallahir', 'tanggallahir', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required');
    $this->form_validation->set_rules('hp', 'hp', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('level', 'level', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "users.xls";
        $judul = "users";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Username");
    	xlsWriteLabel($tablehead, $kolomhead++, "Password");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tempatlahir");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggallahir");
    	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "Level");

	foreach ($this->Users_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->password);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->tempatlahir);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggallahir);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
            xlsWriteLabel($tablebody, $kolombody++, $data->level);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=users.doc");

        $data = array(
            'users_data' => $this->Users_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('users/users_doc',$data);
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-30 05:42:47 */
/* http://harviacode.com */