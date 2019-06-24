<?php
/**
 * Block Name: Kamp Card
 *
 * This is the template that displays camp information inline.
 */

// get the WP_Post Object ID
$kamp_id = get_field('kamp');

// the fields
$fields = get_fields($kamp_id);
// write data to console for debugging purposes
console_log(__FILE__, $fields);
?>

<div class="grid-container kamp-card-container">
    <div class="card has-hover-scale kamp-card <?php echo $fields['kamp_type']->post_name ?>">
        <div class="card-section kamp-card-text-section">
            <div class="flex-container card-section-header">
                <h3 class="dark-blue margin-bottom-0 margin-top-5">
                    <?php echo $fields['kamp_title']; ?>
                </h3>
                <div class="flex-container card-section-header-right">
                    <div class="flex-container flex-column justify-flex-start margin-right-70">
                        <p class="uppercase card-label-text dark-gray">Age</p>
                        <h5 class="dark-blue margin-bottom-0">
                            <?php echo $fields['min_age'] . ' - ' . $fields['max_age']; ?>
                        </h5>
                    </div>
                    <div class="flex-container flex-column">
                        <p class="uppercase card-label-text dark-gray">Term Length</p>
                        <h5 class="dark-blue margin-bottom-0">
                            <?php
                                echo ($fields['term_lengths'][0]);
                                if ((count($fields['term_lengths']) > 1)) :
                                    echo ' & ' . end($fields['term_lengths']);
                                endif;
                                echo '-Week';
                            ?>
                        </h5>
                    </div>
                </div>
            </div>
            <p>
                <?php echo $fields['teaser_text']; ?>
            </p>
            <div class="kamp-card-button-container">
                <!-- <a href="/search-results" class="large button">View Terms</a> -->
                <a href="/<?php echo $fields['kamp_page']->post_name; ?>" class="large button hollow">Learn More</a>
            </div>
        </div>
        <div class="media-container small" style="background-image: url(<?php echo $fields['card_image']['url']; ?>)">
        </div>
    </div>
</div>