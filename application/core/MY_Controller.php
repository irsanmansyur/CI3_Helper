<?php
class MY_Controller extends CI_Controller
{
  public function __contruct()
  {
    parent::__construct();
    $this->load->library("session");
    date_default_timezone_set('Asia/Jakarta');
    $this->load->helper("route_helper");
  }
}
class Admin_Controller extends MY_Controller
{
  public function __construct()
  {
    parent::__contruct();
    $this->__cek_login();
    $this->load->helper("admin_helper");
  }
  private function __cek_login()
  {
    $username = $this->session->userdata('username');
    $user = $this->db->get_where('tbl_admin', array('username' => $username))->row();

    if (!$username || !$user) {
      $this->session->sess_destroy();
      return redirect(route("login"), "refresh");
    }
    $this->session->set_userdata("user", $user);
  }
}
