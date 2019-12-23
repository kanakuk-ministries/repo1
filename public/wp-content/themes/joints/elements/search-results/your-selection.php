<?php // if no kamp has been selected ?>
<?php if (!isset($registration['event_id']) || empty($registration['event_id'])) : ?>

    <div class="cell medium-9">
        <p class="bold dark-blue margin-bottom-0 italic">Please select a Kamp from the list below</p>
    </div>

<?php // if a kamp has been selected ?>
<?php else : ?>

    <?php
    $match = null;
    // find the selected kamp event
    foreach ($kamps as $kamp_name => $kamp_details) {
        foreach ($kamp_details['circuitree'] as $kamp) {
            if ($kamp['EventDivisionID'] == $registration['event_id']) {
                $match = $kamp;
                break;
            }
        }
    }
    ?>

    <div class="cell medium-9 search-selection-data-container">
        <div class="margin-right-50">
            <p class="dark-blue margin-bottom-0"><?php echo $match['KampName']; ?></p>
        </div>
        <div class="margin-right-50 show-for-medium">
            <p class="dark-blue margin-bottom-0">
                <?php echo $match['Weeks'] > 1 ? $match['Weeks'] . ' Weeks' : '1 Week'; ?>
            </p>
        </div>
        <div class="margin-right-50">
            <p class="dark-blue margin-bottom-0">
                <?php echo date('M j', strtotime($match['BeginDate'])); ?>
                 - 
                <?php echo date('M j, Y', strtotime($match['EndDate'])); ?>
            </p>
        </div>
        <div class="margin-right-50 show-for-medium">
            <p class="dark-blue margin-bottom-0"><?php echo $match['CityState']; ?></p>
        </div>
        <div class="margin-right-50">
            <p class="dark-blue margin-bottom-0">$<?php echo number_format($match['EventDivisionPrice'], 0); ?></p>
        </div>
    </div>

<?php endif; ?>
