<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Homepage_m');
	}

    function index()
    {
        $data['anggota'] =  $this->Homepage_m->get_all_angt();
        $this->load->view('homepage_v',$data);
    }

    function action(){

        if ($this->input->post('data_action')) {
            $data_action = $this->input->post('data_action');

            if ($data_action == 'fetch_tentang_kami') {
                $api_url = base_url()."rest/Homepage_Api";
                $client = curl_init($api_url);
                curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($client);
                curl_close($client);
                $result = json_decode($response);
                //echo $client;
                
                $output = '';

                if (count($result) > 0) {
                    foreach ($result as $row) {
                        $output .= '
                        <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="'.$row->profile_img_url.'" alt="..." />
                            <h4>'.$row->nama.'</h4>
                            <p class="text-muted">'.$row->jabatan.'</p>                   
                        </div>
                    </div>
                        ';
                    }
                } else {
                    $output .= '
                    <tr>
                        <td colspan="6" align="center">Data tidak ditemukan</td>
                    </tr>
                    ';
                }
                echo $output;
            }

            if($data_action == "insert_berita")
			{
				$api_url = base_url()."rest/Homepage_Api/insert_berita";
			

				$form_data = array(
					'title_berita'			=>	$this->input->post('title_berita'),
                    'subtitle_berita'		=>	$this->input->post('subtitle_berita'),
                    'id_angt'				=>	$this->input->post('id_angt'),
                    'isi_berita'			=>	$this->input->post('isi_berita'),	
             
				);

				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;

			}

            if ($data_action == 'fetch_berita') {
                $api_url = base_url()."rest/Homepage_Api/fetch_berita";
                $client = curl_init($api_url);
                curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($client);
                curl_close($client);
                $result = json_decode($response);
                //echo $client;
                
                $output = '';

                if (count($result) > 0) {
                    foreach ($result as $row) {
                        $output .= '
                        <li class="slider"  style="width:calc(100%/'.count($result).')">
                            <h3 class="container-fluid">'.$row->title_berita.'</h3>
                            <span>'.date("d/m/Y H:i", strtotime($row->tgl_berita)).' oleh '.$row->nama.'</span>   
                            
                            <p class="container text-justify"><br/>
                                '.mb_strimwidth($row->isi_berita, 0, 500, "  . . . ").'
                                <button type="text" name="detail_berita" class="btn btn btn-link btn-sm detail_berita" value='.$row->id_berita.'>Baca Selengkapnya</button>
                            <br/></p>
                            

                            <br/>
                            <h6>Sumber :</h6>
                            <a href="'.$row->subtitle_berita.'" target="_blank"><p class="text-center">'.$row->subtitle_berita.'</p></a>
                            <br/>
                            <button type="button" name="add_berita" class="btn btn-info btn-sm add_berita" ><i class = "fa fa-plus"></i></button>
                            <button type="button" name="edit_berita" class="btn btn-warning btn-sm mx-2 edit_berita" value='.$row->id_berita.'><i class="fa fa-edit"></i></button>
                            <button type="button" name="delete_berita" class="btn btn-danger btn-sm delete_berita" value='.$row->id_berita.'><i class="fa fa-trash"></i></button> 

                        </li>
                        ';
                    }
                } else {
                    $output .= '
                    <tr>
                        <td colspan="6" align="center">Data tidak ditemukan</td>
                    </tr>
                    ';
                }
                echo $output;
            }

            if($data_action == "fetch_single_berita")
            {
                $api_url = base_url()."rest/Homepage_Api/fetch_single_berita";

                $form_data = array(
                    'id_berita' => $this->input->post('id_berita')
                );

                $client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;

            }

            if($data_action == "fetch_detail_berita")
            {
                $api_url = base_url()."rest/Homepage_Api/fetch_single_berita";

                $form_data = array(
                    'id_berita' => $this->input->post('id_berita')
                );

                $client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				$result = json_decode($response);

                $output = '
                    <h3 class="container-fluid">'.$result->title_berita.'</h3>
                    <span>'.date("d/m/Y H:i", strtotime($result->tgl_berita)).' oleh '.$result->nama.'</span>   
                    <br/>
                    <br/>
                    <img class="img-fluid max-width" src="'.$result->image.'" alt="..." />
                    <br/>
                    <p class="container text-justify">
                    <br/>'.$result->isi_berita.'<br/>
                    </p>                 

                    <br/>
                    <h6>Sumber :</h6>
                    <a href="'.$result->subtitle_berita.'" target="_blank"><p class="text-center">'.$result->subtitle_berita.'</p></a>
                    <br/>
                    ';
                
                echo $output;
            }

            

            if($data_action == "edit_berita")
            {
                $api_url = base_url()."rest/Homepage_Api/update_berita";

                $form_data = array(
                    'id_berita'		    =>	$this->input->post('id_berita'),
                    'title_berita'		        =>	$this->input->post('title_berita'),
                    'subtitle_berita'		    =>	$this->input->post('subtitle_berita'),
                    'id_angt'         =>  $this->input->post('id_angt'),
                    'isi_berita'         =>  $this->input->post('isi_berita')

                );

                $client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;
            }

            if ($data_action == "delete_berita") 
            {
                $api_url = base_url()."rest/Homepage_Api/delete_berita";

                $form_data = array(
                    'id_berita' => $this->input->post('id_berita')
                );

                $client = curl_init($api_url);
				curl_setopt($client, CURLOPT_POST, true);
				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				echo $response;

            }
            
        }
    }
}

?>