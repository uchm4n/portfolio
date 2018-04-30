#!/usr/bin/env sh

# abort on errors
set -e

# navigate into the build output directory
cd docs/

# if you are deploying to a custom domain
# echo 'www.example.com' > CNAME

if [ -d ".git/" ]; then
   sudo rm .git/ -r
fi

git init
git remote add origin git@github.com:uC137/portfolio.git
git add -A
git fetch
git checkout vuepress
git commit -m 'deploy'
git push -f git@github.com:uC137/portfolio.git vuepress:gh-pages

cd -