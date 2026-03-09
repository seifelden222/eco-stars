<?php

return [
    // Level thresholds (points required to reach each level).
    // Index 0 => level 1 starting at 0 points, index 1 => level 2 threshold, ...
    'thresholds' => [
        0,
        100,
        300,
        600,
        1000,
        1500,
        2100,
        2800,
        3600,
        4500,
    ],

    // If points exceed the last threshold, this multiplier is used to compute
    // subsequent thresholds: next = last + (level_index * multiplier)
    'overflow_multiplier' => 700,
];
