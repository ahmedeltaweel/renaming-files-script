# Renaming Files Script

this script is for copying and renaming all files in a directory with a new name prefix

### Version
1.0.1

### Tech

Renaming Files Script uses an open source projects to work properly:

* [The Console Component] The Console component eases the creation of beautiful and testable command line interfaces.

And of course renaming-files-script itself is open source with a [public repository][renaming-files-script]
 on GitHub.

### Usage

You need composer installed globally:

```sh
$ git clone [git-repo-url] renamer
$ cd renamer
$ composer install
$ php run sort [path to directory] <prefix>
```
example
```sh
$ php run sort /home/username/Pictures/test/ img 
```

**Free Software, Hell Yeah!**

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [renaming-files-script]: <https://github.com/ahmedeltaweel/renaming-files-script>
   [The Console Component]: <http://symfony.com/doc/current/components/console/introduction.html>


