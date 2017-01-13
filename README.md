# CloneBNB


## About
A rare mixture between AirBnB and Booking.com.


## Instalation
1). Run Composer: 

    composer install


2). Migrate Database:

    php bin/console doctrine:migrations:migrate

3). Load Fixtures (Seeders):

    php bin/console doctrine:fixtures:load

4). Set ownership and permissions (note that your user, must be a member of the [www-group]:

    chown [www-user]:[www-group] * -R
    chmod 775 -R var/

## Deploying
0). Set permissions (if required*):

    chmod 775 -R var/

1). Update composer:

    composer update
    
2). Migrate Database:

    php bin/console doctrine:migrations:migrate

3). Load Fixtures (Seeders) * - **Only if required**:

    php bin/console doctrine:fixtures:load


## Important!!!

In order to use the *comur/image-bundle* I was required to add *jms/translation-bundle* with **dev-master** release, which might be potentially dangerous!

Check [https://github.com/comur/ComurImageBundle] frequently and when official Symfony 3.x support is added, edit the composer.json 