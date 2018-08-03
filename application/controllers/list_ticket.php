<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_ticket extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('model_app');

    }




 function index()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/list_ticket";
        $akses = $this->db->query("SELECT A.id AS 'nik',
                                          A.name AS 'account_name', 
                                          B.name AS 'name_position', 
                                          C.name AS 'name_division', 
                                          C.id AS 'id_division'
                                    FROM qu_m_employ A 
                                    LEFT JOIN qu_m_employ_position B ON B.id = A.id_position
                                    LEFT JOIN qu_m_employ_division C ON C.id = B.id_division   
                                    WHERE A.id='201400534'");

        if($akses->num_rows() == 1)
        {
        
        foreach($akses->result_array() as $account_data)
        {
    
        $session['id_user'] = $account_data['nik'];
        $session['employe_name'] = $account_data['account_name'];
        $session['id_division'] = $account_data['id_division'];
        $session['division'] = $account_data['name_division'];
        $session['position'] = $account_data['name_position'];
        $this->session->set_userdata($session);
        }
        
        }
        else
        {
        $this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> NIK NOT FOUND !
                    </div>");
        redirect('login');
        }
        $id_division = $this->session->userdata('id_division');
        $datalist_ticket = $this->model_app->datalist_ticket($id_division);
        $data['datalist_ticket'] = $datalist_ticket;
        $this->load->view('template', $data);
 }


 function pilih_teknisi($id)
 {
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar2";
        $data['body'] = "body/pilih_teknisi";

        // $id_dept = trim($this->session->userdata('id_dept'));
        // $id_user = trim($this->session->userdata('id_user'));

        // //notification 

        // $sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 2";
        // $row_listticket = $this->db->query($sql_listticket)->row();

        // $data['notif_list_ticket'] = $row_listticket->jml_list_ticket;

        // $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A 
        // LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
        // LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        // LEFT JOIN karyawan D ON D.nik = A.reported 
        // LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
        // $row_approvalticket = $this->db->query($sql_approvalticket)->row();

        // $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;

        // $sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3 AND id_teknisi='$id_user'";
        // $row_assignmentticket = $this->db->query($sql_assignmentticket)->row();

        // $data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

        // //end notification

        // $sql = "SELECT A.status, D.nama, C.id_kategori, A.id_ticket, A.tanggal, B.nama_sub_kategori, C.nama_kategori
        //         FROM ticket A 
        //         LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
        //         LEFT JOIN kategori C ON C.id_kategori = B.id_kategori 
        //         LEFT JOIN karyawan D ON D.nik = A.reported 
        //         WHERE A.id_ticket = '$id'";

        // $row = $this->db->query($sql)->row();

        // $id_kategori = $row->id_kategori;

        // $data['url'] = "list_ticket/assignment"; 

        // $data['dd_teknisi'] = $this->model_app->dropdown_teknisi($id_kategori);
        // $data['id_teknisi'] = "";
            
        // $data['id_ticket'] = $id;       
        // $data['tanggal'] = $row->tanggal;
        // $data['nama_sub_kategori'] = $row->nama_sub_kategori;
        // $data['nama_kategori'] = $row->nama_kategori;
        // $data['reported'] = $row->nama;
        
        $this->load->view('template', $data);

 }


 function assignment()
 {

    $id_ticket = strtoupper(trim($this->input->post('id_ticket')));
    $id_teknisi = strtoupper(trim($this->input->post('id_teknisi')));

    $id_user = trim($this->session->userdata('id_user'));
    date_default_timezone_set("Asia/Jakarta");
    $tanggal = $time = date("Y-m-d  H:i:s");

    $data['id_teknisi'] = $id_teknisi;
    $data['status'] = 3;
    

    $tracking['id_ticket'] = $id_ticket;
    $tracking['tanggal'] = $tanggal;
    $tracking['status'] = "Pemilihan Teknisi";
    $tracking['deskripsi'] = "TICKET DIBERIKAN KEPADA TEKNISI";
    $tracking['id_user'] = $id_user;

    $this->db->trans_start();

    $this->db->where('id_ticket', $id_ticket);
    $this->db->update('ticket', $data);

    $this->db->insert('tracking', $tracking);

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
                </div>");
                redirect('list_ticket/ticket_list'); 
            } else 
            {
                $this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
                </div>");
                redirect('list_ticket/ticket_list'); 
            }

 }

 function view_progress_teknisi($id)
 {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/progress_teknisi";

        // $id_dept = trim($this->session->userdata('id_dept'));
        // $id_user = trim($this->session->userdata('id_user'));

        // //notification 

        // $sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 2";
        //$row_listticket = $this->db->query($sql_listticket)->row();

        // $data['notif_list_ticket'] = $row_listticket->jml_list_ticket;

        // $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A 
        // LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
        // LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        // LEFT JOIN karyawan D ON D.nik = A.reported 
        // LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
        // $row_approvalticket = $this->db->query($sql_approvalticket)->row();

        // $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;

        // $sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3 AND id_teknisi='$id_user'";
        // $row_assignmentticket = $this->db->query($sql_assignmentticket)->row();

        // $data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

        // //end notification

        //  $sql = "SELECT A.status, A.progress, A.tanggal,  A.tanggal_proses, A.tanggal_solved, F.nama AS nama_teknisi, D.nama, C.id_kategori, A.id_ticket, A.tanggal, B.nama_sub_kategori, C.nama_kategori
        //         FROM ticket A 
        //         LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
        //         LEFT JOIN kategori C ON C.id_kategori = B.id_kategori 
        //         LEFT JOIN karyawan D ON D.nik = A.reported 
        //         LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
        //         LEFT JOIN karyawan F ON F.nik = E.nik 
        //         WHERE A.id_ticket = '$id'";

        $sql = "SELECT A.title AS 'subject',
                       A.create_date AS 'date',
                       A.description AS 'description',
                       A.status AS 'status',
                       B.comment AS 'comment',
                       C.file AS 'file',
                       D.name AS 'reported'
                FROM hd_ticket A
                LEFT JOIN hd_ticket_comment B ON B.id_ticket = A.id_ticket
                LEFT JOIN hd_ticket_files C ON C.id_ticket = A.id_ticket
                LEFT JOIN qu_m_employ D ON D.id = A.create_by
                WHERE A.id_ticket = '$id'

               ";

        $row = $this->db->query($sql)->row();

        // $id_kategori = $row->id_kategori;

        // $data['dd_teknisi'] = $this->model_app->dropdown_teknisi($id_kategori);
        // $data['id_teknisi'] = "";
            
        $data['id_ticket'] = $id;
        $data['create_by'] = $row->reported;  
        $data['subject'] = $row->subject;       
        $data['tanggal'] = $row->date;
        $data['description'] = $row->description;
        $data['files'] = $row->file;
        $data['url'] = "list_ticket/update_progress_teknisi";
        // $data['nama_kategori'] = $row->nama_kategori;
        // $data['reported'] = $row->nama;
        // $data['progress'] = $row->progress;
        // $data['tanggal_proses'] = $row->tanggal_proses;
        // $data['tanggal'] = $row->tanggal;
        // $data['tanggal_solved'] = $row->tanggal_solved;
        $data['dd_status'] = $this->model_app->dropdown_status();
		$data['id_status'] = "";
        // //TRACKING TICKET
        $data_trackingticket = $this->model_app->data_trackingticket($id);
        $data['data_trackingticket'] = $data_trackingticket;

        
        $this->load->view('template', $data);

 }
 
 function update_progress_teknisi(){
    $id_user = trim($this->session->userdata('id_user'));
    $ticket = strtoupper(trim($this->input->post('id_ticket')));
    $status = strtoupper(trim($this->input->post('id_status')));
    $comment = trim($this->input->post('deskripsi_progress'));
	date_default_timezone_set("Asia/Jakarta");
    $tanggal = $time = date("Y-m-d H:i:s");
    
    $data['status'] = $status;
    $tracking['id_ticket'] = $ticket;
    $tracking['create_by'] = $id_user;
    $tracking['create_date'] = $tanggal;
    $tracking['comment'] = $comment;

    $this->db->trans_start();

    $this->db->where('id_ticket', $ticket);
    $this->db->update('hd_ticket',$data);

    $this->db->insert('hd_ticket_comment',$tracking);
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
            {
               
                redirect('/'); 
            } else 
            {
                
                redirect('/'); 
            }
 }

 public function pdflistticket()
    {
    
    $datalist_ticket = $this->model_app->datalist_ticket();
    $data['datalist_ticket'] = $datalist_ticket;
    
    
    ob_start();
        $content = $this->load->view('body/pdflistticket',$data);
        $content = ob_get_clean();      
        $this->load->library('html2pdf');
        try
        {
            $html2pdf = new HTML2PDF('L', 'A4', 'en');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('Report_.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    
    }
    
}
