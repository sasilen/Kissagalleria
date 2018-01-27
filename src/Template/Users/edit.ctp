<?php
/**
 * @var \App\View\AppView $this
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
      $this->Breadcrumbs->add($this->AuthLink->link($this->Html->image('Kissagalleria.ic_note_edit_black_24px.svg'),['plugin'=>'Kissagalleria','controller'=>'Users','action' => 'edit',$user->id ],['escape'=>false,'class'=>'badge badge-info ml-1 float-right']));
      echo $this->Breadcrumbs->render(['separator' => '/']);
      ?>
  <div class="row">
		<div class="form-group col-sm-6">
    <?= $this->Form->create($user,['class'=>'form-horizontal']) ?>
    <fieldset>
        <?php
            echo $this->Form->control('username',['label' => ['class' => 'col-sm-4 control-label', 'text' => __('Username')]]);
            echo $this->Form->control('email',['label' => ['class' => 'col-sm-4 control-label', 'text' => __('Email')]]);
            echo $this->Form->control('password',['label' => ['class' => 'col-sm-4 control-label', 'text' => __('Password')]]);
            echo $this->Form->control('first_name',['label' => ['class' => 'col-sm-4 control-label', 'text' => __('First name')]]);
            echo $this->Form->control('last_name',['label' => ['class' => 'col-sm-4 control-label', 'text' => __('Last name')]]);

/*            echo $this->Form->control('active', [
              'label' => ['text' => __('Active'),'class' => 'col-sm-4 control-label'],
              'type' => 'select',
              'multiple' => false,
              'default' => 'true',
              'options' => ['True'=>__('True',true),'False'=>__('False',false)],
              'empty' => false
            ]);
						echo $this->Form->control('is_superuser', [
              'label' => ['text' => __('Superuser'),'class' => 'col-sm-4 control-label'],
              'type' => 'select',
              'multiple' => false,
              'default' => 'true',
              'options' => ['True'=>__('True',true),'False'=>__('False',false)],
              'empty' => false
            ]); 
*/
//          echo $this->Form->control('cats._ids', ['label' => ['text' => __('Cats'),'class' => 'col-sm-4 control-label'],'type' => 'select','multiple' => true,'options' => $cats, 'default'=>'NON','empty' => false]);
//  				echo $this->Form->control('breeders._ids', ['label' => ['text' => __('Breeders'),'class' => 'col-sm-4 control-label'],'type' => 'select','multiple' => false,'options' => $breeders, 'default'=>'NON','empty' => false]);
						echo $this->Media->iframe('Kissagalleria.Users',$user->id);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
