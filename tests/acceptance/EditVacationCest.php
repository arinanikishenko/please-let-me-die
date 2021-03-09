<?php

class EditVacationCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    /*Редактирование отпуска с переносом даты на следующий месяц
    Создание отпуска, редактирование отпуска */

    public function AddVacationWeek(AcceptanceTester $I)
    {
        \Page\LoginPage::open($I);
        $I->wait(5);
        //$I->click('»');
        //$I->click('Будущие годы');

        \Page\GoToLastPage::open($I);

        $I->reloadPage();
        $I->wait(5);

        \Page\ClassLeaveAdd::open($I);
        $I->wait(5);

        try {
            //$I->see('»');
            $I->click('»');
        } catch (\Codeception\Exception\ElementNotFound $e) {
            var_dump($e->getMessage());
        }

// ПАДАЕТ на добавлении отпуска (в классе)

        $I->wait(2);
        $I->click('.modal-btn', \Codeception\Util\Locator::elementAt('//table/tbody/tr', -1)); //кнопка редактирования в последней строке таблицы
        $I->wait(10);
        $I->see('Обновить');
        $I->wait(3);
        $date1 = $I->grabValueFrom('#schedule-date_start');
        $date2 = $I->grabValueFrom('#schedule-date_end');

        $date_start = date('d-m-Y', strtotime($date1 . ' + 1 month'));
        $date_end = date('d-m-Y', strtotime($date2 . ' + 1 month'));

        $I->fillField('#schedule-date_start', $date_start);
        $I->fillField('#schedule-date_end', $date_end);
        $I->wait(8);
        $I->click('Сохранить');
        $I->wait(3);
        $I->canSee('Данные успешно сохранены');
        $I->wait(3);
    }
}

