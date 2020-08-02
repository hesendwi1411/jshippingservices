<?php
class Events extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('M_events','m_events');
	}

	function index(){
		$x['events']=$this->m_events->get_all_events();
		$this->load->view('admin/v_event',$x);
	}

	function simpan_events(){
		$nama=htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES);
		$jadwal=htmlspecialchars($this->input->post('xjadwal',TRUE),ENT_QUOTES);
		$customer=htmlspecialchars($this->input->post('xcustomer',TRUE),ENT_QUOTES);
		$jenis=htmlspecialchars($this->input->post('xjenis',TRUE),ENT_QUOTES);
		$lokasi=htmlspecialchars($this->input->post('xlokasi',TRUE),ENT_QUOTES);
		
		$this->m_events->simpan_events($nama,$jadwal,$customer,$jenis,$lokasi);
		redirect('admin/events');
	}

	function update_events(){
		$kode=$this->input->post('xkode');
		$nama=htmlspecialchars($this->input->post('xnama2',TRUE),ENT_QUOTES);
		$jadwal=htmlspecialchars($this->input->post('xjadwal2',TRUE),ENT_QUOTES);
		$customer=htmlspecialchars($this->input->post('xcustomer2',TRUE),ENT_QUOTES);
		$jenis=htmlspecialchars($this->input->post('xjenis2',TRUE),ENT_QUOTES);
		$lokasi=htmlspecialchars($this->input->post('xlokasi2',TRUE),ENT_QUOTES);
		
		$this->m_events->update_events($kode,$nama,$jadwal,$customer,$jenis,$lokasi);
		redirect('admin/events');
	}

	function hapus_events(){
		$kode=$this->input->post('kode');
		$this->m_events->hapus_events($kode);
		redirect('admin/events');
	}
}