 <div class="navbar navbar-custom navbar-fixed-bottom">
    <div class="container">
			<span class="col-md-4" style="float:left;">
			<?php echo $this->Html->link(
          $this->Html->image('Kissagalleria.cake-logo2.svg', array('border' => '0','height'=>'30px')),
          'http://www.cakephp.org/',
          array('target' => '_blank', 'escape' => false)
        );
			?>
			</span>
			<span class="justify-content-center col-md-4">
      <?='Copyright by ';?>
      <?=$this->Html->link('Pirre',array('plugin'=>'Kissagalleria','controller'=>'Cats','action'=>'view',48));?>
      <?=' & ';?>
      <?=$this->Html->link('Essu',array('plugin'=>'Kissagalleria','controller'=>'Cats','action'=>'view',271));?>
      <?=' 2017';?>
			</span>
			<span class="col-md-2" style="float:right";>
		 <?php echo $this->Html->link(
          $this->Html->image('Kissagalleria.github.svg', array('border' => '0','height'=>'30px')),
          'http://www.github.com/sasilen/kissagalleria',
          array('target' => '_blank', 'escape' => false)
        );
			?>
			</span>
  </div>
</div>

