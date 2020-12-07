#!/bin/sh
set -e

# Update package list
apk update
apk upgrade -q -U -a
apk add --update \
    gettext;

# Create the user
adduser -D -g '$USER' $USER;

# Create and set the workdir
mkdir -p /var/www/html
chown -R $USER:$USER /var/www/html

