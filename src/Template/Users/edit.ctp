<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('active');
            echo $this->Form->control('is_superuser');
            echo $this->Form->control('role');
            echo $this->Form->control('cats._ids', ['options' => $cats]);
            echo $this->Form->control('breeders._ids', ['options' => $breeders]);
  			    echo $this->Media->iframe('Kissagalleria.Users',$user->id);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
