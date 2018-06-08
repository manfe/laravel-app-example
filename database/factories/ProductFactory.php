<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'nome' => 'Salada',
        'valor' => 'R$ 5,00'
    ];    
});