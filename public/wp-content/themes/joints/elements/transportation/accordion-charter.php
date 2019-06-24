<?php
$colors = ['#003ca6', '#F5B428', '#EA502E', '#00BAC9'];
$charters = kan_get_charter_availability();
?>

<div class="grid-container">
  <div class="accordion-image-grid-container margin-top-50">
    <h1 class="dark-blue">Charters</h1>

    <ul class="accordion list-grid-accordion-container" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true">
    <?php
      $index = 0;
      foreach ($charters as $key => $value): ?>
      <li class="accordion-item" data-accordion-item>
        <!-- Accordion title -->
        <a href="#" class="accordion-title list-grid-accordion-title-container" style="background-color: <?php echo $colors[$index]; ?>">
          <div class="accordion-title-icon-container"><i class="icon large white"></i></div>
          <div class="accordion-title-text-container">
            <h4 class="white list-grid-accordion-title-header"><?php echo $key; ?></h4>
            <i class="icon white large icon-info-copy"></i>
          </div>
        </a>

        <!-- Accordion content: use `is-active` state class to start in open position. -->
        <ul class="accordion-content" data-tab-content>
          <?php foreach ($value['CharterAvailabilityList'] as $i => $charter): ?>
            <div class="list-grid-section-container">
              <div class="flex-container align-center list-grid-section-sub-header-container">
                <h4 class="margin-bottom-0 margin-top-15"><?php echo $charter['DepartureCity']; ?> - $<?php echo $charter['Fee']; ?></h4>
                <div class="list-grid-section-sub-header" style="background-color: <?php echo $colors[$index]; ?>"></div>
              </div>
              <div class="card">
                <div class="card-section">
                  <p>
                    Address:
                    <?php echo $charter['AddressName']; ?>
                    <?php echo $charter['Address1']; ?>
                    <?php echo $charter['DepartureCity']; ?>,
                    <?php echo $charter['DepartureState']; ?>
                    <?php echo $charter['Zip']; ?>
                  </p>
                  <p>
                    Notes:
                    <?php echo $charter['LocationNotes']; ?>
                  </p>
                </div>
              </div>
            </div>
          <?php endforeach;?>
        </ul>
      </li>
    <?php
      if ($index === 3) {
        $index = 0;
      } else {
        $index++;
      }
      endforeach;
    ?>
  </ul>
  </div>

</div>