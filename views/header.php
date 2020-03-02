<?php
if (!defined('LOC')) {
    die('Direct access not permitted');
}
?>

<div class="header">
  <a href="./index.php" class="logo">DDAPI</a>
  <div class="header-right">
    <a <?= LOC == 'home' ? 'class="active"' : 'class="nActive"' ?> href="./index.php">Home</a>
    <a <?= LOC == 'docs' ? 'class="active"' : 'class="nActive"' ?> href="./docs.php">DOCS</a>
    <a <?= LOC == 'db' ? 'class="active"' : 'class="nActive"' ?> href="./db.php">View DB</a>
    <a <?= LOC == 'other' ? 'class="active"' : 'class="nActive"' ?> href="./other.php">Other</a>
  </div>
</div>