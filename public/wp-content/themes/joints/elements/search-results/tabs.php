<ul class="tabs secondary" id="search-results-tabs">
    <?php $anon_count = 1; ?>
    <?php foreach($registrations as $index => $registration) : ?>
    <?php $is_active = $current == $index; ?>
    <li class="tabs-title tab-relative <?php echo $is_active ? 'is-active' : ''; ?>">
        <a href="/search-results?tab=<?php echo $index ?>">
            <?php 
            if (isset($registration['first_name'])) {
                echo sprintf(
                    '%s (%s) - Age %s',
                    $registration['first_name'],
                    strtoupper(substr($registration['gender'], 0, 1)),
                    $registration['age']
                ); 
            }
            else {
                echo sprintf(
                    'Child %s (%s) - Age %s',
                    $anon_count++,
                    strtoupper(substr($registration['gender'], 0, 1)),
                    $registration['age']
                ); 
            }
            ?>
            <!-- <i 
                onclick="window.location=/search-results?tab=<?php echo $current; ?>&delete=<?php echo $current; ?>" 
                class="show-for-medium icon icon-field-plus large primary tab-delete-icon"></i> -->
        </a>
        <form name="tabDelete<?php echo $current; ?>" id="tab-delete-<?php echo $current; ?>" action="/wp-admin/admin-post.php" method="post" class="tab-delete-icon-form">
            <input type="hidden" name="action" value="kan_delete_registration" />
            <input type="hidden" name="registration_index" value="<?php echo $current; ?>" />
            <button type="submit" onclick="window.location='/search-results?tab=<?php echo $current; ?>&delete=<?php echo $current; ?>'"></button>
            <i
                data-open="confirm-modal-<?php echo $current ?>"
                class="show-for-medium icon icon-field-plus large primary tab-delete-icon"></i>
        </form>
        <div class="confirm-modal tiny reveal" id="confirm-modal-<?php echo $current ?>" data-reveal>
            <p>Are you sure you want to delete this tab?</p>
            <a class="clear button float-right" data-close>
                No
            </a>
            <button class="button float-right" onclick="document.getElementById('tab-delete-<?php echo $current; ?>').submit();">
                Yes
            </button>
            <a class="close-button" data-close aria-label="Close modal">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    </li>
    <?php endforeach; ?>
    <li class="tabs-title"><a href="/" class="primary">+ New Search</a></li>
</ul>