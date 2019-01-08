# Range

[![](https://img.shields.io/packagist/php-v/clouding/range.svg?style=flat-square)](https://packagist.org/packages/clouding/range)
[![](https://img.shields.io/packagist/v/clouding/range.svg?style=flat-square)](https://packagist.org/packages/clouding/range)
[![](https://img.shields.io/travis/com/cloudingcity/range.svg?style=flat-square)](https://travis-ci.com/cloudingcity/range)
[![](https://img.shields.io/codecov/c/github/cloudingcity/kata.svg?style=flat-square)](https://codecov.io/gh/cloudingcity/range)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-44CC11.svg?longCache=true&style=flat-square)](https://github.com/phpstan/phpstan)

A simple library for **Range** object.

## Table of Contents

1. [Installation](#installation)
2. [Usage](#usage)
    - [Create](#create)
    - [Getters](#getters)
    - [Comparison](#comparison)
    - [Conversion](#conversion)
    - [Functions](#functions)
  
## Installation

```
composer require clouding/range
```

## Usage

### Create

Create a new instance:
```php
use Clouding\Range\Range;

$range = new Range(1, 10);
```

Create a instance from string:
```php
$range = Range::parse('1..10');
```

### Getters

Get start or end:
```php
echo $range->start; // 1

echo $range->end;   // 10
```

### Comparison

Determine contains integer or not:
```php
$range = new Range(1, 10);

var_dump($range->contains(5)); // bool(true)
```

Determine two range instances is equals or not:
```php
$range = new Range(1, 10);
$rangeFoo = new Range(1, 10);

var_dump($range->equals($rangeFoo)); // bool(true)
```

Determine two range instances is intersect or not:
```php
$range = new Range(1, 10);
$rangeBar = new Range(5, 10);

var_dump($range->intersect($rangeBar)); // bool(true)
```

### Conversion

Get the instance as a string:
```php
$range = Range::parse('-5..5');

echo $range;            // -5..5
echo $range->toString() // -5..5
```

Get the instance as an array:
```php
$range = new Range(1, 5);

var_dump($range->toArray());  // [1, 2, 3, 4, 5]

// with gap 2
var_dump($range->toArray(2)); // [1, 3, 5]
```

Formatting string:
```php
echo $range->format(':start ~ :end');       // 1 ~ 10

echo $range->format('From :start to :end'); // From 1 to 10
```

### Functions

Execute a callback over each integer of range:
```php
$range = new Range(1, 5);

$range->each(function ($int) {
    echo $int, ', ';
});
// 1, 2, 3, 4, 5, 

$range->each(function ($int) {
    if ($int >= 3) {
        return false;
    }
    echo $int . ', ';
});
// 1, 2, 

// with gap 2
$range->each(function($int) {
    echo $int . ', ';
}, 2);
// 1, 3, 5,
```

Get random integer of the range:
```php
$range = new Range(1, 10);

echo $range->random();       // 3 

var_dump($range->random(3)); // [3, 2, 9] 
```
