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
		$data['dd_division'] = $this->model_app->dropdown_division();
		$data['id_division'] = "";
		$data['problem_summary'] = "";
		$data['problem_detail'] = "";

		$data['url'] = "ticket/save";

		$data['flag'] = "add";
    
        $this->load->view('template', $data);

 }

 function save()
 {
	//main
 	$getkodeticket = $this->model_app->getkodeticket();
	
	$ticket = $getkodeticket;

 	$id_user = strtoupper(trim($this->input->post('id_user')));
	date_default_timezone_set("Asia/Jakarta");
 	$tanggal = $time = date("Y-m-d H:i:s");

	$id_division = strtoupper(trim($this->input->post('id_division')));
	$problem_summary = strtoupper(trim($this->input->post('problem_summary')));
	$problem_detail = strtoupper(trim($this->input->post('problem_detail')));

	//upload

	$base_folder 	= FCPATH;
	$upload_folder	= $base_folder . "upload/";
	
	// upload file1
	$config["upload_path"] 		= $upload_folder;
	$config["allowed_types"]	= "*"; // all types
	$config["max_size"] 		= 10240; // 10MB


	$this->load->library("upload", $config);
	// important to multiple upload
	$this->upload->initialize($config);

	if(!$this->upload->do_upload("file1")){
		$err = $this->upload->display_errors();
		print_r($err);
	}else{
		$filedata = $this->upload->data();
		$filename1 = $filedata['file_name'];
	}

	// // upload file2
	// $config["upload_path"] 		= $upload_folder;
	// $config["allowed_types"]	= "*"; // all types
	// $config["max_size"] 		= 10240; // 10MB

	// if(!$this->upload->do_upload("file2")){
	// 	$err = $this->upload->display_errors();
	// 	print_r($err);
	// }else{

	// 	$filedata = $this->upload->data();
	// 	$filename2 = $filedata['file_name'];

	// }

	if($id_division==221)
    {
        $data['id_division'] = 200;
    }
    elseif($id_division==230)
    {
        $data['id_division'] = 200;
    }elseif($id_division == $id_division){
		$data['id_division'] = $id_division;
	}


	$data['id_ticket'] = $ticket;
	$data['title'] = $problem_summary;
 	$data['create_by'] = $id_user;
 	$data['create_date'] = $tanggal;
 	$data['description'] = $problem_detail;
 	$data['status'] = 1	;

 	$tracking['id_ticket'] = $ticket;
 	$tracking['create_date'] = $tanggal;
 	$tracking['comment'] = "Created Ticket";
	$tracking['create_by'] = $id_user;
	
	$upload['id_ticket'] = $ticket;
	$upload['file'] = $filename1;


 	$this->db->trans_start();
if($filename1== NULL){
	$this->db->insert('hd_ticket', $data);
	$this->db->insert('hd_ticket_comment', $tracking);
}else{
	$this->db->insert('hd_ticket', $data);
	$this->db->insert('hd_ticket_comment', $tracking);
	$this->db->insert('hd_ticket_files', $upload);
}
 	

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
