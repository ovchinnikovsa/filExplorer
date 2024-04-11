#!/bin/bash

main_dir='files'
path="$PWD/docker"
cd "$path"
mkdir "$main_dir" >> /dev/null
cd "$path/$main_dir"
path="$PWD"

declare -a folders=(
    "nature:forest:sea"
    "abstract:shapes:colors"
    )

declare -a extensions=(".jpg" ".png" ".gif")

for folder in "${folders[@]}"
do
    IFS=':' read -ra ADDR <<< "$folder"

    mkdir -p "${ADDR[0]}"

    for subfolder in "${ADDR[@]:1}"
    do
        mkdir -p "${ADDR[0]}/$subfolder"

        i=0
        for extension in "${extensions[@]}"
        do
            touch "${ADDR[0]}/$subfolder/$subfolder$i$extension"
            ((i++))
        done
    done
done