<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

	
        public function __construct()	
        {
            parent::__construct();
           $this->load->database(); 
           $this->load->model('azam');
            $this->load->helper('url_helper');
        }
	public function index()
	{
             
		$this->load->view('index_land');
              
	}

  /*
  Actual searching function from the database.
  */

        public function search()
        {
               
               $search_term = $this->input->post('search_term'); // search_term from the search bar
               $this->db->Like('question', $search_term);
               //$this->db->Like('keywords',$search_term);

               $data['result'] = $this->db->get('info')->result_array();
               $data['search'] = $search_term; 
               $data['count'] = count($data['result']);
               $this->load->view('request',$data);
                unset($data);

              
        }
    public function azam()
    {
          $this->load->view('test.php');
    }
     
    public function service()
       {
             $get_message = $this->input->post('mess');
             $data['azam'] = $get_message;
             $data['result'] = $this->azam->data_service();
             $this->load->view('message.php',$data);
       }
}
?>
