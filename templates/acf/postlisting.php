<?php
/** @var array $site_element */
$counter    = 0;
$posts = apply_filters( 'get_post_listings', $site_element);
?>
<div class="c-container-wide c-container-postlisting padding-bottom">
	
	<?php foreach ( $posts as $post ) {
		if( get_post_type($post) == 'offer' ){

			$title      = $post->post_title;
			$lead       = get_field('lead',$post);
			if(empty($lead)){
				$lead       = get_field('lead_teaser',$post);
			}
			$text       = get_field('text',$post);

			$color	    = get_field('bgcolor_teaser',$post);
			if(empty($color)){
				$color       = get_field('bgcolor',$post);
			}
			if(!empty($site_element['teaser'])){
				$image      = get_field('image_teaser',$post);
			}else{
				$image = null;
			}
			if(empty($image)){
				$image       = get_field('image',$post);
			}
			if(empty($image)){
				$image       = get_post_thumbnail_id($post->ID );;
			}
			$link		= get_permalink(get_option('archive_offer')) . '#'.sanitize_title($post->post_title);
		}else{
			$title      = get_field('teaser_title',$post);
			$lead       = get_field('teaser_lead',$post);
			$text       = get_field('teaser_text',$post);
			$color	    = get_field('bgcolor',$post);
			$clean_text = wp_strip_all_tags( $text );
			$excerpt 	= mb_substr( $clean_text, 0, 250);
			$image      = get_post_thumbnail_id($post->ID );
			$link		= get_permalink($post);
		}
		if( !empty($site_element['teaser'])  ):
			if(!empty(get_field('text_teaser',$post))){
				$text       = get_field('text_teaser',$post);
			}
			if(!empty( get_field('lead_teaser',$post)) ){
				$lead       = get_field('lead_teaser',$post);
			}
		?>
		<div class="c-teaser-posts <?= ($counter % 2 == 0)?'left':'right';?>" style="background-color:<?= $color;?>;">
			<div class="c-container">
				<div class="c-row <?= ($counter % 2 == 0)?'c-row-reverse':'';?>" >
					<div class="c-col-4 c-hide-mobile">
						<?php if (!empty($image) ): ?>
							<a href="<?= $link ?>"><figure><?= wp_get_attachment_image($image, 'full'); ?></figure></a>
						<?php endif; ?>
					</div>
					<div class="c-col-8">
						<a href="<?= $link ?>">
							<article class="c-news-item c-box-small  c-text-block">
								<h3 class="c-title-small"><?= $title ?></h3>
								<p class="c-lead"><?= $lead ?></p>
								<p class="c-hide-mobile"><?= $text ?></p>
							</article>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php else: ?>
			<div id="<?= sanitize_title($title);?>" class="c-teaser-posts large" style="background-color:<?= $color;?>;">
			<div class="c-container c-text-block">
			<div class="c-row">
				<div class="c-col-4 c-hide-mobile">
					<?php if (!empty($image) ): ?>
						<figure> <?= wp_get_attachment_image($image, 'full'); ?> </figure>
					<?php endif; ?>
				</div>
				<div class="c-col-8">
					<article class="c-news-item c-box-small  c-text-block">
						<h3 class="c-title-small"><?= $title ?></h3>
						<p class="c-lead"><?= $lead ?></p>
						<p><?= $text ?></p>
						<div class="c-row infos">
							<?php 
							$infos = get_field('infos',$post);
							$split = ceil(count($infos) / 2);
							$leftColumn = array_slice($infos, 0, $split);
							$rightColumn = array_slice($infos, $split);?>
							<div class="c-col-6">
							<?php foreach( $leftColumn as $info ): ?>
								<h4><?= $info['title'] ? $info['title'] : '&nbsp;';?></h4>
								<?= $info['text'];?>
							<?php endforeach; ?>
							</div>
							<div class="c-col-6">
							<?php foreach( $rightColumn as $info ): ?>
								<h4><?= $info['title'] ? $info['title'] : '&nbsp;';?></h4>
								<?= $info['text'];?>
							<?php endforeach; ?>
							</div>
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
