<?php

$options  = get_fields( 'options' );
$title    = $options['company']['company_title'];
$address  = $options['company']['company_address'];
$phone    = apply_filters( 'c_get_option', 'company_phone' );
$email    = apply_filters( 'c_get_option', 'company_email' );
$maplink    = apply_filters( 'c_get_option', 'company_map_link' );
$socialmedia_accounts   = apply_filters( 'c_get_option', 'socialmedia_accounts' );
?>

</main>

<footer id="footer" class="c-footer" role="contentinfo">

    <div class="c-container-wide c-container-no-padding c-footer-main">
        <div class="c-row">
            <div class="c-col-4 c-text-padding-var">
                <?= $title ?><br/>
                <?php if( !empty($maplink) ): ?>
                    <a href="<?= $maplink; ?>" target="_blank"><?= $address ?><br/></a><br/>
                <?php else: ?>
                    <?= $address ?><br/>
                <?php endif; ?>
                <a href="mailto:<?= $email ?>"><?= $email ?></a>

            </div>

            <div class="c-col-4 c-text-padding-var c-form-item">
                <?php
                $newsletter_formid      = apply_filters( 'c_get_option', 'newsletter_form' );
                echo do_shortcode('[contact-form-7 id="'.$newsletter_formid.'" title="Newsletter" ]'); 
                ?>
                <!--
                <input class="c-newsletter" type="email" placeholder="<?= __("Newsletter abonnieren","neofluxe");?>" >
                <p><a href=""><?= __("senden","neofluxe");?></a></p>
                -->
            </div>

            <div class="c-col-4 c-text-right c-text-padding-var">
                <ul class="c-footer-disclaimer-list">
                    <?php foreach($socialmedia_accounts as $account): ?>
                        <li class="page_item"><a class="" href="<?= $account['link']['url'];?>" target="_blank"><?= $account['link']['title'];?></a></li>
                    <?php endforeach; ?>
                </ul>
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu',
                        'container'      => false,
                        'menu_class'     => 'c-footer-disclaimer-list',
                    )
                ); ?>
            </div>
        </div>
    </div>

	<?= wp_footer() ?>
</footer>

<div id="cookie-notice" class="c-cookie-notice c-text-block c-text-small">
	<?= apply_filters( 'c_get_option', 'archive_cookie_message' ); ?>
</div>

<!-- cookie stuff -->
<?php 

// Add tracking code
if(isset($_COOKIE['cookiebanner_min'])) {
    echo apply_filters( 'c_get_option', 'tracking_necessary' );
}

if(isset($_COOKIE['cookiebanner_all'])) {
    echo apply_filters( 'c_get_option', 'tracking_necessary' );
    echo apply_filters( 'c_get_option', 'tracking_optional' );
}
?>
<!-- cookie stuff end -->
</body>
</html>
