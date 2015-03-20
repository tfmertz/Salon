# Hair Salon

### Tom Mertz

###### March 20, 2015

##### Description

The user of the app would be a hair salon owner. The app allows the user to input stylists and add clients to those specific stylists in a one-to-many relationship, where one stylist has many clients.

##### Set up

1. Clone the git repo
2. Enter the commands outlined under _Database_ below to create your local pgsql database
3. Follow the instructions in 'setup.config.example' to add database user/pass that won't be committed
3. Navigate to the web folder and start a php server
4. Load localhost:8000 in your browser

##### Database

Import the hair_salon.sql and hair_salon_test.sql file into your postgres

**If this fails, use the following commands:**

CREATE DATABASE hair_salon;

\c hair_salon

CREATE TABLE stylists (id serial PRIMARY KEY, stylist varchar);

CREATE TABLE clients (id serial PRIMARY KEY, client varchar, stylist_id int);

CREATE DATABASE hair_salon_test WITH TEMPLATE hair_salon;

The database should now be ready for testing.

##### Technology

* PHP
* PostgreSQL
* PHPUnit
* Silex
* Twig
* CSS (Skeleton)

##### License

The MIT License (MIT)

Copyright (c) 2015 Tom Mertz

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
