<?php
class M_cari extends CI_Model{
 
 function __construct(){
  parent::__construct();
 }
 function tampil(){
//$this->db->from('mahasiswa');
$query = $this->db->get('data_cottage');
return $query->result(); 
 }
 function caridata(){
$c = $this->input->POST ('cari');
$this->db->like('kode_cottage', $c);
$query = $this->db->get ('data_cottage');
return $query->result(); 
 }
 }