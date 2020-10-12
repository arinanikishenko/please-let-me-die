<?php
namespace Page;

class LoginPage
{
    public static $URL = '/schedule/index';

    protected $actor;
    public static $login = 'manager';
    public static $password = 'manager';

    public static function route($param)
    {
        return static::$URL.$param;
    }

    public function __construct($I)
    {
        $this->actor = $I;
    }

    public function open($I)
    {
        $page = new static($I);
        $I->amOnPage(self::$URL);
        $page->enter(self::$login, self::$password);
    }

    public function enter($login, $password)
    {
        $I = $this->actor;
        $I->fillField('#loginform-username', $login);
        $I->fillField('#loginform-password', $password);
        $I->click('Войти');
    }

}
