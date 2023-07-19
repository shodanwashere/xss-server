FROM php:7.4.30-apache

#RUN rm /var/www/html/*
COPY server/ /var/www/html
EXPOSE 80
