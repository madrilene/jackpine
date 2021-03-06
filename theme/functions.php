<?php

/**
 * Jackpine
 *
 * Based on the Timber starter theme.
 * Huge thanks to the folks who made the tools that Jackpine is built on.
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

require_once dirname( __DIR__ ) . '/vendor/autoload.php';

use Timber\Menu;
use Timber\Site;
use Timber\Timber;
use Twig\Environment;
use WPackio\Enqueue;

class JackpineSite extends Site {
    /**
     * @var Enqueue
     */
    protected $enqueue;

    /**
     * @var Timber
     */
    protected $timber;

    public function __construct() {
        $this->enqueue = new Enqueue(
            'jackpine',
            '../dist',
            '0.1.0',
            'theme',
            false
        );

        $this->timber = new Timber();

        Timber::$dirname = [ '../templates' ];

        add_action( 'after_setup_theme', [ $this, 'theme_supports' ] );
        add_action( 'after_setup_theme', [ $this, 'load_text_domain' ] );
        add_action( 'init', [ $this, 'custom_taxonomies' ] );
        add_action( 'init', [ $this, 'custom_post_types' ] );
        add_filter( 'timber/context', [ $this, 'add_to_context' ] );
        add_filter( 'timber/twig', [ $this, 'add_to_twig' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

        parent::__construct();
    }

    /**
     * Registers custom taxonomies.
     *
     * @return void
     */
    public function custom_taxonomies() {
        //
    }

    /**
     * Registers custom post types.
     *
     * @return void
     */
    public function custom_post_types() {
        //
    }

    /**
     * Registers supported features.
     *
     * @return void
     */
    public function theme_supports() {
        // Enables RSS feeds for posts and comments
        add_theme_support( 'automatic-feed-links' );

        // Lets WordPress provide the document title
        add_theme_support( 'title-tag' );

        // Enables featured images for posts
        add_theme_support( 'post-thumbnails' );

        // Enables HTML5 markup for certain elements
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            ]
        );

        // Enables menus
        add_theme_support( 'menus' );
    }

    /**
     * Sets localization files location.
     *
     * @return void
     */
    public function load_text_domain() {
        load_theme_textdomain( 'jackpine',
            get_template_directory() . '/languages' );
    }

    /**
     * Enqueues scripts.
     *
     * @return void
     */
    public function enqueue_scripts() {
        $this->enqueue->enqueue( 'app', 'main', [] );
    }

    /**
     * Registers global context variables.
     *
     * @param  array  $context  Timber global context
     *
     * @return array
     */
    public function add_to_context( array $context ) {
        $context['menu'] = new Menu();
        $context['site'] = $this;

        return $context;
    }

    /**
     * Registers Twig extensions.
     *
     * @param  Environment  $twig  Twig environment
     *
     * @return Environment
     */
    public function add_to_twig( Environment $twig ) {
        return $twig;
    }
}

new JackpineSite();
