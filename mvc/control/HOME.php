<!--
  * @file
  * This file contains controller home page display
-->

<?php
/**
 * Implements homepage
 */
  class HomeControl {
    /**
     * Homepage display
     * @return [mixed]
     */
    function home() {
      include('model/HOME.php');
      $object = new HomeModel;
      $object -> home();
    }
  }
?>
