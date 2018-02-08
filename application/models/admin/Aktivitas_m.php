<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Aktivitas_m extends CI_Model
{
	public function select_data($tabel,$field,$id){
		$query = $this->db->get($tabel);
		return $query->result();
	}
	public function select_data_batch($tabel){
		$query = $this->db->get($tabel);
		return $query->result();
	}
	function insert_data($tabel,$data){
		$this->db->insert($tabel, $data);
	}
	public function delete_data($tabel,$field,$id){
		$this->db->where($field, $id);
		$this->db->delete($tabel);
	}
	public function update_data($tabel,$field,$id,$data){
		$this->db->where($field, $id);
		$this->db->update($tabel,$data);
	}
	// khusus
	public function detail_mahasiswa($id){
		$this->db->where('mahasiswa_pt.id',$id);
		$this->db->join('mahasiswa', 'mahasiswa.id_mhs_pt = mahasiswa_pt.id');
		$this->db->join('sms', 'sms.kode_prodi = mahasiswa_pt.kode_sms');
		$query = $this->db->get('mahasiswa_pt');
		return $query->row();
	}
	public function aktivitas_kuliah($id){
		$this->db->where('id_mhs_pt',$id);
		$this->db->order_by('id_smt','asc');
		$query = $this->db->get('kuliah_mahasiswa');
		return $query->result();
	}
}
