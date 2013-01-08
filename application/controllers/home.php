<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        
		
    }                 
    
    public function index(){
        // If the user is validated, then this function will run
       
		 $data ['title'] =  "home";
		 
		 $this->load->view ('hrhome',$data);
    }
    
    
 }
 ?>