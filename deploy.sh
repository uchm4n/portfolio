#!/usr/bin/env sh

# abort on errors
set -e

git push origin `git subtree split --prefix docs master`:gh-pages --force
