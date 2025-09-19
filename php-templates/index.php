<?php
// Fallback index — includes php-templates/header.php and footer.php


if ( file_exists( get_template_directory() . '/php-templates/header.php' ) ) {
include get_template_directory() . '/php-templates/header.php';
}
?>


<main class="site-main">
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="entry-meta">Published: <?php the_date(); ?> by <?php the_author(); ?></div>
<div class="entry-summary">
<?php the_excerpt(); ?>
</div>
</article>
<?php endwhile; ?>


<div class="pagination">
<?php the_posts_pagination(); ?>
</div>
<?php else: ?>
<p>No posts found.</p>
<?php endif; ?>
</main>


<?php
if ( file_exists( get_template_directory() . '/php-templates/footer.php' ) ) {
include get_template_directory() . '/php-templates/footer.php';
}