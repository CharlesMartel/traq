<?php View::render('wiki/_nav'); ?>
<div class="wiki content">
	<div id="head">
		<h2 id="page_title"><?php echo $page->title; ?></h2>
		<ul id="wiki_actions">
			<li><?php echo HTML::link(l('new_page'), $project->href('wiki/_new')); ?></li>
			<li><?php echo HTML::link(l('edit_page'), $page->href('_edit')); ?></li>
		</ul>
	</div>
	<?php echo format_text($page->body); ?>
</div>