<?php
/**
  * @var \App\View\AppView $this
  * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $medias
  */

//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 9;
$rowCount = 0;
$bootstrapColWidth = 10 / $numOfCols;
?>
<div class="container">
  <div class="row">
	  <div class="col-md-12">
  	  <h3><?php echo __('Media',true);?></h3>
    	<div class="row">
        <?php foreach ($medias as $media) :?>
					<div class="col-lg-<?php echo $bootstrapColWidth/2; ?> col-sm-<?php echo $bootstrapColWidth; ?> mb-<?php echo $bootstrapColWidth; ?>">
	          <!--  <img class="img-fluid" src="http://placehold.it/200x200" alt=""> -->
  	        <?php if ($this->Kissagalleria->display($media)) :
							echo $this->Html->link($this->Kissagalleria->display($media),array('plugin'=>'Kissagalleria','controller'=> explode('.',$media->ref)[1],'action' => 'view',$media->ref_id),array('escape' => false));
      	      echo "<br/>".$this->Html->link(substr($media->name,0,10).'.', array('plugin'=>'Kissagalleria','controller'=> explode('.',$media->ref)[1],'action'=>'view', $media->ref_id));
	          else :
	            echo $this->Html->image('http://placehold.it/100x100',['class'=>'img-thumbnail']);
	          endif; ?>
  	      </div>
        <?php
          $rowCount++;
          if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
        ?>

<!--
                <td><?= $this->Number->format($media->id) ?></td>
                <td><?= h($media->ref) ?></td>
                <td><?= $this->Number->format($media->ref_id) ?></td>
                <td><?= h($media->file) ?></td>
                <td><?= h($media->name) ?></td>
                <td><?= $this->Number->format($media->position) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $media->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $media->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $media->id], ['confirm' => __('Are you sure you want to delete # {0}?', $media->id)]) ?>
                </td>
            </tr> -->
       <?php endforeach; ?>
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
