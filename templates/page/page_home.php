<div class="c-container-wide c-main-title-img">
	<!-- zweites bild mit anderem ratio ab 786 px -->
	<figure class="c-showroom-img">
		<?php
		$image_header = get_field('acf_header_image_desktop');
		$image_header_mobile = get_field('acf_header_image_mobile');	 
		$args = [
			'class'            => 'some-class',
			'id'               => 'some-id',
			'fallback_image_id' => $image_header_mobile,
			'images'           => [
				[
				'id'    => $image_header,
				'media' => '(min-width: 768px)',
				'size'  => 'large'
				]
			]
		];
		?>
		<?=  apply_filters('c_render_picturetag', $args); ?>		
	</figure>
</div>
<div class="c-container c-main-title-img">

        <div class="c-row">
            <div class="c-col-12">
                <div class="c-box">
                    <p class="c-lead"><?= get_field('acf_header_lead');?></p>
                </div>
            </div>
        </div>
        <?php if(!empty(get_field('alert_text'))): ?>
        <div class="c-row">
            <div class="c-col-12">
                <div class="c-box">
                    <p class="c-alert"><a class="c-icon c-link-icon c-link-arrow" href=""><?= get_field('alert_text');?></a></p>
                </div>
            </div>
        </div>
        <?php endif;?>


        <?php
        // Get News
        $args = array(
            'post_type'      => 'post', // Can be 'post', 'page', or any custom post type
            'posts_per_page' => 1,      // Limit to 1 post
            'orderby'        => 'date', // Order by date
            'order'          => 'DESC', // Latest post first
        );

        $latest_posts = get_posts( $args );

        if( $latest_posts ):
        $news = $latest_posts[0]?>
        <div class="c-row c-margin-bottom">
            <div class="c-col-12">
                <h2><?= __('News','neofluxe');?></h2>
            </div>

            <div class="c-col-6">
                <?= get_the_post_thumbnail( $news,'full' );?>
            </div>

            <div class="c-col-6 c-teaser-home">
                <h3 class="c-title-small"><?= get_the_title( $news );?></h3>
                <span class="c-lead-small"><?= get_field('lead',$news);?></span>
                <div class="c-teaser-text">
                    <?= get_field('text',$news); ?>
                </div>
            </div>
        </div>
        <?php endif;?>

</div>