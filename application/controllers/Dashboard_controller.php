<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {

public function index() {
$title['title'] = "Administrator";
$this->load->view('templates/header', $title);
$this->load->view('templates/menu', $title);
$this->template->load('templates/sidebar','templates/admin/index', $title);
$this->load->view('templates/footer');
}
}