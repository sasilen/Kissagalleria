<?php
namespace Kissagalleria\View\Cell;

use Cake\View\Cell;

/**
 * Birthdaycats cell
 */
class BirthdaycatsCell extends Cell
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
			$this->loadModel('Cats');

      // POSTGRES    $conditions = array("to_char(birthdate, 'MM-DD') = to_char(now() + '0 day'::interval, 'MM-DD')");
 			$cats = $this->Cat->query("SELECT photos.id,photos.filename,photos.title,photos.slug,cats.id,cats.breed_id,cats.name,cats.birthdate,breeds.name, (YEAR(CURDATE())-YEAR(birthdate)) - (RIGHT(CURDATE(),5)<RIGHT(cats.birthdate,5)) AS age FROM photos LEFT JOIN cats ON photos.cat_id = cats.id JOIN breeds ON breeds.id=cats.breed_id WHERE MONTH(cats.birthdate)=MONTH(CURDATE()) AND DAY(cats.birthdate)=DAY(CURDATE()) AND cats.deathdate<cats.birthdate GROUP BY cats.id ORDER BY age DESC");
    // $cats = $this->Cat->query("SELECT cats.id, cats.breed_id, cats.name, cats.birthdate, (YEAR(CURDATE())-YEAR(birthdate)) - (RIGHT(CURDATE(),5)<RIGHT(cats.birthdate,5)) AS age FROM cats INNER JOIN photos ON cats.id=photos.cat_id WHERE MONTH(cats.birthdate)=MONTH(CURDATE()) AND DAY(cats.birthdate)=DAY(CURDATE()) AND cats.deathdate<cats.birthdate ORDER BY age DESC");
	    return $cats;
    }
}
