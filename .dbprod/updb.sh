#!/bin/bash

aws --endpoint-url=https://storage.yandexcloud.net \s3 cp `date +s3://legion/legioncrm/db/backupdb_crmlegion_%Y-%m-%d`.00:00:01.sql.gz /var/www/clubcrm_back.loc/.dbprod/db.gz && gunzip /var/www/clubcrm_back.loc/.dbprod/db.gz && mysql -u clubcrm_loc -pDn100883! clubcrm_loc < /var/www/clubcrm_back.loc/.dbprod/db; rm db && cd .. && php artisan migrate && php artisan optimize
