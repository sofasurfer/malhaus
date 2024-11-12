<?php
/** @var array $site_element */
$fields  = $site_element;
$content = $fields['wysiwyg'];
?>

<div class="c-container-wide c-container-postlisting">
    <div class="c-teaser-posts c-text-block <?= $site_element['bgcolor'] ? 'color':'';?>" style="background-color:<?= $site_element['bgcolor'];?>;">
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

            <div class="c-row ">
                <!--
                <div class="c-col-6">
                        <a class="c-btn" href="https://donate.raisenow.io/bkdjx" target="_blank">Spenden</a>
                    <div id="rnw-paylink-button-bkdjx"></div>
                    <script type="module">
                    import {PaylinkButton} from "https://unpkg.com/@raisenow/paylink-button@2/dist/PaylinkButton.js"
                    PaylinkButton.render("#rnw-paylink-button-bkdjx", {
                        "solution-id": "bkdjx",
                        "size": "large",
                        "width": "fixed",
                        "icon": "heart",
                        "label": "Spenden",
                        "border-radius": "8px",
                        "background-color": "#0718f9",
                    })
                    </script>
                </div>
                -->
                <div class="c-col-12">
                    <div id="rnw-paylink-button-drydk"></div>

                    <script type="module">

                    import {TwintButton} from "https://unpkg.com/@raisenow/paylink-button@2/dist/TwintButton.js"

                    TwintButton.render("#rnw-paylink-button-drydk", {
                        "solution-id": "drydk",
                        "solution-type": "donate",
                        "language": "de",
                        "size": "medium",
                        "width": "fixed",
                        "color-scheme": "dark",
                        "target": "_blank"
                    })

                    </script>
                </div>  
            </div>
		</div>
	</div>
</div>