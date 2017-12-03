<?php

use Cake\I18n\Date;

/**
  * @var \App\View\AppView $this
  * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $users
  */

//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 6;
$rowCount = 0;
$bootstrapColWidth = 24 / $numOfCols;
?>
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><?= $this->Html->link(__('Users'), ['plugin' => 'Kissagalleria', 'controller' => 'Users', 'action' => 'index']); ?></li>
        <?php // $this->authLink->isAuthorized();?>
        <?= $this->AuthLink->link('['.__('My profile').']', ['plugin' => 'Kissagalleria', 'controller' => 'Users', 'action' => 'view',$this->request->session()->read('Auth.User.id')],['class'=>'float-right']); ?>

<!--      glyphicon glyphicon-edit -->
    </ol>

	<div class="row">
		<div class="col-md-8">
	    <div class="row">
			  <?php foreach ($users as $user): ?>

		    <div class="col-lg-<?php echo $bootstrapColWidth/2; ?> col-sm-<?php echo $bootstrapColWidth; ?> mb-<?php echo $bootstrapColWidth; ?>">
			    <!--  <img class="img-fluid" src="http://placehold.it/200x200" alt=""> -->
			    <?php if (isset($user['media'][0])) :
		      echo $this->Html->link($this->Kissagalleria->display($user),
  	        array('plugin'=>'Kissagalleria','controller'=>'Users','action' => 'view',$user->id),array('escape' => false));
#   	      array('class'=>'swipebox','escape'=>false)
					else :
						echo $this->Html->image('http://placehold.it/100x100');
			    endif; ?>
			    <?php echo "<br/>".$this->Html->link(substr($user->username,0,17), array('action'=>'view', $user->id)); ?>
		    </div>

		    <?php
		      $rowCount++;
		      if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
		    ?>

				<?php endforeach; ?>

	  </div>

    <div class="paginator">
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
  <div class="col-md-4">
    <?php if (isset($breeders)): ?>
      <h3><?php echo __('Cat breeders',true);?></h3>
      <table width=100%>
        <?php $i = $x = 0;
        foreach ($breeders as $breeder):
          $class = null;
          if ($i++ % 2 == 0) {
            $class = ' class="altrow"';
          }?>
          <?php if ($x==0) echo "</tr><tr".$class.">";?>
          <td>
            <?=$this->Html->link($breeder['name'],
              array('plugin'=>'Kissagalleria','controller'=>'Users','action' => 'index','breeder' => $breeder->name)); ?>
          </td>
          <?php if ($x>=0) $x=0; else $x++;?>
        <?php endforeach;?>
      </table>
    <?php endif?>

  </div>
  </div>


</div>
