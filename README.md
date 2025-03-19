## بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْم

[![CI](https://cairo.mamluk.net/api/v1/teams/islamic-network/pipelines/alquran-cloud/badge)](https://cairo.mamluk.net/teams/islamic-network/pipelines/alquran-cloud)
[![](https://img.shields.io/docker/pulls/islamicnetwork/alquran.cloud.svg)](https://cloud.docker.com/u/vesica/repository/docker/islamicnetwork/alquran.cloud)
[![](https://img.shields.io/github/release/islamic-network/alquran.cloud.svg)](https://github.com/islamic-network/alquran.cloud/releases)
[![](https://img.shields.io/github/license/islamic-network/alquran.cloud.svg)](https://github.com/islamic-network/alquran.cloud/blob/master/LICENSE)
![GitHub All Releases](https://img.shields.io/github/downloads/islamic-network/alquran.cloud/total)

# This repository is no longer active. Please see https://community.islamic.network/d/140-removing-repositories-from-github.

# Al Quran Cloud

This is the code you see deployed on https://alquran.cloud. This documentation explains how you can get setup
to deploy your own instance and contribute code.

## Technology Stack and Requirements
* PHP 8.1
* Composer - See composer.json for other dependencies
* Slim Framework 4
* Bootstrap 3
* JQuery
* Bootstrap Multiselect
* Docker

## Getting Started

### Running the App

The app is fully Dockerised. You **just need docker** to spin it up.

A production ready Docker image of the app is published as:
* quay.io/islamic-network/alquran.cloud on Quay
* ghcr.io/islamic-network/alquran.cloud on Docker Hub

To get your own instance up, simply run:

```
docker run -it -p 8081:8080  ghcr.io/islamic-network/alquran.cloud:latest
``` 

You can now visit http://localhost:8081/ and start using it.

### Build and Contribute

**Please note that the Dockerfile included builds a production ready container which has opcache switched on and xdebug turned off, so you will only see your changes every 5 minutes if you are developing. To actively develop, change the ```FROM vesica/php72:latest``` line to ```vesica/php72:dev```.**

1. Clone this repository
2. Run ```docker build . -t ghcr.io/islamic-network/alquran.cloud```. This will build an image with production dependencies only.
3. Run ```docker run -it -p 8081:8080  -v $(pwd)/.:/var/www ghcr.io/islamic-network/alquran.cloud``` to spin up the built image.
3. Run ```composer install``` to add development dependencies.
6. Make sure you have internet connectivity so the app can connect to https://api.alquran.cloud.
7. Open your browser and browse to http://localhost:8081/.
8. Any changes you make will be synced to the Docker container. You just refresh the page in the browser to see them.

## Scaling and Sizing

This app takes 15 MB per apache process / worker and is set to have a maximum of 20 Apache workers.

A single instance should be sized with a maximum of 512 MB RAM, after which you should scale it horizontally.

## Contributing Code

You can contribute code by raising a pull request.

There's a backlog of stuff under issues for things that potentially need to be worked on, so please feel free to pick something up from there or contribute your own improvements.

You can also join the community at https://community.islamic.network/.

