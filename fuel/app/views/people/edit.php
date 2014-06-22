<h2>Editing <span class='muted'>Person</span></h2>
<br>

<?php echo render('people/_form'); ?>
<p>
	<?php echo Html::anchor('people/view/'.$person->id, 'View'); ?> |
	<?php echo Html::anchor('people', 'Back'); ?></p>
