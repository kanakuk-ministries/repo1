<?php
$colors = ['#003ca6', '#F5B428', '#EA502E', '#00BAC9'];
$charters = kan_get_charter_availability();
?>

<div class="grid-container">
  <div class="accordion-image-grid-container margin-bottom-40">
    <h1 class="dark-blue">Charters</h1>

    <ul class="accordion list-grid-accordion-container" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true">
    <?php
        
       $cityBusList = [];
       foreach ($charters as $value) {
            foreach ($value['CharterAvailabilityList'] as $value) {
                array_push($cityBusList,$value);
            }
        }
        
        $charters = [];
        foreach ($cityBusList as $key => $city){
            $tempArray = array(
                'StartDate' => $city['StartDate'],
                'EndDate' => $city['EndDate'],
                'LoadTime' => $city['LoadTime'],
                'LocationNotes' => $city['LocationNotes'],
                'AddressName' => $city['AddressName'],
                'Address1' => $city['Address1'],
                'Fee' => $city['Fee'],
                'LoadDetails' => $city['LoadDetails']
            );
    
            $charters[$city['DepartureCity']]['locations'][] =  $tempArray;
        }
          $index = 0;
          foreach ($charters as $key => $value): 
      ?>
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
       		<div class="list-grid-section-container">
              <div class="flex-container align-center list-grid-section-sub-header-container">
                 <h4 class="margin-bottom-0">Location</h4>
                <div class="list-grid-section-sub-header" style="background-color: <?php echo $colors[$index]; ?>"></div>
              </div>
              <div class="cardwrapper">
              <div class="card">
                <div class="card-section">
                  <p>
                   <strong>FEE:</strong>
                    <?php echo "$".$value['locations'][0]['Fee']; ?>
                    <br/>
                    <strong>Address:</strong>
                    <?php echo $value['locations'][0]['AddressName'];"."  ?>
                     <br/>
                    <?php echo $value['locations'][0]['Address1'];"." ?>
                  </p>
                  <p>
                   <strong>Notes:</strong>
                    <?php echo $value['locations'][0]['LocationNotes']; ?>
                  </p>
                </div>
              </div>
              </div>
            </div>
            <div class="list-grid-section-container">
              <div class="flex-container align-center list-grid-section-sub-header-container">
                 <h4 class="margin-bottom-0">Dates</h4>
                <div class="list-grid-section-sub-header" style="background-color: <?php echo $colors[$index]; ?>"></div>
              </div>
          <div class="card-date-wrapper">
          <?php foreach ($value['locations'] as $location):
          
          ?>
            
              <div class="card">
                <div class="card-section">
                  <p>
                    <strong>Date:</strong>
                     <?php echo $location['StartDate']; ?>
                     <br/>
                     <strong>Time:</strong>                
                     <?php echo $location['LoadTime']; ?>
               </div>
              </div>
          <?php endforeach;?>
            </div>
            </div>
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