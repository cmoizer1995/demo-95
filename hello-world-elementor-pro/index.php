<?php get_header(); ?>

<?php
$enable_sidebar = get_theme_mod('hello_sidebar_enable', 'yes');
$position = get_theme_mod('hello_sidebar_position', 'right');
$placement = get_theme_mod('hello_sidebar_placement', 'under-header');
?>

<div class="layout <?php echo esc_attr($position); ?>">

<?php if ($enable_sidebar === 'yes' && $placement === 'under-header') get_sidebar(); ?>

<main class="content">
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();

        if ( trim( get_the_content() ) != '' ) {
            the_content();
        } else {
            echo '<h1>' . get_the_title() . '</h1>';
            for ($i = 0; $i < 5; $i++) {
                echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>';
            }
        }

    endwhile;
endif;
?>
</main>

<?php if ($enable_sidebar === 'yes' && $placement === 'above-footer') get_sidebar(); ?>

</div>

<?php get_footer(); ?>
