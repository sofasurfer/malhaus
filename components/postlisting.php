<?php

// Namespace declaration
namespace Neofluxe;

// Exit if accessed directly 
defined( 'ABSPATH' ) or die;


/**
 * PostListing hooks
 */
class PostListing {

	/**
	 * The singleton instance of this class.
	 * @var PostListing
	 */
	private static $instance;

	/**
	 * Gets the singleton instance of this class.
	 * This instance is lazily instantiated if it does not already exist.
	 * The given instance can be used to unregister from filter and action hooks.
	 *
	 * @return PostListing The singleton instance of this class.
	 */
	public static function instance() {
		return self::$instance ?: ( self::$instance = new self() );
	}


	/**
	 * Creates a new instance of this singleton.
	 */
	private function __construct() {		
        add_filter( 'get_post_listings', [ $this, 'get_post_listings' ] );
	}



	/*
		Get Post Listings
	*/
	public function get_post_listings($fields) {
        $has_selected_items = $fields['select'] ?? false;
                
        $args = array(
            'post_type'        => 'any',  
            'post_status'      => 'publish',
            'post__in'         => $has_selected_items,
            'posts_per_page'   => - 1,
            'suppress_filters' => false,
        );

        
        $posts = get_posts( $args );
        

        if ( $has_selected_items && count( $has_selected_items ) > 0 ) {
            usort( $posts, function ( $a, $b ) use ( $has_selected_items ) {
                return array_search( $a->ID, $has_selected_items ) - array_search( $b->ID, $has_selected_items );
            } );
        }
        
        error_log(print_r($args,true));

        return $posts;
	}


}

// Trigger initialization
PostListing::instance();