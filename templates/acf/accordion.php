<div class="c-container-wide c-accordion">
    <h2><?= $site_element['title'] ?></h2>
    <?php 
    $counter = 0;
    foreach( $site_element['questions'] as $qanda ):?>
        <div class="c-accordion-container">
            <input class="c-accordion-check" id="ac-<?= sanitize_title($site_element['title']);?>-<?= $counter; ?>" name="accordion-<?= sanitize_title($site_element['title']);?>-<?= $counter; ?>" type="checkbox">
            <label for="ac-<?= sanitize_title($site_element['title']);?>-<?= $counter; ?>"><?= $qanda['question'];?></label>
            <div class="c-accordion-content">
            <?= $qanda['answer'];?>
            </div>
        </div>
    <?php 
        $counter++;
    endforeach;?>
</div>