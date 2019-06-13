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
 
namespace Forumstitious;

class Forumstitious {
    
    /**
     * Collection of incoming data from $_GET & $_POST globals.
     */
    public $_incoming = [];
    
    /**
     * Collection of data parameters.
     */
    public $_params = [];
    
    // SESSION STUFF
    
    /**
     * Default application constants.
     * 
     * @return void
     */
    public function appConstants()
    {
        return array(
            'APP_ROOT' => dirname( __FILE__ ) . '/'
        );
    }
    
    /**
     * Initiate application.
     * 
     * @return void
     */
    public function init()
    {
        foreach ( self::appConstants() as $k => $v )
        {
            if ( \defined( $k ) )
            {
                \define( 'FORUMSTITIOUS\\' . $k, \constant( $k ) );
            }
            else
            {
                \define( 'FORUMSTITIOUS\\' . $k, $v );
            }
        }
        
        mb_internal_encoding( 'UTF-8' );
        date_default_timezone_set( 'UTC' );
        
        \define( 'FORUMSTITIOUS\\APP_INIT', true );
        
        spl_autoload_register( '\Forumstitious\Forumstitious::autoload', true, true );
        
        self::parse_incoming_data();
    }
    
    /**
     * Application class autoload callback routine.
     * 
     * @param string $className Name of the class to load.
     * @return void
     */
    public function autoload( $className )
    {
        $file = APP_ROOT . '/' . str_replace( '\\'. '/', ucfirst( $className ) ) . '.php';
        
        if ( ( file_exists( $file ) ) AND is_readable( $file ) )
        {
            require( $file );
        }
        else
        {
            // ERROR HERE
        }
    }
    
    /**
     * Parses incoming data from $_GET & $_POST globals.
     * Parses any given URL string and places data into the \Forumstitious\Forumstitious::_incoming array
     * data collection.
     * 
     * @return void
     */
    public function parse_incoming_data()
    {
        foreach ( $_GET  as $k => $v ) self::$_incoming[$k] = filter_var( $v, FILTER_SANITIZE_STRING );
        foreach ( $_POST as $k => $v ) self::$_incoming[$k] = filter_var( $v, FILTER_SANITIZE_STRING );
        
        if ( ( ! array_key_exists( 'controller', self::$_incoming ) ) AND ( strlen( $_SERVER['QUERY_STRING'] ) > 0 ) )
        {
            $urlString = filter_var( $urlString, FILTER_SANITIZE_URL );
            $urlBits   = explode( '/', $urlString );
            
            array_shift( $urlBits );
            
            self::$_incoming['controller'] = isset( $urlBits[0] ) ? $urlBits[0] : null;
            self::$_incoming['action']     = isset( $urlBits[1] ) ? $urlBits[1] : 'forums';
            self::$_params                 = array_slice( $urlBits, 2 );
            
            if ( count( self::$_params ) > 0 )
            {
                for ( $i = 0; $i < self::$_params; $i++ )
                {
                    if ( isset( self::$_params[$i + 1] ) )
                    {
                        self::$_incoming[self::$_params[$i]] = filter_var( urldecode( self::$_params[$i + 1] ), FILTER_SANITIZE_STRING );
                    }
                }
            }
        }
    }
    
    /**
     * Returns data parameter collection.
     * 
     * @return  array   Data parameters.
     */
    public function get_params()
    {
        return self::$_params;
    }
}

/* Initialize application */
Forumstitious::init();

?>