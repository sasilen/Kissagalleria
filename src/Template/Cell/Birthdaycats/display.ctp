<h1><?=__('Birthdays',true)?></h1>
<?php $class = 'thumbnails';?>
<table width=100% cellspacing=0 cellpadding=0><tr>
  <?php $i = $x = 0;
  foreach ($birthdayCats as $cat): ?>

    <td align=center valign=top>
      <b><?php echo $cat[0]['age'];?></b>

      <?=__('Years',true);?>
      <br/>
      <?php if (isset($cat['photos']['dir'])) $thumb_prefix = 'photos/thumbs/'.$cat['photos']['dir'].'/thumb_'; else $thumb_prefix='photos/thumb_'; ?>
      <?=$this->Html->link($this->Html->image($thumb_prefix.$cat['photos']['filename'],array('alt' => $cat['photos']['title'])),array('plugin'=>false,'controller'=>'photos','action'=>'view',$cat['photos']['id']), array('escape'=>false),false);?>
      <br/><small><?php echo $this->Html->link('['.$cat['cats']['breed_id'].'] '.$cat['cats']['name'], '/cats/view/'.$cat['cats']['id']); ?></small>
    </td>
    <?php $x++; if($x>3){ echo "</tr><tr>"; $x=0;}?>
  <?php endforeach;?>
    
</tr></table>

<center><small><?=$this->kg->formatTime(date('Y-m-d H:i',time()));?></small></center>

