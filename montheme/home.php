<?php get_header() ?>
<?php get_template_part('sidebar') ?>

<!-- <?php
if(current_user_can('administrator')){
    echo "abc";
}else{
    echo "efg";
}
?> -->

<!-- <?php get_sidebar('monwidget'); ?> -->

<!-- <?php
if ( is_user_logged_in() ) {
    echo 'Welcome, registered user!';
} else {
    echo 'Welcome, visitor!';
}
?> -->

<div>
    <div id="first">
        <h1><?php echo get_bloginfo('titre'); ?></h1>

        <h5>slogan : <?php echo get_bloginfo('description'); ?></h5>
    </div>

    <?php if (have_posts()) : ?>
        <div id="home_post">
            <?php while (have_posts()) : the_post(); ?>
                <div id="post">
                    <h3><?php the_title() ?></h3>
                    <p><?php the_content() ?></p>
                </div>
            <?php endwhile ?>
        </div>
    <?php else : ?>
        <h1>Rien</h1>
    <?php endif; ?>
</div>
<?php get_footer() ?>

