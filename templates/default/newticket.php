<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=buildtitle(array(l('new_ticket'),$project['name']))?></title>
<? include(template('headerinc')); ?> 
</head>
<body>
<? include(template('header')); ?>
	<? include(template('project_nav')); ?>
	<div id="content">
		<? include(template("breadcrumbs")); ?>
		<h1><?=l('new_ticket')?></h1>
		<form id="newticket" method="post" action="<?=$uri->anchor($project['slug'],'newticket')?>">
			<? if(count($errors)) { ?>
			<div class="errormessage">
				<? foreach($errors as $error) { ?>
				<?=$error?><br />
				<? } ?>
			</div>
			<? } ?>
			<input type="hidden" name="action" value="create" />
			<fieldset id="summary"<?=(isset($errors['summary']) ? ' class="error"' : '')?>>
				<legend><?=l('summary')?></legend>
				<input type="text" name="summary" id="summary" size="80" value="" />
			</fieldset>
			<fieldset id="description"<?=(isset($errors['body']) ? ' class="error"' : '')?>>
				<legend><?=l('description')?></legend>
				<textarea name="body" id="body" rows="10" cols="80"></textarea>
			</fieldset>
			<fieldset id="properties">
				<legend><?=l('properties')?></legend>
				<table>
					<tr>
						<th class="col1"><?=l('type')?></th>
						<td class="col2">
							<select name="type" id="type">
								<? foreach(gettypes() as $type) { ?>
								<option value="<?=$type['id']?>"><?=$type['name']?></option>
								<? } ?>
							</select>
						</td>
						<th class="col2"><?=l('assign_to')?></th>
						<td>
							<select name="assignto" id="assignto">
								<option selected="selected" value="0"> </option>
								<? foreach(projectmanagers($project['id']) as $staff) { ?>
								<option value="<?=$staff['id']?>"><?=$staff['username']?></option>
								<? } ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="col1"><?=l('priority')?></th>
						<td>
							<select name="priority" id="priority">
								<? foreach(getpriorities() as $priority) { ?>
								<option value="<?=$priority['id']?>"<?=($priority['id']==3 ? ' selected="selected"' : '')?>><?=$priority['name']?></option>
								<? } ?>
							</select>
						</td>
						<th class="col2"><?=l('severity')?></th>
						<td>
							<select name="severity" id="severity">
								<? foreach(getseverities() as $severity) { ?>
								<option value="<?=$severity['id']?>"<?=($severity['id']==4 ? ' selected="selected"' : '')?>><?=$severity['name']?></option>
								<? } ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="col1"><?=l('milestone')?></th>
						<td>
							<select name="milestone" id="milestone">
								<? foreach(projectmilestones($project['id']) as $milestone) { ?>
								<option value="<?=$milestone['id']?>"><?=$milestone['milestone']?></option>
								<? } ?>
							</select>
						</td>
						<th class="col2"><?=l('version')?></th>
						<td>
							<select name="version" id="version">
								<option selected="selected" value="0"> </option>
								<? foreach(projectversions($project['id']) as $version) { ?>
								<option value="<?=$version['id']?>"><?=$version['version']?></option>
								<? } ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="col1"><?=l('component')?></th>
						<td>
							<select name="component" id="component">
								<? foreach(projectcomponents($project['id']) as $component) { ?>
								<option value="<?=$component['id']?>"><?=$component['name']?></option>
								<? } ?>
							</select>
						</td>
						<th class="col2"></th>
						<td></td>
					</tr>
				</table>
			</fieldset>
			<? if(!$user->loggedin) { ?>
			<fieldset<?=(isset($errors['name']) ? ' class="error"' : '')?>>
				<legend><?=l('your_name')?></legend>
				<input type="text" name="name" value="<?=$_COOKIE['guestname']?>" />
			</fieldset>
			<fieldset<?=(isset($errors['key']) ? ' class="error"' : '')?>>
				<legend><?=l('human_check')?></legend>
				<table>
					<tr>
						<td><img src="<?=humancheckimage()?>" /></td>
						<td><input type="text" name="key" /></td>
					</tr>
				</table>
			</fieldset>
			<? } ?>
			<p></p>
			<div class="buttons">
				<input type="submit" value="<?=l('submit_ticket')?>" /> <input type="button" value="<?=l('cancel')?>" onclick="javascript:history.back()" />
			</div>
		</form>
	</div>
<? include(template('footer')); ?>
</body>
</html>