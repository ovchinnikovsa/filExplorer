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
        "animals:cats:dogs"
        "landscape:mountains:beaches"
        "sports:football:baseball"
        "food:fruits:vegetables"
        "people:friends:family"
        "games:chess:poker"
        "travel:hotels:airports"
        "architecture:buildings:skyscrapers"
    )

declare -a extensions=(".jpg" ".png" ".gif" ".txt" ".php")

for folder in "${folders[@]}"
do
    IFS=':' read -ra ADDR <<< "$folder"

    mkdir -p "${ADDR[0]}"

    i=0
    for extension in "${extensions[@]}"
    do
        touch "${ADDR[0]}/${ADDR[0]}$i$extension"
        ((i++))
    done

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