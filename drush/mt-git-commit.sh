#!/usr/bin/sh

echo Please add a commit message
read cMESSAGE

./mt-init.sh
cd public_html/meditrainer
git commit -m $cMESSAGE