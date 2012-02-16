<div class="traq_settings content">
	<h2 id="page_title"><?php echo l('traq_settings'); ?></h2>
	<form action="<?php echo Request::full_uri(); ?>" method="post">
		<h3 class="box_title"><?php echo l('traq'); ?></h3>
		<div class="tabular section box">
			<div class="group">
				<label><?php echo l('traq_title'); ?></label>
				<?php echo Form::text('settings[title]', array('value' => settings('title'))); ?>
			</div>
			<div class="group">
				<label><?php echo l('default_language'); ?></label>
				<?php echo Form::select('settings[theme]', array(), array()); ?>
			</div>
			<div class="group">
				<label><?php echo l('seo_urls'); ?></label>
				<?php echo Form::select('settings[seo_urls]',
					array(array('label' => l('yes'), 'value' => 1), array('label' => l('no'), 'value' => 0)),
					array('value' => settings('seo_urls'))
					);
				?>
			</div>
			<div class="group">
				<label><?php echo l('theme'); ?></label>
				<?php echo Form::select('settings[theme]', array(), array()); ?>
			</div>
		</div>

		<h3 class="box_title"><?php echo l('users'); ?></h3>
		<div class="tabular section box">
			<div class="group">
				<label><?php echo l('allow_registration'); ?></label>
				<?php echo Form::select('settings[allow_registration]',
					array(array('label' => l('yes'), 'value' => 1), array('label' => l('no'), 'value' => 0)),
					array('value' => settings('allow_registration'))
					);
				?>
			</div>
		</div>

		<h3 class="box_title"><?php echo l('date_and_time'); ?></h3>
		<div class="tabular section box">
			<div class="group">
				<label><?php echo l('date_time_format'); ?></label>
				<?php echo Form::text('settings[date_time_format]', array('value' => settings('date_time_format'))); ?>
			</div>
			<div class="group">
				<label><?php echo l('timeline_day_format'); ?></label>
				<?php echo Form::text('settings[timeline_day_format]', array('value' => settings('timeline_day_format'))); ?>
			</div>
			<div class="group">
				<label><?php echo l('timeline_time_format'); ?></label>
				<?php echo Form::text('settings[timeline_time_format]', array('value' => settings('timeline_time_format'))); ?>
			</div>
		</div>
		<div class="actions">
			<input type="submit" value="<?php echo l('save'); ?>" />
		</div>
	</form>
</div>