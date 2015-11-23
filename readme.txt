=== Plugin Name ===
Contributors: dash8x
Donate link: http://arushad.org/about/
Tags: dhivehi, thaana, maldives
Requires at least: 3.0.1
Tested up to: 4.3.1
Stable tag: 4.3
License: The MIT License (MIT)
License URI: http://opensource.org/licenses/MIT

Adds a button to the WordPress TinyMCE editor for Dhivehi text.

== Description ==

Adds a button to the WordPress WYSIWYG editor to write Dhivehi text. By default adds a `<span class="dhivehi-text">` tag.
This plugin uses MV Faseyha and MV Waheed embedded fonts.

= Shortcode =
If you want more flexibility, you can use the procided shortcode.

`[dhivehi]Content goes here[/dhivehi]`

The shortcode offers a few options that you can customize.

`[dhivehi container="div" class="foo bar" id="myid"]`

== Installation ==

= Install =
1. Upload `dhivehi-text` folderto the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to any post edit page and start editing

= Uninstall =
1. Deactivate Dhivehi Text in the 'Plugins' menu in WordPress.
2. After Deactivation a 'Delete' link appears below the plugin name, follow the link and confim with 'Yes, Delete these files'.
3. This will delete all the plugin files from the server as well as erasing all options the plugin has stored in the database.

== Frequently Asked Questions ==

= How can I use my own fonts? =
Just override the `.dhivehi-text` class in your css and define your preferred font-family.

= How can I contact the plugin author? =
Drop me a line at [http://arushad.org/contact](http://arushad.org/contact)

== Screenshots ==

== Changelog ==

= 0.1 =
* Initial release