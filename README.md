The same application as the master branch, but now working with Symfony and doctrine.

To set up the application, firstly ensure you have composer and a MySQL client installed, then run composer install to install all the dependencies.
Also make sure the .env file contains the right values for your system.

Then, to set up the database, run:
```
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

Optionally, you can then also run
```
php bin/console doctrine:fixtures:load
```
to prepopulate the database with the values given in the assignment.

Now, start the webserver using:
```
php bin/console server:run
```

Navigate to http://localhost:8000/file/generate to generate and download the .csv file

There are also options (with a VERY basic HTML front-end) to list employees, add them and delete them.
There are no checks (yet) on the validity of arguments passed to these pages, but they are:
- http://localhost:8000/employee/ (lists all employees)
- http://localhost:8000/employee/add (a form with which you can add an employee)
- http://localhost:8000/employee/{id}/delete (deletes the employee with the given id (not shown))
