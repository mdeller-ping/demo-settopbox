FROM php:7.0-apache
EXPOSE 80
RUN apt-get update
RUN apt-get install -y git
RUN git clone https://github.com/mdeller-ping/demo-settopbox
RUN cp demo-settopbox/dist/* /var/www/html
