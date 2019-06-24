<?php
/**
 * Block Name: Testimonial
 *
 * This is the template that displays the testimonial block.
 */

// the fields
$fields = get_fields();

// write data to console for debugging purposes
console_log(__FILE__, $fields);
?>

<div id="testimonial-block-container" class="simple-text-block-container background-image-container testimonial-block-container"
    <?php if ($fields['animation']) { ?>
        data-parallax="scroll" data-bleed="200" data-image-src="<?php echo $fields['background_image']['url']; ?>"
    <?php } else{ ?>
        style="background-image: url(<?php echo $fields['background_image']['url']; ?>)"
    <?php } ?>
    >
    <div class="grid-container grid-x">
        <div class="blue-overlay-content-container cell small-12">
            <div class="cell padding-bottom-50 mobile-padding-bottom-20">
                <h1 class="display white text-center testimonial-title">
                    <?php echo $fields['title']; ?>
                </h1>
            </div>
            <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-pause-on-hover="true" data-auto-play="false">
                <div class="orbit-wrapper">
                    <div class="orbit-controls <?php if (!count((array) $fields['testimonials'])> 1): echo 'hide';endif?>">
                        <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
                        <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
                    </div>
                    <ul class="orbit-container">
                        <?php foreach ($fields['testimonials'] as $key => $value): ?>
                        <li class="orbit-slide text-left">
                            <?php if (empty($fields['background_image']['url'])) :?>
                                <?php if(empty($value['video'])): ?>
                                    <div class="testimonial-image-container">
                                        <img class="testimonial-image" src="<?php echo $value['feature_image']['url']; ?>" />
                                    </div>
                                <?php else: ?>
                                    <div class="custom-video-container video-modal testimonial-image-container <?php echo $key; ?>">
                                        <div class="custom-video-container modal-embed-container video-center">
                                            <video controls id="testimonial-video-<?php echo $key; ?>" class="basic-video custom-video" poster=<?php echo $value['feature_image']['url']; ?>>
                                                <source src=<?php echo $value['video']; ?> type="video/mp4">
                                                <p>Your browser doesn't support HTML5 video. Here is
                                                a <a href=<?php echo $value['video']; ?>>link to the video</a> instead.</p>
                                            </video>
                                            <div id="testimonial-video-controls-<?php echo $key; ?>" class="controls custom-video-controls" data-state="hidden">
                                                <button data-key="<?php echo $key; ?>" id="playpause-<?php echo $key; ?>" type="button" data-state="play"></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="flex-container">
                                <i class="white icon large icon-quote-copy align-flex-start margin-right-25"></i>
                                <div class="text-left">
                                    <p class="white italic large-sub-text">
                                        <?php echo $value['quote']; ?>
                                    </p>
                                    <p class="white margin-top-20">
                                        <span class="bold medium-sub-text">&mdash;
                                            <?php echo $value['author']; ?></span>
                                        <?php if (!(empty($value['location']))) : ?>
                                        <span class="medium-sub-text"> •
                                            <?php echo $value['location']; ?></span>
                                        <?php endif; ?>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var testimonials = <?php echo json_encode($fields['testimonials']); ?>;
</script>