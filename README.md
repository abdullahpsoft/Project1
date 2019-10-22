# Project1
Requirements
1. Larevel version 5.8.*
2. Php verion 7
3. Git
4. XAMPP

Login Details:
1. Superadmin

        Username:admin@test.com
        password:password

2. User

       Username:user@test.com
       password:user
           
3. Admin

       Username:admin@admin.com
       password:admin
                      
4. Groupmanager

       Username:groupmanager@test.com
       password:groupmanager
       
First you have to put your database and other credentials in .env file
Then migrate the database tables by using the command:

       php artisan migrate

If the connection to database is successfully created then you are good to fill the tables either with seeding or manual exporting laravel_db.sql file under database folder.

The final command you have to enter is:

        php artisan serve
        
Now open the link which just appeared after entering the above command.
                                 