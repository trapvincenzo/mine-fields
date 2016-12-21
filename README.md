#Kata mine fields

My solution to the mine fields kata!

##Requirements

```
A field of M x N squares is represented by N lines of
exactly M characters each. The character '*' represents
a mine and the character '.' represents no-mine.

Example input (a 4 x 3 mine-field of 12 squares, 2 of
which are mines)

4 3
*...
..*.
....

Your task is to write a program to accept this input and
produce as output a hint-field of identical dimensions
where each square is a * for a mine or the number of
adjacent mine-squares if the square does not contain a mine.

Example output (for the above input)
*211
12*1
0111
```

##Install dependencies
```php
composer install
```
##Run example
```php
php main.php
```

##Run tests
```php
vendor/bin/phpunit tests/
```
