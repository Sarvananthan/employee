<?php
class Databasemodels extends CI_Model {
	function __construct() {
		$this->load->database();
		parent::__construct();
	}
 function search ($firstname,$lastname,$department,$title){
 
 // result query
	$q = $this->db->select('employees.first_name AS firstname, employees.last_name AS lastname, titles.title AS jobtitle, departments.dept_name AS dept, departments.dept_no AS deptid')
			->select('IF(`dept_manager`.`emp_no` = `employees`.`emp_no`, 1, 0) AS ismanager', false)
			->from('employees')
			->join('dept_emp', 'dept_emp.emp_no = employees.emp_no')
			->join('departments', 'departments.dept_no = dept_emp.dept_no')
			->join('titles', 'titles.emp_no = employees.emp_no')
			->join('dept_manager', 'dept_manager.emp_no = dept_emp.emp_no','left')
			->where('titles.to_date', '9999-01-01')
			->where('dept_emp.to_date', '9999-01-01');
			if (!empty($firstname)) {
			$this->db->where('employees.first_name', $firstname);
			}
			if (!empty($lastname)) {
			$this->db->where('employees.last_name', $lastname);
			}
			if (!empty($department)) {
			$this->db->where('departments.dept_name', $department);
			}
			if (!empty($title)) {
			$this->db->where('titles.title', $title);
			}
		//count
		$result['rows'] = $q->get()->result();
		//$resultq['num_rows'] = $q->count_all_results();
		return $result;
	
 }

 
 public function add_employeedepartment($employeeid, $department){
 $fields = array (
		'emp_no' => $employeeid,
		'dept_no' => $department,
		'from_date' => date("Y-m-d"),
		'to_date' => '9999-01-01'
		);
		$this->db->set($fields); 
	
	$this->db->insert('dept_emp');
 }
 
  public function add_employeetitle($employeeid, $title){
  $fields = array (
	'emp_no' => $employeeid,
	'title' => $title,
	'from_date' => date("Y-m-d"),
	'to_date' => '9999-01-01'
		);
		$this->db->set($fields); 
	
	$this->db->insert('titles');
 
 }
  public function add_employeesalary($employeeid, $salary){
  $fields = array (
	'emp_no' => $employeeid,
	'salary' => $salary,
	'from_date' => date("Y-m-d"),
	'to_date' => '9999-01-01'
		);
		$this->db->set($fields); 
	
	$this->db->insert('salaries');
 
 }
 
public function add_employee($firstname, $lastname, $gender, $DOB, $department, $title, $salary){
	
	$fields = array (
		'first_name' => $firstname,
		'last_name' => $lastname,
		'gender' => $gender,
		'birth_date' => $DOB,
		'hire_date' => date("Y-m-d"),
				
					);
	
	
	
	$this->db->set($fields); 
	
	$this->db->insert('employees');

	$employeeid = $this->db->insert_id();
	
	$this->add_employeedepartment($employeeid, $department);
	$this->add_employeesalary($employeeid, $salary);
	$this->add_employeetitle($employeeid, $title);





}

public function delete_employee($employeeno){
$tables = array ('employees', 'dept_manager','dept_emp','titles','salaries');
		
		
		$this->db->where('emp_no', $employeeno); 
	
	$this->db->delete($tables);



}
      public function update($emp_no,$salary){
        
        $data = array(    // using array to update data in salaries table and storing into $data
        'emp_no' => $emp_no,
        'salary' => $salary
        );
       
       $this->db->where('emp_no',$emp_no);
       $this->db->update('salaries', $data); // updating in data in salaries table     
      
  } 
      public function title($emp_no,$title){
        
        $data = array(       // using array to update data in title table and storing into $data
        'emp_no' => $emp_no,
        'title' => $title
        );
       
       $this->db->where('emp_no',$emp_no);
       $this->db->update('titles', $data); // updating in data in salaries table     
      
  }
  
   public function promote($emp_no,$dept_no,$from_date,$to_date){
       
       // inserting data into department managers table    
       $this->db->set('emp_no',$emp_no);
       $this->db->set('dept_no',$dept_no);
       $this->db->set('from_date',$from_date);
       $this->db->set('to_date',$to_date);    
       
       $query = $this->db->insert('dept_manager'); // inserting data into the dept_manager table
       
   }
     public function demote($emp_no){
       
       $this->db->delete('dept_manager', array('emp_no' => $emp_no)); // deletes the array of employee number in dept_manager table
       
   }
 
}
