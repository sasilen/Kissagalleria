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
	    <?php $this->Breadcrumbs->templates([
	      'wrapper' => '<ol class="breadcrumb">{{content}}</ol>',
	      'separator' => '<li{{attrs}}>{{separator}}</li>'
	    ]);
	    $this->Breadcrumbs->add(__('Users'),['plugin'=>'Kissagalleria','controller' => 'Users', 'action' => 'index'],['class'=>'breadcrumb-item']);
	    if (isset($user->breed->name)) :
  	    $this->Breadcrumbs->add($user->breed->name,['plugin'=>'Kissagalleria','controller' => 'Breeds', 'action' => 'view',$user->breed->id],['class'=>'breadcrumb-item']);
	    endif;
	    $this->Breadcrumbs->add($user->username,null,['class'=>'breadcrumb-item active']);
	    $this->Breadcrumbs->add($this->AuthLink->link($this->Html->image('Kissagalleria.ic_mode_edit_black_24px.svg'),['plugin'=>'Kissagalleria','controller'=>'Users','action' => 'edit',$user->id ],['escape'=>false,'class'=>'badge badge-info ml-1 float-right']));
	    echo $this->Breadcrumbs->render(['separator' => '/']);
			?>
  <div class="row">
    <div class="col-md-8">	

		  <!-- Portfolio Item Row -->
			<?=(!empty($user['media'])) ? $this->element('galleria',array('gallery' => $user)) : '';?>
			<?=$this->element('google728');?>

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
      <h3 class="my-3"><?= h(__('Cats'));?>
			<?php 
				if ($this->request->here == '/kissagalleria/users/view/'.$this->request->session()->read('Auth.User.id')) :
					echo $this->AuthLink->link($this->Html->image('Kissagalleria.ic_note_add_black_24px.svg'),['plugin'=>'Kissagalleria','controller'=>'Cats','action' => 'add'],['escape'=>false,'class'=>'badge badge-info ml-1 float-right']);
				endif; ?>
			</h3>
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
