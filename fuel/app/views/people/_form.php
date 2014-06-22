<?php echo Form::open(array("class"=>"form-horizontal")); ?>

<fieldset>
	<div class="form-group">
	<?php echo Form::label('姓', 'lastname', array('class'=>'control-label')); ?>

	<?php echo Form::input('lastname', Input::post('lastname', isset($person) ? $person->lastname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lastname')); ?>

	</div>

	<div class="form-group">
	<?php echo Form::label('名', 'firstname', array('class'=>'control-label')); ?>
	<?php echo Form::input('firstname', Input::post('firstname', isset($person) ? $person->firstname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Firstname')); ?>
	</div>

	<div class="form-group">
	<?php echo Form::label('姓（ふりがな）', 'lastname_furigana', array('class'=>'control-label')); ?>
	<?php echo Form::input('lastname_furigana', Input::post('lastname_furigana', isset($person) ? $person->lastname_furigana : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lastname furigana')); ?>

	</div>
	<div class="form-group">
		<?php echo Form::label('名（ふりがな）', 'firstname_furigana', array('class'=>'control-label')); ?>

			<?php echo Form::input('firstname_furigana', Input::post('firstname_furigana', isset($person) ? $person->firstname_furigana : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Firstname furigana')); ?>

	</div>
		<div class="form-group">
<?php echo Form::label('日本人', 'foreign'); ?>
<?php echo Form::radio('foreign','0',isset($person) ? ($person->foreign ==0) : true); ?> |  
<?php echo Form::label('日本人以外', 'foreign'); ?>
<?php echo Form::radio('foreign','1',isset($person) ? ($person->foreign ==1) : false); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('Information', 'information', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('information', Input::post('information', isset($person) ? $person->information : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Information')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>
