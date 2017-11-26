<?php
/**
  * @var \App\View\AppView $this
  * @var \Cake\Datasource\EntityInterface $media
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Media'), ['action' => 'edit', $media->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Media'), ['action' => 'delete', $media->id], ['confirm' => __('Are you sure you want to delete # {0}?', $media->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Medias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Media'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="medias view large-9 medium-8 columns content">
    <h3><?= h($media->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ref') ?></th>
            <td><?= h($media->ref) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($media->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($media->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($media->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ref Id') ?></th>
            <td><?= $this->Number->format($media->ref_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $this->Number->format($media->position) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Caption') ?></h4>
        <?= $this->Text->autoParagraph(h($media->caption)); ?>
    </div>
</div>
