<?php
/** @var array $site_element */
$counter    = 0;
$teams = apply_filters( 'get_post_listings', $site_element);
?>
<div id="team" class="c-container-wide c-container-postlisting">
    <div class="c-teaser-posts large color c-text-block" style="background-color:#F2F2F2;">
        <div class="c-container">

            <h2><?= $site_element['title'];?></h2>
            <p><?= $site_element['lead'];?></p>
            <div class="c-row c-team-list">
            <?php foreach ( $teams as $team ): ?>
                <div class="c-col-3">
                    <div class="c-team-item c-text-block">
                        <figure class="">
                        <?php
                        $attachment_id = get_post_thumbnail_id( $team->ID ); 
                        echo wp_get_attachment_image($attachment_id,'full'); 
                        ?>
                        </figure>
                        <h3><?= $team->post_title; ?></h3>
                        <span class="c-lead"><?= get_field('job_position',$team);?></span>
                        <?= get_field('description',$team);?>
                    </div>
                </div>
            <?php endforeach;?>
            </div>
        </div>
    </div>
</div>