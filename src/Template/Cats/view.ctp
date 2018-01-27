</script>
<?php

use Cake\I18n\Date;
use Thumber\Utility\ThumbCreator;
use Cake\View\Helper\BreadcrumbsHelper;

echo $this->Html->script('/assets/bootstrap-star-rating/js/star-rating.js', ['block' => 'scriptTop']);
echo $this->Html->css('/assets/bootstrap-star-rating/css/star-rating.css',['block' => 'cssTop']);
echo $this->Html->scriptBlock("
;(function($) {
	$(function() {
		$('#star_1').rating({
			filledStar: '<i class='fa fa-star'></i>',
			emptyStar: '<i class='fa fa-star-o'></i>',
			showClear: false,
			showCaption: false,
			size:'xs',
			step: 1
		});
		$('#star_1').on('rating:change', function(event, value, caption) {
			$('#starelement_1').val(value);
		}).hide();
	});
})(jQuery);",['block'=>true]);

/**
  * @var \App\View\AppView $this
  * @var \Cake\Datasource\EntityInterface $cat
  */
?>
<div class="container">

<?php
	$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumb">{{content}}</ol>',
    'separator' => '<li{{attrs}}>{{separator}}</li>'
	]);
	$this->Breadcrumbs->add('Cats',['plugin'=>'Kissagalleria','controller' => 'Cats', 'action' => 'index'],['class'=>'breadcrumb-item']);
	$this->Breadcrumbs->add($cat->breed->name,['plugin'=>'Kissagalleria','controller' => 'Cats', 'action' => 'index','breed' => $cat->breed->id ],['class'=>'breadcrumb-item']);
	(!empty($cat['breeder'])) ? $this->Breadcrumbs->add($cat->breeder,['plugin'=>'Kissagalleria','controller' => 'Cats', 'action' => 'index','breeder' => $cat->breeder ],['class'=>'breadcrumb-item']) : '';
	$this->Breadcrumbs->add($cat->name,null,['class'=>'breadcrumb-item active']);
	$this->Breadcrumbs->add($this->AuthLink->link($this->Html->image('Kissagalleria.ic_mode_edit_black_24px.svg'),['plugin'=>'Kissagalleria','controller'=>'Cats','action' => 'edit',$cat->id ],['escape'=>false,'class'=>'badge badge-info ml-1 float-right']));
	$this->Breadcrumbs->add($this->AuthLink->link($this->Html->image('Kissagalleria.ic_delete_forever_black_24px.svg'),['plugin'=>'Kissagalleria','controller'=>'Cats','action' => 'delete',$cat->id ],['escape'=>false,'class'=>'badge badge-info ml-1 float-right']));

	echo $this->Breadcrumbs->render(
    ['separator' => '/']
);
?>
  <!-- Portfolio Item Row -->
  <div class="row">
    <div class="col-md-8">
			<?php echo (!empty($cat['media'])) ? $this->element('galleria',array('gallery' => $cat)) : '';?>
			<h3><?=__('Comments');?></h3>
      <ul class="comment-list">
            <?php foreach ($cat->comments as $comment):
                echo $this->Comment->comment($comment);
            endforeach; ?>
        </ul>
        <!-- loadJS and display the comment Form if user is connected -->
      <?= $this->Comment->loadFormAndJS($cat); ?>

      <?=$this->element('exhibitions');?>
    </div>
    <div class="col-md-4">
<!--		<?php
			if (!$hasRated) {
				echo $this->Rating->control([
					'item' => $cat['id'],
					'js' => true,
				]);
			} else { 
				echo __('You have already rated.');
echo $this->Rating->display($isRated->value,[
	'item' => $cat['id'],
	'stars' => 5,
	//'js' => true,
]);

				echo $this->Rating->display($isRated['value']);
			}
			?> -->
      <?php if (!empty($cat->text)) : ?><h3 class="my-3">Description</h3> <?php endif;?>
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
              <th><?= __('Birthdate') ?></th><td> <?= $cat->has('birthdate') ? h($cat->birthdate->i18nFormat('dd.MM.yyyy')) : ''; ?>
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
