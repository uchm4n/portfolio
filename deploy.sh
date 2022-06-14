#!/usr/bin/env sh

# abort on errors
set -e

git add build_production -f && git commit -m "Build for deploy"

git subtree push --prefix build_production origin gh-pages
