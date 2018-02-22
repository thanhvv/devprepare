<article @php(post_class())>
  <header>
    <?php
    $search = new Search();
    ?>
  </header>
  <div class="entry-summary">
    <?php
    foreach ($search->displaySearch(get_search_query()) as $key => $value) {
      echo "<a href=".get_permalink($value->ID).">".$value->post_title."</a></br>";
    }
    ?>
  </div>
</article>
