<?php
/** @var array $site_element */
$fields  = $site_element;
$title = $fields['title'];
$content = $fields['wysiwyg'];
?>

<div  id="<?= sanitize_title($title);?>" class="c-container-wide c-container-postlisting">
    <div class="c-teaser-posts large <?= $site_element['bgcolor'] ? 'color':'';?>" style="background-color:<?= $site_element['bgcolor'];?>;">
		<div class="c-container">

		<?php if( $site_element['image'] ):?>
				<div class="c-row">
					<div class="c-col-4">
							<figure><?= wp_get_attachment_image($site_element['image_id']); ?></figure>
					</div>
					<d class="c-col-8">
					<h2><?= $title ; ?></h2>
					<?= $content ?>
					</div>
				</div>
		<?php else: ?>
			<h2><?= $title ; ?></h2>
			<?= $content ?>
		<?php endif; ?>
		</div>
	</div>
</div>