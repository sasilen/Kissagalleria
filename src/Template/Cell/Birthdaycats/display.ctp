<h1><?=__('Birthdays',true)?></h1>
<?php $class = 'thumbnails';?>
<table width=100% cellspacing=0 cellpadding=0><tr>
  <?php $i = $x = 0;
  foreach ($Cats as $cat): ?>
<?php // debug($cat);die();?>
    <td align=center valign=top>
      <b><?=substr($this->Kissagalleria->getAge($cat->birthdate,$cat->deathdate), 0, strpos($this->Kissagalleria->getAge($cat->birthdate,$cat->deathdate), 'y'));?>
      <?=__('Years',true);?>
      <br/>

			 <?php if (isset($cat['Media']) && $cat['Media']['file'] != null) :
            echo $this->Html->link($this->Kissagalleria->display($cat['Media']),
              array('plugin'=>'Kissagalleria','controller'=>'Cats','action' => 'view',$cat->id),array('escape' => false));
          endif; ?>
					<br/><small>
          <?=$this->Html->link('['.$cat['breed_id'].'] '.substr($cat->name,0,10).'.', array('plugin'=>'Kissagalleria','controller'=>'Cats','action'=>'view', $cat->id)); ?>
					</small>

    </td>
    <?php $x++; if($x>3){ echo "</tr><tr>"; $x=0;}?>
  <?php endforeach;?>
    
</tr></table>

<center><small><?php //$this->kg->formatTime(date('Y-m-d H:i',time()));?></small></center>

