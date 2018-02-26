[![Build Status](https://travis-ci.org/cyimking/boldleads.svg?branch=master)](https://travis-ci.org/cyimking/boldleads)

BoldLeads Full Stack Interview Exercise
=======================================
### Problem ###
You are tasked with building a lead capturing system that is part of an overall lead generation system for Real Estate Agents. The company marketing team has developed a campaign that will send to your part of the system a continual flow of leads. The leads are coming to get a free Comparative Market Analysis (CMA) for their home. For your part you need to build the landing page to collect the lead information, database to store the lead information and lead dashboard to view master/detail lead information.

### Installation ###

* `git clone https://github.com/cyimking/boldleads`
* `cd projectname`
* `composer install`
* `php artisan key:generate`
* Create a database and inform *.env*
* `php artisan migrate --seed` to create and populate tables
* `npm install npm@latest -g`
* `npm install`

### Testing ###
* `phpunit`
* or one can use Travis CI to run test cases via travis.yml

### Features ###
* Landing Page
* Authentication (login, logout). Registration is disabled for this application.
* Leads (create, display, view)

### Stack ###
* Laravel 5.6
* MySQL
* Vue.JS

### Notes ###
* Form does not capture the information without submitting the form. However, the code is included in the comments.
* Due to time constants, a frontend design was not implemented, however, I have mocked up a design.
* Assumption - Phone Number is implemented as a string since the country was not specified.
* Assumption - Users can not entered duplicated leads with the same email address.

### TODOs ###
* Implement caching via backend
* Implement queues via backend
* Implement landing page design via frontend