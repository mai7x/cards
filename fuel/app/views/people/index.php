<h2>Listing <span class='muted'>People</span></h2>
<br>
<?php if ($people): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>名前</th>
			<th>Information</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($people as $item): ?>		<tr>

<td><?php echo $item->lastname; ?>  <?php echo $item->firstname; ?> </td>
<td><?php echo $item->information; ?></td>
<td>
	<div class="btn-toolbar">
		<div class="btn-group">
			<?php echo Html::anchor('people/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('people/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('people/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
	</div>

</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No People.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('people/create', 'Add new Person', array('class' => 'btn btn-success')); ?>

</p>
