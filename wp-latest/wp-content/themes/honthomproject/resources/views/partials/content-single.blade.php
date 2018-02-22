<article @php(post_class())>
  <header>
    <h1 class="entry-title">{{ get_the_title() }}</h1>
    @include('partials/entry-meta')
  </header>
  <div class="entry-content">
    <?php
    the_title();
    echo '</br>Tin tức khác:</br>';
    $otherNews = new News();
    foreach ($otherNews->otherNewsPost(get_the_ID()) as $value) {
      echo "<a href=".get_permalink($value->ID).">".$value->post_title."</a></br>";
    }
    ?>
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php(comments_template('/partials/comments.blade.php'))
</article>
