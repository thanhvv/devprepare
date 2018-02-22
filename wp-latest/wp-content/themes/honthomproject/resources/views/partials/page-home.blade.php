<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
  <div>
    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="Search" />
  </div>
</form>
<?php
$partner = new Partner();
echo "Đối tác GreenGlobal";
foreach ($partner->displayPartner() as $value) {
  echo '<br>'.$value->post_title.'<br>';
}
 ?>
