<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengunjung_model extends CI_Model
{

    public $table = 'pengunjung';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    $this->db->or_like('ip', $q);
    $this->db->or_like('useragent', $q);
    $this->db->or_like('timestamps', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    // get total rows
    function total_rows_month($q = NULL) {
        $y = date("Y");
        $m = date("m");
        $sq = $q!=NULL?"AND (ip LIKE '%$Q%' OR useragent LIKE '%$Q%' OR timestamps LIKE '%$Q%')":NULL;

        return $this->db->query("SELECT COUNT(id) AS c FROM pengunjung WHERE (tahun = $y AND bulan = $m)$sq")->row()->c;
    }
    
    // get total rows
    function total_rows_year($q = NULL) {
        $y = date("Y");
        $m = date("m");
        $sq = $q!=NULL?"AND (ip LIKE '%$Q%' OR useragent LIKE '%$Q%' OR timestamps LIKE '%$Q%')":NULL;

        return $this->db->query("SELECT COUNT(id) AS c FROM pengunjung WHERE (tahun = $y)$sq")->row()->c;
    }
    
    // get total rows
    function this_month($limit, $start = 0, $q = NULL) {
        $y = date("Y");
        $m = date("m");
        $sq = $q!=NULL?"AND (ip LIKE '%$Q%' OR useragent LIKE '%$Q%' OR timestamps LIKE '%$Q%')":NULL;

        return $this->db->query("SELECT * FROM pengunjung WHERE (tahun = $y AND bulan = $m)$sq LIMIT $limit OFFSET $start")->result();
    }
    
    // get total rows
    function this_year($limit, $start = 0, $q = NULL) {
        $y = date("Y");
        $m = date("m");
        $sq = $q!=NULL?"AND (ip LIKE '%$Q%' OR useragent LIKE '%$Q%' OR timestamps LIKE '%$Q%')":NULL;

        return $this->db->query("SELECT * FROM pengunjung WHERE (tahun = $y)$sq LIMIT $limit OFFSET $start")->result();
    }
    
    // get total rows
    function total_rows_pengunjung() {
        return $this->db->query("SELECT COUNT(id) AS c FROM pengunjung WHERE tahun = ".date('Y'))->row()->c;
    }
    
    // get total rows
    function data_tahunan() {
        $y = date('Y');
        return $this->db->query("SELECT COUNT(id) AS c FROM pengunjung WHERE tahun = $y GROUP BY bulan ORDER BY bulan ASC")->result();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('ip', $q);
	$this->db->or_like('useragent', $q);
	$this->db->or_like('timestamps', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Pengunjung_model.php */
/* Location: ./application/models/Pengunjung_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-30 05:42:47 */
/* http://harviacode.com */