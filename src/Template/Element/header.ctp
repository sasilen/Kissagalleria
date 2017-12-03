<style type="text/css" style="display: none">
.navbar-custom {
    background-color: #eceeef;
}
</style>
 

   <nav class="navbar navbar-expand-md navbar-custom bg-dark fixed-top navbar-toggleable-sm">
			<?=$this->Html->link('Kissagalleria.com', ['plugin'=>false, 'controller' => 'Pages', 'action' => 'display'],['class'=>'navbar-brand']);?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
<!--          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <?=$this->Html->link($this->Html->image('/img/fi.svg',array('border'=>0)),array('plugin'=>'Kissagalleria','controller'=>'users','action'=>'language','fin'),array('escape' => false),array('class'=>'nav-link'));?>
            <?=$this->Html->link($this->Html->image('/img/en.svg',array('border'=>0)),array('plugin'=>'Kissagalleria','controller'=>'users','action'=>'language','eng'),array('escape' => false));?>
            <?=$this->Html->link($this->Html->image('/img/se.svg',array('border'=>0)),array('plugin'=>'Kissagalleria','controller'=>'users','action'=>'language','swe'),array('escape' => false));?>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=__('Users');?></a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <?=$this->Html->link(__('All'), array('plugin'=>'Kissagalleria','controller'=>'users','action' => 'index'),array('class'=>'dropdown-item'));?>
              <?=$this->Html->link(__('Cities'), array('plugin'=>'Kissagalleria','controller'=>'users','action' => 'index','cities'),array('class'=>'dropdown-item'));?>
	      <?=$this->Html->link(__('Breeders'), array('plugin'=>'Kissagalleria','controller'=>'users','action' => 'index','breeders'),array('class'=>'dropdown-item'));?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=__('Cats');?></a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <?=$this->Html->link(__('All',true),array('plugin'=>'Kissagalleria','controller'=>'cats','action'=>'index'),array('class'=>'dropdown-item'));?>
              <?=$this->Html->link(__('By breeder',true),array('plugin'=>'Kissagalleria','controller'=>'cats','action'=>'index','breeders'),array('class'=>'dropdown-item'));?>
              <?=$this->Html->link(__('Exhibitions',true),array('plugin'=>'Kissagalleria','controller'=>'exhibitions','action'=>'index'),array('class'=>'dropdown-item'));?>
              <?=$this->Html->link(__('In memoriam',true),array('plugin'=>'Kissagalleria','controller'=>'cats','action'=>'index','dod'=>true),array('class'=>'dropdown-item'));?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=__('Medias');?></a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
              <?=$this->Html->link(__('Latest',true),array('plugin'=>'Kissagalleria','controller'=>'medias','action'=>'index'),array('class'=>'dropdown-item'));?>
              <?=$this->Html->link(__('Toprated',true),array('plugin'=>'Kissagalleria','controller'=>'medias','action'=>'index','rated'),array('class'=>'dropdown-item'));?>
            </div>
          </li>
					<?php if (!$this->request->session()->read('Auth.User.id')) : ?>
            <li class="nav-item"><?=$this->Html->link('Login', ['plugin'=>'CakeDC/Users','controller' => 'users', 'action' => 'login'],['class'=>'nav-link']);?></li>
		      <?php else: ?>
					<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$this->request->session()->read('Auth.User.email');?></a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <?=$this->Html->link(__('My Profile',true),array('plugin'=>'Kissagalleria','controller'=>'users','action'=>'view',$this->request->session()->read('Auth.User.id')),array('class'=>'dropdown-item'));?>
              <?=$this->Html->link(__('Logout',true),array('plugin'=>'CakeDC/Users','controller'=>'users','action'=>'logout'),array('class'=>'dropdown-item'));?>
            </div>
          </li>
					<?php endif;?>

           <li class="float:right">
            <?=$this->Html->link($this->Html->image('Kissagalleria.fi.svg',array('border'=>0,'height'=>'20px')),array('plugin'=>'Kissagalleria','controller'=>'users','action'=>'language','fi_FI'),array('escape' => false));?>
            <?=$this->Html->link($this->Html->image('Kissagalleria.en.svg',array('border'=>0,'height'=>'20px')),array('plugin'=>'Kissagalleria','controller'=>'users','action'=>'language','en_EN'),array('escape' => false));?>
            <?=$this->Html->link($this->Html->image('Kissagalleria.se.svg',array('border'=>0,'height'=>'20px')),array('plugin'=>'Kissagalleria','controller'=>'users','action'=>'language','sv_SV'),array('escape' => false));?>
          </li>



	      </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
