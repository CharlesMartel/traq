<h3><?php echo l('new_group'); ?></h3>
<form action="<?php echo Request::full_uri(); ?>" method="post" class="overlay_thin">
	<?php show_errors($group->errors); ?>
	<div class="tabular box">
		<?php View::render('admin/groups/_form'); ?>
	</div>
	<div class="actions">
		<input type="submit" value="<?php echo l('create'); ?>" />
		<input type="button" value="<?php echo l('cancel'); ?>" onclick="close_overlay();" />
	</div>
</form>