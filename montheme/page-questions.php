<?php
/*
Template name: Question
*/

get_header();
get_template_part('sidebar'); ?>


<h1>Create a quizz</h1>

<form action="" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">CREATE A QUESTION</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="reponse">
    </div>
    <button type="submit" class="btn btn-primary">CREATE QUIZZ</button>
</form>

<?php

global $wpdb;
if (empty($_POST['reponse'])) {
    echo null;
} else if (isset($_POST['reponse'])) {

    $insert = $_POST['reponse'];
    if ($insert !== '') {
        $sql = $wpdb->prepare('INSERT INTO wp_question (question) VALUES (\'' . $insert . '\');');

        $wpdb->query($sql);
    }
}

// $table = "question"

$results = $wpdb->get_results("SELECT * FROM wp_question");

if (isset($results)) {
    foreach($results as $result){
        echo $result->question . "</br>";
    }

} else if (empty($results)) {
    echo null;
}


?>

<?php get_template_part('Wordpress') ?>
<?php get_template_part('content') ?>
<?php get_footer() ?>