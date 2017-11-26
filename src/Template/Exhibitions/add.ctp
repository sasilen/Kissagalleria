<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Exhibitions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="exhibitions form large-9 medium-8 columns content">
    <?= $this->Form->create($exhibition) ?>
    <fieldset>
        <legend><?= __('Add Exhibition') ?></legend>
        <?php
            echo $this->Form->control('cat_id', ['options' => $cats]);
            echo $this->Form->control('name');
            echo $this->Form->control('date');
            echo $this->Form->control('place');
            echo $this->Form->control('ems');
            echo $this->Form->control('class');
            echo $this->Form->control('result');
            echo $this->Form->control('judge');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
