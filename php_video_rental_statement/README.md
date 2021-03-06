# Customer Statement for a Video Rental Store

## Requirements
- PHP 7.1+
- [composer](https://getcomposer.org/)

## Config

Copy the distributable config file (`config/local.php.dist`) to 

`config/local.php`

and modify the contents to configure the package as desired. The default configuration values have been provided in
the `config/local.php.dist` file.

| Default Supported Mime Types |
| ------------- |
| \*/* | 
| text/html |
| text/plain |

### Points Profiles

Points profiles provide information to the movie classification about how many frequent renter points a customer earns
when the movie is rented. 

```php
[
    'id' => 1,
    'basePoints' => 1,
    'bonusPoints' => 0,
    'bonusPointsThreshold' => 1,
],
```

The `basePoints` indicate how many points a customer earns for renting the movie, reguardless of the number of nights.
The `bonusPoints` indicate how many additional points can be earned once a certain number of rental nights has been 
reached, indicated by the `bonusPointsThreshold`. 

### Rate Profiles

Rate profiles provide information to the movie classification about how much a movie costs when it is rented. 

```php
[
    'id' => 1,
    'baseRate' => 1,
    'rate' => 0,
    'rateThreshold' => 1,
],
```

The `baseRate` indicates the initial cost of renting the movie, up to a defined number of nights (`rateThreshold`).
The `rate` indicates the additional cost per night once the rental has reached the `rateThreshold` number of nights. 

### Movie Classifications

Movie classifications provide classification names for movies and tie a movie to a points profile and rate profile.
 
 ```php
[
    'id' => 2,
    'name' => 'Childrens',
    'pointsProfile' => 2,
    'rateProfile' => 3,
],
```

When setting the `pointsProfile` and `rateProfile` for a movie classification in the config, use the `id` of the 
corresponding record. When loaded, the record will automatically be resolved.

## Setup

Run:

`php composer.phar install`

## Usage

To use the statement, go to the index.php page in a web browser. To change the type of information returned by the 
request, the `Accept` header must be changed. By default the content is returned as `text/plain`. Out of the box
`text/html` and `text/plain` is supported.

## Tests
Run 

`./vendor/bin/phpunit`

from the root of the project to execute all tests.

## Overview

This sample project is a program to calculate and print the statement of a customer's charges at a video rental store.

It's an example that approximates many of the issues we must work through on a regular basis in the AxisCare codebase. 
The code works and accomplishes the needs of the business, but it's not flexible. Altering the code to add new features 
is a scary task.

The program is heavily inspired by an example from the first edition of Martin's Fowler's Refactoring. While you are of 
course welcome to use almost any resource at your disposal during this code challenge, **you may not reference the book 
or any resources that discuss this example from the book**.

Feel free to ask us any questions you have while working on this.

## The Job to be Done

As it is, the program only spits out a plain-text statement. Your job is to get the program to produce an HTML version 
of the customer statement as well. The output of the plain-text statement must not change. The HTML statement's output 
must meet the following requirements:

- The header must be an `H1` element with the customer's name in italics, with the language "Rentals for _Customer Name_".
- Each movie rental listing must be on a new line with a colon after the movie name, like so:
  > Gone with the Wind: 5
- The footer lines should each be in their own `<p>` elements, with the total charge amount and the total frequent 
renter points each in italics.

In addition, our client told us that they plan on introducing several new movie classifications next year. We don't have 
them yet, so there's nothing to implement, but we need to make sure the program is ready to handle it when they're given 
to us. All we know so far is that while a movie can only have one classification at a time, that classification can 
change over time. (A "New Release" won't be a new release forever.)

The code can be brittle and obscure, so while you're working to meet the requirements above, make the code more flexible 
and easier to work with.

This is an open-ended challenge. There are no hidden gotchas or requirements here. After you return this to us, we'll 
sit down and go through a code review with you, so please be prepared to share your thinking on your work.
