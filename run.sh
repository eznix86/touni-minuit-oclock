#!/bin/bash

# Building css because cdn is not meant to be used in production
npm install
npx @tailwindcss/cli -i ./src/input.css -o ./src/assets/output.css --watch