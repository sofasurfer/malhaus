
<div class="c-container c-main-title">
	<div class="c-row">
		<div class="c-col-<?= get_field('acf_header_image_desktop') ? '8': '12'; ?>">
			<div class="c-box">
				<h1><?= get_field('acf_header_title');?></h1>
				<p class="c-lead"><?= get_field('acf_header_lead');?></p>
			</div>
		</div>
		<?php if(get_field('acf_header_image_desktop')): ?>
		<div class="c-col-4">
			<div class="c-box">
				<?= wp_get_attachment_image( get_field('acf_header_image_desktop') ); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>