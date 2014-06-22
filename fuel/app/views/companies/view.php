<h2>Viewing <span class='muted'>#<?php echo $company->id; ?></span></h2>

<p>
	<strong>Company name:</strong>
	<?php echo $company->company_name; ?></p>
<p>
	<strong>Company information:</strong>
	<?php echo $company->company_information; ?></p>

<?php echo Html::anchor('companies/edit/'.$company->id, 'Edit'); ?> |
<?php echo Html::anchor('companies', 'Back'); ?>