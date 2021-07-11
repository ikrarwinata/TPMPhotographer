<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata("id") == NULL){
            redirect("Home");
        };
        $this->load->model('News_model');
        $this->load->model('Kategori_produk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/News/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/News/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/News/index';
            $config['first_url'] = base_url() . 'admin/News/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->News_model->total_rows($q);
        $news = $this->News_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'news_data' => $news,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten'=>'admin/news/news_list'
        );
        $this->load->view('admin/container', $data);
    }

    public function read($id) 
    {
        $row = $this->News_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'judul' => $row->judul,
    		'content' => $row->konten,
    		'gambar' => $row->gambar,
    		'kategori' => $row->kategori,
            'konten'=>'admin/news/news_read'
	    );
            $this->load->view('admin/container', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/News'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'kategori'=>$this->Kategori_produk_model->get_all(),
            'action' => site_url('admin/News/create_action'),
    	    'id' => set_value('id'),
    	    'judul' => set_value('judul', '<h3>Judul...</h3>'),
    	    'content' => set_value('konten'),
    	    'gambar' => set_value('gambar'),
    	    'kategori' => set_value('kategori'),
            'konten' => 'admin/news/news_form'
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
            
            $config['upload_path']          = './files/misc';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2008;
            $config['max_width']            = 1366;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);

            if($this->upload->do_upload('gambar')){
                $udata = $this->upload->data();
                $g = strtotime("now");
                $foto = $config['upload_path']."/".$g.$this->input->post('id', TRUE).$udata["file_ext"];
                rename($udata["full_path"], $foto);

                $data = array(
                    'judul' => $this->input->post('judul',TRUE),
                    'konten' => $this->input->post('konten',TRUE),
                    'gambar' => $foto,
                    'kategori' => $this->input->post('kategori',TRUE),
                );
            }else{
                $data = array(
                    'judul' => $this->input->post('judul',TRUE),
                    'konten' => $this->input->post('konten',TRUE),
                    'kategori' => $this->input->post('kategori',TRUE),
                );
            }

            $this->News_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
            redirect(site_url('admin/News'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->News_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'kategori'=>$this->Kategori_produk_model->get_all(),
                'action' => site_url('admin/News/update_action'),
        		'id' => set_value('id', $row->id),
        		'judul' => set_value('judul', $row->judul),
        		'content' => set_value('konten', $row->konten),
        		'gambar' => set_value('gambar', $row->gambar),
        		'kategori' => set_value('kategori', $row->kategori),
                'konten' => 'admin/news/news_form'
        	    );
            $this->load->view('admin/container', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/News'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $this->load->helper(array('form', 'url'));
            
            $config['upload_path']          = './files/misc';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2008;
            $config['max_width']            = 1366;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);

            if($this->upload->do_upload('gambar')){
                $udata = $this->upload->data();
                $g = strtotime("now");
                $foto = $config['upload_path']."/".$g.$this->input->post('id', TRUE).$udata["file_ext"];
                rename($udata["full_path"], $foto);

                $data = array(
                    'judul' => $this->input->post('judul',TRUE),
                    'konten' => $this->input->post('konten',TRUE),
                    'gambar' => $foto,
                    'kategori' => $this->input->post('kategori',TRUE),
                );
            }else{
                $data = array(
                    'judul' => $this->input->post('judul',TRUE),
                    'konten' => $this->input->post('konten',TRUE),
                    'kategori' => $this->input->post('kategori',TRUE),
                );
            }
            

            $this->News_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil Diperbarui');
            redirect(site_url('admin/News'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->News_model->get_by_id($id);

        if ($row) {
            if(isset($row->gambar)){
                if ($row->gambar!=NULL) {
                    if (file_exists($row->gambar)) {
                        unlink($row->gambar);
                    }
                }
            }
            $this->News_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            redirect(site_url('admin/News'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/News'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('konten', 'konten', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "news.xls";
        $judul = "news";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Judul");
	xlsWriteLabel($tablehead, $kolomhead++, "Konten");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Kategori");

	foreach ($this->News_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->konten);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kategori);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=news.doc");

        $data = array(
            'news_data' => $this->News_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('news/news_doc',$data);
    }

}

/* End of file News.php */
/* Location: ./application/controllers/News.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-30 05:42:47 */
/* http://harviacode.com */