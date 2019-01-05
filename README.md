# Range

[![](https://img.shields.io/packagist/php-v/clouding/range.svg?style=flat-square)](https://packagist.org/packages/clouding/range)
[![](https://img.shields.io/packagist/v/clouding/range.svg?style=flat-square)](https://packagist.org/packages/clouding/range)
[![](https://img.shields.io/travis/com/cloudingcity/kata.svg?style=flat-square)](https://travis-ci.com/cloudingcity/range)
[![](https://img.shields.io/codecov/c/github/cloudingcity/kata.svg?style=flat-square)](https://codecov.io/gh/cloudingcity/range)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-44CC11.svg?longCache=true&style=flat-square)](https://github.com/phpstan/phpstan)

A simple library for **Range** object.

## Installation

```
composer require clouding/range
```
## Usage

Create a Range object with start and end:
```php
use Clouding\Range\Range;

$range = new Range(1, 10);
```

Create a instance from parse a range string:
```php
$range = Range::parse('1..10');
```

Get start and end:
```php
echo $range->start; // 1

echo $range->end;   // 10
```

Determine range contains integer or not:
```php
var_dump($range->contains(5)); // bool(true)
```

Determine two range object is equals or not:
```php
$rangeFoo = new Range(1, 10);

var_dump($range->equals($rangeFoo)); // bool(true)
```

Determine two range object is intersect or not:
```php
$rangeBar = new Range(5, 10);

var_dump($range->intersect($rangeBar)); // bool(true)
```

Get a range string:
```php
$range = Range::parse('-5..5');

echo $range;            // -5..5
echo $range->toString() // -5..5
```

Formatting string:
```php
echo $range->format(':start ~ :end');       // 1 ~ 10

echo $range->format('From :start to :end'); // From 1 to 10
```

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

$range->each(function($int) {
    echo $int . ', ';
}, 2);
// 1, 3, 5,
```
