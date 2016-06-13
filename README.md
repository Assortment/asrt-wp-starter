# wpst
A logical approach to WordPress Theme Development

wpst is a starter kit, boilerplate, toolkit type thing for WordPress which provides a little more of a structured approach to Theme Development.

## Installation
You can install *wpst* like any other WordPress theme. Download the [latest release](https://github.com/Mixd/wpst/archive/master.zip) of this project and then uncompress it into your theme folder.

If you're working with wp-cli then you can also use the `wp theme install` command that it allows you to automate this process some. Here's how you can do that:

1. Within your CLI `cd` into your project folder (i.e. `cd ~/sites/<projectname>`, where `<projectname>` is the name of your sites directory)
2. Run the following command `wp theme install https://github.com/Mixd/wpst/archive/master.zip`.

## Usage

Once you have the theme within your projects folder, you'll want to replace any reference to the `wpst` framework, if you're into that sort of thing.

If you're using a [decent code editor](http://www.sublimetext.com/) then you can do a quick `find-and-replace` for the `wpst` keyword, and replace that with a custom name to describe your new theme name (something project specific).


#### Plugins
Whilst not essential, wpst is created to work with two main plugins, [Advanced Custom Fields](http://www.advancedcustomfields.com/) and [Gravity Forms](http://www.gravityforms.com/). Its definitely recommended that you use this. If you'd prefer not to, just remove the references to these within `/lib/config/vendors.php`.

Theres a number of other plugins that we also use in our day-to-day life:

- [Admin Menu Editor](https://wordpress.org/plugins/admin-menu-editor/): Allows you to customize the Main Navigation within the Admin Area on the left. Change names of post types, ordering or simply remove one of the links.
- [Breadcrumb NavXT](https://wordpress.org/plugins/breadcrumb-navxt/): Highly customizable Breadcrumbs widget.
- [Google Analytics by Yoast](https://en-gb.wordpress.org/plugins/google-analytics-for-wordpress/): Pass in your GA code or authenticate the plugin with your GA account. Creates a GUI for anything you'd need to setup within GA (for example events) and provides a graphical dashboard.
- [Intuitive Custom Post Order](https://wordpress.org/plugins/intuitive-custom-post-order/): Allows Drag & Drag sorting of pages which utilises the default 'order' property for posts, pages, categories, custom post types and anything else you can think of.
- [Members](https://wordpress.org/plugins/members/): GUI for User Roles. Allow/Disallow certain User Roles access to areas of WordPress.
- [Regenerate Thumbnails](https://en-gb.wordpress.org/plugins/regenerate-thumbnails/): Regenerate image sizes through a button in the admin area. Useful when on a staging/production server rather than local.
- [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/):
- [WP-PageNavi](https://wordpress.org/plugins/wp-pagenavi/):

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
    - vendors
    - %post-types%
    - %taxonomies%
- index.php
- functions.php
- ...
- ..
- .
```



