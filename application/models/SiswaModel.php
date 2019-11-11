<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SiswaModel extends CI_Model {
	public function view(){
		return $this->db->get('siswa')->result();
	}
	
	public function view_by($nim){
		$this->db->where('nim', $nim);
		return $this->db->get('siswa')->row();
	}
	
	public function validation($mode){
		$this->load->library('form_validation'); 
		if($mode == "save")
			$this->form_validation->set_rules('input_nim', 'NIM', 'required|numeric|max_length[20]');
		
		$this->form_validation->set_rules('input_nama', 'Nama', 'required|max_length[50]');
		$this->form_validation->set_rules('input_jeniskelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('input_telp', 'telp', 'required|numeric|max_length[15]');
		$this->form_validation->set_rules('input_alamat', 'Alamat', 'required');
			
		if($this->form_validation->run())
			return TRUE;
		else
			return FALSE;
	}
	
	public function save(){
		$data = array(
			"nim" => $this->input->post('input_nim'),
			"nama" => $this->input->post('input_nama'),
			"jenis_kelamin" => $this->input->post('input_jeniskelamin'),
			"telp" => $this->input->post('input_telp'),
			"alamat" => $this->input->post('input_alamat')
		);
		
		$this->db->insert('siswa', $data);
	}

	public function edit($nim){
		$data = array(
			"nim" => $this->input->post('input_nim'),
			"nama" => $this->input->post('input_nama'),
			"jenis_kelamin" => $this->input->post('input_jeniskelamin'),
			"telp" => $this->input->post('input_telp'),
			"alamat" => $this->input->post('input_alamat')
		);
		
		$this->db->where('nim', $nim);
		$this->db->update('siswa', $data);
	}
	
	public function delete($nim){
		$this->db->where('nim', $nim);
		$this->db->delete('siswa');
	}
}
