<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
  /**
   *
   */
class Email extends CI_Controller{
            function index(){
            $to=$email;
            $nama = 'Aing';
            $subjek = 'tes ung';
            $pesan = 'ketuktukan';
            // $url = $_SERVER['HTTP_REFERER'];
            $config = Array(
              'protocol' => 'smtp',
              'smtp_host' => 'ssl://smtp.googlemail.com',
              'smtp_port' => 465,
              'smtp_user' => 'mfadly24@gmail.com', //isi dengan gmailmu!
              'smtp_pass' => 'android2410', //isi dengan password gmailmu!
              'mailtype' => 'html',
              'charset' => 'iso-8859-1',
              'wordwrap' => TRUE
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('mfadly24@gmail.com');
            $this->email->to('caritaasri@gmail.com'); //email tujuan. Isikan dengan emailmu!
            $this->email->subject($subjek);
            $this->email->message($pesan);
                if($this->email->send()){
                  echo 'Email sent. <a href="#">KEMBALI</a>';
                }else{
                  show_error($this->email->print_debugger());
                }
            }   
    }
?>