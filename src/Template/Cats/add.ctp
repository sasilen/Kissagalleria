<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
     <ol class="breadcrumb">
        <li class="breadcrumb-item"><?= $this->Html->link(__('Cats'), ['plugin' => 'Kissagalleria', 'controller' => 'Cats', 'action' => 'index']); ?>
				<li class="breadcrumb-item active"><?=__('Add'); ?></li>
    </ol>

  <div class="row">

<div class="form-group col-sm-6">
    <?= $this->Form->create($cat,['class'=>'form-horizontal']) ?>
    <fieldset>
        <?php
						echo $this->Form->control('name',['label' => ['class' => 'col-sm-4 control-label', 'text' => __('Name')]]);
            echo $this->Form->control('breeder',['label' => ['class' => 'col-sm-4 control-label', 'text' => __('Breeder')]]);
            echo $this->Form->control('alias',['label' => ['class' => 'col-sm-4 control-label', 'text' => __('Alias')]]);
            echo $this->Form->control('number',['label' => ['class' => 'col-sm-4 control-label', 'text' => __('Number')]]);
            echo $this->Form->control('color',['label' => ['class' => 'col-sm-4 control-label', 'text' => __('Color')]]);
						echo $this->Form->control('gender', [
              'label' => ['text' => __('Gender'),'class' => 'col-sm-4 control-label'],
              'type' => 'select',
              'multiple' => false,
              'default' => 'male',
              'options' => ['male'=>__('Male',true),'female'=>__('Female',true)],
              'empty' => false
            ]);
						
						echo $this->Form->control('castrated', [
              'label' => ['text' => __('Castrated'),'class' => 'col-sm-4 control-label'],
              'type' => 'select',
              'multiple' => false,
              'default' => 1,
              'options' => [1 => __('Yes',true), 0 => __('No',true)], 
              'empty' => false
            ]);

						echo $this->Form->control('bloodtype', [
   						'label' => ['text' => __('Bloodtype'),'class' => 'col-sm-4 control-label'],
							'type' => 'select',
					    'multiple' => false,
							'default' => 0,
					    'options' => ['A'=>'A','B'=>'B','AB'=>'AB','0'=>__('Dont know',true)], 
					    'empty' => false
					  ]);
            echo $this->Form->control('ems',['label' => ['class' => 'col-sm-4 control-label', 'text' => __('EMS code')]]);
            echo $this->Form->control('breed_id', ['label' => ['text' => __('Breed'),'class' => 'col-sm-4 control-label'],'type' => 'select','multiple' => false,'options' => $breeds, 'default'=>'NON','empty' => false]); 

						echo '<div class="form-group">';
							echo $this->Form->label(null,'Birthdate', ['class' => 'col-sm-4 control-label']);
							echo $this->Form->date('birthdate',[
							 'dateFormat'=>'YMD',
						   'minYear'=> date('Y')-50 ,
						   'maxYear' => date('Y'),
//						   'empty' => false
							]);
						echo '</div>';
					echo '<div class="form-group">';
              echo $this->Form->label(null,'Deathdate', ['class' => 'col-sm-4 control-label']);
              echo $this->Form->date('deathdate',[
               'dateFormat'=>'YMD',
               'minYear'=> date('Y')-50 ,
               'maxYear' => date('Y'),
//               'empty' => false
              ]);
            echo '</div>';?>
</div>
<div class="form-group col-sm-6">
<?php
			      echo $this->Form->control('motherbreeder',['label' => ['class' => 'col-sm-5 control-label', 'text' => __('Mother breeder')]]);
            echo $this->Form->control('mothername',['label' => ['class' => 'col-sm-5 control-label', 'text' => __('Mother name')]]);
            echo $this->Form->control('mothernumber',['label' => ['class' => 'col-sm-5 control-label', 'text' => __('Mother number')]]);
            echo $this->Form->control('fatherbreeder',['label' => ['class' => 'col-sm-5 control-label', 'text' => __('Father breeder')]]);
            echo $this->Form->control('fathername',['label' => ['class' => 'col-sm-5 control-label', 'text' => __('Father name')]]);
            echo $this->Form->control('fathernumber',['label' => ['class' => 'col-sm-5 control-label', 'text' => __('Father number')]]);
//            echo $this->Form->control('date'); 
            echo $this->Form->control('text',['label' => ['class' => 'col-sm-5 control-label', 'text' => __('Description')]]);
            // echo $this->Form->control('user_id');
            // echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary float-right']) ?>
    <?= $this->Form->end() ?>
</div>
</div>
</div>
