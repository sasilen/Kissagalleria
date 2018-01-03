<?php
/**
  * @var \App\View\AppView $this
  * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $exhibitions
  */

use Cake\I18n\Date;
use Cake\View\Helper\BreadcrumbsHelper;

?>
<div class="container">

  <?php
  $this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumb">{{content}}</ol>',
    'separator' => '<li{{attrs}}>{{separator}}</li>'
  ]);
  $this->Breadcrumbs->add(__('Exhibitions'),['plugin'=>'Kissagalleria','controller' => 'Exhibitions', 'action' => 'index'],['class'=>'breadcrumb-item']);
  (!empty($judge)) ? $this->Breadcrumbs->add($judge,null,['class'=>'breadcrumb-item']) : '';
  (!empty($breed)) ? $this->Breadcrumbs->add($breed,null,['class'=>'breadcrumb-item active']) : '';
  echo $this->Breadcrumbs->render(
    ['separator' => '/']
	);
	?>

  <div class="row">
	  <div class="col-md-9">
    	<div class="row">
        <table class="table table-bordered">
        <tr>
            <th><?= $this->Paginator->sort('Cats.name'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('date'); ?></th>
            <th><?= $this->Paginator->sort('place'); ?></th>
            <th><?= $this->Paginator->sort('ems'); ?></th>
            <th><?= $this->Paginator->sort('class'); ?></th>
            <th><?= $this->Paginator->sort('result'); ?></th>
            <th><?= $this->Paginator->sort('judge'); ?></th>
<!--            <th class="actions"><?= __('Actions'); ?></th> -->
        </tr>
        <?php foreach ($exhibitions as $exhibition): ?>
        <tr>
            <td><?= h($exhibition->cat->name); ?>&nbsp;</td>
            <td><?= h($exhibition->name); ?>&nbsp;</td>
            <td><?= h($exhibition->date); ?>&nbsp;</td>
            <td><?= h($exhibition->place); ?>&nbsp;</td>
            <td><?= h($exhibition->ems); ?>&nbsp;</td>
            <td><?= h($exhibition->class); ?>&nbsp;</td>
            <td><?= h($exhibition->result); ?>&nbsp;</td>
            <td><?= h($exhibition->judge); ?>&nbsp;</td>
<!--            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $exhibition->id], ['class' => 'btn btn-sm btn-default']); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exhibition->id], ['class' => 'btn btn-sm btn-info']); ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exhibition->id], ['confirm' => __('Are you sure you want to delete # %s?', $exhibition->id), 'class' => 'btn btn-sm btn-danger']); ?>
            </td>-->
        </tr>
        <?php endforeach; ?>
        </table>
			</div>

	    <div class="paginator text-center">
        <ul class="pagination justify-content-center">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
  	  </div>
		</div>

    <div class="col-md-3">
      <?php if (isset($judges)): ?>
      <h3><?php echo __('Judges',true);?></h3>
      <table width=100%>
        <?php $i = $x = 0;
        foreach ($judges as $judge):
          $class = null;
          if ($i++ % 2 == 0) {
            $class = ' class="altrow"';
          }?>
          <?php if ($x==0) echo "</tr><tr".$class.">";?>
          <td>
            <?=$this->Html->link($judge['judge'],
              array('plugin'=>'Kissagalleria','controller'=>'Exhibitions','action' => 'index','judge' => $judge['judge'])); ?>
          </td>
          <?php if ($x>=0) $x=0; else $x++;?>
        <?php endforeach;?>
      </table>
    <?php endif?>
    </div>
	</div>
</div>

