<?php

class OneDayVacationCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function AddVacation(AcceptanceTester $I)
    {
        $date = $this->getRandomDate(1200000);
        $date = date("d-m-Y");
        \Codeception\Util\Debug::debug($date);

        \Page\LoginPage::open($I);
        $I->wait(3); // ожидание 3с
        $I->click('Добавить отпуск');
        $I->wait(3); // ожидание 3с
        $I->fillField('#schedule-date_start', $date);
        $I->fillField('#schedule-date_end', $date);
        $I->click('Сохранить');
        $I->wait(3); // ожидание 3с
        $I->canSee('Данные успешно сохранены');
        $I->wait(3); // ожидание 3с
    }

    private function getRandomDate($limitSeconds = 60)
    {
        $randomSeconds = mt_rand(0, $limitSeconds);
        return DateTimeImmutable::createFromFormat("U", time() + $randomSeconds);
    }
}
