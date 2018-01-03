<?php

use Cake\I18n\Date;

/**
  * @var \App\View\AppView $this
  * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $users
  */

?>

<div class="page-header" style="background-image: url(https://www.kissagalleria.com/img/kgheader.jpg); background-size: cover; width: 100%; padding:10px; min-height:180px;">
	<div clas="container">
		<h1 style="font: bold 50px 'Trebuchet MS', Tahoma, Arial, Sans-serif; color:white;">Kissagalleria.com</h1>
	</div>
</div>
<ol class="breadcrumb" style="width:100%">
        <li class="breadcrumb-item active"><?= $this->Html->link(__('Kissagalleria'), ['plugin' => NULL, 'controller' => 'Pages', 'action' => 'display','home']); ?></li>
        <?php // $this->authLink->isAuthorized();?>
        <?php // $this->AuthLink->link('['.__('My profile').']', ['plugin' => 'Kissagalleria', 'controller' => 'Users', 'action' => 'view',$this->request->session()->read('Auth.User.id')],['class'=>'float-right']); ?>

<!--      glyphicon glyphicon-edit -->
    </ol>
<div class="container">
	<div class="row">
		<div class="col-md-8">
	    <div class="row">
				<p> <?=('For the year 2018 site has been restored from dusts. Now with Facebook/Google logins, pictures can be voted and comments can be added. Other ununsed and unfunctional parts are removed and concentration is just for pictures of these furry (or furless) cats');?>
		 <?php  $logins = $this->cell('Kissagalleria.Lastlogins'); ?>
      <?= $logins ?>

      </div>
	  </div>

	  <div class="col-md-4">
			<?php  $bcats = $this->cell('Kissagalleria.Birthdaycats'); ?>
			<?= $bcats ?>
  	</div>

  </div>

</div>
