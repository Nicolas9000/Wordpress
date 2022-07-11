<?php $pages = get_pages(); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo get_home_url() ?>">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php foreach ($pages as $page) : ?>
        <li class="nav-item">
          <!-- <?php echo "<pre>"; ?> -->
          <!-- <?php var_dump($page->post_title); ?> -->
          <!-- <?php echo "</pre>"; ?> -->

          <?php if (is_user_logged_in()) {
            if ($page->post_title !== "Connexion" && $page->post_title !== "Inscription") {


          ?>
              <a class="nav-link" href="<?php echo get_page_link($page->ID) ?>"><?php echo $page->post_title; ?></a>

            <?php
            }
          } else {
            if ($page->post_title !== "Je préfère donner les réponses" && $page->post_title !== "Je préfère poser les questions") {
            ?>
              <a class="nav-link" href="<?php echo get_page_link($page->ID) ?>"><?php echo $page->post_title; ?></a>
          <?php
            }
          } ?>
        </li>
      <?php endforeach; ?>
      <?php
      if (is_user_logged_in()) {
      ?>
        <a class="nav-link" href="http://localhost/wordpress/index.php/?a=logout">Logout</a>
      <?php
      }
      ?>
    </ul>
  </div>
</nav>