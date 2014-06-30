<h2>Viewing <span class='muted'>#<?php echo $company->id; ?></span></h2>

<p>
	<strong>Company name:</strong>
	<?php echo $company->company_name; ?></p>
<p>
	<strong>Company information:</strong>
	<?php echo $company->company_information; ?></p>

<!-- 所属する社員の表示 -->
<table class="table table-striped">
	<thead>
		<tr>
			<th>名前</th>
			<th>所属</th>
			<th>役職</th>
			<th>電話 </th>
			<th>Email</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($company->cards as $card): ?>
<tr>
<td> <?php echo $card->person->lastname. ' ' .$card->person->firstname ?></td>
<td> <?php echo $card->department; ?></td>
<td> <?php echo $card->position; ?></td>
<td> <?php echo $card->email; ?></td>
<td> <?php echo $card->tel; ?></td>
<td> <?php echo Html::anchor('cards/edit/'.$card->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?></td>

<?php endforeach; ?>
</table>
<?php echo Html::anchor('companies/edit/'.$company->id, 'Edit'); ?> |
<?php echo Html::anchor('companies', 'Back'); ?>
