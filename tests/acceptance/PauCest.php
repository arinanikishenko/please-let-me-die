<?php

class pauCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function tryToTest(AcceptanceTester $I)
    {
        \Page\LoginPage::open($I);

        $I->wait(10);

        try {
            $I->click(\Codeception\Util\Locator::elementAt('ul.pagination li a', -2)); //переход на посленюю страницу (предпоследння кнопка)
        } catch (\Codeception\Exception\ElementNotFound $e) {
            var_dump($e->getMessage());
            //die;
        }

        $I->wait(5);
        \Page\ClassLeaveAdd::open($I);
        $I->wait(3);


    }
}
