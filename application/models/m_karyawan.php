<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_karyawan extends CI_Model 
{
  // Fungsi untuk menampilkan semua data siswa
    public function view()
    {
        return $this->db->get('ci_karyawan')->result();
    }

    public function view_row()
    {
      return $this->db->get('ci_karyawan')->result();
    }
  
  // Fungsi untuk menampilkan data siswa berdasarkan NIS nya
    public function view_by($k_id)
    {
        $this->db->where('k_id', $k_id);
        return 
        $this->db->get('ci_karyawan')->row();
    }
  
    // Fungsi untuk validasi form tambah dan ubah
    
    public function input()
    {
      $data = array('k_name' => $this->input->post('nama') , 
                  'k_induk'=> $this->input->post('induk'),
                  'k_alamat'=> $this->input->post('alamat'),
                  'k_dateadd'=> $this->input->post('dateadd'),
                  'k_status'=> $this->input->post('status'));
      return $this->db->insert('ci_karyawan',$data);
    }

    public function m_edit()
    {
      $this->db->select('*');
      $this->db->where('k_id',$this->uri->segment(3));
      return $this->db->get('ci_karyawan');
    }

    public function m_update()
    {
      $data = array(
      "k_name" => $this->input->post('nama'),
      "k_induk" => $this->input->post('induk'),
      "k_alamat" => $this->input->post('alamat'),
      "k_dateadd" => $this->input->post('dateadd'),
      "k_status" => $this->input->post('status'),
      );

      $this->db->where('k_id',$this->uri->segment(3));
      return $this->db->update('ci_karyawan',$data);
    }

    public function delete()
    {
      $this->db->where('k_id',$this->uri->segment(3));
      return $this->db->delete('ci_karyawan');

    }
}