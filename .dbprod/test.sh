#!/bin/bash

cd .. && php artisan migrate:fresh --seed && php artisan optimize && php artisan config:cache && php artisan config:clear && php artisan test
