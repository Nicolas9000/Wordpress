<?php get_header() ?>

<?php get_template_part('sidebar') ?>
</br>
</br>
</br>
Mon titre : <?php echo get_bloginfo('titre'); ?>
</br>
Mon slogan : <?php echo get_bloginfo('description'); ?>
</br>
</br>

<?php if (have_posts()) : ?>
    <ul>
        <?php while (have_posts()) : the_post(); ?>
            <li><?php the_title() ?></li>
            <li><?php the_content() ?></li>
        <?php endwhile ?>
    </ul>
<?php else : ?>
    <h1>Pas d'info</h1>
<?php endif; ?>

<!-- <?php get_sidebar('monwidget'); ?> -->

<!-- 
<?php
if(current_user_can('administrator')){
    echo "abc";
}else{
    echo "efg";
}
?> -->

<?php get_template_part('content') ?>


<?php get_footer() ?>