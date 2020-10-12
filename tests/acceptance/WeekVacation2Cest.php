<?php 

class WeekVacationCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    private function getRandomDate($limitSeconds = 2592000)
    {
        $randomSeconds = mt_rand(0, $limitSeconds);
        return DateTimeImmutable::createFromFormat("U", time() + $randomSeconds);
    }
    
    public function AddVacationWeek(AcceptanceTester $I)
    {
        $BeginDate = $this->getRandomDate(1200000);
        $BeginDate = date("d-m-Y");
        \Codeception\Util\Debug::debug($BeginDate);
        $EndDate = date('d-m-Y', strtotime($BeginDate .' + 1 week'));
        \Codeception\Util\Debug::debug($EndDate);

        \Page\LoginPage::open($I);
        $I->wait(3); 
        $I->click('Добавить отпуск');
        $I->wait(3); 
        $I->fillField ('#schedule-date_start', $BeginDate);
        $I->fillField ('#schedule-date_end', $EndDate);
        $I->click('Сохранить');
        $I->wait(3); 
        $I->canSee('Данные успешно сохранены');
        $I->wait(3); 
    }
}
