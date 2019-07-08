<?php
/**
 * Block Name: SubHero
 *
 * This is the template that displays a sub hero text block below the hero.
 */

// the fields
$fields = get_fields();

// write data to console for debugging purposes
console_log(__FILE__, $fields);
?>

<div class="sub-hero-container mb-0">
    <div class="hero-sub-section text-center <?php if(empty($fields['title']) && empty($fields['subtitle'])) { echo 'empty-sub-section'; } ?>">
        <div class="grid-container">
            <p class="white hero-sub-section-text">
                <?php echo $fields['title']; ?>
            </p>
            <p class="white margin-bottom-0 hero-sub-section-requirement-text">
                <?php echo $fields['subtitle']; ?>
            </p>
        </div>
    </div>
    <div class="background-blue-container-triangle"></div>
</div>