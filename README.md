# Al Quran Cloud

This is the code you see deployed on https://alquran.cloud. This documentation explains how you can get setup
to deploy your own instance and contribute code.

## Technology Stack
* PHP 7
* Composer - See composer.json for other dependencies
* Slim Framework
* Bootstrap 3
* JQuery
* Bootstrap Multiselect
* Media Elements JS

## Getting Started

God willing, I will provide links to Docker containers with instructions on how to spin up an environment from scratch in a few minutes. If you'd like to have a go at doing this, please go for it.

In the mean time:

1. Clone this repository
2. Run
```
composer install
```
3. Make sure you have a directory called logs at the root level of this repository to which your web server (apache or nginx) can write
4. Point your web server's document root to the www directory.
5. Make sure you have internet connectivity so the app can connect to https://api.alquran.cloud
6. Open your browser and browse the URL for the hostname pointing to the www directory.

You should see the homepage.

## Contributing Code

You can contribute code by raising a pull request. If you'd like to moderate the code, please get in touch with us on alquran.cloud@outlook.com.

There's a backlog of stuff under issues for things that potentially need to be worked on, so please feel free to pick something up from there or contribute your own improvements.
