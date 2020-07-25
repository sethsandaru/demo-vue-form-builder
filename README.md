# Demo Vue Form Builder - Usage
With this repo, I'll show you the demo of Form Template & Form GUI.   
For the [Vue Form Builder](https://github.com/sethsandaru/vue-form-builder), please visit: https://github.com/sethsandaru/vue-form-builder

Also, I will show to you how I will save and retrieve my configurated form template and render for user use it.

All backend code is using Laravel 5.7 (Just need Eloquent to do the job :D)

## Most important you need to know
For the guys who didn't use PHP as the Backend, maybe Java, Go, Ruby,... Then you don't have to read all the stuff PHP.

You can simply traverse this list:
- [Database Design](https://phattranminh96.gitbook.io/vue-form-builder/getting-started/save-form-configuration#simple-database-design)
- How I handle the Insert / Update:
    - Insert:
    - Update: 
- How I retrieve the Form for Update
    - Backend
    - Frontend
- How I retrieve the Form for Renderer
    - Backend - as same as for update
    - Frontend
## Dependencies
- PHP 7+
- Composer
- MySQL

## Install and test in your local machine
1. Clone this project
2. CD to the project's root
3. Run: `composer install` to install dependencies of Laravel
4. Config your database connection in `.env` file.
5. Run: `php artisan migrate` to create the table.
6. You can visit `http://your_host/your_folder/public` to test :D 

Note: to turn on insert & update form config, you need to:
- Open file: `config/sandaru.php`
- Set `disable_populate` to **true**
(Sorry for this inconvenience, I added this constraint to make sure my Live Demo doesn't have any trash data in there)

## Live demo
You can visit my site here: http://vue-form-builder.sethphat.com

Copyright &copy; 2018 by Phat Tran Minh aka Seth Phat.
