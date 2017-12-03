</script>
<?php

use Cake\I18n\Date;
use Thumber\Utility\ThumbCreator;

/**
  * @var \App\View\AppView $this
  * @var \Cake\Datasource\EntityInterface $cat
  */
?>
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?= $this->Html->link(__('Users'), ['plugin' => 'Kissagalleria', 'controller' => 'Users', 'action' => 'index']); ?> 
    <!--    <li class="breadcrumb-item"><?= $user->has('breed') ? $this->Html->link($user->breed->name, ['plugin' => 'Kissagalleria', 'controller' => 'Breeds', 'action' => 'view', $user->breed->id]) : '' ?></li> -->
        <li class="breadcrumb-item active"><?= h($user->username) ?></li>
				<?php // $this->authLink->isAuthorized();?>
				<?= $this->AuthLink->link('['.__('edit').']', ['plugin' => 'Kissagalleria', 'controller' => 'Users', 'action' => 'edit',$user->id],['class'=>'float-right']); ?>
				<?= $this->AuthLink->link('['.__('Add cat').']', ['plugin' => 'Kissagalleria', 'controller' => 'Cats', 'action' => 'add'],['class'=>'float-right']); ?>

<!--			glyphicon glyphicon-edit -->
    </ol>
  <!-- Portfolio Item Row -->
  <div class="row">
    <div class="col-md-8">
			<?=(!empty($user['media'])) ? $this->element('galleria',array('gallery' => $user)) : '';?>
			<h3><?=__('Comments');?></h3>
      <ul class="comment-list">
            <?php foreach ($user->comments as $comment):
                echo $this->Comment->comment($comment);
            endforeach; ?>
        </ul>
        <!-- loadJS and display the comment Form if user is connected -->
        <?= $this->Comment->loadFormAndJS($user); ?>
		</div>
    <div class="col-md-4">
      <h3 class="my-3"><?= h(__('Cats'));?></h3>

			<table width=100%><tr>
	      <th>[<?=__('Breed');?>] <?=__('Name');?></th>
	      <th><?=__('Age');?>
	      </th></tr>
	      <?php foreach ($user['cats'] as $cat): ?>
	      <tr>
	        <?php $font=(($cat['birthdate']<$cat['deathdate']) ? '<font color=#700><i>' : '<font>'); ?>
	          <td><?=$font;?>
	            [<?=strtoupper($cat['breed_id']);?>] <?=$this->Html->link($cat['breeder']." ".$cat['name'], array('controller'=> 'cats', 'action'=>'view',$cat['id']));?>
	          </font></td>
	           <td><?=$font;?><?=$this->Kissagalleria->getAge($cat['birthdate'],$cat['deathdate'])?></small></font>
	          </td>
	      </tr>
	      <?php endforeach;?>
	    </table><br/>
	      <!-- /.row -->
    </div>
</div>
