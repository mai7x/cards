<?php echo Form::open(array("class"=>"form-horizontal")); ?>

<fieldset>

<div class="form-group">
<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>
<?php echo Form::select(
	'person_id',
	Input::post('person_id', isset($card) ? $card->person_id : '0'), //デフォルト値
	$selectmenu_of_people,
	array('class' => 'col-md-4 form-control')); ?>
</div>

<div class="form-group">
<?php echo Form::label('Company', 'company', array('class'=>'control-label')); ?>
<?php echo Form::select(
	'company_id',
	 Input::post('company_id', isset($card) ? $card->company_id : '0'), //デフォルト値
	 $selectmenu_of_companies,
	array('class' => 'col-md-4 form-control', 'placeholder'=>'Company id')); ?>
</div>

<div class="form-group">
	<?php echo Form::label('Department', 'department', array('class'=>'control-label')); ?>

		<?php echo Form::input('department', Input::post('department', isset($card) ? $card->department : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Department')); ?>

</div>
<div class="form-group">
	<?php echo Form::label('Position', 'position', array('class'=>'control-label')); ?>

		<?php echo Form::input('position', Input::post('position', isset($card) ? $card->position : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Position')); ?>

</div>
<div class="form-group">
	<?php echo Form::label('Postcode', 'postcode', array('class'=>'control-label')); ?>

		<?php echo Form::input('postcode', Input::post('postcode', isset($card) ? $card->postcode : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Postcode')); ?>

</div>
<div class="form-group">
	<?php echo Form::label('Address', 'address', array('class'=>'control-label')); ?>

		<?php echo Form::input('address', Input::post('address', isset($card) ? $card->address : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Address')); ?>

</div>
<div class="form-group">
	<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

		<?php echo Form::input('email', Input::post('email', isset($card) ? $card->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

</div>
<div class="form-group">
	<?php echo Form::label('Tel', 'tel', array('class'=>'control-label')); ?>

		<?php echo Form::input('tel', Input::post('tel', isset($card) ? $card->tel : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tel')); ?>

</div>
<div class="form-group">
	<?php echo Form::label('Fax', 'fax', array('class'=>'control-label')); ?>

		<?php echo Form::input('fax', Input::post('fax', isset($card) ? $card->fax : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Fax')); ?>

</div>
<div class="form-group">
	<label class='control-label'>&nbsp;</label>
	<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
</fieldset>
<?php echo Form::close(); ?>
