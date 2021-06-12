<?php
	class Homepage_m extends CI_Model{

        function __construct()
		{
			parent::__construct();
		}
        
        function fetch_tentang_kami(){

            $this->db->select('*');
			$this->db->from('t_anggota');
			$this->db->join('t_anggota_jabatan', 't_anggota_jabatan.id_jabatan = t_anggota.id_jabatan','inner');
			$query = $this->db->get();
			return $query;
        }

		function fetch_berita(){

			$this->db->select('*');
			$this->db->from('t_berita');
			$this->db->join('t_anggota', 't_anggota.id_angt = t_berita.id_angt','inner');
			$query = $this->db->get();
			return $query;
		}

		function insert_berita($data){
			$this->db->insert('t_berita', $data);

		}

		function update_berita($id,$data){
			$this->db->where('id_berita', $id);
			$this->db->update('t_berita',$data);
		}


		function fetch_single_berita($id){
			$this->db->select('*');
			$this->db->where('id_berita', $id);
			$this->db->from('t_berita');
			$this->db->join('t_anggota', 't_anggota.id_angt = t_berita.id_angt','inner');
			$query = $this->db->get();
			return $query->result_array();
		}

		function get_all_angt(){
			$query = $this->db->query('select id_angt, nama from t_anggota');			
			return $query->result();
		}

		function delete_berita($id)
		{
			$this->db->where('id_berita', $id);
			$this->db->delete('t_berita');
			if($this->db->affected_rows() > 0)
				{
					return true;
				}
			else
				{
					return false;
				}
		}

		

    }