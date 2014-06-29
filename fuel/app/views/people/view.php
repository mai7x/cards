<h2>Viewing <span class='muted'>#<?php echo $person->id; ?></span></h2>

<p>
	<strong>Lastname:</strong>
	<?php echo $person->lastname; ?></p>
<p>
	<strong>Firstname:</strong>
	<?php echo $person->firstname; ?></p>
<p>
	<strong>Lastname furigana:</strong>
	<?php echo $person->lastname_furigana; ?></p>
<p>
	<strong>Firstname furigana:</strong>
	<?php echo $person->firstname_furigana; ?></p>
<p>
	<strong>Foreign:</strong>
	<?php echo $person->foreign; ?></p>
<p>
	<strong>Information:</strong>
	<?php echo $person->information; ?></p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>会社名</th>
			<th>部署名</th>
			<th>電話 </th>
			<th>Email</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($person->cards as $card): ?>
<tr>
<td> <?php echo $card->company->company_name; ?></td>
<td> <?php echo $card->department; ?></td>
<td> <?php echo $card->tel; ?></td>
<td> <?php echo $card->email; ?></td>
<td> <?php echo Html::anchor('cards/edit/'.$card->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?></td>

<?php endforeach; ?>
</table>

<?php
echo Form::open('cards/create',
	array("person_id" =>$person->id ) //hiddenフォームを設定
	);
echo Form::submit('','Add new card', array('class' => 'btn btn-success'));
echo Form::close();
 ?>

<?php echo Html::anchor('people/edit/'.$person->id, 'Edit'); ?> |
<?php echo Html::anchor('people', 'Back'); ?>
