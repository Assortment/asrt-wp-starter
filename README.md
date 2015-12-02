# wpst
A logical approach to WordPress Theme Development

wpst is a starter kit, boilerplate, toolkit type thing for WordPress which provides a little more of a structured approach to Theme Development.

## This is a WIP. Do not use.

Yeah, its definitely not finished.

![](http://media.giphy.com/media/8VjzJcIMSMF20/giphy.gif)

## Installation
You can install *wpst* like any other WordPress theme. Download the [latest release](https://github.com/Assortment/wpst/archive/master.zip) of this project and then uncompress it into your theme folder.

If you're working with wp-cli then you can also use the `wp theme install` command that it allows you to automate this process some. Here's how you can do that:

1. Within your CLI `cd` into your project folder (i.e. `cd ~/sites/<projectname>`, where `<projectname>` is the name of your sites directory)
2. Run the following command `wp theme install https://github.com/Assortment/wpst/archive/master.zip`.

## Usage

Once you have the theme within your projects folder, you'll want to replace any reference to the `wpst` framework, if you're into that sort of thing.

If you're using a [decent code editor](http://www.sublimetext.com/) then you can do a quick `find-and-replace` for the `wpst` keyword, and replace that with a custom name to describe your new theme name (something project specific).

#### Structure
The starter theme has been based around the core principles within tried and tested PHP frameworks such as Laravel, which you'll see when noticing the naming convention for the folders. Whilst WordPress is most definitely not as neat and tidy as something like Laravel, this new structure will hopefully allow developers to work in a similar workflow, which will also help newer developers who want to venture into the more complex frameworks in the future.

Here's a birds eye view of the structure:

```
- lib
    - config
    - controllers
    - models
    - utility
- view
    - errors
    - globals
    - %post-types%
    - %taxonomies%
- index.php
- functions.php
- ...
- ..
- .
```



