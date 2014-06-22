<h2>Listing <span class='muted'>Companies</span></h2>
<br>
<?php if ($companies): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Company name</th>
			<th>Company information</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($companies as $item): ?>		<tr>

			<td><?php echo $item->company_name; ?></td>
			<td><?php echo $item->company_information; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('companies/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('companies/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('companies/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Companies.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('companies/create', 'Add new Company', array('class' => 'btn btn-success')); ?>

</p>
