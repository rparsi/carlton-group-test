<?php

namespace App;

class App
{
    public function reverseArray(array $data)
    {
        $reversedData = [];
        $startPosition = 0;
        $stopPosition = count($data) - 1;
        $position = $stopPosition;

        while ($position >= $startPosition) {
	    $reversedData[] = $data[$position];
            $position--;
        }
        return $reversedData;
    }

    public function createUserAddressQuery()
    {
	/** 
         * If search is required to be case sensitive then either the table collation must use case sensitive charset
	 * OR use the BINARY operand on the operators (= or LIKE) in this query.
         * The question doesn't state what collation the table uses, although for this specific search it doesn't really matter.
         */
        return '
	    SELECT
		u.id,
		u.first_name,
		u.last_name,
		a.id address_id,
		a.address1,
		a.address2,
		a.city,
		a.postal_code,
		a.country
	    FROM User u
	    INNER JOIN Address a ON u.id = a.user_id
	    WHERE
		a.country = \'CANADA\'
		AND a.postal_code LIKE \'M4K%\'
	    ORDER BY u.id DESC LIMIT 10
	';
    }

    public function findMostFrequentInts(array $data)
    {
	$hits = array_count_values($data);
	asort($hits, \SORT_NUMERIC);

	$maxHits = end($hits);
        $mostFrequentInts = [key($hits)];

        while (prev($hits) !== FALSE && current($hits) == $maxHits) {
	    $mostFrequentInts[] = key($hits);
        }
	return $mostFrequentInts;
    }

    public function findPairsWithSum(array $data, $sum = 10)
    {
	$expectedPairs = [];
        $foundPairs = [];
        foreach ($data as $number) {
            $otherNumber = $sum - $number;
            if (isset($expectedPairs[$otherNumber])) {
                $foundPairs[$otherNumber] = [$otherNumber, $number];
                continue;
            }
            $expectedPairs[$number] = [$number, $otherNumber];
        }
        return array_values($foundPairs);
    }
}
