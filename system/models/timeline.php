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

 class Timeline extends Model
 {
 	protected static $_name = 'timeline';
 	protected static $_properties = array(
 		'id',
 		'project_id',
 		'owner_id',
 		'action',
 		'data',
 		'user_id',
 		'timestamp'
 	);

 	protected static $_belongs_to = array('user');

 	/**
 	 * If the row is a ticket change, the ticket
 	 * object is returned.
 	 *
 	 * @return object
 	 */
 	public function ticket()
 	{
 		if (!isset($this->_ticket))
 		{
 			$this->_ticket = Ticket::find($this->owner_id);
 		}
 		return $this->_ticket;
 	}

 	/**
 	 * If the row is a ticket change, the new status
 	 * object is returned.
 	 *
 	 * @return object
 	 */
 	public function ticket_status()
 	{
 		if (!isset($this->_ticket_status))
 		{
 			$this->_ticket_status = TicketStatus::find($this->data);
 		}
 		return $this->_ticket_status;
 	}
 }