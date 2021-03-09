<?php

class OneDayVacationCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    /*Создание отпуска на 1 день
    Падает и должен падать, вручную тоже нельзя 
    создать отпуск на 1 день */

    private function getRandomDate($limitSeconds = 60)
    {
        $randomSeconds = mt_rand(0, $limitSeconds);
        return DateTimeImmutable::createFromFormat("U", time() + $randomSeconds);
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


}
