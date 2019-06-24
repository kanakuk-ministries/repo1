<?php
$colors = ['#003ca6', '#F5B428', '#EA502E', '#00BAC9'];
?>
<div class="grid-container">


<ul class="accordion list-grid-accordion-container" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true">
<?php if( have_rows('accordion_content') ): ?>

  <?php while( have_rows('accordion_content') ): the_row();

    // vars
    $title = get_sub_field('title');
    $text = get_sub_field('text');

    $bgcolor = $colors[get_row_index() % 4];
    ?>

<li class="accordion-item" data-accordion-item>
      <!-- Accordion title -->
      <a href="#" class="accordion-title list-grid-accordion-title-container" style="background-color: <?php echo $bgcolor; ?>">
        <div class="accordion-title-icon-container"><i class="icon large white"></i></div>
        <div class="accordion-title-text-container">
          <h4 class="white list-grid-accordion-title-header"><?php echo $title; ?></h4>
        </div>
      </a>


      <ul class="accordion-content" data-tab-content>
      <?php if( have_rows('accordion_item') ): ?>
      <?php while( have_rows('accordion_item') ): the_row(); ?>
        <div class="list-grid-section-container">
          <div class="flex-container align-center list-grid-section-sub-header-container">
            <h4 class="margin-bottom-0 margin-top-15">
              <?php the_sub_field('subtitle'); ?>
            </h4>
            <div class="list-grid-section-sub-header" style="background-color: <?php echo $bgcolor; ?>"></div>
          </div>
          <div class="card">
          <div class="card-section">
            <?php the_sub_field('subcontent'); ?>
          </div>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </ul>

    </li>

  <?php endwhile; ?>
  <?php endif; ?>
  </ul>


</div>