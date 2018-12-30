# range

## Usage

Create a Range object with start and end:
```php
$range = new Range(1, 10);
```

Get start and end:
```php
echo $range->start(); // 1

echo $range->end(); // 10
```

Determine range contains integer:
```php
var_dump($range->contains(5)); // true

var_dump($range->isNotContains(15)); // true
```
