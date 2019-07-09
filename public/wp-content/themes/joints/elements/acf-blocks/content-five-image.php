<?php
/**
 * Block Name: 5-Image
 *
 * This is the template that displays 5 images in a block.
 */

// the fields
$fields = get_fields();

// write data to console for debugging purposes
console_log(__FILE__, $fields);

?>

<div class="multi-image-block-container background-blue-container container-padding-small">
    <div class="background-blue-container-triangle"></div>
    <div class="grid-x grid-container padding-bottom-70 mobile-padding-bottom-30">
        <h2 class="secondary white cell small-12 text-center">
            <?php echo $fields['title']; ?>
        </h2>
    </div>

    <div class="grid-x grid-container multi-image-block-content-container">
        <div class="cell small-12 medium-6 multi-image-block-section-container mod-odd custom-img block-1">
            <img src="<?php echo $fields['nw_image']['url']; ?>" />
            <div class="title-overlay flex-container justify-space-between align-center mod-content">
                <h3 class="white title-overlay-title">
                    <?php echo $fields['nw_text']; ?>
                </h3>
                <i class="icon icon-caret-large-up white caret-icon large expand-target"></i>
                <div class=" multi-image-block-content mod-odd">
                    <i class="icon icon-caret-large-down white caret-icon large expand-target"></i>
                    <p class="uppercase white">
                        <?php echo $fields['nw_text']; ?>
                    </p>
                    <p class="large-sub-text white bold">
                        <?php echo $fields['nw_body']; ?>
                        <?php if ($fields['nw_url']): ?>                          
                        <a class="white learn-more-link underline" href="<?php echo $fields['nw_url']; ?>">Learn More</a>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="cell small-12 medium-6 multi-image-block-section-container mod-odd block-2">
            <img src="<?php echo $fields['ne_image']['url']; ?>" />
            <div class="title-overlay flex-container justify-space-between align-center mod-content">
                <h3 class="white title-overlay-title">
                    <?php echo $fields['ne_text']; ?>
                </h3>
                <i class="icon icon-caret-large-up white caret-icon large expand-target"></i>
                <div class="multi-image-block-content mod-odd">
                    <i class="icon icon-caret-large-down white caret-icon large expand-target"></i>
                    <p class="uppercase white">
                        <?php echo $fields['ne_text']; ?>
                    </p>
                    <p class="large-sub-text white bold">
                        <?php echo $fields['ne_body']; ?>
                        <?php if ($fields['ne_url']): ?>
                         <a class="white learn-more-link underline" href="<?php echo $fields['ne_url']; ?>">Learn More</a>
                         <?php endif;?>
                    </p>
                </div>
            </div>
        </div>
        <div class="cell small-12 medium-4 multi-image-block-section-container mod-odd block-3">
            <img src="<?php echo $fields['sw_image']['url']; ?>" />
            <div class="title-overlay flex-container justify-space-between align-center mod-content">
                <h3 class="white title-overlay-title">
                    <?php echo $fields['sw_text']; ?>
                </h3>
                <i class="icon icon-caret-large-up white caret-icon large expand-target"></i>
                <div class="multi-image-block-content mod-odd">
                    <i class="icon icon-caret-large-down white caret-icon large expand-target"></i>
                    <p class="uppercase white">
                        <?php echo $fields['sw_text']; ?>
                    </p>
                    <p class="large-sub-text white bold">
                        <?php echo $fields['sw_body']; ?>
                        <?php if ($fields['sw_url']): ?>
                        <a class="white learn-more-link underline" href="<?php echo $fields['sw_url']; ?>">Learn More</a>
                        <?php endif;?>
                    </p>
                </div>
            </div>
        </div>
        <div class="cell small-12 medium-8">
            <div class="grid-y" style="height: 100%">
                <div class="cell small-6 multi-image-block-section-container mod-vertical block-4">
                    <img src="<?php echo $fields['e_image']['url']; ?>" />
                    <div class="title-overlay flex-container justify-space-between align-center mod-content">
                        <h3 class="white title-overlay-title">
                            <?php echo $fields['e_text']; ?>
                        </h3>
                        <i class="icon icon-caret-large-up white caret-icon large expand-target"></i>
                        <div class="multi-image-block-content mod-odd">
                            <i class="icon icon-caret-large-down white caret-icon large expand-target"></i>
                            <p class="uppercase white">
                                <?php echo $fields['e_text']; ?>
                            </p>
                            <p class="large-sub-text white bold">
                                <?php echo $fields['e_body']; ?>
                               <?php if ($fields['e_url']): ?>
                               <a class="white learn-more-link underline" href="<?php echo $fields['e_url']; ?>">Learn More</a>
                            <?php endif;?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="cell small-6 multi-image-block-section-container block-5">
                    <img src="<?php echo $fields['se_image']['url']; ?>" />
                    <div class="title-overlay flex-container justify-space-between align-center mod-content">
                        <h3 class="white title-overlay-title">
                            <?php echo $fields['se_text']; ?>
                        </h3>
                        <i class="icon icon-caret-large-up white caret-icon large expand-target"></i>
                        <div class="multi-image-block-content mod-odd">
                            <i class="icon icon-caret-large-down white caret-icon large expand-target"></i>
                            <p class="uppercase white">
                                <?php echo $fields['se_text']; ?>
                            </p>
                            <p class="large-sub-text white bold">
                                <?php echo $fields['se_body']; ?>
                                <?php if ($fields['se_url']): ?>
                                <a class="white learn-more-link underline" href="<?php echo $fields['se_url']; ?>">Learn More</a>
                            <?php endif;?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>