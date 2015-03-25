# store manager

## Installation
Add this line to your application's Gemfile:
```
gem 'store_manager', :git => 'git@github.com:lhvan/store_manager.git'
```
And then execute:
```
$ bundle
```
Next, we’ll generate and running migrations: 
```
$ rails g store_manager
$ rake db:migrate
```

## Usage
A Rubygem plugin that allows you import csv file store list. And then generate latitude, longitude using the Google Geocoding API from the address information.
The records auto save, you can get data from database. This plugin also render keep data as json format, it's really useful for search functionality is implemented in the js.

Url for import csv file:
```
/shops
```
