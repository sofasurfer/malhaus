<?php

// Namespace declaration
namespace Neofluxe\PostType;

use Neofluxe\PostTypes;

// Exit if accessed directly 
defined('ABSPATH') or die;

class Offer {

    private static $instance;

    public static function instance() {
        return self::$instance ?: (self::$instance = new self());
    }

    private function __construct() {
        add_action('init', [$this, 'register']);
    }

    public function register() {
        PostTypes::instance()->register_post_type('offer', 'dashicons-store', [
            'name' => __('Angebot', 'neofluxe'),
            'singular_name' => __('Angebot', 'neofluxe'),
            'menu_name' => __('Angebote', 'neofluxe'),
            'all_items' => __('Alle Angebote', 'neofluxe'),
            'add_new' => __('Neues Angebot', 'neofluxe'),
            'add_new_item' => __('New Angebot', 'neofluxe'),
            'edit_item' => __('Edit Angebot', 'neofluxe'),
            'new_item' => __('New Angebot', 'neofluxe'),
            'view_item' => __('Show Angebot', 'neofluxe'),
            'search_items' => __('Search Angebote', 'neofluxe'),
            'not_found' => __('Angebot has not been found.', 'neofluxe'),
            'not_found_in_trash' => __('Angebot not found in the trash', 'neofluxe'),
            'publicly_queryable'  => false,
        ], [
            'en' => 'offer'
        ], false, false, true, ['title','thumbnail',  'page-attributes']);
    }
}

Offer::instance();