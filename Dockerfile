FROM registry.opensuse.org/opensuse/bci/php-apache:8

COPY ./src/ /srv/www/htdocs
