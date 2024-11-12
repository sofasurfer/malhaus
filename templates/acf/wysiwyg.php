<?php
/** @var array $site_element */
$fields  = $site_element;
$content = $fields['wysiwyg'];
?>

<div class="c-container-wide c-container-postlisting">
    <div class="c-teaser-posts <?= $site_element['bgcolor'] ? 'color':'';?>" style="background-color:<?= $site_element['bgcolor'];?>;">
		<div class="c-container">

		<?php if( $site_element['image'] ):?>
				<div class="c-row">
					<div class="c-col-4">
							<figure><?= wp_get_attachment_image($site_element['image_id']); ?></figure>
					</div>
					<div class="c-col-8">
			<?= $content ?>
					</div>
				</div>
		<?php else: ?>
			<?= $content ?>
		<?php endif; ?>
		</div>
	</div>
</div>