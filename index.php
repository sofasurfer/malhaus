<?php
get_template_part( 'templates/page/header' );

// Get Site Elements
$page_id       = get_queried_object_id();
$site_elements = get_field( 'acf_elements', $page_id );
$post_type     = get_post_type( $page_id );


if( apply_filters( 'c_get_option', 'force_login' ) &&  !is_user_logged_in() ) {
	
    get_template_part( 'templates/page/page_login' );

}else{
	if ( is_404() ) {

		get_template_part( 'templates/page/page_404' );

	} else {
		if(is_front_page()){
			get_template_part( 'templates/page/page_home' );
		}else{
			get_template_part( 'templates/page/page_' . $post_type );
		}	

		if ( ! empty( $site_elements ) ) {
			foreach ( $site_elements as $site_element ) {
				$layout_name = str_replace('acf_element_','',$site_element['acf_fc_layout']);
				include( locate_template( 'templates/acf/' . $layout_name . '.php', false, false ) );
			}
		}

		if( $post_type == 'course'){
			get_template_part( 'templates/page/footer_course' );
		}
	}
}
get_template_part( 'templates/page/footer' );
