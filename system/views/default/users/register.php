<section id="register_form" class="tabular content">
	<div class="push-7 span-8">
		<h2 id="page_title"><?php echo l('register'); ?></h2>
		<?php if (isset($user)) { show_errors($user->errors); } ?>
		<form action="<?php echo Request::base('register'); ?>" method="post" class="box">
			<div class="group">
				<label><?php echo l('username'); ?></label>
				<?php echo Form::text('username'); ?>
			</div>
			<div class="group">
				<label><?php echo l('password'); ?></label>
				<?php echo Form::password('password'); ?>
			</div>
			<div class="group">
				<label><?php echo l('email'); ?></label>
				<?php echo Form::text('email'); ?>
			</div>
			<div class="group">
				<input type="submit" value="<?php echo l('register'); ?>" />
			</div>
		</form>
	</div>
	<div class="clearfix"></div>
</section>