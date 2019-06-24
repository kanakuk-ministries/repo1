<?php
// should we show the REGISTER NOW button?
// are all registrations in the session assigned to events?
$register_now_disabled = false;
foreach ($registrations as $r) {
    if (!isset($r['event_id']) || !$r['event_id']) {
        $register_now_disabled = true;
    }
}
?>

<?php if ($register_now_disabled) : ?>
    <div class="search-results-register-button-container disabled" data-toggle="register-now-button-tooltip">
        <button class="button white hollow borderless">REGISTER NOW</button>
        <i class="icon white large icon-caret-large-right show-for-medium"></i>
    </div>
<?php else : ?>
    <div class="search-results-register-button-container">
        <form action="/wp-admin/admin-post.php" method="post">
            <input type="hidden" name="action" value="kan_register" />
            <button class="button white hollow borderless">REGISTER NOW</button>
        </form>
        <i class="icon white large icon-caret-large-right show-for-medium"></i>
    </div>
<?php endif; ?>

