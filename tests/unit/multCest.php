<?php 
include 'C:\xampp\htdocs\test1\mult.php';
class multCest
{
    public function _before(UnitTester $I)
    {
    }
    // tests
    public function tryToTest(UnitTester $I)
    {
    }
    public function multTest(UnitTester $I)
    {
	    $I->assertEquals(121, mult(11, 11));
    }
}
