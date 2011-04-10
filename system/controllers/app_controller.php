<?php
/**
 * Traq
 * Copyright (C) 2009-2011 Jack Polgar
 * 
 * This file is part of Traq.
 * 
 * Traq is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 3 only.
 * 
 * Traq is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Traq. If not, see <http://www.gnu.org/licenses/>.
 */

require_once APPPATH.'version.php';
require_once APPPATH.'common.php';

class AppController extends Controller
{
	public function __construct()
	{
		global $lang;
		parent::__construct();
		
		View::$inherit_from = APPPATH.'defaults/views';
		
		// Load the locale file
		require_once APPPATH.'locale/'.settings('locale');
		
		// Load the helpers
		foreach(array('HTML','Form','JS') as $helper) Load::helper($helper);
		
		// Check if we're on a project page
		if(is_project(Request::seg(0)))
		{
			$this->project = $this->db->select()->from('projects')->where(array('slug'=>$this->db->res(Request::seg(0))))->exec()->fetchAssoc();
		}
		
		View::set('traq', $this);
		
		// Get the user info
		$this->getUser();
	}
	
	private function getUser()
	{
		$check = $this->db->query("SELECT * FROM ".DBPREFIX."users as usr WHERE usr.sesshash='".@Param::$cookie['traqsess']."' LIMIT 1");
		if(isset(Param::$cookie['traqsess']) and $check->num_rows())
		{
			$this->user = $check->fetchAssoc();
			$this->user['group'] = $this->db->select()->from('usergroups')->where("id='".$this->user['group_id']."'")->limit(1)->exec()->fetchAssoc();
			$loggedin = true;
		}
		else
		{
			$this->user = array('id'=>0, 'username'=>l('Guest'), 'group_id'=>3);
			$this->user['group'] = $this->db->select()->from('usergroups')->where(array('id'=>3))->exec()->fetchAssoc();
			$loggedin = false;
		}
		define("LOGGEDIN", $loggedin);
	}
}