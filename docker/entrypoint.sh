#!/bin/bash

# Determinar o ambiente
if [ "$APP_ENV" = "production" ]; then
    echo "Configuração de ambiente: Produção"
    cp .env.production .env
else
    echo "Configuração de ambiente: Desenvolvimento"
    cp .env.local .env
fi


if [ "$APP_ENV" = "production" ]; then
    php artisan key:generate
    php artisan migrate --force
    npm run build
    php artisan config:cache       
    php artisan route:cache        
    php artisan view:cache         
    php artisan event:cache        
    php artisan optimize
fi


if [ "$APP_ENV" = "local" ]; then
   php artisan key:generate
   php artisan migrate
   npm run build
   php artisan serve --host=0.0.0.0
fi

# Inicializar o servidor PHP-FPM
exec "$@"
