<?php $this->load->view ('header')?>

<?php 
 if(isset ($data)){
 echo json_encode($data);   
 }
?>
    
 
                       <h3> Search </h3>
 <form action="<?php echo base_url() . "index.php/find/findemp"?>" method="GET">
                       First Name: <input type="text" name="firstname" id="firstname"/><br/>
 Last Name: <input type="text" name="lastname" id="lastname"/><br/>
 Department: <input type="text" name="department" id="department"/><br/>
 Title: <input type="text" name="title" id="title"/><br/>
        <input type="submit" value="Search">
 </form>
	<table class="search_results">
		<thead>
			<th>First name  </th>
			<th>Last Name</th>
			<th>Department Name </th>
			<th> Title</th>
		</thead>
		<tbody>

		
		</tbody>
	
	
	</table>
	
	
<?php $this->load->view ('footer')?>

