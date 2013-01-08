<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    public function index($msg = NULL){
	
	$data ['title'] =  "login";
	
		$data['msg'] = $msg;
        $this->load->view('loginview', $data);
		
    }

    public function process(){
        // Load the model
        $this->load->model('loginmodel');
        // Validate the user can login
        $result = $this->loginmodel->validate();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
			$msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index();
        }else{
            // If user did validate, 
            // Send them to members area
            redirect('home');
        }        
    }

}
?>