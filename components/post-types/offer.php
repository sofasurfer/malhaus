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
            'name' => __('Offer', 'neofluxe'),
            'singular_name' => __('Offer', 'neofluxe'),
            'menu_name' => __('Offers', 'neofluxe'),
            'all_items' => __('All Offers', 'neofluxe'),
            'add_new' => __('Add Offer', 'neofluxe'),
            'add_new_item' => __('New Offer', 'neofluxe'),
            'edit_item' => __('Edit Offer', 'neofluxe'),
            'new_item' => __('New Offer', 'neofluxe'),
            'view_item' => __('Show Offer', 'neofluxe'),
            'search_items' => __('Search Offers', 'neofluxe'),
            'not_found' => __('Offer has not been found.', 'neofluxe'),
            'not_found_in_trash' => __('Offer not found in the trash', 'neofluxe'),
            'publicly_queryable'  => false,
        ], [
            'en' => 'offer'
        ], false, false, true, ['title','thumbnail',  'page-attributes']);
    }
}

Offer::instance();