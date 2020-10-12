<?php 

include 'C:\xampp\htdocs\test1\Sum.php';

class SumCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
    }

    public function sumTest(UnitTester $I)
    {
	$I->assertEquals(4, sum(2, 2));
    }
}
