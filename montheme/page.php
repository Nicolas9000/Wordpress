<?php get_header() ?>
<?php 
$a = 1;
if($a == 1){
get_template_part('sidebar');
}
?>

<div class="container">
    <div class="row">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo get_bloginfo('titre'); ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo get_bloginfo('description'); ?></h6>
            <p class="card-text"><?php echo the_content(); ?></p>
        </div>
        </div>
    </div>
</div>

<?php get_template_part('Wordpress') ?>
<?php get_template_part('content') ?>
<?php get_footer() ?>