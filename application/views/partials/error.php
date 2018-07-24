<!-- fail register -->
<?php if (validation_errors() == TRUE) { ?>
<div class="alert alert-danger"  role="alert">
  <br>
  <?php echo validation_errors(); ?>
</div>
<?php }  else{ } ?>

<!-- success register -->
<?php 
  if($this->session->flashdata('authTrue') == TRUE){
?>
<div class="alert alert-success"  role="alert">
    <?php echo $this->session->flashdata('authTrue'); ?>
</div>
<?php } ?>

<?php 
  if($this->session->flashdata('authFalse') == TRUE){
?>
<div class="alert alert-danger"  role="alert">
    <?php echo $this->session->flashdata('authFalse'); ?>
</div>
<?php } ?>
