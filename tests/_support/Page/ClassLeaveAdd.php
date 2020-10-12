<?php
namespace Page;

class ClassLeaveAdd
{
    protected $actor;
    public static $vacationLastDateFromTable;
    public static $BeginDate;
    public static $EndDate;

    public function __construct($I)
    {
        $this->actor = $I;
    }

    public function open($I)
    {
        $page = new static($I);
        self::$vacationLastDateFromTable = $I->grabTextFrom(\Codeception\Util\Locator::elementAt('//table/tbody/tr/td[2]', -1)); /*последняя строка таблицы 2 ячейка, 
        для использования на последней*/
        self::$BeginDate = date('d-m-Y', strtotime(self::$vacationLastDateFromTable .' + 1 day'));
        self::$EndDate = date('d-m-Y', strtotime(self::$BeginDate .' + 1 week'));
        $page->enter(self::$BeginDate, self::$EndDate);
    }

    public function enter($BeginDate, $EndDate)
    {
        $I = $this->actor;
        $I->click(\Codeception\Util\Locator::contains('.modal-btn','Добавить отпуск')); 
        $I->wait(10);
        $I->fillField ('#schedule-date_start', self::$BeginDate);
        $I->wait(3);
        $I->fillField ('#schedule-date_end', self::$EndDate);
        $I->wait(3);
        $I->click('Сохранить');
        $I->click('.close');     
        $I->wait(5); 
        $I->reloadPage();
    }

}
