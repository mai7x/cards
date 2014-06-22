<h2>Viewing <span class='muted'>#<?php echo $card->id; ?></span></h2>

<p>
	<strong>名前:</strong>
	<?php echo $card->person->lastname.' '.$card->person->firstname; ?></p>
<p>
	<strong>会社名:</strong>
	<?php echo $card->company->company_name; ?></p>
<p>
	<strong>部署:</strong>
	<?php echo $card->department; ?></p>
<p>
	<strong>役職:</strong>
	<?php echo $card->position; ?></p>
<p>
	<strong>郵便番号:</strong>
	<?php echo $card->postcode; ?></p>
<p>
	<strong>住所:</strong>
	<?php echo $card->address; ?></p>
<p>
	<strong>E-Mail:</strong>
	<?php echo $card->email; ?></p>
<p>
	<strong>電話番号:</strong>
	<?php echo $card->tel; ?></p>
<p>
	<strong>Fax:</strong>
	<?php echo $card->fax; ?></p>

<?php echo Html::anchor('cards/edit/'.$card->id, 'Edit'); ?> |
<?php echo Html::anchor('cards', 'Back'); ?>
