<?php

// This script tests the speed of environment variables vs constants
$runtime = 100000; // Number of times to run the test
// Setting up the test
$count = 0;
// Define the constants that will be used in the comparison
define('CONSTANT_VARIABLE', 'value');
// Set the environment variable "TEST_VARIABLE" to the value "test value"
putenv('TEST_VARIABLE=test value');

// Starting the Test

for ($i = 0; $i < $runtime; $i++) {
    // PART ONE: Test the constant variable
    // Start the timer
    $startTime = microtime(true);

    // Load the value of the constant variable
    $constantVariable = CONSTANT_VARIABLE;

    // Stop the timer and calculate the elapsed time
    $elapsedTimeConstant = microtime(true) - $startTime;

    // PART TWO: Test the environment variable
    // Start the timer
    $startTime = microtime(true);

    // Load the value of the environment variable
    $environmentVariable = getenv('TEST_VARIABLE');

    // Stop the timer and calculate the elapsed time
    $elapsedTimeENV = microtime(true) - $startTime;

    // If the elapsed time for the environment variable is less than the elapsed time for the constant variable, increment the count
    if ($elapsedTimeENV < $elapsedTimeConstant) {
        $count++;
    }
}

// Output the number of times the environment variable was faster than the constant variable out of 1000 tests
echo "Environment variable was faster $count times out of $runtime tests";

?>
