#!/usr/bin/env sh

# abort on errors
set -e

git push origin `git subtree split --prefix build_production develop`:gh-pages --force