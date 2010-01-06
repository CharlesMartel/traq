<?php
/**
 * Traq
 * Copyright (C) 2009 Rainbird Studios
 * Copyright (C) 2009 Jack Polgar
 * All Rights Reserved
 *
 * This software is licensed as described in the file COPYING, which
 * you should have received as part of this distribution.
 *
 * $Id$
 */

require("../include/config.php");
require("../include/version.php");
require("../include/database.class.php");
$db = new Database;
$db->connect($config->db->host,$config->db->user,$config->db->pass);
$db->selectdb($config->db->name);
$db->prefix = $config->db->prefix;
require("common.php");

$tables = $db->query("SHOW TABLES");
while($info = $db->fetcharray($tables)) {
	$dbtables[] = $info[0];
}
if(is_array($dbtables)) {
	if(in_array($config->db->prefix.'settings',$dbtables)) {
		echo "Traq already installed.";
		exit;
	}
}
if(!isset($_POST['step'])) {
	head('Installer');
	?>
	<form action="install.php" method="post">
	<input type="hidden" name="step" value="1" />
	Welcome to the Traq installer, to continue click next.
	<div id="buttons">
		<input type="submit" value="Next" />
	</div>
	</form>
	<?
	foot();
} elseif($_POST['step'] == 1) {
	head('Installer');
	?>
	<form action="install.php" method="post">
	<input type="hidden" name="step" value="2" />
	Fill in the fields and click install.<br />
	<table align="center">
		<thead>
			<th colspan="2">Settings</th>
		</thead>
		<tr>
			<td>Site Title</td>
			<td><input type="text" name="title" value="Traq" /></td>
		</tr>
	</table>
	<table align="center">
		<thead>
			<th colspan="2">Admin Account Info</th>
		</thead>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" value="Admin" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" value="admin@mysite.com" /></td>
		</tr>
	</table>
	<div id="buttons">
		<input type="submit" value="Install" />
	</div>
	</form>
	<?
	foot();
} elseif($_POST['step'] == 2) {
	$errors = array();
	if(empty($_POST['username'])) {
		$errors[] = "You must enter a Username";
	}
	if(empty($_POST['password'])) {
		$errors[] = "You must enter a Password";
	}
	if(empty($_POST['email'])) {
		$errors[] = "You must enter an Email";
	}
	if(count($errors)) {
		head('Installer');
		?>
		Unable to continue with install:<br />
		<? foreach($errors as $error) { ?>
		<?=$error?><br />
		<? } ?>
		<?
		foot();
	} else {
		$installsql = file_get_contents('sql/install.sql');
		$installsql = str_replace('traq_',$config->db->prefix,$installsql);
		$queries = explode(';',$installsql);
		foreach($queries as $query) {
			if(!empty($query)) {
				$db->query($query);
			}
		}
		$db->query("INSERT INTO ".$db->prefix."settings VALUES('title','".$db->escapestring($_POST['title'])."')");
		$db->query("INSERT INTO ".$db->prefix."settings VALUES('dbversion','".$db->escapestring($dbversion)."')");
		$db->query("INSERT INTO ".$db->prefix."users VALUES(0,'".$db->escapestring($_POST['username'])."','".sha1($_POST['password'])."','".$db->escapestring($_POST['email'])."',1,'')");
		head('Installer');
		?>
		Install complete, you can <a href="../user/login/">login here</a>.<br />
		Thank you for using Traq.
		<?
		foot();
	}
}
?>