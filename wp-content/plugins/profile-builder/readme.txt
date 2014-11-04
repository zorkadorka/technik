=== Profile Builder - front-end user registration, login and edit profile === 

Contributors: reflectionmedia, barinagabriel, sareiodata, cozmoslabs, adispiac, madalin.ungureanu
Donate link: http://www.cozmoslabs.com/wordpress-profile-builder/
Tags: registration, user profile, user registration, custom field registration, customize profile, user fields, extra user fields, builder, profile builder, custom user profile, user profile page, edit profile, custom registration, custom registration form, custom registration page, registration page, user custom fields, user listing, front-end user listing, user login, user registration form, front-end login, front-end register, front-end registration, front-end edit profile, front-end user registration, custom redirects, user email, avatar upload, email confirmation, user approval, customize registration email, minimum password length, minimum password strength, password strength meter, multiple registration forms

Requires at least: 3.1
Tested up to: 4.0
Stable tag: 2.0.4

Simple to use profile plugin allowing front-end login, user registration and edit profile by using shortcodes.
 
== Description ==

**Profile Builder is WordPress user registration done right.**

It lets you customize your website by adding a front-end menu for all your users, 
giving them a more flexible way to modify their user profile or register new users (front-end user registration). 
Users with administrator rights can customize basic user fields or add custom user fields to the front-end forms.

To achieve this, simply create a new page and give it an intuitive name(i.e. Edit Profile).
Now all you need to do is add the following shortcode(for the previous example): [wppb-edit-profile]. 
Publish the page and you are done!

= Front-end User Registration, Login, Edit Profile and Password Recovery Shortcodes =
You can use the following shortcode list:

* **[wppb-edit-profile]** - to grant users front-end access to their profile (requires user to be logged in).
* **[wppb-login]** - to add a front-end login form.
* **[wppb-register]** - to add a front-end user registration form.
* **[wppb-recover-password]** - to add a password recovery form.

Users with administrator rights have access to the following features:

* drag & drop to reorder user profile fields
* enable **Email Confirmation** (on registration users will receive a notification to confirm their email address).
* allow users to **Log-in with their Username or Email**
* enforce a **minimum password length** and **minimum password strength** (using the default WordPress password strength meter)
* assign users a specific role at registration (using [wppb-register role="desired_role"] shortcode )
* add a custom stylesheet/inherit values from the current theme or use the default one built into this plugin.
* chose which user roles view the admin bar in the front-end of the website (Admin Bar Settings page).
* select which profile fields users can see/modify.

**PROFILE BUILDER PRO**

The [Pro version](http://www.cozmoslabs.com/wordpress-profile-builder/) has the following extra features:

* Create Extra User Fields (Heading, Input, Hidden-Input, Checkbox, Agree to Terms Checkbox, Radio Buttons, DatePicker, Textareas, reCAPTCHA, Upload fields, Selects, Country Selects, Timezone selects, Avatar Upload)
* Add Avatar Upload for users
* Front-end User Listing (fully customizable, sorting included)
* Create Multiple User Listings
* Custom Redirects
* Multiple Registration Forms (set up multiple registration forms with different profile fields for certain user roles)
* Multiple Edit Profile Forms
* Admin Approval
* Email Customizer (Personalize all emails sent to your users or admins; customize default WordPress registration email)
* reCAPTCHA on user registration form
* Advanced Modules (e.g. custom redirects, user listing, multiple registration forms etc.)
* Access to support forums and documentation
* 1 Year of Updates / Priority Support

[Click here to find out more](http://www.cozmoslabs.com/wordpress-profile-builder/) or watch the video below:

[youtube http://www.youtube.com/watch?v=Uv8piGapOoA]

NOTE:

This plugin adds/removes user fields in the front-end. Both default and extra profile fields will be visible in the back-end as well.
	


== Installation ==

1. Upload the profile-builder folder to the '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Create a new page and use one of the shortcodes available. Publish the page and you're done!

== Frequently Asked Questions ==

= I navigated away from Profile Builder and now I can�t find it anymore; where is it? =

	Profile Builder can be found in the default menu of your WordPress installation below the �Users� menu item.

= Why do the default WordPress user fields still show up in the back-end? =

	Profile Builder can only remove the default user fields in the front-end of your site/blog, it doesn't remove them from the back-end.

= I can’t find a question similar to my issue; Where can I find support? =

	For more information please visit http://www.cozmoslabs.com and check out the documentation section from Profile Builder - front-end user registration plugin.


== Screenshots ==
1. Basic Information - Profile Builder, front-end user registration plugin
2. General Settings - Profile Builder, front-end user registration plugin
3. Show/Hide Admin Bar
4. Profile Builder - Manage Default User Fields (Add, Edit or Delete)
5. Profile Builder - Drag & Drop to Reorder User Profile Fields
6. Front-end User Registration Page
7. User Login Page
8. Edit User Profile Page
9. Recover Password Page

== Changelog ==
= 2.0.4 =
Added $account_name as a parameter in the wppb_register_success_message filter
Fixed typo in password strength meeter.

= 2.0.3 =
Fixed bug that made radio buttons field types not to throw error when they are required
Fixed XSS security vulnerability in fallback-page.php
Reintroduced the filters:'wppb_generated_random_username', 'wppb_userlisting_extra_meta_email' and 'wppb_userlisting_extra_meta_user_name'
Fixed the bug when changing the password in a edit profile form we were logged out

= 2.0.2 =
* Brand new user interface.
* Drag & drop to reorder User Profile Fields.
* More flexibility for Managing Default User Fields.
* Better Security by Enforcing Minimum Password Length and Minimum Password Strength on all forms (front-end and back-end).
* NOTE: upgrading from Profile Builder 1.1.x to 2.0.2 might make some of your plugin customization (if you have any ) not work because in the restructuring we had to drop some of the filters from 1.1.x.

= 1.1.67 =
* Added stripslashes to register shortcode.

= 1.1.66 =
* Sanitized forms against XSS exploits.

= 1.1.65 =
* Minor changes in the readme and index files.

= 1.1.64 =
* Minor changes in the readme and index files.

= 1.1.63 =
* Changes weren't saving on the Edit Profile page when profile was not fully updated.

= 1.1.62 =
* Minor changes to the readme file.

= 1.1.61 =
* Fixed a few notices in the plugin.

= 1.1.60 =
* Emergency security update regarding the password recovery feature.

= 1.1.59 =
Improved some of the queries meant to select users at certain points, hidden input value on front-end (Pro version) and the remember me checkbox on the login page.

= 1.1.58 =
Small changes to the index.php file

= 1.1.57 =
Fixed some bugs which only appeared in WPMU sites.

= 1.1.57 =
Minor changes to the readme.txt file.

= 1.1.56 =
Added activation_url and activation_link to the "Email Customizer" feature (pro). Also, once the "Email Confirmation" feature is activated, an option will appear to select the registration page for the "Resend confirmation email" feature, which was also added to the back-end userlisting.

= 1.1.55 =
Minor changes in the plugin's readme file and updated the screenshots.

= 1.1.54 =
Minor changes in the plugin's readme file.

= 1.1.53 =
Minor changes in the plugin's readme file.

= 1.1.52 =
Minor changes in the plugin's readme file.

= 1.1.51 =
Minor changes in the plugin's readme file.

= 1.1.50 =
Improved the userlisting feature in the Pro version.

= 1.1.49 =
Fixed "Edit Profile" bug and impred the "Admin Approval" default listing (in the paid versions).

= 1.1.48 =
Improved a few existing features (like WPML compatibility), and added a new feature: login with email address.

= 1.1.47 =
Improved the "Email Confirmation" feature and a few other functions.
Added new options for the "Userlisting" feature (available in the Pro version of Profile Buildeer).
Added translations: persian (thanks to Ali Mirzaei, info@alimir.ir)

= 1.1.46 =
Improved a few existing functions.

= 1.1.45 =
Fixed a few warnings on the register page.

= 1.1.44 =
Minor changes to the readme file.

= 1.1.43 =
Activation bug fixed.

= 1.1.42 =
Added a few improvements and fixed a few bugs.

= 1.1.41 =
Email Confirmation bug on WPMU fixed.

= 1.1.40 =
Minor changes to the readme file.

= 1.1.39 =
Security issue fixed regarding the "Email Confirmation" feature

= 1.1.38 =
Added a fix (suggested by http://wordpress.org/support/profile/maximinime) regarding the admin bar not displaying properly in some instances.

= 1.1.37 =
Minor changes to the readme file.

= 1.1.36 =
Minor changes to the readme file.

= 1.1.35 =
Added support for WP 3.5

= 1.1.34 =
Separated some of the plugin's functions into separate files. Also fixed a few bugs.

= 1.1.33 =
Fixed function where it wouldn't create the _signups table in the free version.

= 1.1.32 =
Error fixed.

= 1.1.31 =
Minor updates to the plugin files.

= 1.1.30 =
Minor changes to the plugin.

= 1.1.29 =
Minor changes to the readme file.

= 1.1.28 =
Changes to the readme file.

= 1.1.27 =
Fixed few warnings.

= 1.1.26 =
Minor changes

= 1.1.25 =
Different security issues fixed with other updates.

= 1.1.24 = 
Wordpress 3.3 support

= 1.1.23 =
Consecutive bugfixes.

= 1.1.14 =
Compatibility fix for WP version 3.3

= 1.1.13 = 
Minor changes to different parts of the plugin. Also updated the english translation.

= 1.1.12 = 
Minor changes to readme file.

= 1.1.11 = 
Minor changes to readme file.

= 1.1.10 = 
Minor changes to readme file.

= 1.1.9 = 
Minor changes to readme file.

= 1.1.8 =
Added the possibility to set the default fields as required (only works in the front end for now), and added a lot of new filters for a better and easier way to personalize the plugin. Also added a recover password feature (shortcode) to be in tune with the rest of the theme.
Added translations:
*italian (thanks to Gabriele, globalwebadvices@gmail.com)
*updated the english translation

= 1.1.7 =
Minor modification in the readme file.

= 1.1.6 =
Minor upload bug on WP repository. 

= 1.1.5 =
Added translations:
*czech (thanks to Martin Jurica, martin@jurica.info)
*updated the english translation

= 1.1.4 =
Added the possibility to set up the default user-role on registration; by adding the role="role_name" argument (e.g. [wppb-register role="editor"]) the role is automaticly set to all new users. 
Added translations:
*norvegian (thanks to Havard Ulvin, haavard@ulvin.no)
*dutch (thanks to Pascal Frencken, pascal.frencken@dedeelgaard.nl)
*german (thanks to Simon Stich, simon@1000ff.de)
*spanish (thanks to redywebs, www.redywebs.com) 
 

= 1.1.3 =
Minor bugfix.

= 1.1.2 =
Added translations to: 
*hungarian(thanks to Peter VIOLA, info@violapeter.hu)
*french(thanks to Sebastien CEZARD, sebastiencezard@orange.fr)

Bugfixes/enhancements:
*login page now automaticly refreshes itself after 1 second, a little less annoying than clicking the refresh button manually
*fixed bug where translation didn't load like it should
*added new user notification: the admin will now know about every new subscriber
*fixed issue where adding one or more spaces in the checkbox options list, the user can't save values.


= 1.1 =
Added a new user-interface (borrowed from the awesome plugin OptionTree created by Derek Herman), and bugfixes.

= 1.0.10 =
Bugfix - The wp_update_user attempts to clear and reset cookies if it's updating the password.
 Because of that we get "headers already sent". Fixed by hooking into the init.

= 1.0.9 =
Bugfix - On the edit profile page the website field added a new http:// everytime you updated your profile.
Bugfix/ExtraFeature - Add support for shortcodes to be run in a text widget area.

= 1.0.6 =
Apparently the WordPress.org svn converts my EOL from Windows to Mac and because of that you get "The plugin does not have a valid header."

= 1.0.5 =
You can now actualy install the plugin. All because of a silly line break.

= 1.0.4 =
Still no Change.

= 1.0.3 =
No Change.

= 1.0.2 =
Small changes.

= 1.0.1 =
Changes to the ReadMe File

= 1.0 =
Added the posibility of displaying/hiding default WordPress information-fields, and to modify basic layout.

