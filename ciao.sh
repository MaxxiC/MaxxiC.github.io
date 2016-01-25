#!/bin/bash

rm -r ./Packages.bz2
dpkg-scanpackages ./debs
bzip2 -fks Packages
