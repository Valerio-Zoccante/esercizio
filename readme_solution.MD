#### Setup environment
- Please run follwing command to execute migration of related cookies table: docker-compose exec app php artisan migrate
- Please run the following command for seeding the data into the DB: docker-compose exec app php artisan db:seed

#### Decision
Two models have been constructed, one for each table in the DB.
One controller to retrieve data from the models and pass the data to the cookie view.
One view has been created, and one route defined.
Css and JQuery used for better presentation. By clicking is possible to show and hide ingredients for each biscuit.
