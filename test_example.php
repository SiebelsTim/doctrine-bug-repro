<?php
// test.php
require_once "bootstrap.php";

$bugRepo = $entityManager->getRepository(Bug::class);

$bug = $bugRepo->findOneBy(['description' => 'Something does not work!']);

echo "This is the name of the reporter currently assigned: ", PHP_EOL;
var_dump($bug->getReporter()->getName());

echo "\nWe've set the reporter to null.", PHP_EOL;
$bug->setReporter(null);

echo "Reporter is really null: ", PHP_EOL;
var_dump($bug->getReporter());

echo "\nWe refetch the same entity with the following description", PHP_EOL;
var_dump($bugRepo->findOneBy(['description' => 'Something does not work!'])->getDescription());

echo "\nNow reporter should still be null: ", PHP_EOL;
if ($bug->getReporter() === null) {
    echo "it is null";
} else {
    echo "oh no, it is non-null again.";
}


