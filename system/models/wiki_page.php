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

/**
 * Wiki Page database model.
 *
 * @package Traq
 * @subpackage Models
 * @author Jack P. <jack@traq.io>
 * @copyright (c) Jack P. <jack@traq.io>
 */
class Wikipage extends Model
{
	protected static $_name = 'wiki';
	protected static $_properties = array(
		'id',
		'project_id',
		'title',
		'slug',
		'body',
		'main'
	);

	protected static $_belongs_to = array('project');

	/**
	 * Returns the URI for the page.
	 *
	 * @param string $uri Extra segments to be appended to the URI.
	 *
	 * @return string
	 */
	public function href($uri = null)
	{
		return "/{$this->project->slug}/wiki/{$this->slug}" . ($uri !== null ? '/' . implode('/', func_get_args()) : '');
	}

	/**
	 * Checks if the pages data is valid.
	 *
	 * @return bool
	 */
	public function is_valid()
	{
		$errors = array();

		// Check if the name is set
		if (empty($this->_data['name']))
		{
			$errors['name'] = l('errors.name_blank');
		}

		// Check if the slug is set.
		if (empty($this->_data['slug']))
		{
			$errors['slug'] = l('errors.slug_blank');
		}

		$this->errors = $errors;
		return !count($errors) > 0;
	}
}