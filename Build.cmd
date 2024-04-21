@echo off

rem Build the Docker images
docker-compose build

rem Create and start the containers
docker-compose up -d