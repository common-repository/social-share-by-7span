=== Social Connect: Social Share/Follow By 7Span ===
Contributors: YashShah
Plugin Name: Social Connect By 7Span
Plugin URI: https://wordpress.org/plugins/social-share-by-7span
Author: 7Span
Author URI: https://7span.com
Tags: responsive social buttons, social share, sharing buttons, social counter
Tested up to: 6.5.3
Stable tag: trunk
License: GPLv2 

Enhance WordPress blogs with sleek, responsive social share & follow buttons for Facebook, Twitter, Instagram, YouTube, & more.

== Description ==

Discover the ultimate solution for seamless social media integration on your WordPress blog with Social Connect. Elevate your content sharing experience with our sleek and responsive social share buttons and follow buttons, meticulously crafted to include all the major platforms like Facebook, Twitter, Instagram, YouTube, Pinterest, Linkedin, Gmail, WhatsApp, Website, and Reddit. 

Effortlessly engage your audience by enabling them to share your blog posts directly from your website and follow your blog author and website profile. With integrated likes or followers counters, track your content's performance and audience engagement effortlessly.

Our lightweight and user-friendly plugin ensures smooth navigation and optimal performance across all devices. Experience seamless responsiveness, as our buttons elegantly transform into icons for devices with widths less than 480px.

Unlock the potential of your WordPress blog with Social Connect – the ultimate tool for expanding your online reach and enhancing user interaction.

**Plugin Features**

- Supported Social Platforms
  - Facebook
	- Twitter 
	- Instagram
	- Linkedin 
	- Pinterest
	- Reddit
	- Youtube
	- Gmail 
	- Website
	- Whatsapp

- Social Connect supports the functionality to share website blogs on above supported social platforms.
- Social Connect supports the functionality to follow Website on above supported social platforms.
- Social Connect supports the functionality to follow Blog or Website Author on above supported social platforms.
- 100% responsive. 
- No Image, button created using CSS3. For device width less than 480px, this plugin used one single image to display social icons.
- Provide Shortcode to add the social share buttons to share website blogs on above social platforms.
- Provide Shortcode for Website Social Connect to follow Website on above social platforms.
- Provide Shortcode for Author Social Connect to follow Blog Author on above social platforms. 
- These shortcode can integrated with any theme easily.
- These social buttons can be add anywhere in the posts.

**Plugin Shortcode**
You can use following shortcodes

- Shortcode for Social Share
  - Shortcode parameter : share_on
  - To display share buttons :
    [social_share share_on='facebook,twitter,linkedin,gmail,whatsapp,reddit']

- Shortcode for Website Social Connect
  - Shortcode parameters : show_counts ('true' or 'false')
  - To hide social likes or follow counter use the shortcode parameter show_counts='false'
    [website_social_connect show_counts='false']

- Shortcode for Author Social Connect
  - Shortcode parameters : author_id, follow_on(values:facebook,twitter,linkedin,instagram,reddit,website'), profile_picture(values:hide,show)

  - To display current blog author social information:
    [author_social_connect follow_on='facebook,twitter,linkedin,instagram,reddit,website']

  - To display specific author social information:
    [author_social_connect author_id='{id of user}' follow_on='facebook,twitter,instagram,linkedin,reddit,website']

  - To hide author profile picture:
    [author_social_connect profile_picture='hide']

== Screenshots ==

1. Website Social Share buttons
2. Website Social Connect Settings in Admin Panel
3. Website Social Links and Counters Settings in Admin Panel
4. Website Social Connect buttons in UI
5. Author Social Connect Settings in Admin Panel
6. Author Social Connect Buttons with Author information
7. Author Social Connect Buttons with Author information when width less than 480px
8. Website Social Connect Widget Settings
9. Website Social Connect buttons in UI Using Widget

== Installation ==

= Installing the plugin =

1. In your WordPress admin panel, go to *Plugins > New Plugin*, search for *Social Connect by 7span* and click "Install now"
2. Alternatively, download the plugin and upload the contents of `social-share-by-7span.zip` to your plugins directory, which usually is `/wp-content/plugins/`. Activate the plugin.


== Frequently Asked Questions ==

= Is Social Connect free? =

The Social Connect is 100% free.

= What does Social Connect let me do? =

Social Connect adds very attractive responsive social icons to share blogs and social follow buttons to follow website and blog author with their likes or followers counters of all supported social platforms mentioned above.

= Do I have to install any software on my server to get this working? =

Not at all! Social Share is a hosted social share service. Simply configure the plugin and you're done!

== Change log ==

= 1.3.6 =
* Added compatibility of the WordPress version 6.5.3

= 1.3.5 =
* Added compatibility of the WordPress version 6.2

= 1.3.4 =
* Added compatibility of the WordPress version 6.1.1

= 1.3.2 =
* Added compatibility of the WordPress version 6.0

= 1.3.2 =
* Added new feature to hide/show author profile picture in author section

= 1.3.1 =
* Added compatibility of the WordPress version 5.9.3

= 1.3 =
* Added compatibility of the WordPress version 5.5.1

= 1.2 =
* Added widget feature

= 1.1 =
* Added new feature of website follow and author follow with likes/followers counter

= 1.0 - June 30, 2019 =
* First release.