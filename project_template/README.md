# Distributed Version Control Systems - Sample Project

This project has the following dependencies:

Php 5.2+
PhpUnit 3.5+
Phing 2.4+
[Symfony Components](http://components.symfony-project.org), namely -  
  EventDispatcher, Dependency Injection, Yaml

## The project directories are:

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
