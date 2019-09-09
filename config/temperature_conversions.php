<?php
return [
    'Kelvin' => [
        'Celsius' => '{input}-273.15',
        'Fahrenheit' => '({input}-273.15)*9/5+32',
        'Rankine' => '(({input}-273.15)*9/5+32)+459.67',
    ],
    'Celsius' => [
        'Kelvin' => '{input}+273.15',
        'Fahrenheit' => '{input}*9/5+32',
        'Rankine' => '({input}*9/5+32)+459.67',
    ],
    'Fahrenheit' => [
        'Kelvin' => '(({input} -32)*5/9)+273.15',
        'Celsius' => '({input} -32)*5/9',
        'Rankine' => '{input}+459.67',
    ],
    'Rankine' => [
        'Kelvin' => '((({input}-459.6) - 32)*5/9)+273.15',
        'Celsius' => '(({input}-459.6) - 32)*5/9',
        'Fahrenheit' => '{input}-459.67',
    ],
];