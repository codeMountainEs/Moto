php artisan make:volt motos/list --class

php artisan make:volt motos/edit --class


# Authorization

By default, the authorize method will prevent everyone from being able to update the Chirp. We can specify who is allowed to update it by creating a Model Policy with the following command:

php artisan make:policy MotoPolicy --model=Moto



#Creating the notification

Artisan can, once again, do all the hard work for us with the following command:

php artisan make:notification NewMoto
