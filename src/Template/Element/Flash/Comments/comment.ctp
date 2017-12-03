<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert <?= $params['class'] ?? ' alert-success' ?>" onclick="this.classList.add('hidden');"><?= $message ?></div>
