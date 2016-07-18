<!DOCTYPE html>
<html>
<head>



</head>

<div class="row">
  <!-- Page Header -->
  <div class="col-lg-12">
    <h1 class="page-header">Add Tags/Keywords/Description</h1>
  </div>
  <!--End Page Header -->
</div>
<div class="panel panel-default">
<!--<div class="panel-heading">User</div>-->
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-6">
      

      <?php echo form_open('admin/seo/addtag'); ?>

          <div class="form-group">
            <label>Tagname</label>
            <input type="text" name="tagname" id="tagname" value="<?php echo set_value('tagname'); ?>" class="form-control">
          </div>
           <?php echo form_error('tagname'); ?>

          <div class="form-group">
            <label>Keyword</label>
            <input type="text" name="keyword" id="keyword" value="<?php echo set_value('keyword'); ?>" class="form-control">
          </div>
          <?php echo form_error('keyword'); ?>

          <div class="form-group">
            <label>Description</label>
            <textarea rows="4" cols="50" name="description" id="description" value="<?php echo set_value('description'); ?>" class="form-control"></textarea>
          </div>
          <?php echo form_error('description'); ?>

          <input type="submit" name="submit"  value="Submit" class="btn btn-primary"/>
          
          <?php echo $this->session->flashdata('msg'); ?>

          <?php echo form_close(); ?>

        
			<?php  $msg='';
			if($msg<>''){?>
			<div > <font color="#00FF00"> <?php echo $msg;?> </font>
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