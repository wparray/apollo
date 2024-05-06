#!/bin/bash

# Ask for the name of the file
echo "What is the name of the file?"
read name

# Define an array of files and directories to exclude
exclude=(
  "node_modules/*"
  ".git/*"
  ".env"
  ".editorconfig"
  ".prettierrc"
  ".stylelintrc"
  ".yarnrc.yml"
  "composer.json"
  "composer.lock"
  ".yarn/*"
  "mix-manifest.json"
  "package.json"
  "safelist.txt"
  "tailwind.config.js"
  "webpack.mix.js"
  "yarn.lock"
  ".gitignore"
  "vendor/squizlabs/*"
  "vendor/wp-coding-standards/*"
  ".dev/*"
)

# Create a zip file while excluding the specified files and directories
zip -rq "$name.zip" ./ -x "${exclude[@]}"
