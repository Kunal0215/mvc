<!--
  * @file
  * This file contains controller for blog detailed display
-->

<?php
/**
 * Implements single blog display
 */
  class BlogControl {
    /**
     * This functions takes block id and passes to model
     * @param $id blog id to be displayed
     * @return [mixed]
     */
    function blog($id) {
      if (isset($id) && !empty($id)) {
        include('model/BLOG.php');
        $object = new BlogModel;
        $object -> blog($id);
      }
      else {
        include('view/404.php');
      }
    }
  }
?>
