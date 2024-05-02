#!/bin/bash
echo Whats the name of the file?
read name

zip -rq $name.zip ./ -x \
node_modules/\* \
 .git/\* \
 .env \
 .editorconfig \
 .prettierrc \
 .stylelintrc \
 .yarnrc.yml \
 composer.json \
 composer.lock \
 .yarn/\* \
 mix-manifest.json \
 package.json \
 safelist.txt \
 tailwind.config.js \
 webpack.mix.js \
 yarn.lock \
 .gitignore \
 vendor/squizlabs/\* \
 vendor/wp-coding-standards/\* \
 .dev/\*
