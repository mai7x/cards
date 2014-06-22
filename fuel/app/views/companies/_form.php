<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Company name', 'company_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('company_name', Input::post('company_name', isset($company) ? $company->company_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Company name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Company information', 'company_information', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('company_information', Input::post('company_information', isset($company) ? $company->company_information : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Company information')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>