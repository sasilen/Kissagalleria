<?php

use Cake\I18n\Date;
use Thumber\Utility\ThumbCreator;

/**
  * @var \App\View\AppView $this
  * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $cats
  */

//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 6;
$rowCount = 0;
$bootstrapColWidth = 24 / $numOfCols;
?>
<div class="container">
	<div class="row">
	<div class="col-md-8">
		<h3><?php echo __('Cats',true);?></h3>
		<div class="row">

			<?php foreach ($cats as $cat): ?>
	
				<div class="col-lg-<?php echo $bootstrapColWidth/2; ?> col-sm-<?php echo $bootstrapColWidth; ?> mb-<?php echo $bootstrapColWidth; ?>">
	  		  <!--  <img class="img-fluid" src="http://placehold.it/200x200" alt=""> -->
		    	<?php if (isset($cat['media'][0])) :
		      	echo $this->Html->link($this->Kissagalleria->display($cat),
		          array('plugin'=>'Kissagalleria','controller'=>'Cats','action' => 'view',$cat->id),array('escape' => false));
				  endif; ?>
		    	<?php echo "<br/>".$this->Html->link(substr($cat->name,0,10).'.', array('action'=>'view', $cat->id)); ?>
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
	  <?php if (isset($breeds)): ?>
    	<h3><?php echo __('Cat breeds',true);?></h3>
	    <table width=100%>
		    <?php $i = $x = 0;
		    foreach ($breeds as $breed):
		      $class = null;
		      if ($i++ % 2 == 0) {
	  	      $class = ' class="altrow"';
		      }?>
		      <?php if ($x==0) echo "</tr><tr".$class.">";?>
		      <td>
		        <?=$this->Html->link('['.$breed['id'].'] '.$breed['name']. ' ('.(isset($breed['cats'][0]) ? $breed['cats'][0]['total'] : '') .')',
							array('plugin'=>'Kissagalleria','controller'=>'Cats','action' => 'index','breed' => $breed->id)); ?>
		      </td>
		      <?php if ($x>=0) $x=0; else $x++;?>
		    <?php endforeach;?>
	    </table>
	  <?php endif?>

 	</div>
	</div>
</div>
