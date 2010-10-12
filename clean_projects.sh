#!/bin/bash
#
# clean up the projects

# vars
hg_project="hg_project"
bzr_project="bzr_project" 
git_project="git_project"
projs="$hg_project $bzr_project $git_project"

# Clean out the project dirs
for proj in $projs 
do
  [ -d "$proj" ] && rm -rf $proj
done


