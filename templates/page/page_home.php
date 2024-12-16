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
</div>


<?php if(!empty(get_field('alert_text'))): ?>
    <div class="c-container-wide c-container-postlisting padding-bottom">
        <div class="c-teaser-posts" style="background-color:#FAF68A;padding-bottom:0px;">
            <div class="c-container">
                <div class="c-row">
                    <div class="c-col-12">
                        <div class="c-box">
                            <?php if( !empty(get_field('alert_link')) ): 
                                $link = get_field('alert_link')?>
                                <p class="c-alert"><a class="" target="<?= $link['target'];?>" href="<?= $link['url'];?>"><?= get_field('alert_text');?></a></p>
                            <?php else: ?>
                                <p class="c-alert"><?= get_field('alert_text');?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>

<div class="c-container c-main-title-img">
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

            <?php if( !empty( get_field('video_url',$news) ) ):?>
                <div class="c-col-6">
                    <div class="c-ratiobox c-ratiobox-16by9">
                        <iframe 
                            src="<?= get_field('video_url',$news);?>" 
                            frameborder="0" 
                            allow="autoplay; fullscreen; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            <?php else: ?>
                <div class="c-col-6">
                    <?= get_the_post_thumbnail( $news,'full' );?>
                </div>
            <?php endif; ?>

            <div class="c-col-6 c-teaser-home">
                <h3 class="c-title-small"><?= get_the_title( $news );?></h3>
                <p class="c-lead"><?= get_field('lead',$news);?></p>
                <div class="c-teaser-text">
                    <?= get_field('text',$news); ?>
                </div>
            </div>
        </div>
        <?php endif;?>

</div>