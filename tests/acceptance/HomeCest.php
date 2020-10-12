<?php 

class HomeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function _tryToLogin(AcceptanceTester $I)
    {

        $I->amOnPage('/schedule/index');
        $I->fillField ('#loginform-username', 'manager');
        $I->fillField ('#loginform-password', 'manager');
        $I->click('Войти');
        //sleep(3); // php остановка на 3с
        $I->wait(3); // ожидание 3с
        $I->see('Выйти');
        //$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); (работает только для PHPBROWSER)
    }

    public function tryToLogin2(AcceptanceTester $I)
    {
        $I->wantTo('Проверить авторизацию');
        \Page\LoginPage::open($I);
        $I->wait(3); // ожидание 3с
        $I->see('Выйти');
    }
}
