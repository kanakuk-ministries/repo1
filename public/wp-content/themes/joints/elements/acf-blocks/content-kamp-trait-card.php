<?php
/**
 * Block Name: Kamp Card
 *
 * This is the template that displays camp information inline.
 */

// get the WP_Post Object ID
$kamp_id = get_field('kamp');

// the fields
$fields = get_fields();
$kamp = get_fields($kamp_id);

$list_items_array = explode(',', $fields['list_items']);
// write data to console for debugging purposes
// console_log(__FILE__, $fields);
?>

<div class="grid-container kamp-trait-card-container">
    <div class="card card-with-background-image" style="background-image: url(<?php echo $fields['trait_card_image']['url']; ?>)">
        <div class="card-section">
            <div class="kamp-trait-card-top">
                <h3 class="dark-blue">
                    <?php echo $fields['title']; ?>
                </h3>
                <p class="dark-blue kamp-trait-card-description">
                    <?php echo $fields['description']; ?>
                </p>
            </div>
            <div class="kamp-trait-card-subtitle">
                <h6 class="secondary dark-blue margin-bottom-0">
                    <?php if ($fields['subtitle']): ?>
                    <?php echo $fields['subtitle'] ?>
                    <?php //else: ?>
                     
                    <?php //echo $kamp['kamp_title'] ?>
                    <?php //echo $fields['title'] ?>
                    <?php endif;?>
                </h6>
            </div>
            <div class="kamp-trait-card-bottom">
                <ul class="kamp-trait-card-list margin-bottom-20">
                    <?php foreach ($list_items_array as $key => $value): ?>
                    <li class="dark-blue kamp-trait-card-list-item">
                        <?php echo $value ?>
                    </li>
                    <?php endforeach;?>
                </ul>

                <?php if (!empty($fields['more_link']['url'])): ?>
                <a class="underline bold" href="<?php $fields['more_link']['url']?>">See more
                    <?php echo strtolower($fields['title']) ?>
                </a>
                <?php endif;?>
            </div>
        </div>
        <div class="media-container">
        </div>
    </div>
</div>