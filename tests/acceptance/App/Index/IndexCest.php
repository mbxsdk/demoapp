<?php
namespace App\Index;


use AcceptanceTester;

class IndexCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function tryIndexRoute(AcceptanceTester $I)
    {
        $I->wantTo('Test the index route');
        $I->amOnPage('/');
        $I->see('Hello World');
    }

    public function tryIndexRouteWithParam(AcceptanceTester $I)
    {
        $I->wantTo('Test the index route with Param');
        $I->amOnPage('/?name=Unit');
        $I->see('Hello World Unit');
    }
}
