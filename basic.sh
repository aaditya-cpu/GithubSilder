#!/bin/bash

# Define the directory structure and files
create_structure() {
  echo "Creating directory structure and files..."
  mkdir -p github-repo-slider/admin
  mkdir -p github-repo-slider/public/templates

  touch github-repo-slider/github-repo-slider.php
  touch github-repo-slider/admin/admin-page.php
  touch github-repo-slider/public/slider.css
  touch github-repo-slider/public/slider.js
  touch github-repo-slider/public/templates/slider-template.php

  echo "<?php // Main plugin file" > github-repo-slider/github-repo-slider.php
  echo "<?php // Admin page functionality" > github-repo-slider/admin/admin-page.php
  echo "/* CSS for the slider */" > github-repo-slider/public/slider.css
  echo "// JavaScript for the slider" > github-repo-slider/public/slider.js
  echo "<?php // Slider template" > github-repo-slider/public/templates/slider-template.php

  echo "Directory structure created successfully."
}

# Display the contents of all files
display_contents() {
  echo "Displaying all file contents:"
  echo "============================="

  for file in $(find github-repo-slider -type f); do
    echo "===== FILE: $file ====="
    echo "-----------------------"
    cat "$file"
    echo
    echo "============================="
  done
}

# Main script logic
echo "1. Create Directory Structure"
echo "2. Display File Contents"
read -p "Choose an option (1/2): " choice

if [[ $choice -eq 1 ]]; then
  create_structure
elif [[ $choice -eq 2 ]]; then
  if [[ -d github-repo-slider ]]; then
    display_contents
  else
    echo "Directory structure does not exist. Please run option 1 first."
  fi
else
  echo "Invalid option. Exiting."
fi
