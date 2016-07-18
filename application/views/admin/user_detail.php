	
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
    <tr>
        <th colspan="2"><?php echo $user_info->name;?> Basic Details :</th>
    </tr>
    </thead>
    <tbody>
	<?php if($user_info->role=="Consultant"){ ?>
	<tr>
        <td>Father/Mother Name </td>
        <td class="center"> : <?php echo $user_info->father_or_mother_name;?></td>
    </tr>
	<tr>
        <td>Date Of Birth </td>
        <td class="center"> : <?php echo $user_info->dob;?></td>
    </tr>
	<?php } ?>
	
	<tr>
        <td>Login Id</td>
        <td class="center"> : <?php echo $user_info->login_id;?></td>
    </tr>
	
    <tr>
        <td>Email Adress </td>
        <td class="center"> : <?php echo $user_info->email;?></td>
    </tr>
	
	
	<tr>
        <td>Phone No </td>
        <td class="center"> : <?php echo $user_info->phone;?></td>
    </tr>
	<?php if($user_info->role=="Consultant"){ ?>
	<tr>
        <td>Nature of business </td>
        <td class="center"> : <?php echo $user_info->n_o_b;?></td>
    </tr>
	<?php if($user_info->n_o_b_other!=""){ ?>
	<tr>
        <td>Nature of business(Other) </td>
        <td class="center"> : <?php echo $user_info->n_o_b_other;?></td>
    </tr>
	<?php }?>
	<tr>
        <td>Signed Document for Services </td>
        <td class="center"> : <?php echo $user_info->signed_document;?></td>
    </tr>
	<?php if($user_info->signed_document=="Yes"){ ?>
	<tr>
        <td>MOV Dated </td>
        <td class="center"> : <?php echo $d=$user_info->mov_dated;?></td>
    </tr>
	<tr>
        <td>MOA Dated </td>
        <td class="center"> : <?php echo $user_info->moa_dated;?></td>
    </tr>
	<tr>
        <td>Other Dated </td>
        <td class="center"> : <?php echo $user_info->other_dated;?></td>
    </tr>
	<?php }?>
	<tr>
        <td>Target Courses for Admissions</td>
        <td class="center"> : <?php echo $user_info->target_courses;?></td>
    </tr>

	
	<?php }?>
	
	
	<tr>
        <td>City </td>
        <td class="center"> : <?php echo $user_info->city;?></td>
    </tr>
	<tr>
        <td>Role </td>
        <td class="center"> : <?php echo $user_info->role;?></td>
    </tr>
	
	
	<tr>
        <td>Created By </td>
        <td class="center"> : <?php echo $user_info->created_by;?></td>
    </tr>
	<?php if($user_info->role=="Consultant"){ ?>
	<tr>
        <td>Consulted By</td>
        <td class="center"> : <?php if($user_info->officer_name==''){echo $user_info->created_by;}else{ echo $user_info->officer_name;}?></td>
    </tr>
	<?php } ?>
	
  </tbody>
    </table>