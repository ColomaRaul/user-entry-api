FROM php:8.3-fpm-alpine

COPY php.ini /usr/local/etc/php/conf.d/docker-php-config.ini

RUN apk add --update --no-cache 																					\
    	linux-headers																								\
		acl 																										\
		fcgi 																										\
		file 																										\
		gettext 																									\
		git 																										\
		gnu-libiconv

RUN set -eux; 																										\
	apk add --no-cache --virtual .build-deps 																		\
		$PHPIZE_DEPS 																								\
		icu-dev 																									\
		libzip-dev 																									\
		zlib-dev

RUN docker-php-ext-configure zip 																				&&  \
	docker-php-ext-install -j$(nproc) 																				\
		intl 																										\
		zip


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache --virtual .pgsql-deps postgresql-dev; \
	docker-php-ext-install -j$(nproc) pdo_pgsql; \
	apk add --no-cache --virtual .pgsql-rundeps so:libpq.so.5; \
	apk del .pgsql-deps

RUN mkdir -p /srv/app/var/cache /srv/app/var/log 																&&	\
    setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX /srv/app/var												&& 	\
	setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX /srv/app/var


WORKDIR /var/www/html
