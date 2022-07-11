<?php
/*
Template name: Response
*/

get_header();
get_template_part('sidebar'); ?>

<?php
$results = $wpdb->get_results("SELECT * FROM wp_question");

// echo "<pre>";
// var_dump($results);
// echo "</pre>";



global $wpdb;
$sql = $wpdb->prepare("CREATE TABLE IF NOT EXISTS wp_reponse (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, reponse VARCHAR(255), id_question VARCHAR(255));");

$wpdb->query($sql);

?>

<?php if ($results) : ?>
    <div class="container">
        <h5 class="card-title"> REPONDEZ AUX QUESTIONS !</h5>

        <?php foreach ($results as $result) : ?>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-text"><?php echo $result->question ?></h2>

                        <?php
                        $id = $result->id;
                        $rep = $wpdb->get_results("SELECT * FROM wp_reponse WHERE id_question like $id");
                        // var_dump($rep);
                        foreach ($rep as $reps) {
                        ?>
                            <p><?php echo $reps->reponse ?></p>
                        <?php
                        }
                        ?>

                        <form action="" method="POST">
                            <input type="text" id="reponse" name="reponse">

                            <button name="id" value="<?php echo $result->id ?>" id="id" type="submit">Reponse</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

    </div>
<?php else : ?>
    <h1>Rien</h1>
<?php endif; ?>

<?php


if (isset($_POST['reponse']) && isset($_POST['id'])) {
    $reponse = $_POST['reponse'];
    $id_question = $_POST['id'];
    $test = 'INSERT INTO wp_reponse (reponse, id_question) VALUES (\'' . $reponse . '\', ' . $id_question . ');';
    global $wpdb;
    $sql = $wpdb->prepare('INSERT INTO wp_reponse (reponse, id_question) VALUES (\'' . $reponse . '\', ' . $id_question . ');');
    $wpdb->query($sql);

    // var_dump($id_question);
}




?>
<?php get_template_part('Wordpress') ?>
<?php get_template_part('content') ?>
<?php get_footer() ?>