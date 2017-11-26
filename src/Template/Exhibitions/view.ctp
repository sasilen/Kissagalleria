<?php
/**
  * @var \App\View\AppView $this
  * @var \Cake\Datasource\EntityInterface $exhibition
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exhibition'), ['action' => 'edit', $exhibition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exhibition'), ['action' => 'delete', $exhibition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exhibition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exhibitions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exhibition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="exhibitions view large-9 medium-8 columns content">
    <h3><?= h($exhibition->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cat') ?></th>
            <td><?= $exhibition->has('cat') ? $this->Html->link($exhibition->cat->name, ['controller' => 'Cats', 'action' => 'view', $exhibition->cat->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($exhibition->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= h($exhibition->place) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ems') ?></th>
            <td><?= h($exhibition->ems) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Class') ?></th>
            <td><?= h($exhibition->class) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Result') ?></th>
            <td><?= h($exhibition->result) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Judge') ?></th>
            <td><?= h($exhibition->judge) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($exhibition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($exhibition->date) ?></td>
        </tr>
    </table>
</div>
