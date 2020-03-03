<?php
session_start();
if (isset($_SESSION['theme'])) {
  echo '<input type="hidden" id="theme" value="' . $_SESSION['theme'] . '">';
} else {
  echo '<input type="hidden" id="theme" value="light">';
}
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
    <div class="fa fa-gear">
      <div id="dropdown" class="dropdown-not-visable">
        <div class="darkmode">
          <label class="switch">
            <input id='darkmode' type="checkbox">
            <span class="slider round"></span>
          </label>
          <span class="text">Dark mode</span>
          <i class="fa fa-moon-o" aria-hidden="true"></i>
        </div>
      </div>
    </div>

  </div>
</div>