<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage_Api extends CI_Controller{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Homepage_m');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

    function index()
	{
		$data = $this->Homepage_m->fetch_tentang_kami();
		echo json_encode($data->result_array());
	}

	function fetch_berita(){

		$data = $this->Homepage_m->fetch_berita();
		echo json_encode($data->result_array());
	}

	function insert_berita()
	{
		$this->form_validation->set_rules('title_berita', 'Title', 'required');
		$this->form_validation->set_rules('isi_berita', 'Content', 'required');

		if($this->form_validation->run())
		{
			$data = array(
				'title_berita'			=>	$this->input->post('title_berita'),
				'subtitle_berita'		=>	$this->input->post('subtitle_berita'),
				'id_angt'				=>	$this->input->post('id_angt'),
				'isi_berita'			=>	$this->input->post('isi_berita')
			);

			$this->Homepage_m->insert_berita($data);

			$array = array(
				'success'		=>	true
			);
		}
		else
		{
			$array = array(
				'error'					=>	true,
				'title_berita_error'	=>	form_error('title_berita'),
				'id_angt_error'			=>	form_error('id_angt'),
				'isi_berita_error'		=>	form_error('isi_berita')
			);
		}
		echo json_encode($array);		
	}
	
	function fetch_single_berita(){

		if($this -> input -> post('id_berita'))
		{
			$data = $this->Homepage_m->fetch_single_berita($this->input->post('id_berita'));
			foreach($data as $row)
			{
				$output["id_berita"] = $row["id_berita"];
				$output["title_berita"] = $row["title_berita"];
				$output["subtitle_berita"] = $row["subtitle_berita"];
				$output["id_angt"] = $row["id_angt"];
				$output["isi_berita"] = $row["isi_berita"];	
				$output["tgl_berita"] = $row["tgl_berita"];	
				$output["nama"] = $row["nama"];	
				$output["image"] = $row["image"];						
			}
			echo json_encode($output);			
		}
	}

	function update_berita()
	{
		$this->form_validation->set_rules('title_berita', 'Title','required');
		$this->form_validation->set_rules('isi_berita', 'Content','required');

		if($this->form_validation->run())
		{
			$data = array(
				'title_berita' =>  $this->input->post('title_berita'),
				'subtitle_berita' =>  $this->input->post('subtitle_berita'),
				'id_angt' =>  $this->input->post('id_angt'),
				'isi_berita' =>  $this->input->post('isi_berita')
			);

			$this->Homepage_m ->update_berita($this->input->post('id_berita'), $data);

			$array = array(
				'success' => true
			);
		}
		else
		{
			$array = array(
				'error' => true,
				'title_berita_error' => form_error("title_berita"),
				'isi_berita_error' => form_error("isi_berita")
			);
		}
		echo json_encode($array);
	}

	function delete_berita(){
		if($this -> input -> post('id_berita'))
		{
			if($this->Homepage_m->delete_berita($this->input->post('id_berita')))
			{
				$array = array(

					'success'	=>	true
				);
			}
			else
			{
				$array = array(
					'error'		=>	true
				);
			}
			echo json_encode($array);
		}
	}

	function _uploadImage()
	{
		$config['upload_path']          = 'assets/upload';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('user_form'))
		{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('upload_form', $error);
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());

				$this->load->view('upload_success', $data);
		}
	}
}