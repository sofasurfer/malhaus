#!/bin/bash

# Creates a release package
DIR="./_release"
mkdir -p "$DIR"

# Update Version
perl -pe '/^Version: / and s/(\d+\.\d+\.\d+\.)(\d+)/$1 . ($2+1)/e' -i style.css

#Sync files
rsync -va ./acf-json/ ./_release/acf-json/
rsync -va ./components/ ./_release/components/
rsync -va ./languages/ ./_release/languages/
rsync -va ./dist/ ./_release/dist/
rsync -va ./images/ ./_release/images/
rsync -va ./templates/ ./_release/templates/
cp -v ./functions.php ./_release/
cp -v ./index.php ./_release/
cp -v ./screenshot.png ./_release/
cp -v ./style.css ./_release/

# Delete hidden files
find ./_release/ -name '.DS*' -delete

# Copy files to LIVE server
#rsync -rva ./_release/ vemamuwo@sl1702.web.hostpoint.ch:/home/vemamuwo/www/malhaus.ch/content/themes/malhaus/

rm -rf "$DIR"

echo "Done";