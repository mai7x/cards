<h2>Viewing <span class='muted'>#<?php echo $card->id; ?></span></h2>

<p>
	<strong>Person name:</strong>
	<?php echo $card->person->lastname.' '.$card->person->firstname; ?></p>
<p>
	<strong>Company name:</strong>
	<?php echo $card->company->company_name; ?></p>
<p>
	<strong>Department:</strong>
	<?php echo $card->department; ?></p>
<p>
	<strong>Position:</strong>
	<?php echo $card->position; ?></p>
<p>
	<strong>Postcode:</strong>
	<?php echo $card->postcode; ?></p>
<p>
	<strong>Address:</strong>
	<?php echo $card->address; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $card->email; ?></p>
<p>
	<strong>Tel:</strong>
	<?php echo $card->tel; ?></p>
<p>
	<strong>Fax:</strong>
	<?php echo $card->fax; ?></p>

<?php echo Html::anchor('cards/edit/'.$card->id, 'Edit'); ?> |
<?php echo Html::anchor('cards', 'Back'); ?>
