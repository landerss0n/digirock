#!/bin/bash
echo "Ange URL:en för development miljön (exempel: dev.digirock.se)"
read envURL
sed -i '' "s/dev.digirock.se/$envURL/g" .env.example
dbname=$(sed -e 's/dev.//' -e 's/\.\.*/_/' <<< $envURL)
sed -i '' "s/database_name/$dbname/g" .env.example
cp .env.example .env

cp /usr/local/etc/nginx/sites-available/digirock.conf /usr/local/etc/nginx/sites-available/$envURL.conf
nginx=$(sed -e 's/dev.//' <<< $envURL)
sed -i '' "s/digirock.se/$nginx/g" /usr/local/etc/nginx/sites-available/$envURL.conf
ln -s /usr/local/etc/nginx/sites-available/$envURL.conf /usr/local/etc/nginx/sites-enabled/$envURL.conf
sudo brew services restart nginx

subl /etc/hosts
read -p "Klicka på [Enter] när hosts är klart"

echo ""
echo "Skapar en ny databas..."
mysql -uroot -e "CREATE DATABASE ${dbname} CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
echo "Databas skapad! Namn: ${dbname}"
echo ""
echo "Nu öppnas development miljön var god att installera WordPress"
open http://$envURL
read -p "Klicka på [Enter] när WordPress är installerat (du behöver inte logga in)"

wp theme activate jupiter-child
wp plugin activate soil disable-comments post-duplicator js_composer_theme artbees-captcha
wp option update blogdescription ''
wp cache flush
wp dotenv salts regenerate

echo "Dags att skapa repo"
echo ""
echo "Ange namn för repository på Bitbucket"
read bitbucketRepo

curl --user landerss0n https://api.bitbucket.org/1.0/repositories/ \
--data name=$bitbucketRepo --data is_private=true

echo "Skapar repo"
echo ""

rm -rf .git
git init
git remote add origin git@bitbucket.org:landerss0n/$bitbucketRepo.git
git add .
git commit -m "Initial commit"
git push -u origin master

sed -i '' "s/apa.se/lol.se/g" /usr/local/etc/nginx/sites-available/dev.digi.se.conf