# Installation Instructions

-   Clone the repository in your theme folder
-   Create a new repository on GitHub and add your personal account as a Collaborator
-   Switch your local repository to point the remote new one on GitHub: `git remote set-url origin git@github.com:doubledot-web/{NAME_OF_NEW_REPOSITORY}.git`
-   Push your local repository to the new remote
-   Rename the theme folder and change style.css to correspond to the running project
-   Load the theme folder in Prepros.io and update External Server Url to point to your local environment
-   Run `npm install` to install the dependencies and (optional) `npm update` to get the latest version of the dependencies
-   In Prepros.io, under _library/js/uikit-loader.js_ File Options, make sure you have **Bunlde-JS** active and then click **Process File** once
-   Make sure you have selected **Process Automatically** under File Options on both _library/scss/style.scss_ and _library/js/scripts.js_
-   Click process file on _library/js/scripts.js_ and _library/scss/style.scss_ or load theme files in VS code and press save to compile assets
-   Before deploying, make sure you have activated the **minify option** before compiling on both _library/scss/style.scss_ and _library/js/scripts.js_
-   Enter development mode and Have Fun! :metal: :nerd_face: :metal:

## Versioning

v. 1.3.0

## Change Log

-   1.3.0
    -   TWEAK: Updated to UIkit version at 3.16.26
    -   TWEAK: Updated plugin list and ACF PRO version at 6.2.1.1
    -   TWEAK: Renamed `dump` function to `ddumb` to reduce the possibility of conflicts with other tools or codeset
    -   TWEAK: Header code refactored
    -   TWEAK: Code cleanup
    -   FEATURE: Added function to replace default WordPress gallery shortcode
    -   FEATURE: Added function to render responsive autoembed YouTube videos
    -   FIX: html5 theme support was called incorrectly causing a PHP warning
-   1.2.0
    -   TWEAK: Updated to UIkit version 3.13.10
    -   ΤWEAK: Replaced date with gmdate functions
    -   TWEAK: Added ACF content block builder bootstraping
    -   TWEAK: Added function to activate theme options page through ACF
    -   TWEAK: Added function to load ACF driven Google Maps API on frontend and dashboard
    -   TWEAK: Added attribute to expand small pages to full height
    -   FIX: Markup and Coding Standard fixes
-   1.1.0
    -   FEATURE: Add acf-json folder for ACF syncs
    -   FEATURE: Add WooCommerce compatibility check and template overwriting folder
    -   TWEAK: Remove UIKit from compiling
    -   TWEAK: Update package json to get latest version of UIKit on npm install
    -   TWEAK: Add filter in functions.php to change excerpt size
    -   TWEAK: Disable automatic updates filter in functions.php
    -   TWEAK: Changed index.php heading hierarchy
    -   TWEAK: Code refactoring to follow WP coding standards
-   1.0.0
    -   Initial Release
