<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhari_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function tambah(){
		$data = array(
			'keterangan'=>$this->input->post('keterangan'),
			'referensi'=>$this->input->post('referensi'),
			'pendapatan'=>$this->input->post('pendapatan'),
			'pengeluaran'=>$this->input->post('pengeluaran'),
			'tgl_perhari'=>$this->input->post('tanggal'),
		);
		$this->db->insert('perhari', $data);
		return true;
	}
	public function tambah_modal(){
		$data = array(
			'modals'=>$this->input->post('modals'),
		);
		$this->db->where('id_modals', 1);
		$this->db->update('modals', $data);
		return true;
	}
	public function edit($id){
		$data = array(
			'keterangan'=>$this->input->post('keterangan'),
			'referensi'=>$this->input->post('referensi'),
			'pendapatan'=>$this->input->post('pendapatan'),
			'pengeluaran'=>$this->input->post('pengeluaran'),
			'tgl_perhari'=>$this->input->post('tanggal'),
		);
		$this->db->where('id_perhari', $id);
		$this->db->update('perhari', $data);
		return true;
	}
	public function show(){
		$this->db->order_by('tgl_perhari', 'DESC');
		$this->db->order_by('waktu', 'DESC');
		return $this->db->get('perhari')->result();
	}
	public function show_id($id){
		$this->db->where('id_perhari', $id);
		return $this->db->get('perhari')->row();
	}
	public function modals(){
		$this->db->where('id_modals', 1);
		return $this->db->get('modals')->row();
	}
	public function hapus($id){
		$this->db->where('id_perhari', $id);
		$this->db->delete('perhari');
		return true;
	}
	
}