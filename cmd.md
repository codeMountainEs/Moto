php artisan make:volt motos/list --class

php artisan make:volt motos/edit --class


# Authorization

By default, the authorize method will prevent everyone from being able to update the Chirp. We can specify who is allowed to update it by creating a Model Policy with the following command:

php artisan make:policy MotoPolicy --model=Moto



#Creating the notification

Artisan can, once again, do all the hard work for us with the following command:

php artisan make:notification NewMoto


# Creating an event

Events are a great way to decouple various aspects of your application, since a single event can have multiple listeners that do not depend on each other.

Let's create our new event with the following command:

php artisan make:event MotoCreated


# Crear un oyente de eventos

Ahora que estamos enviando un evento, estamos listos para escuchar ese evento y enviar nuestra notificación.

Vamos a crear un oyente que se suscriba a nuestro evento ChirpCreated:

php artisan make:listener SendMotoCreatedNotifications --event=MotoCreated



# Dashboard 

php artisan make:volt layout/matricula --class

# FILAMENT 
composer require filament/filament:"^3.2" -W

php artisan filament:install --panels


* TRANSLATIONS
  php artisan vendor:publish --tag=filament-panels-translations

