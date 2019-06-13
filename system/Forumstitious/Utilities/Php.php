<?php

/**
 * F O R U M S T I T I O U S
 * -_-_-_-_-_-_-_-_-_-_-_-_-
 * 
 * By Sam Wilcox <sam@forumstitious.com>
 * 
 * (C)Copyright 2019 Forumstitious.
 * (R)All Rights Reserved.
 * 
 * Email:          sam@forumstitious.com
 * World Wide Web: http://www.forumstitious.com
 * Distributed By: http://www.forumstitious.com
 * 
 * USER-END LICENSE AGREEMENT:
 * 
 * This file is part of Forumstitious.
 * 
 * Forumstitious is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Forumstitious is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Forumstitious.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace Forumstitious\Utilities;

/**
 * Useful PHP utilities class.
 */
class Php {
    
    /**
     * Converts PHP error code to string value.
     * 
     * @return string
     */
    public static function errorCodeToString( $errorCode )
    {
        switch ( $errorCode )
        {
            case E_ERROR: return 'E_ERROR';
			case E_WARNING: return 'E_WARNING';
			case E_PARSE: return 'E_PARSE';
			case E_NOTICE: return 'E_NOTICE';
			case E_CORE_ERROR: return 'E_CORE_ERROR';
			case E_CORE_WARNING: return 'E_CORE_WARNING';
			case E_COMPILE_ERROR: return 'E_COMPILE_ERROR';
			case E_COMPILE_WARNING: return 'E_COMPILE_WARNING';
			case E_USER_ERROR: return 'E_USER_ERROR';
			case E_USER_WARNING: return 'E_USER_WARNING';
			case E_USER_NOTICE: return 'E_USER_NOTICE';
			case E_STRICT: return 'E_STRICT';
			case E_RECOVERABLE_ERROR: return 'E_RECOVERABLE_ERROR';
			case E_DEPRECATED: return 'E_DEPRECATED';
			case E_DEPRECATED: return 'E_DEPRECATED';
            default: return "$errorCode";
        }
    }
}

?>