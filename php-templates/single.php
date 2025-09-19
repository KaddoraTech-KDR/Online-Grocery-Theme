<?php
if ( file_exists( get_template_directory() . '/php-templates/header.php' ) ) {
include get_template_directory() . '/php-templates/header.php';
}
?>


<main class="site-main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1><?php the_title(); ?></h1>
<div class="entry-meta">Published: <?php the_date(); ?></div>
<div class="entry-content">
<?php the_content(); ?>
</div>
</article>
<?php endwhile; endif; ?>
</main>


<?php
if ( file_exists( get_template_directory() . '/php-templates/footer.php' ) ) {
include get_template_directory() . '/php-templates/footer.php';
}