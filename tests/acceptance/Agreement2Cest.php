<?php 

class Agreement2Cest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function tryToTest(AcceptanceTester $I)
    {
        \Page\LoginPage::open($I);
        $I->wait(3);
        $I->amOnPage('/schedule/manage');
        $I->wait(3);
        $excOfPage = null;

        while($excOfPage == null) 
        {
            $excOfVacation = null;
            while($excOfVacation == null) 
            {
                try 
                {
                    $I->seeElement('.ajax-btn');
                    $I->click('.ajax-btn');
                    $I->wait(4);
                    $I->AcceptPopup();
                    $I->wait(2);
                }
                catch(Exception $e) {
                    $excOfVacation = $e;
                }
            }

            try 
            {
                $I->see('»');
                $I->click('»');
            }
            catch(Exception $e) 
            {
                $excOfPage = $e;
            }
            $I->wait(2);
        }
        
    }
}
