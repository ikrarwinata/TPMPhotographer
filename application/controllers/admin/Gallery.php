<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata("id") == NULL){
            redirect("Home");
        };
        $this->load->model('Gallery_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
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
            'gallery_data' => $gallery,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten'=>'admin/gallery/gallery_list'
        );
        $this->load->view('admin/container', $data);
    }

    public function read($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'judul' => $row->judul,
    		'timestamps' => $row->timestamps,
    		'gambar' => $row->gambar,
            'konten'=>'admin/gallery/gallery_read'
    	    );
            $this->load->view('admin/container', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/Gallery'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'title' => 'Tambah Gallery',
            'action' => site_url('admin/Gallery/create_action'),
    	    'id' => set_value('id'),
    	    'judul' => set_value('judul'),
    	    'timestamps' => set_value('timestamps'),
    	    'gambar' => set_value('gambar'),
            'konten'=>'admin/gallery/gallery_form'
	);
        $this->load->view('admin/container', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->load->helper(array('form', 'url'));
            
            $config['upload_path']          = './files/gallery';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2008;
            $config['max_width']            = 13660;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            $g = strtotime("now");
            if($this->upload->do_upload('gambar')){
                $udata = $this->upload->data();
                $foto = $config['upload_path']."/".$g.$this->input->post('id', TRUE).$udata["file_ext"];
                rename($udata["full_path"], $foto);

                $data = array(
                'judul' => $this->input->post('judul',TRUE),
                'timestamps' => $g,
                'gambar' => $foto,
                );
            }else{
                $data = array(
                'judul' => $this->input->post('judul',TRUE),
                'timestamps' => $g,
                );
            }
            

            $this->Gallery_model->insert($data);
            $this->session->set_flashdata('message', 'Foto berhasil ditambahkan');
            redirect(site_url('admin/Gallery'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'title' => 'Ubah Gallery',
                'action' => site_url('admin/Gallery/update_action'),
        		'id' => set_value('id', $row->id),
        		'judul' => set_value('judul', $row->judul),
        		'timestamps' => set_value('timestamps', $row->timestamps),
        		'gambar' => set_value('gambar', $row->gambar),
                'konten'=>'admin/gallery/gallery_form'
            );
                $this->load->view('admin/container', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/Gallery'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {            
            $this->load->helper(array('form', 'url'));
            
            $config['upload_path']          = './files/gallery';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2008;
            $config['max_width']            = 13660;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            $g = strtotime("now");
            if($this->upload->do_upload('gambar')){
                $udata = $this->upload->data();
                $foto = $config['upload_path']."/".$g.$this->input->post('id', TRUE).$udata["file_ext"];
                rename($udata["full_path"], $foto);

                $data = array(
                'judul' => $this->input->post('judul',TRUE),
                'timestamps' => $g,
                'gambar' => $foto,
                );
            }else{
                $data = array(
                'judul' => $this->input->post('judul',TRUE),
                'timestamps' => $g,
                );
            }

            $this->Gallery_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Gallery berhasil diperbarui');
            redirect(site_url('admin/Gallery'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);

        if ($row) {
            if(isset($row->gambar)){
                if ($row->gambar!=NULL) {
                    if (file_exists($row->gambar)) {
                        unlink($row->gambar);
                    }
                }
            }
            $this->Gallery_model->delete($id);
            $this->session->set_flashdata('message', 'Foto berhasil dihapus');
            redirect(site_url('admin/Gallery'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/Gallery'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-30 05:42:47 */
/* http://harviacode.com */