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

/**
 * Application setup class.
 */
class Forumstitious {
    
    /**
     * Current application version string.
     * 
     * @var string
     */
    public static $version = '1.0.0 Pre-Alpha';
    
    /**
     * Current applciation version datecode.
     * 
     * @var int
     */
    public static $versionDatecode = 20190613;
    
    /**
     * Whether we are currently in debug mode.
     * 
     * @var bool
     */
    public static $inDebugMode = false;
    
    /**
     * Custom PHP error handler callback in order to convert notices, warning and other errors into
     * custom application exceptions.
     * 
     * @param integer $error The type of error.
     * @param string  $str   Error string.
     * @param string  $file  File that threw error.
     * @param int     $line  Line number of resulting error.
     * 
     * @throws \ErrorException   
     */
    public static function phpErrorHandler( $error, $str, $file, $line )
    {
        
    }
    
    /**
     * Handles all PHP exceptions.
     * 
     * @param Exception $e Exception instance.
     */
    public static function phpExceptionHandler( $e )
    {
        
    }
    
    /**
     * Handles all PHP fatal errors.
     */
    public static function phpFatalErrorHandler()
    {
        
    }
    
    /**
     * Initializes the Forumstitious application.
     */
    public static function init()
    {
        ignore_user_abort( true );
        
        error_reporting( E_ALL | E_STRICT & ~8192 );
        set_error_handler( ['Forumstitious', 'phpErrorHandler'] );
        set_exception_handler( ['Forumstitious', 'phpExceptionHandler'] );
        register_shutdown_function( ['Forumstitious', 'phpFatalErrorHandler'] );
                
        date_default_timezone_set( 'UTC' );
        mb_internal_encoding( 'UTF-8' );
        setlocale( LC_ALL, 'C' );
        
        @ini_set( 'output_buffering', false );
        
        require_once( dirname( __FILE__ ) . '/Constants.php' );
    }
}

?>