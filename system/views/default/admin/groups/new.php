<div class="content">
	<h3><?php echo l('new_group'); ?></h3>
	<form action="<?php echo Request::full_uri(); ?>" method="post">
		<?php show_errors($group->errors); ?>
		<div class="tabular box">
			<?php View::render('admin/groups/_form'); ?>
		</div>
		<div class="actions">
			<input type="submit" value="<?php echo l('create'); ?>" />
		</div>
	</form>
</div>