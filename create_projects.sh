#!/bin/bash
#
# setup the projects

# vars
hg_project="../hg_project"
bzr_project="../bzr_project" 
git_project="../git_project"
projs="$hg_project $bzr_project $git_project"

# Copy the template project to three dirs
# Clean out the git specfic dirs
# Run the lib/vendor checkout stuff
# and then run the unit tests for each project
for proj in $projs 
do
  [ -d "$proj" ] || mkdir $proj
  cp -R project_template/* $proj
  
  # Just in case as these files shouldn't come over in the cp
  [ -d "$proj/.git" ] && rm $proj/.git
  [ -f "$proj/.gitignore" ] && rm $proj/.gitignore
  
  # Create the individual project
  ./$proj/bin/create_proj.sh
  cd ./$proj/build
  phing test clean
  cd -
done

# Set up the Mercurial project
cd $hg_project
echo "syntax: glob" >> ./ignore_template
mv ./ignore_template ./.hgignore
hg init
hg add
hg commit -m "initial hg commit"
hg log
cd -

# Set up the Bazaar project
cd $bzr_project
mv ./ignore_template ./.bzrignore
bzr init
bzr add
bzr commit -m "initial bzr commit"
bzr log
cd -

# Set up the Git project
cd $git_project
mv ./ignore_template ./.gitignore
git init .
git add .
git commit -m "initial git commit"
git log
cd -
