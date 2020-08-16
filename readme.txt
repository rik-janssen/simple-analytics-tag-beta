=== Simple Analytics Tag ===
Contributors: @betacore
Tags: google analytics, google tagmanager, google ID, GTM, UA
Donate link: https://www.patreon.com/betadev
Requires at least: 5.2
Tested up to: 5.5
Requires PHP: 7
Stable tag: 1.3.2
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Embedding Google Analytics and Google Tagmanager made easy.

== Description ==
Simple Analytics Tag helps you get up and running quick. This plugin has a non-intrusive interface and fits very well within the Wordpress Settings menu. Just paste in the ID from Google Tagmanager or Google Analytics and you are good to go. For older themes that don't support the hook right after the body tag there is a function available you can throw in to make it work. Easy!

= Simple Analytics Tag contains the following features: =
* Google Tagmanager Code 
* Google Analytics Code
* Just paste in the ID and save!
* For older themes there is a custom hook
* Simple and clean admin menu page

= Note that there are themes that don't have the 'wp_body_open();' hook below the body tag =
For these older themes there is the option to put the second half of the Google Tagmanager code in the footer. This is not optimal but still works. If you have a custom theme you can add the hook below the body yourself or request an update on your theme at the shop that created it. Eitherway this plugin will work on the themes that have or do not have the hook. You will have to look in the source code if both Google Tagmanager code blocks are loaded.

== Installation ==
1. Upload the unpacked folder to the "/wp-content/plugins/" directory.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Go to the settings menu and click on the Analytics Tag item.
4. Add the GTM or UA code and submit. It should work!

== Frequently Asked Questions ==
= How simple is it? =
Oh yes it sure can! Like, super simple! Just pop in the ID and you are good to go!

= Does it work with Google Tagmanager? =
Yes, it does. Just copy and paste the ID in the field and add the function below the <body> tag. Newer templates have a hook there so that works even better.

= Does it work with Google Analytics? =
Yes, it does. Just copy and paste the ID in the field and you are good to go.

= Does it work with all themes? =
Note that there are themes that don't have the 'wp_body_open();' hook below the body tag in the header.php. 
For these (older) themes there is the option to put the second half of the Google Tagmanager code in the footer. 
This is not optimal but still works. If you have a custom theme you can add the hook below the body yourself or request an update on your theme at the shop that created it. 
Eitherway this plugin will work on the themes that have or do not have the hook. You will have to look in the source code if both Google Tagmanager code blocks are loaded.

= Is half of it unusable because I have to pay? =
No. The entire thing is free and will be for the unforseeable future. A cup of coffee is welcome though!

== Screenshots ==
1. Add your UA or GTM code in the field. For GTM codes there are extra settings.

== Changelog ==
= 1.3.2 =
* Branding update
* Precautionary extra sanitisation

= 1.3.1 =
* Branding update
* Readyme update
* Tested in 5.4

= 1.3 =
* Branding update

= 1.2 =
* Made compatible with Wordpress 5.3

= 1.1 =
* Gui fixes

= 1.0 =
* Full release.
* Added languages
* Small fixes

= 0.2 to 0.5 =
* Better hook support
* GTM tags now supported as well

= 0.1 =
* First version. All the basic functionalities. 


== Upgrade Notice ==

