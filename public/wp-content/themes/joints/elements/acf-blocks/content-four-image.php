<?php
/**
 * Block Name: 4-Image
 *
 * This is the template that displays 4 images in a block.
 */

// the fields
$fields = get_fields();

// write data to console for debugging purposes
console_log(__FILE__, $fields);

if ($fields['ne_kamp_type'] !== false) {
    $ne_kamp = get_kamp_type($fields['ne_kamp_type'])[0];
}
if ($fields['se_kamp_type']  !== false) {
    $se_kamp = get_kamp_type($fields['se_kamp_type'])[0];
}
if ($fields['nw_kamp_type'] !== false) {
    $nw_kamp = get_kamp_type($fields['nw_kamp_type'])[0];
}
if ($fields['sw_kamp_type']  !== false) {
    $sw_kamp = get_kamp_type($fields['sw_kamp_type'])[0];
}

?>

<div class="multi-image-block-container background-blue-container container-padding-small">
    <div class="background-blue-container-triangle"></div>
    <div class="grid-x grid-container padding-bottom-70 mobile-padding-bottom-30">
        <h2 class="secondary white cell small-12 text-center">
            <?php echo $fields['title']; ?>
        </h2>
    </div>
    <div class="grid-x grid-container multi-image-block-content-container">
        <div class="cell small-12 medium-6 multi-image-block-section-container has-hover block-1">
            <img src="<?php echo $fields['nw_image']['url']; ?>" />
            <div class="multi-image-block-image-overlay-container">
                <p class="large-sub-text white bold">
                    <?php echo $fields['nw_body']; ?>
                </p>
            </div>
            <div class="title-overlay flex-container justify-space-between align-center <?php echo $nw_kamp['icon_name'] ? 'kamp-' . $nw_kamp['icon_name'] : 'kamp-overnight'; ?>">
                <h1 class="white title-overlay-title">
                    <?php echo $fields['nw_text']; ?>
                </h1>
                <i class="icon <?php echo $nw_kamp['icon_name'] ? 'icon-' . $nw_kamp['icon_name'] : ''; ?> white kamp-icon"></i>
                <a class="white learn-more-link" href="<?php echo $fields['nw_url']; ?>">Learn More <i class="white icon icon-caret-large-right medium"></i></a>
            </div>
        </div>
        <div class="cell small-12 medium-6 multi-image-block-section-container has-hover block-2">
            <img src="<?php echo $fields['ne_image']['url']; ?>" />
            <div class="multi-image-block-image-overlay-container">
                <p class="large-sub-text white bold">
                    <?php echo $fields['ne_body']; ?>
                </p>
            </div>
            <div class="title-overlay flex-container justify-space-between align-center <?php echo $ne_kamp['icon_name'] ? 'kamp-' . $ne_kamp['icon_name'] : 'kamp-day'; ?>">
                <h1 class="white title-overlay-title">
                    <?php echo $fields['ne_text']; ?>
                </h1>
                <i class="icon <?php echo $ne_kamp['icon_name'] ? 'icon-' . $ne_kamp['icon_name'] : ''; ?>  white kamp-icon"></i>
                <a class="white learn-more-link" href="<?php echo $fields['ne_url']; ?>">Learn More <i class="white icon icon-caret-large-right medium"></i></a>
            </div>
        </div>
        <div class="cell small-12 medium-6 multi-image-block-section-container has-hover block-3">
            <img src="<?php echo $fields['sw_image']['url']; ?>" />
            <div class="multi-image-block-image-overlay-container">
                <p class="large-sub-text white bold">
                    <?php echo $fields['sw_body']; ?>
                </p>
            </div>
            <div class="title-overlay flex-container justify-space-between align-center <?php echo $sw_kamp['icon_name'] ? 'kamp-' . $sw_kamp['icon_name'] : 'kamp-family'; ?>">
                <h1 class="white title-overlay-title">
                    <?php echo $fields['sw_text']; ?>
                </h1>
                <i class="icon <?php echo ($sw_kamp['icon_name']) ? 'icon-' . $sw_kamp['icon_name'] : ''; ?> white kamp-icon"></i>
                <a class="white learn-more-link" href="<?php echo $fields['sw_url']; ?>">Learn More <i class="white icon icon-caret-large-right medium"></i></a>
            </div>
        </div>
        <div class="cell small-12 medium-6 multi-image-block-section-container has-hover block-4">
            <img src="<?php echo $fields['se_image']['url']; ?>" />
            <div class="multi-image-block-image-overlay-container">
                <p class="large-sub-text white bold">
                    <?php echo $fields['se_body']; ?>
                </p>
            </div>
            <div class="title-overlay flex-container justify-space-between align-center <?php echo $se_kamp['icon_name'] ? 'kamp-' . $se_kamp['icon_name'] : 'kamp-specialty'; ?>">
                <h1 class="white title-overlay-title">
                    <?php echo $fields['se_text']; ?>
                </h1>
                <i class="icon <?php echo $se_kamp['icon_name'] ? 'icon-' . $se_kamp['icon_name'] : ''; ?>  white kamp-icon"></i>
                <a class="white learn-more-link" href="<?php echo $fields['se_url']; ?>">Learn More <i class="white icon icon-caret-large-right medium"></i></a>
            </div>
        </div>
    </div>
</div>