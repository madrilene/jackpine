<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

$templates = [ '404.twig' ];

Timber::render( $templates, Timber::context() );
