<?php $this->load->view('header')?>

<?php echo validation_errors() ?>


<form action="<?php echo site_url('hr/deleteprocess');?>" method='post' name='process'>
            <h2>Delete Employee</h2>
            <br />            
            <label for='employeeno'>Employee NO</label>
            <input type='text' name='employeeno' id='employeeno'  /><br />
         
                                      
        
            <input type='Submit' value='Delete Employee' />            
        </form>
    </div>








<?php $this->load->view ('header')?>