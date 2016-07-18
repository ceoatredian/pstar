<?php foreach($photo as $row){ ?>
<?php
echo "<img src=".base_url()."assets/images/".$user_profile->username."/images/". $row->img_path." style='margin:auto;' />";
?>
<?php } ?>
