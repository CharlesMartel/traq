<table class="admin projects list">
	<thead>
		<th class="fixed_name"><?php echo l('name'); ?></th>
		<th class="fixed_author"><?php echo l('author'); ?></th>
		<th class="fixed_version"><?php echo l('version'); ?></th>
		<th class="actions"><?php echo l('actions'); ?></th>
	</thead>
	<tbody>
	<?php foreach ($plugins as $plugin) { ?>
		<tr>
			<td><?php echo $plugin['name']; ?></td>
			<td><?php echo $plugin['author'] ? $plugin['author'] : ''; ?></td>
			<td><?php echo $plugin['version']; ?></td>
			<td>
				<?php if (in_array($plugin['file'], $enabled_plugins)) {
					echo HTML::link(l('disable'), "/admin/plugins/disable/{$plugin['file']}", array('class' => 'button_disable'));
				} else if (!in_array($plugin['file'], $enabled_plugins)) {
					echo HTML::link(l('enable'), "/admin/plugins/enable/{$plugin['file']}", array('class' => 'button_enable'));
				} ?>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>