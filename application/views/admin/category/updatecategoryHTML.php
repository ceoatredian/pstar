<!DOCTYPE html>
<html>
<head>



</head>

<div class="row">
  <!-- Page Header -->
  <div class="col-lg-12">
    <h1 class="page-header">Update Category</h1>
  </div>
  <!--End Page Header -->
</div>
<div class="panel panel-default">
<!--<div class="panel-heading">User</div>-->
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-6">
	  <?php //print_r($get_cat);die; ?>
        <?php echo form_open('admin/category/updatecategory/'.$get_cat->id); ?>

          <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="catname" id="catname" value="<?php if(set_value('catname')==NULL){echo $get_cat->category_name;}else{ echo set_value('catname');} ?>" class="form-control">
          </div>
           <?php echo form_error('catname'); ?>

          <div class="form-group">
            <label>Description</label>
            <textarea rows="4" cols="50" name="cat_description" id="cat_description" value="" class="form-control"><?php if(set_value('catname')==NULL){echo $get_cat->description;}else{ echo set_value('cat_description');} ?></textarea>
          </div>
          <?php echo form_error('cat_description'); ?>

          <input type="submit" name="submit"  value="Update" class="btn btn-primary"/>
          
          <?php echo $this->session->flashdata('msg'); ?>

          <?php echo form_close(); ?>

        
			<?php  $msg='';
			if($msg<>''){?>
			<div > <font color="#00FF00"><?php echo $this->session->flashdata('msg'); ?> <?php echo $msg;?> </font>
			<?php }else {?>
			<font color="#FF0000"> <?php echo $msg;?> </font>
			<?php } ?>
			</div>

        <!-- End Form Elements -->
      </div>
    </div>
  </div>
</div>
</html>