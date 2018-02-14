#!/bin/bash
echo "Ange URL:en för development miljön (exempel: dev.digirock.se)"
read envURL
sed -i '' "s/dev.digirock.se/$envURL/g" .env.example
dbname=$(sed -e 's/dev.//' -e 's/\.\.*/_/' <<< $envURL)
sed -i '' "s/database_name/$dbname/g" .env.example
cp .env.example .env

echo ""
echo "Skapar en ny databas..."
mysql -uroot -e "CREATE DATABASE ${dbname} CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
echo "Databas skapad! Namn: ${dbname}"
echo ""

wp theme activate jupiter-child
wp plugin activate soil disable-comments post-duplicator js_composer_theme artbees-captcha nginx-cache
wp option update blogdescription ''
wp cache flush