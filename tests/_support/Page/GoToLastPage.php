<?php
namespace Page;

/*Класс для перехода на последнюю страницу*/

class GoToLastPage
{
    //protected $actor;


   // public function __construct($I)
   // {
        //$this->actor = $I;
    //}

    //public function open($I)
    //{
       // $page = new static($I);

   // }

    public function open($I)
    {
        //$I = $this->actor;
        $I->wait(10);
        try {
            $I->click(\Codeception\Util\Locator::elementAt('ul.pagination li a', -2)); //переход на посленюю страницу (предпоследння кнопка)
        } catch (\Codeception\Exception\ElementNotFound $e) {
            var_dump($e->getMessage());
            //die;
        }
        $I->wait(10);
    }

}
