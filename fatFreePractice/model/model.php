<?php
    function findPrimes($low, $high) {
        //this array will hold primes between @low and @high
        $primes = array();

        //check each number for prime-ness
        for ($i = $low; $i <= $high; $i++) {
            //use the sieve method
            $found = false;
            for ($j = $i - 1; $j >= 2; $j--) {
                if ($i % $j == 0) {
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $primes[] = $i;
            }
        }

        return $primes;
    }
?>