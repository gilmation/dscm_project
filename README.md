# Distributed Source Code Management - Sample Projects

This project contains three identical projects that can be created from 
the project_template in order to show the use of and the differences 
between Git, Mercurial and Bazaar.

## Scripts to create the projects:

The scripts which create and clean the projects are included in this 
directory and are called:

create_projects.sh
clean_projects.sh

## This project has the following DSCM dependencies (must be available):

* Git
* Mercurial
* Bazaar

## The Php code in this project has the following dependencies:

Php 5.2+
PhpUnit 3.5+
Phing 2.4+
[Symfony Components](http://components.symfony-project.org), namely -  
  EventDispatcher, Dependency Injection, Yaml
The symfony components are cloned from their github repos by a script 
in the $PROJECT/bin directory

## Each project contains the directories:

### bin

The script that automate the creation and configuration of the project.
create_proj.sh 

### lib

The Php application classes
The 3rd Party classes (in vendor)

### build 

The Phing build file and any other build resources.
From inside this directory run `phing -l` to see the list of 
available tasks (running the tests is the default).

### test

The PhpUnit test classes 
