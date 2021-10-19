# Reaction WordPress Base

A modern WordPress base theme with Bootstrap included.

__Based on the UnderStrap WordPress Theme Framework__

Website: [https://understrap.com](https://understrap.com)

#### Table of Contents

- [Reaction WordPress Base](#reaction-wordpress-base)
  * [Getting Started](#getting-started)
  * [Building a Theme](#building-a-theme)
    + [Customizer](#customizer)
    + [JavaScript](#javascript)
    + [SCSS](#scss)
    + [Adding Page Blocks](#adding-page-blocks)
      - [Adding New Blocks](#adding-new-blocks)
      - [Updating Existing Blocks](#updating-existing-blocks)
      - [Adding Block Styles](#adding-block-styles)
  * [Making Changes to a Published Theme](#making-changes-to-a-published-theme)
  * [Extras](#extras)
    + [Updating Packages](#updating-packages)
    + [Coding Formatting with PHP CodeSniffer](#coding-formatting-with-php-codesniffer)
    + [PurgeCSS](#purgecss)
    + [SCSS Linting](#scss-linting)
  * [Font Awesome Icons](#font-awesome-icons)
  * [Sticky Header](#sticky-header)
  * [Todo List](#todo-list)

## Getting Started

1. Go into your WordPress installs `wp-content` directory and remove all files and directories.
2. Using a command line terminal run `git clone git@github.com:reactioninc/wp-base.git .`, or download the files direct from GitHub [https://github.com/reactioninc/wp-base/tree/dev](https://github.com/reactioninc/wp-base/tree/dev)
2. Execute the command `git checkout dev` to use the dev branch. There is where the latest stable files are used.
2. Remove the `.git` directory by running `rm -rf .git` to start a fresh repository.
3. Rename theme directory from `company-name` to something related to the company name
4. Inside the theme directory run `npm install`
5. Run `composer install`
6. Run `gulp copy-assets`
6. Happy Building! :rocket:

## Building a Theme

1. Run `gulp watch` inside the theme directory
2. Edit files located inside the `src` directory.

### Customizer

There are two settings to be adjusted, located inside the Site Identity section of the customizer - *Login Page Logo* and Android *Chrome Theme Color*. 


### JavaScript

JavaScript files are located in the `src/js` directory. The primary file to be edited is `custom-javascript.js`.

### SCSS

SCSS files are located in `src/scss`. You can use existing included files to make edits. Also creating additional included files under the `theme` directory is fine, but must be added to the `theme.scss` file to be included.

### Adding Page Blocks

Page Blocks are created using [Flexible Content](https://www.advancedcustomfields.com/resources/flexible-content/).

#### Adding New Blocks

To create a new block follow these steps

1. Create a new sub directory under the `page-blocks` directory (eg: `action-blocks-1`)
2. Inside your new directory add a `template.php` file, and an `_style.scss` if needed. The `_style.css` will be automatically detected.
3. Inside the Page Blocks field group create a new layout.
4. Create the new layout using these fields:

   **Label**: User friendly name of the block (eg: Yellow Action Blocks).
   
   **Name**: Use the same name as the slug of your blocks directory from step 1, but with underscores (eg: `action_blocks_1`).
   
   At this point you can now add any field groups to the layout that are needed.
 
 

#### Updating Existing Blocks

Coming Soon!

#### Adding Block Styles

To create a more module like approach each block can include its own style. This is to make it easier to locate 

## Making Changes to a Published Theme

Coming Soon!

## Extras

### Updating Packages

To update Font Awesome or Bootstrap run the following commands:
* `npm update`
* `gulp copy-assets`

### Coding Formatting with PHP CodeSniffer

### PurgeCSS

PurgeCSS can take a long time to process so it was not bundled with the SCSS Gulp function. To execute PurgeCSS after all your edits are complete use the following command: 

`gulp purgecss`

### SCSS Linting

In the terminal run the following command to show a list of SCSS errors

`gulp sass-lint`

### Font Awesome Icons

This theme comes loaded with the SVG version of font awesome icons. These icons can be used inside any template file by using the `get_fa_icon_as_svg` function. This function accepts a single argument of the font awesome class - this can be selected from ACF's return type.

Example:

`get_fa_icon_as_svg( 'fas fa-phone' )`

### Sticky Header

The `wp-sticky-top` class can be applied to any element to make it stick. This class uses only CSS to make the element sticky. This class automatically calculates if a different `top` value is required to accommodate the WordPress admin bar.

## Todo List

- [ ] Gutenberg blocks 
- [ ] Load Editor Styles for Gutenberg Blocks
- [ ] SCSS Lint to Work with VS Code
