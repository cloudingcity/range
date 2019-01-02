# Range

[![](https://img.shields.io/packagist/php-v/clouding/range.svg?style=flat-square)](https://packagist.org/packages/clouding/range)
[![](https://img.shields.io/packagist/v/clouding/range.svg?style=flat-square)](https://packagist.org/packages/clouding/range)
[![](https://img.shields.io/travis/com/cloudingcity/kata.svg?style=flat-square)](https://travis-ci.com/cloudingcity/range)
[![](https://img.shields.io/codecov/c/github/cloudingcity/kata.svg?style=flat-square)](https://codecov.io/gh/cloudingcity/range)

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

Formatting string:
```php
echo $range->format(':start ~ :end');       // 1 ~ 10

echo $range->format('From :start to :end'); // From 1 to 10
```
