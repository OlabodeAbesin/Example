# Example

### Overview
The purpose of this service is to create a service that accepts the necessary information and sends a notification to customers.

### Tools:

* Laravel
* PHP8
* Mysql
* Nginx

## Installation

1. Download/Git clone code
2. Setup mysql DB in .env
3. Run below
```bash
php artisan migrate --seed
```


Sample Postman collection of endpoints
```bash
https://www.getpostman.com/collections/261d8ecf0104bc614fc9
```

I used the Repository design pattern, some dependency injections. 
I implemented localization by implementing ```bashHasLocalePreference``` in my user model, the user language automatically resolved

## Tradeoffs

* I assumed Customer has only one device and stored push token on users table, in real lif this is not true.

## Running tests

Tests can be found grouped under root test folder. Grouped into feature and unit subfolders
Run below
```bash
composer test
```
