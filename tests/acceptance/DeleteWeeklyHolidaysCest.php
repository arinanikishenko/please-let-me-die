<?php 

class DeleteWeeklyHolidaysCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function DeleteVacation(AcceptanceTester $I)
    {
        \Page\LoginPage::open($I);
        $I->wait(3);
        $I->click('Будущие годы');
        $I->click('.ajax-btn', \Codeception\Util\Locator::elementAt('//table/tbody/tr', 4));
        $I->wait(5); 
        $I->AcceptPopup();
    }
}
