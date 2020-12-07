FROM alpine:latest

MAINTAINER Jurgen Bosch <jurgen.bosch@takeaway.com>

ARG USER=www

# Max upload size in MBs
ARG MAX_UPLOAD=10

# Setup the install files
COPY install /install
COPY config /config
RUN /bin/sh /install/install.sh

# Configure supervisord
COPY config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy nginx config
COPY config/nginx.conf /etc/nginx/servers/default.conf

WORKDIR /var/www/html

EXPOSE 80 80
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
