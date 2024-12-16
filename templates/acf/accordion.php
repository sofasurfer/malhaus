<div class="c-container c-accordion">
    <h2><?= $site_element['title'] ?></h2>
    <?php 
    $counter = 0;
    foreach( $site_element['questions'] as $qanda ):?>
        <div class="c-accordion-container">
            <input class="c-accordion-check" id="ac-<?= sanitize_title($site_element['title']);?>-<?= $counter; ?>" name="accordion-<?= sanitize_title($site_element['title']);?>-<?= $counter; ?>" type="checkbox">
            <label class="c-accordion-title c-h3" for="ac-<?= sanitize_title($site_element['title']);?>-<?= $counter; ?>"><?= $qanda['question'];?></label>
            <div class="c-accordion-content">
                <div class="c-accordion-inner c-text-block">
                    <?= $qanda['answer'];?>
                </div>
            </div>
        </div>
    <?php 
        $counter++;
    endforeach;?>
</div>