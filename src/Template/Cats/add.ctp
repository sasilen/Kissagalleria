<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Breeds'), ['controller' => 'Breeds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Breed'), ['controller' => 'Breeds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blog Posts'), ['controller' => 'BlogPosts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blog Post'), ['controller' => 'BlogPosts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blogs'), ['controller' => 'Blogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blog'), ['controller' => 'Blogs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exhibitions'), ['controller' => 'Exhibitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exhibition'), ['controller' => 'Exhibitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cats form large-9 medium-8 columns content">
    <?= $this->Form->create($cat) ?>
    <fieldset>
        <legend><?= __('Add Cat') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('breeder');
            echo $this->Form->control('alias');
            echo $this->Form->control('number');
            echo $this->Form->control('color');
            echo $this->Form->control('gender');
            echo $this->Form->control('castrated');
            echo $this->Form->control('bloodtype');
            echo $this->Form->control('birthdate', ['empty' => true]);
            echo $this->Form->control('deathdate', ['empty' => true]);
            echo $this->Form->control('motherbreeder');
            echo $this->Form->control('mothername');
            echo $this->Form->control('mothernumber');
            echo $this->Form->control('fatherbreeder');
            echo $this->Form->control('fathername');
            echo $this->Form->control('fathernumber');
            echo $this->Form->control('date');
            echo $this->Form->control('ems');
            echo $this->Form->control('text');
            echo $this->Form->control('breed_id', ['options' => $breeds]);
            echo $this->Form->control('user_id');
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
