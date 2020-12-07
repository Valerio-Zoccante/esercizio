#!/bin/sh
set -e

# Packages
apk add --update \
    nginx \
    openssl \
    ca-certificates;

echo "
user $USER $USER;
worker_processes auto;
worker_rlimit_nofile 8192;

include /etc/nginx/modules/*.conf;

events {
	worker_connections 30;
}

http {
	include		    /etc/nginx/mime.types;
	include		    /etc/nginx/fastcgi.conf;

	index           index.php index.htm index.php;
	autoindex	    off;

	default_type	text/html;
	error_log		/dev/stderr info;
	access_log		/dev/stdout;
	sendfile		off;
	tcp_nopush		on;
	server_tokens	off;

	# Gzip
	gzip on;
	gzip_disable \"msie6\";
	gzip_vary on;
	gzip_proxied any;
	gzip_comp_level 6;
	gzip_buffers 16 8k;
	gzip_http_version 1.1;
	gzip_min_length 256;
	gzip_types text/plain text/css application/json application/x-javascript text/xml application/xml application/xml+rss text/javascript text/tab-separated-values text/csv image/svg+xml application/javascript;

	# woff2
	types {
		application/font-woff2 woff2;
	}

	# Cache
	map \$sent_http_content_type \$cacheable_types {
		\"image/x-icon\"			\"max-age=604800\";		# 1 week
		\"image/gif\"				\"max-age=2628000\";	# 1 month
		\"image/png\"				\"max-age=2628000\";	# 1 month
		\"image/jpg\"				\"max-age=2628000\";	# 1 month
		\"image/jpeg\"				\"max-age=2628000\";	# 1 month
		\"application/font-woff\"	\"max-age=31557600\";	# 1 year
		\"text/css\"				\"max-age=31557600\";	# 1 year
		\"application/javascript\"	\"max-age=31557600\";	# 1 year
		\"text/javascript\"			\"max-age=31557600\";	# 1 year
		default						\"max-age=0\";
	}

	# Temp folders
	client_max_body_size		${MAX_UPLOAD}m;
	client_body_buffer_size		128k;
	client_body_temp_path		/tmp/client_body_temp;
	fastcgi_temp_path			/tmp/fastcgi_temp;

	# Servers
	include /etc/nginx/servers/*.conf;
}" > /etc/nginx/nginx.conf

# Prepare directory
mkdir -p /etc/nginx/servers

# Nginx pid file
mkdir /run/nginx
chown $USER:$USER /run/nginx
chmod 770 /run/nginx
