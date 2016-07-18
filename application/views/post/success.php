<?php $this->load->view('common/header');
	if(isset($_POST['save'])){
		echo "<p style='color:#3399CC;'><b>Your Post Submit Sucessfully Thankyou...</b><br><br></b><br><br></p>";
		echo "<a href='".base_url()."user/myaccount'>Go Back</a>";
	}
	else if(isset($_POST['update_album'])){
		echo "<p style='color:#3399CC;'><b>Your Album Updated Sucessfully Thankyou...</b><br><br></b><br><br></p>";
		echo "<a href='".base_url()."user/myaccount'>Go Back</a>";
	}
	else if(isset($_POST['save_album'])){
		echo "<p style='color:#3399CC;'><b>Your Album Created Sucessfully Thankyou...</b><br><br></b><br><br></p>";
		echo "<a href='".base_url()."user/myaccount'>Go Back</a>";
	}
	else if(isset($_POST['add_photo'])){
		echo "<p style='color:#3399CC;'><b>Your photo Add Successfully...</b><br><br></b><br><br></p>";
		echo "<a href='".base_url()."user/myaccount'>Go Back</a>";
	}
	else if(isset($_POST['update'])){
		echo "<p style='color:#3399CC;'><b>Your Profile Change  Sucessfully Thankyou...</b><br><br></b><br><br></p>";
		echo "<a href='".base_url()."user/myaccount'>Go Back</a>";
	}
	else if(isset($_POST['insert_photo'])){
		echo "<p style='color:#3399CC;'><b>Your Photo Upload   Sucessfully Thankyou...</b><br><br></b><br><br></p>";
		echo "<a href='".base_url()."user/myaccount'>Go Back</a>";
	}

	else{
	    echo "<b style=' color:#3399CC;'>Your Post Published Sucessfully Thankyou ...</b><br><br></b><br><br>";
	    echo "<a href='".base_url()."user/myaccount'>Go Back</a>";
	}
$this->load->view('common/footer'); ?>