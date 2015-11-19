###################### Post-Install README #########################

Congratulations! You just installed the dependencies of Le Muret.

# To complete setup YOU MUST
> php artisan key:generate
> vi .env # set the mysql credentials and db name you created ;)
> php artisan migrate
> php artisan db:seed

######################## INSTALL FINISHED ##########################

# To see your site live
> php artisan serve

# To upload via ftp
> vi ftpconfig.js && gulp upload

# To see live changes as you dev
> gulp watch

####################################################################
