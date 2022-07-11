<?php

function style_css()
{
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', false, '1.1', 'all');
    wp_enqueue_style('css', get_template_directory_uri() . '/css/nomTheme.css', array(), rand(111, 9999), 'all');
}

function script_js()
{
    wp_enqueue_script('boostrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js');
    wp_enqueue_script('script', get_template_directory_uri() . '/js/nomTheme.js', array('jquery'), '2.0.0', true);
}

require_once "widgets/widget.php";

function my_widget()
{
    register_widget(MyWidget::class);
    register_sidebar([
        'id' => 'monwidget',
        'name' => 'Sidebar Acceuil',
        'before_widget' => '<div class="p-4 %2$s" id="%1$s"',
        'before_title' => '<h4 class="font-italic">',
        'after_title' => '</h4>'
    ]);
}



add_action('wp_enqueue_scripts', 'style_css');
add_action('wp_enqueue_scripts', 'script_js');
add_action('widgets_init', 'my_widget');
