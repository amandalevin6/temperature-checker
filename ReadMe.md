# Temperature Worksheet & Grading API

The Temperature Worksheet & Grading API simplifies science Temperature conversion worksheet grading by doing the answer checking for you.  It allows you to create/update/view/delete Temperature conversion questions (Fahrenheit to Celsius, Fahrenheit to Kelvin, Celsius to Rankine, etc.), worksheets - which are grouping of questions, students and answers.  The api  

## Getting Started

### Requirements

* PHP >= 7.2.0
* Composer
* Laravel 5.5


### Installation

#### Download the files

Once you have Laravel installed, you can clone the temperature grader repo with the following command

```bash
git clone https://github.com/amandalevin6/temperature-grader.git
```
Navigate into the temperature grader folder via the command-line
```bash
cd temperature-grader
```
#### Copy the .env.example file and Connect
In the root directory, there is a .env.example file that comes with all typical dependencies. Copy that file to our main .env file with the following command:

```bash
cp .env.example .env
```

#### Create the database & Update the DB Credentials and App URL in your .env file

Create your database on your server.

Then update the database credentials and the app url in your .env file.
```
APP_URL=http://localhost
DB_HOST=localhost
DB_DATABASE=database
DB_USERNAME=user
DB_PASSWORD=password
```

#### Install the dependencies

```bash
composer install
```

#### Generate an Application Key
```bash
php artisan key:generate
```
#### Run the database migrations

Import the database structure by running the artisan migrate command

```
php artisan migrate
```

### Getting Started

#### Creating a user account & access token



Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Laravel](http://www.dropwizard.io/1.0.2/docs/) - The web framework used


## Authors

* **Amanda Levin** - *Initial work* - [amandalevin6](https://github.com/amandalevin6)


