<h1><?=__('Last logins',true)?></h1>

<?php $class = 'thumbnails'; ?>

<table width=100%><tr>
  <?php
    $i = $x = 0;
    foreach ($lastlogins as $login) : ?>
      <td align=center>
       <b><?=$this->Html->link($login['User']['username'],array('controller'=>'users','action'=>'view',$login['User']['id']));?></b>
       <br/>
       
       <?php 
       $picindex = rand(0,count($login['Photo'])-1);
       if (isset($login['Photo'][0]['id'])) {
         if (isset($login['Photo'][$picindex]['dir'])) $thumb_prefix = 'photos/thumbs/'.$login['Photo'][$picindex]['dir'].'/thumb_'; 
         else $thumb_prefix='photos/thumb_'; 
  
         echo $this->Html->link($this->Html->image($thumb_prefix.$login['Photo'][$picindex]['filename'],
              array('alt' => $login['Photo'][$picindex]['title'], 'class' => $class)),
              array('plugin'=>false,'controller'=>'photos','action'=>'view',$login['Photo'][$picindex]['id']), array('escape'=>false),false); 
       }
       
       ?>
      </td>
      <?php $x++; if($x>4){ echo "</tr><tr>"; $x=0;}?>
    <?php endforeach; ?>

</tr></table>


