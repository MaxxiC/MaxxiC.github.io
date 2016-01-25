#!/bin/bash

cd ./Desktop/MyRepo
rm -f Packages.bz2
dpkg-scanpackages debs
bzip2 -fks Packages
