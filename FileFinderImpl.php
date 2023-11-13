<?php

class FileFinderImpl implements FileFinderInterface
{

  # your code here

}


# Приклади використання FileFinderImpl:

# search for all .conf or .ini files in directories /etc/ and /var/log/
$finder = new FileFinderImpl();

# complex search in multiple directories
$finder
  ->onlyFiles()
  ->inDir('/etc/')
  ->inDir('/var/log/')
  ->match('/.*\.conf$/')
  ->match('/.*\.ini$/');
foreach ($finder->find() as $file) {
  print $file . "\n";
}
print "\n\n";


# search for all files in /tmp
$finder = (new FileFinderImpl())
  ->onlyFiles()
  ->inDir('/tmp');
foreach ($finder->find() as $file) {
  print $file . "\n";
}
print "\n\n";


# search for .doc files in /tmp
$finder = (new FileFinderImpl())
  ->match('/.*\.doc$/')
  ->onlyFiles()
  ->inDir('/tmp');
foreach ($finder->find() as $file) {
  print $file . "\n";
}
print "\n\n";


# list all directories in /var
$finder = (new FileFinderImpl())
  ->onlyDirectories()
  ->inDir('/var/log/');
foreach ($finder->find() as $file) {
  print $file . "\n";
}
print "\n\n";


# should throw an exception if no directories were provided
try {
  $files = (new FileFinderImpl())
    ->onlyFiles()
    ->match('/.*\.ini$/')
    ->find(); # -> exception
  print "When no dir were provided: exception was not thrown, something does not work correctly\n";
} catch (\Exception $exception) {
  print "When no dir were provided: exception was thrown with message \"" . $exception->getMessage() . "\"\n";
}
