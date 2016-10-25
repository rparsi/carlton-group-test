<?php

namespace Tests\App;

use App\App;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function reverseArrayProvider()
    {
	$app = new App();
	return [
	    [ [1,2,'even',4], $app, [4,'even',2,1] ],
	    [ [1,2,3,'odd',5], $app, [5,'odd',3,2,1] ]
	];
    }

    /**
     * @dataProvider reverseArrayProvider
     */
    public function testReverseArray(array $data, App $app, array $expected)
    {
	$this->assertEquals($expected, $app->reverseArray($data));
    }

    public function findMostFrequentIntsProvider()
    {
        $app = new App();
	return [
	    [ [5,7,7,1,9,1,11,1], $app, [1] ],
	    [ [22,3,4,11,22,22,0,9,7,7,9,22], $app, [22] ],
	    [ [300,499,499,301,4,302,4,1,9,7], $app, [4,499] ]
	];
    }

    /**
     * @dataProvider findMostFrequentIntsProvider
     */
    public function testFindMostFrequentInts(array $data, App $app, $expected)
    {
	$this->assertEquals($expected, $app->findMostFrequentInts($data));
    }

    public function findPairsWithSumProvider()
    {
	$app = new App();
	return [
	    [ [4,6,3,7,1,11,22,0,44,10], $app, [[4,6],[3,7],[0,10]] ],
	    [ [4,9,7,10,0,1], $app, [[10,0],[9,1]] ],
	    [ [4,9,1,7,10,10,1,0], $app, [[9,1],[10,0]] ]
	];
    }

    /**
     * @dataProvider findPairsWithSumProvider
     */
    public function testFindPairsWithSum(array $data, App $app, $expected)
    {
	$this->assertEquals($expected, $app->findPairsWithSum($data));
    }
}
