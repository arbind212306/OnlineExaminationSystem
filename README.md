// take latest code from dev branch from git repo

1. create database and configure into the env file
2. Go to your project directory and run migrations by hitting command 'php artisan migrate'
3. run 'php artisan db:seed' command to run seeds
4. Their are two types of users one admin and other one is normal user
5. Default Admin and one user is created. Their details are provided in the seed file.
6. Use default credential to login as Admin. by accessing the 
   url like http://127.0.0.1:8000/admin/login
7. You can use default credentals for the normal user to login or you are free to create a 
   new one. url for accessing normal user login is like http://127.0.0.1:8000/login
   which is default root page for this application.

// Admin
8. Admin can login and craete exams/assesment test with the details that are required in form.
9. Admin can create questions for each exam and set 4 options for each question and valid
   option and valid marks for each
10. When ever new user registered Admin will allow him for login by updating the status, he 
    should clik on status and accordingly it will change.
11. Whenever user enrolled for some assement, Admin should allow him to attend the exam by
    updating the status of enrolled users from the enrolled user table by cliking the
    status

12. User will be allowed for one time only to acess a same.
