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
#### Create your .env file from the .env.example
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

#### Creating a user account & api token

To create a user account post your user details to http://yourappurl.com/register in the following format

```
name:John Doe
email:John.Doe@company.com
password:{Your Password}
password_confirmation:{Your Password}
```

You will get back your user info, including your newly generated api token which you will need to use in your requests.

##### API Entities

The Entities in the API and their fields are:

* Students
-> id
-> guid
-> name

* Worksheets
-> id
-> name

* Questions
-> id
-> name
-> input_temperature
-> unit_of_measure
-> answer

* Answers
-> id
-> student_id
-> worksheet_id
-> question_id
-> answer_value
-> grade

Each of those entities has functions to View All, View one, Create One, Update and Delete. 
The functions urls for worksheets for example are as follows:
View ALL = GET http://yourappurl.com/worksheets
View One = GET http://yourappurl.com/worksheets/{id}
Create One = POST http://yourappurl.com/worksheets
Update One = http://yourappurl.com/students/{id}

The functions urls for students filter on the external variable guid and are as follows:
View One = GET http://yourappurl.com/students/{guid}
Update One = http://yourappurl.com/students/{guid}

#### Creating multiple Entities at one time

There are a few extra features on the create questions and answers api calls

On Questions and Answers if you post `worksheet_name`, if there is no worksheet with that name the system will create one, otherwise, it will retrieve the id of the existing worksheet.

On Answers if you post `question_name`, if there is no question with that name belonging to that specific worksheet, the system will create one, otherwise, it will retrieve the id of the existing question.

On Answers if you post `student_name` & `student_guid`, if there is no student with that name and guid, the system will create one, otherwise, it will retrieve the id of the existing student.


## Built With

* [Laravel](http://www.dropwizard.io/1.0.2/docs/) - The web framework used


## Authors

* **Amanda Levin** - *Initial work* - [amandalevin6](https://github.com/amandalevin6)


