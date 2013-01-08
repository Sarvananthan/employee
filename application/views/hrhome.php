<?php $this->load->view ('header')?>

 You are now logged in.
 
 <ul>
  <li><a href="<?php echo site_url('hr/add_employee')?>">Add Employee</a></li>
  <li><a href="<?php echo site_url('hr/delete_employee')?>">Delete Employee</a></li>
  <li><a href="<?php echo site_url('hr/promote_employee')?>">Promote Employee</a></li>
  <li><a href="<?php echo site_url('hr/demote_employee')?>">Demote Employee</a></li>
  <li><a href="<?php echo site_url('hr/change_title')?>">Change of job title</a></li>
  <li><a href="<?php echo site_url('hr/salary_change')?>">Salary Change</a></li>
  <li><a href="<?php echo site_url('hr/mode_department')?>">Move Department</a></li>
 
  
</ul>
 
 
 
 
 
 
 
 
 
 <br /><a href="<?php echo site_url('hr/do_logout') ?>"> Logout </a>
 
 



<?php $this->load->view ('footer')?>