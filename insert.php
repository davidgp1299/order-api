<?php

require_once 'vendor/autoload.php';
include_once 'Order.php';

$faker = Faker\Factory::create();
$order = new Order();

for ($i = 0; $i < 1000; $i++) { 
    $order->insert([
        'date' => $faker->dateTimeBetween('-30 years', 'now', 'Europe/Madrid')->format('Y-m-d'),
        'company' => $faker->company,
        'qty' => $faker->numberBetween(1000, 100000)
    ]);
}

echo 'Data was inserted successfully!';