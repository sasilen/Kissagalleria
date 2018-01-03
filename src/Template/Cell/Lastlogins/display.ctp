<h1><?=__('Last logins',true)?></h1>

<?php $class = 'thumbnails'; ?>

<table width=100%><tr>
  <?php
    $i = $x = 0;
    foreach ($Users as $user) : ?>
      <td align=center>
       <b><?=$this->Html->link($user['username'],array('plugin'=>'Kissagalleria','controller'=>'users','action'=>'view',$user['id']));?></b>
       <br/> 
      </td>
      <?php $x++; if($x>4){ echo "</tr><tr>"; $x=0;}?>
    <?php endforeach; ?>

</tr></table>


