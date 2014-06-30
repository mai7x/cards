<ul class="nav nav-pills">
</ul>
<p>Register</p>
<?php // echo $reg ?>
<?php echo Form::open(array("class"=>"form-horizontal")); ?>

<div class="form-group">

<!-- ユーザ名 -->
<?php echo Form::label('Username', 'username', array(
		'class'=>'control-label')); ?>

<div class="col-xs-2">
<?php echo Form::input('username','',  array(
		'class' => 'form-control',
		'placeholder'=>'Username'));
 ?>
</div>
</div>

<!-- Password -->
<div class="form-group">
<?php echo Form::label('Choose Password', 'password', array(
		'class'=>'control-label')); ?>

<div class="col-xs-3">
<?php echo Form::input('password','',  array(
		'type' => 'password',
		'class' => 'form-control',
		'placeholder'=>'Password'));
 ?>
</div> 
</div>

<!-- Password (Re-Type)-->
<div class="form-group">
<?php echo Form::label('Re-Type Password', 'password2', array('class'=>'control-label')); ?>

<div class="col-xs-3">
<?php echo Form::input('password2','',  array(
		'type' => 'password',
		'class' => 'form-control',
		'placeholder'=>'Password'));
 ?>
</div> 
</div>

<!-- Submit -->
<?php echo Form::submit('submit', 'Register', array(
		'class' => 'btn btn-primary',
		)); ?>

<?php echo Form::close(); ?>
