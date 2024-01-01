FROM dwchiang/nginx-php-fpm:8.2.5-fpm-bullseye-nginx-1.24.0

WORKDIR /var/www/html

EXPOSE 80

RUN apt-get --allow-releaseinfo-change update && \
    apt-get install --no-install-recommends --no-install-suggests -y \
    cron \
    ssh \
    wget \
    libzip-dev && \
    docker-php-ext-install zip pdo_mysql && \
    apt-get remove --purge --auto-remove -y && apt-get autoclean && rm -rf /var/lib/apt/lists/* /var/cache/apt/archives/partial/*

# install amazon-cloudwatch-agent
# RUN curl -O https://s3.amazonaws.com/amazoncloudwatch-agent/debian/amd64/latest/amazon-cloudwatch-agent.deb && \
#    dpkg -i -E amazon-cloudwatch-agent.deb && \
#    rm -f amazon-cloudwatch-agent.deb

# cloudwatch config
# COPY docker/cloudwatch/amazon-cloud-watch.conf /etc/supervisor/conf.d/amazon-cloud-watch.conf
# COPY docker/cloudwatch/amazon-cloudwatch-agent.json /opt/aws/amazon-cloudwatch-agent/etc/amazon-cloudwatch-agent.json

# nginx config
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# install composer
RUN wget https://getcomposer.org/installer -O - -q | \
    php -- --install-dir=/usr/local/bin --filename=composer --2 --quiet

# setup cron for laravel
RUN echo "* * * * * root /usr/local/bin/php /var/www/html/artisan schedule:run >> /var/log/cron.log 2>&1" >> /etc/crontab

# app
COPY ./ /var/www/html
COPY docker/laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf
RUN composer install --no-dev && \
  chown -R www-data:www-data storage/ &&  \
  chown -R www-data:www-data bootstrap/cache

# entry
COPY docker/docker-entrypoint.sh /docker-entrypoint.sh
RUN chmod +x /docker-entrypoint.sh

CMD /docker-entrypoint.sh
