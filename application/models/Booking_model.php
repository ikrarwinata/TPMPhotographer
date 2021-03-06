<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking_model extends CI_Model
{

    public $table = 'booking';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get total rows
    function data_tahunan()
    {
        $arrBulan = [];
        for ($i=0; $i < 12; $i++) {
            $s = strtotime("1" . date("-" . ($i + 1) . "-Y") . "00:00:00");
            $e = strtotime(date("t-" . ($i + 1) . "-Y") . "24:59:59");
            $arrBulan[$i] = (object) ['c' => $this->db->query("SELECT COUNT(id) AS c FROM booking WHERE tanggal BETWEEN $s AND $e")->row()->c];
        }
        return $arrBulan;
    }

    // get total rows
    function total_rows_booking()
    {
        $s = strtotime("1" . date("-1-Y") . "00:00:00");
        $e = strtotime(date("t-12-Y", strtotime("1-12-".date("Y H:i:s"))) . "24:59:59");
        return $this->db->query("SELECT COUNT(id) AS c FROM booking WHERE tanggal BETWEEN $s AND $e")->row()->c;
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
        $this->db->where($this->table.".".$this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('booking.id', $q);
	$this->db->or_like('id_produk', $q);
	$this->db->or_like('booking.username', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by("Status", "ASC  ");
        $this->db->like('booking.id', $q);
	$this->db->or_like('id_produk', $q);
	$this->db->or_like('booking.username', $q);
	$this->db->or_like('tanggal', $q);
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

/* End of file Booking_model.php */
/* Location: ./application/models/Booking_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-20 11:46:54 */
/* http://harviacode.com */