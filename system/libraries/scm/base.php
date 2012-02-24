<?php
/*!
 * Traq
 * Copyright (C) 2009-2012 Traq.io
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

require __DIR__ . '/file.php';

/**
 * SCM Base class.
 * Copyright (C) Jack Polgar
 *
 * @author Jack P.
 * @copyright (C) Jack P.
 * @package Traq
 * @package SCM
 * @version 0.1
 */
class SCMBase
{
	/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	 *
	 *  This is the base class for all SCM types.
	 *  It is essentially the API for the repository browser,
	 *  none of this class is finalised and anything can change.
	 *
	 *  Join in on the discussion on the forum to help build the best
	 *  API for the repository browser.
	 *
	 *  You can also join the IRC channel and discuss the API, but
	 *  please post all discussion to the forum topic about it.
	 *
	 *!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	 */

	protected $info;

	/**
	 * Class constructor.
	 *
	 * @param object $info Repository model object.
	 */
	public function __construct(&$info)
	{
		$this->info = $info;
	}

	/**
	 * Returns the name of the SCM.
	 *
	 * @return string
	 */
	public function name()
	{
		$this->info->type;
	}

	/**
	 * Runs the specified command.
	 *
	 * @param string $cmd
	 *
	 * @return string
	 */
	protected function _shell($cmd)
	{
		return shell_exec("{$this->_binary} {$cmd}");
	}

	/**
	 * Returns an array of branches.
	 *
	 * @return array
	 */
	public function branches()
	{
		throw new Exception("Method " . get_class($this) . "::" . __FUNCTION__ . "() not implemented");
	}

	/**
	 * Returns an array of tags.
	 *
	 * @return array
	 */
	public function tags()
	{
		throw new Exception("Method " . get_class($this) . "::" . __FUNCTION__ . "() not implemented");
	}

	/**
	 * Returns the information about the given file path.
	 *
	 * @param string $path File/directory path
	 * @param string $revision Revision identifier
	 *
	 * @return array
	 */
	public function file_info($path = null, $revision = null)
	{
		throw new Exception("Method " . get_class($this) . "::" . __FUNCTION__ . "() not implemented");
	}

	/**
	 * Fetches the revision info.
	 *
	 * @param string $revision Revision identifier.
	 * @param string $path Directory path for the revision.
	 */
	public function revision($revision, $path = null)
	{
		throw new Exception("Method " . get_class($this) . "::" . __FUNCTION__ . "() not implemented");
	}

	/**
	 * Fetches all the revisions.
	 *
	 * @param string $path Directory path.
	 *
	 * @return array
	 */
	public function revisions($path = null)
	{
		throw new Exception("Method " . get_class($this) . "::" . __FUNCTION__ . "() not implemented");
	}

	/**
	 * Lists the directory for the path and revision.
	 *
	 * @param string $path Directory path.
	 * @param string $revision Revision identifier.
	 */
	public function list_dir($path, $revision = null)
	{
		throw new Exception("Method " . get_class($this) . "::" . __FUNCTION__ . "() not implemented");
	}
}