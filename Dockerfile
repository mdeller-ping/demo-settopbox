FROM php:7.0-apache
EXPOSE 80
RUN apt-get update
RUN apt-get install -y git vim
RUN git clone https://github.com/mdeller-ping/demo-settopbox.git
RUN cp -r demo-settopbox/dist/* /var/www/html
