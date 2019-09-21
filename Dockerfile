FROM php:7.2-fpm

RUN apt-get update -y
RUN apt-get upgrade -y

RUN apt-get install git -y
RUN apt-get install zip unzip -y

WORKDIR /opt
