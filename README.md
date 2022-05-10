### Hexlet tests and linter status:
[![Actions Status](https://github.com/popovbm/php-project-lvl1/workflows/hexlet-check/badge.svg)](https://github.com/popovbm/php-project-lvl1/actions)
[![Maintainability](https://api.codeclimate.com/v1/badges/a99a88d28ad37a79dbf6/maintainability)](https://codeclimate.com/github/codeclimate/codeclimate/maintainability)
![example workflow](https://github.com/popovbm/php-project-lvl1/actions/workflows/lint-check.yml/badge.svg)
# Brain Games
#### Console mini-games where the player needs to solve arithmetic and logical tasks.

## Required:
- The latest version of php installed
- Installed composer, so that it is available globally by the composer command([see](https://getcomposer.org/doc/00-intro.md#globally))

## How to install:
```sh
git clone git@github.com:popovbm/php-project-lvl1.git
cd php-project-lvl1
make "game name" (e.g. make brain-even)
```

## Rules:
- The user is asked three questions in turn.
- If the user has entered the correct answer to the first question, the game continues and moves on to the second question. All three questions must be answered correctly.
- If the user gives an incorrect answer, the game ends.

### Brain-even
#### Question:
The user is shown a random number(e.g. "42"). The user must enter "yes" if the number is even, or "no" if it is odd.
[![asciicast](https://asciinema.org/a/490861.svg)](https://asciinema.org/a/490861)

### Brain-calc
#### Question:
The user is shown a random mathematical expression(e.g. "12 + 33") that needs to be calculated and enter the correct answer.
[![asciicast](https://asciinema.org/a/490859.svg)](https://asciinema.org/a/490859)

### Brain-gcd
#### Question:
The user is shown two random numbers(e.g. "25 50"). The user must calculate and enter the greatest common divisor of these numbers.
[![asciicast](https://asciinema.org/a/490858.svg)](https://asciinema.org/a/490858)

### Brain-progression
#### Question:
The user is shown a series of numbers forming an arithmetic progression with one missing value (e.g. "1 2 3 .. 5 6 7 8"). The user must enter a missing value.
[![asciicast](https://asciinema.org/a/490856.svg)](https://asciinema.org/a/490856)

### Brain-prime
#### Question:
The user is shown a random number(e.g. "15"). The user must enter "yes" if the number is prime, or "no" if it's not prime.
[![asciicast](https://asciinema.org/a/490855.svg)](https://asciinema.org/a/490855)
