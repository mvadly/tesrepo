<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Model extends CI_Model{

    public function HapusCICO($where=''){
        return $this->db->query('truncate table data_cekin'.$where); 
    }
    public function HapusBOOK($where=''){
        return $this->db->query('truncate table data_booking'.$where); 
    }
    public function KosongKH($where=''){
        return $this->db->query('update data_kamar_hotel set status_h="0" where 1'.$where); 
    }
    public function KosongCT($where=''){
        return $this->db->query('update data_cottage set status="0" where 1'.$where); 
    }

    public function GetFakturCi($where=''){
        return $this->db->query('select * from data_cekin join data_tamu join data_cottage join detail_cekin join data_fasilitas on data_cekin.kode_sewa=detail_cekin.kode_sewa and detail_cekin.id_fasilitas=data_fasilitas.id_fasilitas and data_cekin.kode_tamu=data_tamu.kode_tamu and data_cekin.kode_cottage=data_cottage.kode_cottage '.$where); 
    }
    public function GetFakturCiKH($where=''){
        return $this->db->query('select * from data_cekin join data_tamu join data_kamar_hotel join detail_cekin join data_fasilitas on data_cekin.kode_sewa=detail_cekin.kode_sewa and detail_cekin.id_fasilitas=data_fasilitas.id_fasilitas and data_cekin.kode_tamu=data_tamu.kode_tamu and data_cekin.kode_kamar=data_kamar_hotel.kode_kamar '.$where); 
    }


    public function GetFasilitas($where = ''){
        return $this->db->query('select id_fasilitas,nama_fasilitas,harga, ket_fasilitas from data_fasilitas '.$where);
    }


    // Model Cottage
    public function GetDataCT($where = ''){
        return $this->db->query('select * from data_cottage '.$where);
    }

    public function GetDataCTJ($where = ''){
        return $this->db->query('select * from data_cottage  '.$where);
    }
    public function GetDataGambar($where = ''){
        return $this->db->query('select * from data_gambar '.$where);
    }
    public function GetDataCICT($where = ''){
        return $this->db->query('select * from data_cekin join data_cottage join data_tamu on data_cekin.kode_cottage=data_cottage.kode_cottage and data_cekin.kode_tamu=data_tamu.kode_tamu '.$where);
    }
     public function GetDataBCT($where = ''){
        return $this->db->query('select * from data_booking join data_cottage join data_tamu on data_booking.kode_cottage=data_cottage.kode_cottage and data_booking.kode_tamu=data_tamu.kode_tamu  '.$where);
    }

    // Model Hotel
    public function GetDataBH($where = ''){
        return $this->db->query('select * from data_booking join data_kamar_hotel join data_tamu on data_booking.kode_tamu=data_tamu.kode_tamu and  data_kamar_hotel.kode_kamar=data_booking.kode_kamar '.$where);
    }
    public function GetDataKH($where = ''){
        return $this->db->query('select * from data_kamar_hotel '.$where);
    }
    public function GetDataCIKH($where = ''){
        return $this->db->query('select * from data_cekin join data_kamar_hotel join data_tamu on  data_cekin.kode_tamu=data_tamu.kode_tamu and data_cekin.kode_kamar=data_kamar_hotel.kode_kamar '.$where);
    }

    public function GetTBH($where = ''){
        return $this->db->query('select * from data_booking join data_tamu  join data_kamar_hotel on data_booking.kode_tamu=data_tamu.kode_tamu &&  data_booking.kode_kamar=data_kamar_hotel.kode_kamar '.$where);
    }





    public function GetDataCSedia($where = ''){
        return $this->db->query('select * from data_cottage join data_gambar on data_cottage.id_gambar=data_gambar.id_gambar '.$where);
    }

    //Model
    public function GetDataTamu($where = ''){
        return $this->db->query('select * from data_tamu '.$where);
    }
    public function GetDataVilla($where = ''){
        return $this->db->query('select * from data_villa  '.$where);
    }
    public function GetDataCekin($where = ''){
        return $this->db->query('select * from data_cekin '.$where);
    }
    public function GetDataTB($where = ''){
        return $this->db->query('select * from data_booking '.$where);
    }
    public function GetDataVB($where = ''){
        return $this->db->query('select * from data_villa_booking '.$where);
    }
    public function GetDataCB($where = ''){
        return $this->db->query('select * from data_cekin_booking '.$where);
    }


    public function GetTBC($where = ''){
        return $this->db->query('select * from data_booking join data_tamu join data_cottage on data_booking.kode_tamu=data_tamu.kode_tamu && data_booking.kode_cottage=data_cottage.kode_cottage '.$where);
    }



    public function GetTCnow($where = ''){
        
        $t=date('Y-m-d');
        return $this->db->query('select *, data_tamu.kode_tamu, data_cottage.kode_cottage from data_cekin LEFT JOIN data_tamu 
                  ON data_cekin.kode_tamu = data_tamu.kode_tamu LEFT JOIN data_cottage ON data_cekin.kode_cottage = data_cottage.kode_cottage '.$where);
    }


    public function GetTCI($where = 'status'){
        $data = $this->db->query('select * from data_cekin where '.$where.'= "Check In"');
        return $data;
    }
    public function GetTCO($where = ''){
        $data = $this->db->query('select * from data_cekout order by tgl_cekout desc'.$where);
        return $data;
    }
    public function GetVT($where = 'status'){
        $data = $this->db->query('select * from data_villa join data_gambar on data_villa.id_gambar= data_gambar.id_gambar  where '.$where.'= "kosong" order by kode_villa asc');
        return $data;
    }


    public function GetUser($where = ''){
        return $this->db->query('select * from user '.$where);
    }

    public function LikeDtlp($like1,$like2,$like3,$like4){
        return $this->db->query("select *, pendanaan.pendanaan_name, years.years_name from laporan LEFT JOIN pendanaan 
                  ON laporan.pendanaan = pendanaan.code_pendanaan LEFT JOIN years ON laporan.tahun_penelitian = years.code_years WHERE 
                  kode_penelitian LIKE '%$like1%' and npj LIKE '%$like2%' and tahun_penelitian LIKE '%$like3%' and pendanaan LIKE '%$like4%'");
    }

    public function Simpan($table, $data){
        return $this->db->insert($table, $data);
    }

    public function Update($table,$data,$where){
        return $this->db->update($table,$data,$where);
    }

    public function Hapus($table,$where){
        return $this->db->delete($table,$where);
    }

    function get_allbarang($batas =null,$offset=null,$key=null) {
    $this->db->query('select * from data_cottage join data_gambar on data_cottage.id_gambar=data_gambar.id_gambar ');
    if($batas != null){
       $this->db->limit($batas,$offset);
    }
    if ($key != null) {
       $this->db->or_like($key);
    }
    $query = $this->db->get();
 
    //cek apakah ada barang
    if ($query->num_rows() > 0) {
        return $query->result();
    }
}

}
?>