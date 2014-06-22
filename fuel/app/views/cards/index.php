<h2>Listing <span class='muted'>Cards</span></h2>
<br>
<?php if ($cards): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>名前</th>
			<th>会社名</th>
			<th>部署</th>
			<th>役職</th>
			<th>郵便番号</th>
			<th>住所</th>
			<th>E-Mail</th>
			<th>電話番号</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($cards as $item): ?>
		<tr>
			<td><?php echo $item->person->lastname.' '.$item->person->firstname; ?></td>
			<td><?php echo $item->company->company_name; ?></td>
			<td><?php echo $item->department; ?></td>
			<td><?php echo $item->position; ?></td>
			<td><?php echo $item->postcode; ?></td>
			<td><?php echo $item->address; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->tel; ?></td>
			<td>
			<div class="btn-toolbar">
			<div class="btn-group">
			<?php echo Html::anchor('cards/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>
			<?php echo Html::anchor('cards/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>
			<?php echo Html::anchor('cards/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger',
				 'onclick' => "return confirm('Are you sure?')")); ?>					
			</div>
			</div>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Cards.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('cards/create', 'Add new Card', array('class' => 'btn btn-success')); ?>

	<?php echo Html::anchor('people/create', 'Add new Person', array('class' => 'btn btn-success')); ?>
</p>
