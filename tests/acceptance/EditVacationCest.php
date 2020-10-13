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
        $I->click('Будущие годы');
        $I->wait(10);

        try {
            $I->click(\Codeception\Util\Locator::elementAt('ul.pagination li a', -2)); //переход на посленюю страницу (предпоследння кнопка)
        } catch (\Codeception\Exception\ElementNotFound $e) {
            var_dump($e->getMessage());
            //die;
        }

        $I->wait(10);
        $I->reloadPage();
        \Page\ClassLeaveAdd::open($I);

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

