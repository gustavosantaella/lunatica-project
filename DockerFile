FROM wyveo/nginx-php-fpm:php80

WORKDIR /var/www/html

COPY . .

RUN chmod +x deploy.sh


RUN "echo deployed"
