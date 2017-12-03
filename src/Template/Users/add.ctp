<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Media'), ['controller' => 'Medias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Media'), ['controller' => 'Medias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Social Accounts'), ['controller' => 'SocialAccounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Social Account'), ['controller' => 'SocialAccounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Breeders'), ['controller' => 'Breeders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Breeder'), ['controller' => 'Breeders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('token');
            echo $this->Form->control('token_expires', ['empty' => true]);
            echo $this->Form->control('api_token');
            echo $this->Form->control('activation_date', ['empty' => true]);
            echo $this->Form->control('secret');
            echo $this->Form->control('secret_verified');
            echo $this->Form->control('tos_date', ['empty' => true]);
            echo $this->Form->control('active');
            echo $this->Form->control('is_superuser');
            echo $this->Form->control('role');
            echo $this->Form->control('cats._ids', ['options' => $cats]);
            echo $this->Form->control('breeders._ids', ['options' => $breeders]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
