#!/bin/bash

## Release tag / version. If this is not for a specific release, please set this to latest, otherwise set it to a specific release.
version=2

###########################################################################################
#UNLESS YOU WANT TO CHANGE SOMETHING TO DO WITH THE PUSH TO NEXUS, LEAVE THE BELOW ALONE #
###########################################################################################
## The URL of the repo. Do not change unless you're sure about this.
prod=vesica/alquran.cloud

## The actual script to build and push the image
echo "Building production image"
docker build -f Dockerfile . -t $prod:$version
docker push $prod:$version

if [ "$version" != "latest" ]
    then
        docker build -f Dockerfile . -t $prod:latest
        docker push $prod:latest
    fi
