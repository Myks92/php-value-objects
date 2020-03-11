# Geography
This groups Value Objects use for geography, e.g. for cities, address or for another.

## Coordinate

```php
use Myks92\ValueObjects\Geography\Coordinate;

$coordinate = new Coordinate(54.53, 55.54);
$coordinate->getLatitude(); //54.53
$coordinate->getLongitude(); //55.54

$coordinate->isEqualTo(new Coordinate(51.50, 52.60)); //false
```