<?php

class MyWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('my_widget', 'Mon Widget');
    }

    public function widget($args, $instance)
    {
?>

        <form action="" method="POST">
            <label for="<?= $this->get_field_id('question') ?>"></label>
            <button class="widfat" type="submit" id="<?= $this->get_field_name('question')?>"  name="<?= $this->get_field_name('question')?>">Je préfère poser les questions</button>
        </form>

        <form>
        <label for="<?= $this->get_field_id('réponse') ?>"></label>
            <button class="widfat" type="submit" id="<?= $this->get_field_name('réponse')?>"  name="<?= $this->get_field_name('réponse')?>">Je préfère donner les réponses</button>
        </form>

<?php

    }

    public function form($instance)
    {
    }

    public function update($newInstance, $oldInstance)
    {
        return [];
    }
}
