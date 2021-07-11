<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata("id") == NULL){
            redirect("Home");
        };
        $this->load->model('Produk_model');
        $this->load->model('Kategori_produk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/Produk/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Produk/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Produk/index';
            $config['first_url'] = base_url() . 'admin/Produk/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Produk_model->total_rows_produk($q);
        $produk = $this->Produk_model->get_limit_data_produk($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'produk_data' => $produk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten'=>'admin/produk/produk_list'
        );
        $this->load->view('admin/container', $data);
    }

    public function by_kategori($idk)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/Produk/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Produk/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Produk/index';
            $config['first_url'] = base_url() . 'admin/Produk/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Produk_model->total_rows_produk_kategori($idk, $q);
        $produk = $this->Produk_model->get_limit_data_produk_kategori($idk, $config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'produk_data' => $produk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten'=>'admin/produk/produk_list'
        );
        $this->load->view('admin/container', $data);
    }

    public function read($id) 
    {
        $row = $this->Produk_model->get_produk_by_id($id);

        if ($row) {
            $this->load->helper("default_helper");
            $data = array(
    		'produk_data' => $row,
    		'konten' => 'admin/produk/produk_read',
    	    );
            $this->load->view('admin/container', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/Produk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'title' => 'Tambah Produk',
            'action' => site_url('admin/Produk/create_action'),
    	    'id' => set_value('id'),
    	    'judul' => set_value('judul'),
            'kategori' => set_value('kategori'),
    	    'kategoris' => $this->Kategori_produk_model->get_all(),
    	    'harga' => set_value('harga'),
    	    'deskripsi' => set_value('deskripsi'),
            'konten' => 'admin/produk/produk_form',
	   );
        $this->load->view('admin/container', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $pid = $this->Produk_model->generate_id();

            $files = array_filter($_FILES['gambar']['name']); //Use something similar before processing files.
            // Count the number of uploaded files in array
            $total_count = count($_FILES['gambar']['name']);
            // Loop through every file
            for( $i=0 ; $i < $total_count ; $i++ ) {
               //The temp file path is obtained
               $tmpFilePath = $_FILES['gambar']['tmp_name'][$i];
               //A file path needs to be present
               if ($tmpFilePath != ""){
                  //Setup our new file path
                  $newFilePath = "./files/products/" . $_FILES['gambar']['name'][$i];
                  
                  //File is uploaded to temp dir
                  if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $safename = "./files/products/".date("dmYHis").$pid.$i.".".end((explode(".", $_FILES['gambar']['name'][$i])));
                    rename($newFilePath, $safename);
                    $this->Produk_model->insert_gambar(array('id_produk'=>$pid,'gambar'=>$safename));
                  }
               }
            }

            $data = array(
                'id' => $pid,
        		'judul' => $this->input->post('judul',TRUE),
        		'kategori' => $this->input->post('kategori',TRUE),
        		'harga' => $this->input->post('harga',TRUE),
        		'deskripsi' => $this->input->post('deskripsi',TRUE),
    	    );

            $this->Produk_model->insert($data);
            $this->session->set_flashdata('message', 'Paket produk berhasil ditambahkan');
            redirect(site_url('admin/Produk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'title' => 'Ubah Produk',
                'action' => site_url('admin/Produk/update_action'),
        		'id' => set_value('id', $row->id),
        		'judul' => set_value('judul', $row->judul),
        		'kategori' => set_value('kategori', $row->kategori),
        		'harga' => set_value('harga', $row->harga),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'kategoris' => $this->Kategori_produk_model->get_all(),
                'gambar' => $this->Produk_model->get_gambar($id),
                'konten' => 'admin/produk/produk_form',
           );
            $this->load->view('admin/container', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/Produk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $pid = $this->input->post('id', TRUE);

            if(isset($_FILES['gambar']['name'][0])){
                if($_FILES['gambar']['name'][0]!=NULL){
                    $files = array_filter($_FILES['gambar']['name']); //Use something similar before processing files.
                    $this->Produk_model->delete_gambar($pid);
                    // Count the number of uploaded files in array
                    $total_count = count($_FILES['gambar']['name']);
                    // Loop through every file
                    for( $i=0 ; $i < $total_count ; $i++ ) {
                       //The temp file path is obtained
                       $tmpFilePath = $_FILES['gambar']['tmp_name'][$i];
                       //A file path needs to be present
                       if ($tmpFilePath != ""){
                          //Setup our new file path
                          $newFilePath = "./files/products/" . $_FILES['gambar']['name'][$i];
                          
                          //File is uploaded to temp dir
                          if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                            $safename = "./files/products/".date("dmYHis").$pid.$i.".".end((explode(".", $_FILES['gambar']['name'][$i])));
                            rename($newFilePath, $safename);
                            $this->Produk_model->insert_gambar(array('id_produk'=>$pid,'gambar'=>$safename));
                          }
                       }
                    }
                }
            }

            $data = array(
    		'judul' => $this->input->post('judul',TRUE),
    		'kategori' => $this->input->post('kategori',TRUE),
    		'harga' => $this->input->post('harga',TRUE),
    		'deskripsi' => $this->input->post('deskripsi',TRUE),
    	    );

            $this->Produk_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect(site_url('admin/Produk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $this->Produk_model->delete($id);
            $this->session->set_flashdata('message', 'Paket produk berhasil dihapus');
            redirect(site_url('admin/Produk'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/Produk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "produk.xls";
        $judul = "produk";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Kategori");
        xlsWriteLabel($tablehead, $kolomhead++, "Harga");
        xlsWriteLabel($tablehead, $kolomhead++, "Max");
        xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");

	foreach ($this->Produk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah_orang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=produk.doc");

        $data = array(
            'produk_data' => $this->Produk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('produk/produk_doc',$data);
    }

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-30 05:42:47 */
/* http://harviacode.com */