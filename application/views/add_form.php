<?php $this->load->view('header')?>

<?php echo validation_errors() ?>


<form action="<?php echo site_url('hr/addprocess');?>" method='post' name='process'>
            <h2>Add Employee</h2>
            <br />            
            <label for='firstname'>First Name</label>
            <input type='text' name='firstname' id='firstname'  /><br />
         
			<label for='lastname'>Last Name</label>
            <input type='text' name='lastname' id='lastname'  /><br />
        
			<label for='gender'>Gender</label>
			 
			<select name = 'gender' id = 'gender'>
		<option value="">Gender</option>
		<option value="M">Male</option>
		<option value="F">Female</option>
			</select></br>
		
		
           
        
			<label for='DOB'>Date Of Birth</label>
            <input type='text' name='DOB' id='DOB'  /><br />
			
			<label for='department'>Department</label>
            <input type='text' name='department' id='department' /><br />
            

			<label for='title'>Title</label>
            <input type='text' name='title' id='title'  /><br />
			
			<label for='salary'>Salary</label>
            <input type='text' name='salary' id='salary' /><br />
                                      
        
            <input type='Submit' value='Add Employee' />            
        </form>
    </div>








<?php $this->load->view ('header')?>