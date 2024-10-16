<?php
/** @var array $site_element */
$counter    = 0;
$posts = apply_filters( 'get_post_listings', $site_element);
?>
<div class="c-container-wide c-container-postlisting">
	
	<?php foreach ( $posts as $post ) {
		$title      = $post->post_title;
		$lead       = get_field('lead',$post);
		$text       = get_field('text',$post);
		$color	    = get_field('bgcolor',$post);
		$clean_text = wp_strip_all_tags( $text );
		$excerpt = mb_substr( $clean_text, 0, 250);
		$image      = get_the_post_thumbnail_url($post->ID );
		$link		= get_permalink(get_option('archive_offer')) . '#'.sanitize_title($post->post_title);

		if( !empty($site_element['teaser'])  ):
		?>
		<div class="c-teaser-posts <?= ($counter % 2 == 0)?'left':'right';?>" style="background-color:<?= $color;?>;">
			<div class="c-container">
				<div class="c-row">
					<div class="c-col-4">
						<?php if (!empty($image) ): ?>
							<a href="<?= $link ?>"><figure> <img src="<?= $image; ?>" /> </figure></a>
						<?php endif; ?>
					</div>
					<div class="c-col-8">
						<a href="<?= $link ?>">
							<article class="c-news-item c-box-small  c-text-block">
								<h3><?= $title ?></h3>
								<p class="c-lead2"><?= $lead ?></p>
								<p><?= $excerpt ?></p>
							</article>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php else: ?>
			<div id="<?= sanitize_title($title);?>" class="c-teaser-posts large" style="background-color:<?= $color;?>;">
			<div class="c-container">
			<div class="c-row">
				<div class="c-col-4">
					<?php if (!empty($image) ): ?>
						<figure> <img src="<?= $image; ?>" /> </figure>
					<?php endif; ?>
				</div>
				<div class="c-col-8">
					<article class="c-news-item c-box-small  c-text-block">
						<h3><?= $title ?></h3>
						<span class="c-lead"><?= $lead ?></span>
						<p><?= $excerpt ?></p>
						<div class="c-row infos">
							<?php foreach( get_field('infos',$post) as $info ): ?>
							<div class="c-col-6">
								<h4><?= $info['title'];?></h4>
								<?= $info['text'];?>
							</div>
							<?php endforeach; ?>
						</div>
					</article>
				</div>
			</div>
			</div>
			</div>
		<?php endif; ?>
		
	<?php 
		$counter++;
	} ?>
</div>