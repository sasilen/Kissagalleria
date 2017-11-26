<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Breeders'), ['controller' => 'Breeders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Breeder'), ['controller' => 'Breeders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blog Posts'), ['controller' => 'BlogPosts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blog Post'), ['controller' => 'BlogPosts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blogs'), ['controller' => 'Blogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blog'), ['controller' => 'Blogs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Commentsold'), ['controller' => 'Commentsold', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Commentsold'), ['controller' => 'Commentsold', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vets'), ['controller' => 'Vets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vet'), ['controller' => 'Vets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('role');
            echo $this->Form->control('last_visit', ['empty' => true]);
            echo $this->Form->control('city');
            echo $this->Form->control('url');
            echo $this->Form->control('text');
            echo $this->Form->control('active');
            echo $this->Form->control('occupation');
            echo $this->Form->control('hide_email');
            echo $this->Form->control('passwordrq');
            echo $this->Form->control('usergroup_id');
            echo $this->Form->control('breeder_id', ['options' => $breeders, 'empty' => true]);
            echo $this->Form->control('status');
            echo $this->Form->control('signature');
            echo $this->Form->control('locale');
            echo $this->Form->control('timezone');
            echo $this->Form->control('totalPosts');
            echo $this->Form->control('totalTopics');
            echo $this->Form->control('currentLogin', ['empty' => true]);
            echo $this->Form->control('lastLogin', ['empty' => true]);
            echo $this->Form->control('email_verified');
            echo $this->Form->control('email_token');
            echo $this->Form->control('email_token_expires', ['empty' => true]);
            echo $this->Form->control('password_token');
            echo $this->Form->control('last_login', ['empty' => true]);
            echo $this->Form->control('cats._ids', ['options' => $cats]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
