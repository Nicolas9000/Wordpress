<?php

/* 
Plugin Name: League Of Legend
Puglin URI: http://my_league_of_legend_puglin.com
Description: Puglin pour league of legend
Version: 6.0
Author: Nicolas
*/

function league_of_legend()
{
    add_menu_page(
        'Puglins',
        'My Plugin',
        'manage_options',
        'league_of_legend',
        'league_of_legend_main',
        plugins_url('myplugin/images/icon.png'),
        65
    );
}

add_action('admin_menu', 'league_of_legend');

function league_of_legend_main()
{
    global $wpdb;

    echo '<form action="" method="POST">
    <label for"add">Add table : </label>
    <input type="text" id="add" name="add">
    <label for"param">Add param : </label> 
    <input type="text" id="param" name="param">
    <button type="submit">Add</button>
    </form>';

    if (empty($_POST["add"]) || empty($_POST['param'])) {
        echo null;
    } else if (isset($_POST["add"]) || isset($_POST['param'])) {

        $post = "wp_" . $_POST["add"];
        $param = $_POST["param"];

        $sql = $wpdb->prepare("CREATE TABLE IF NOT EXISTS $post ($param);");

        $wpdb->query($sql);
    }


    $query = $wpdb->get_results('SHOW TABLES');

    foreach ($query as $mytable) {

        echo "<form method='POST'> <p>" . $mytable->Tables_in_wordpress . "</p>
             <button value='$mytable->Tables_in_wordpress' name='$mytable->Tables_in_wordpress' type='submit'>Delete</button>
            </form>";

        if (empty($_POST[$mytable->Tables_in_wordpress])) {
            
            echo null;

        } else if (isset($_POST[$mytable->Tables_in_wordpress])) {

            $mytable = $_POST[$mytable->Tables_in_wordpress];

            $sql = $wpdb->prepare("DROP TABLE $mytable");

            $wpdb->query($sql);
        }
    }

}
