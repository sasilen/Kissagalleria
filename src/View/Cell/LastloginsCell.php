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
		  $this->loadModel('Users');
			$users = $this->Users->find()
        ->order(['Users.modified DESC'])
				->limit(10)
        ->all();
			$this->set(['Users'=>$users]);
    }
}
