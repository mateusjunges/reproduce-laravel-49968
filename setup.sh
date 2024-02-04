#!/bin/bash
php artisan setup:1
php artisan setup:2
php artisan setup:3
php artisan setup:4

git add -A

# # link to main package
# git reset HEAD -- app/*
# git reset HEAD -- config/*
# git reset HEAD -- database/*
# git reset HEAD -- resources/*
# git reset HEAD -- routes/*
# git reset HEAD -- tests/Feature*
# git reset HEAD -- tests/Unit*

# link to shared
git reset HEAD -- storage
git reset HEAD -- storage/*

git commit -m "Post setup commit"
