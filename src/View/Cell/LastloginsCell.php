<?php
namespace Kissagalleria\View\Cell;

use Cake\View\Cell;

/**
 * Lastlogins cell
 */
class LastloginsCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
			$this->User->bindModel(array('hasMany'=>array('Photo')));
			$this->User->unbindModel(array('hasAndBelongsToMany'=>array('Cat')));
			$this->User->recursive = 1;
			return $this->User->find('all',array('order'=>array('User.last_login DESC'),'limit'=>'10'));
    }
}
