</script>
<?php

use Cake\I18n\Date;
use Thumber\Utility\ThumbCreator;

/**
  * @var \App\View\AppView $this
  * @var \Cake\Datasource\EntityInterface $cat
  */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cat'), ['action' => 'edit', $cat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cat'), ['action' => 'delete', $cat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Breeds'), ['controller' => 'Breeds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Breed'), ['controller' => 'Breeds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blog Posts'), ['controller' => 'BlogPosts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog Post'), ['controller' => 'BlogPosts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blogs'), ['controller' => 'Blogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog'), ['controller' => 'Blogs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exhibitions'), ['controller' => 'Exhibitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exhibition'), ['controller' => 'Exhibitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->
<div class="container">
    <h1 class="mt-4 mb-3"><?= h($cat->breeder) ?> <?= h($cat->name) ?>
<!--      <small>small</small> -->
    </h1>
    <ol class="breadcrumb">
 			  <li class="breadcrumb-item"><?= $this->Html->link(__('Cats'), ['plugin' => 'Kissagalleria', 'controller' => 'Cats', 'action' => 'index']); ?>
        <li class="breadcrumb-item"><?= $cat->has('breed') ? $this->Html->link($cat->breed->name, ['plugin'=>'Kissagalleria','controller'=>'Cats','action' => 'index','breed' => $cat->breed->id]) : '' ?></li>
        <li class="breadcrumb-item"><?= $cat->has('breeder') ? $this->Html->link($cat->breeder, ['plugin'=>'Kissagalleria','controller'=>'Cats','action' => 'index','breeder' => $cat->breeder]) : '' ?></li>
        <li class="breadcrumb-item active"><?= h($cat->name); ?> </li>
				<li class="breadcrumb-item active"><?= h($cat->alias);?> </li>
    </ol>
  <!-- Portfolio Item Row -->
  <div class="row">
    <div class="col-md-8">
			<?=$this->element('galleria',array('gallery' => $cat));?>
      <?=$this->element('exhibitions');?>
    </div>
    <div class="col-md-4">
      <h3 class="my-3">Description</h3>
      <p><?= $this->Text->autoParagraph(h($cat->text)); ?></p>
          <h3 class="my-3">Details</h3>
					<table width="100%"><tr>
							<th><?= __('Breeder') ?></th><td><?= h($cat->breeder) ?></td>
						</tr><tr>
						  <th><?= __('Gender') ?></th><td><?= h($cat->gender) ?></td>
						</tr><tr>
						  <th><?= __('Alias') ?></th><td><?= h($cat->alias) ?></td>
						</tr><tr>
							<th><?= __('Color') ?></th><td><?= h($cat->color) ?></td>
						</tr><tr>
							<th><?= __('Mother') ?></th><td> <?= h($cat->motherbreeder) ?> <?= h($cat->mothername) ?></td>
						</tr><tr>
						  <th><?= __('Father') ?></th><td> <?= h($cat->fatherbreeder) ?> <?= h($cat->fathername) ?></td>
            </tr><tr>
   						<th><?= __('Bloodtype') ?></th><td><?= h($cat->bloodtype) ?></td>
            </tr><tr>
 						  <th><?= __('Ems') ?></th><td> <?= h($cat->ems) ?></td>
            </tr><tr>
              <th><?= __('Breed') ?></th><td> <?= $cat->has('breed') ? $this->Html->link('['.$cat->breed->id.'] '.$cat->breed->name, ['plugin'=>'Kissagalleria', 'controller' => 'Cats', 'action' => 'index','breed' => $cat->breed->id]) : '' ?></td>
            </tr><tr>
              <th><?= __('Castrated') ?></th><td> <?= $this->Number->format($cat->castrated) ?></td>
            </tr><tr>
              <th><?= __('Birthdate') ?></th><td> <?= h($cat->birthdate->i18nFormat('dd.MM.yyyy')) ?>
								  <?=(strtotime($cat->birthdate) < strtotime($cat->deathdate)) ? ' - '.$cat->deathdate->i18nFormat('dd.MM.yyyy') : ''; ?>
					  </tr><tr>
							<th><?= __('Age') ?></th><td>	<?=$this->Kissagalleria->getAge($cat->birthdate,$cat->deathdate)?></td>
            </tr><tr>
							<th><?= __('Owner(s)') ?></th><td>
							<?php foreach ($cat['users'] as $user) { ?>
								 <?=$this->Html->link($user['username'], array('controller'=> 'users', 'action'=>'view',$user['id']));?>
							<?php } ?></td>
						</tr>
					</table>
        </div>
      </div>
      <!-- /.row -->
    </div>
</div>
