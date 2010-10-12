#!/bin/bash
#
# setup the project

# Get the right directory
my_dir=`dirname "$0"`
cd $my_dir/../lib/vendor

echo "Get Event Dispacher"
( [ -d "dependency-injection" ] && echo "It already exists" ) || git clone git://github.com/fabpot/dependency-injection.git
echo ""

echo "Get Dependency Injection"
( [ -d "event-dispatcher" ] && echo "It already exists" ) || git clone git://github.com/fabpot/event-dispatcher.git
echo ""

echo "Get Yaml"
( [ -d "yaml" ] && echo "It already exists" ) || git clone git://github.com/fabpot/yaml.git
echo ""
