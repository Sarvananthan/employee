<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Hr extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
        $this->load->helper('form');
    }
    
    public function index(){
        // If the user is validated, then this function will run
       
         $data ['title'] =  "hr";
         
         $this->load->view ('hrhome',$data);
    }
    
    
    public function addprocess(){
     
     $this->load->library('form_validation');
     
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required'); 
        $this->form_validation->set_rules('gender', 'Gender', 'required');  
       // $this->form_validation->set_rules('gender', 'Gender', 'required'); 
        $this->form_validation->set_rules('DOB', 'D.O.B.', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('salary', 'Salary', 'required');
      
      
       if ($this->form_validation->run() == FALSE)
      {
         $this->add_employee();
      }
      else
      {
       $firstname=$this->input->post('firstname');
       $lastname= $this->input->post('lastname');
       $gender= $this->input->post('gender');
       $DOB= $this->input->post('DOB');
       $department= $this->input->post('department');
       $title= $this->input->post('title');
       $salary= $this->input->post('salary');
       
       
        $this->load->model('databasemodels');
        $this->databasemodels->add_employee($firstname, $lastname, $gender, $DOB, $department, $title, $salary);
        $this->load->view('addedemployee');
      }
      
     
     
     
     
     
     
     
      
      
    }
    
    public function add_employee(){
    
     $data ['title'] =  "Add Employee";
     $this->load->view('add_form',$data);
     
       
       
    }
    
    
    public function deleteprocess(){
     
     $this->load->library('form_validation');
     
      $this->form_validation->set_rules('employeeno', 'Employee No', 'required');
      
             if ($this->form_validation->run() == FALSE)
      {
         $this->delete_employee();
      }
      else
      {
       $employeeno=$this->input->post('employeeno');
       
       
     $this->load->model('databasemodels');
        $this->databasemodels->delete_employee($employeeno);
        $this->load->view('deleteemployee');
     
    }
                                   
     }         
    
    
    public function delete_employee(){
    
     $data ['title'] =  "Delete Employee";
     $this->load->view('delete_form',$data);
     
       
       
    } 
     public function update_post(){
       
       $this->load->view('update_view');  // opens the add update view
   }
   
    public function update_main(){
        // getting input value for employee number and salary from the fields
      $emp_no = $this->input->post('emp_no');
     $salary = $this->input->post('salary');
  
     
      $this->load->model('employee_model');
      $this->employee_model->update($emp_no,$salary);
      $this->load->view('success');  // opens the view if the query is succsessful
      
   } 
        public function title_post(){
       
       $this->load->view('title_view');  // opens the add title view
   }
       public function title_main(){
        // getting input value for employee number from the fields
      $emp_no = $this->input->post('emp_no');
      $title = $this->input->post('title');
      
      $this->load->model('employee_model');
      $this->employee_model->title($emp_no,$title);
      $this->load->view('success'); // opens the view if the query is succsessful
      
   } 
    public function promote_post(){
       
       $this->load->view('promote_view');         // opens the add promote view
       
   }
   
    public function promote_main(){
          // getting input value for employee details from the fields
      $emp_no = $this->input->post('emp_no');
      $dept_no = $this->input->post('dept_no');
      $from_date = $this->input->post('from_date');
      $to_date = $this->input->post('to_date');
      
      $this->load->model('employee_model');
      $this->employee_model->promote($emp_no,$dept_no,$from_date,$to_date);
      $this->load->view('success'); // opens the view if the query is succsessful
      
   }
   
    public function demote_post(){
       
       $this->load->view('demote_view');  // opens the add demote view
       
   }
   
    public function demote_main(){
           
        
      $this->load->model('employee_model');  // load the model
      $this->employee_model->demote($emp_no);   // this will check the model and demote employee number from database
      $this->load->view('success');   // opens the view if the query is succsessful
      
   }
             
    
    
    
    
    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
     public function do_logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
 }
 ?>