<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('model_app');

        
    }

 function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('nik', $id);
 	$this->db->delete('karyawan');

 	$this->db->trans_complete();
	
 }

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
		$data['body'] = "body/form_ticket";

		$data['name'] = $this->session->userdata('employe_name');
		$data['id_user'] = $this->session->userdata('id_user');
		$data['position'] = $this->session->userdata('position');
		$data['division'] = $this->session->userdata('division');
		$data['dd_division'] = $this->model_app->dropdown_kategori();
		$data['id_division'] = "";
		$data['problem_summary'] = "";
		$data['problem_detail'] = "";

		$data['url'] = "ticket/save";

		$data['flag'] = "add";
    
        $this->load->view('template', $data);

 }

 function save()
 {
 	$getkodeticket = $this->model_app->getkodeticket();
	
	$ticket = $getkodeticket;

 	$id_user = strtoupper(trim($this->input->post('id_user')));
	date_default_timezone_set("Asia/Jakarta");
 	$tanggal = $time = date("Y-m-d H:i:s");

	$id_division = strtoupper(trim($this->input->post('id_division')));
	$problem_summary = strtoupper(trim($this->input->post('problem_summary')));
 	$problem_detail = strtoupper(trim($this->input->post('problem_detail')));
 	
	$data['id_ticket'] = $ticket;
	$data['title'] = $problem_summary;
	$data['id_division'] = $id_division;
 	$data['create_by'] = $id_user;
 	$data['create_date'] = $tanggal;
 	$data['description'] = $problem_detail;
 	$data['status'] = 1	;

 	$this->db->trans_start();

 	$this->db->insert('hd_ticket', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('myticket/myticket_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('myticket/myticket_list');		
			}
		
 }

 


    
}
