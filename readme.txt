=== Flowplayer HTML5 for WordPress ===
Contributors: flowplayerorg, grapplerulrich, anssi
Donate link: http://flowplayer.org/pricing/
Tags: flowplayer, flowplayer5, flowplayer HTML5, responsive, html5, video, player
Requires at least: 3.5
Tested up to: 3.9
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A beautiful, responsive, HTML5 video player plugin from the makers of Flowplayer.

== Description ==

Flowplayer HTML5 for WordPress provides a video management system for self hosted videos where you can manage all of your video from a central place. You can easily customize the videos from the numerous settings. The videos are displayed with the world-famous Flowplayer video player using a simple shortcodes. This is the official WordPress plugin from the makers of Flowplayer.

= Main features =

* Easily manage all of your videos in a central place
* Insert videos in posts, pages and custom post types using the shortcode e.g. [flowplayer id="123"]
* Display videos in the sidebar with the "Video Widget"
* Manage files with WordPress 3.5 Media Library
* Style the video player with the three default Flowplayer skins: Minimalist, Functional and Playful
* [Supports subtitles](http://flowplayer.org/docs/subtitles.html)
* Track your video video audience and traffic with [Google Analytics](http://flowplayer.org/docs/analytics.html)
* Video adverts with [Google AdSense](http://flowplayer.org/asf/)
* Supports WEBM, MP4, OGG, FLV(flash), RTMP and HLS video formats.
* Show your video in any desired player size. Detects the video dimensions for configuring the correct player size
* Fully internationalized

= Branding free with Flowplayer Commercial =

The commercial version is free of Flowplayer branding and you can use your logo. The commercial Flowplayer version can be enabled by supplying a [license key](http://flowplayer.org/pricing/).

= Let Flowplayer Drive host your videos =

[Flowplayer Drive](http://flowplayer.org/) is an all-round solution for online video sharing and publishing. It makes the task of uploading, managing, sharing, and publishing videos extremely simple without sacrificing on quality and speed, and utilizing the latest web video technologies.

* Maximum browser coverage
* Optimal device compatibility with 640px video width
* Videos optimized for best results
* Maximum streaming throughout on a global video network
* Free with Flowplayer watermark

[Flowplayer Drive details](http://flowplayer.org/docs/drive.html)

= Monetize your videos =

Google AdSense for Flowplayer (ASF) allows publishers to monetize their videos by adding advertisements. While AdSense is normally restricted to sites with more than 10 million streams per month, Flowplayer makes it available for everyone.

[Sign up for Google AdSense for Flowplayer (ASF)](http://flowplayer.org/asf/)


== Other Notes ==

= Translation =

[Join the Translation Team](https://webtranslateit.com/en/projects/8343-Flowplayer-HTML5-for-WordPress)

= Credits =

The plugin can also be found on [GitHub](https://github.com/flowplayer/wordpress-flowplayer).

* Thank you [Tom McFarlin](http://tommcfarlin.com/) for the [WordPress Plugin Boilerplate](https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate)
* The settings code was adapted from [Easy Digital Downloads](https://github.com/easydigitaldownloads/Easy-Digital-Downloads) by [Pippin Williamson](http://pippinsplugins.com/)
* The meta box settings was adapted from [Theme Foundation](http://themefoundation.com/wordpress-meta-boxes-guide/) by [Alex Mansfield](http://sackclothstudios.com/)

== Installation ==

= Installing from the WordPress dashboard =

1. Navigate to the 'Add New' plugins dashboard
2. Search for 'Flowplayer5 for WordPress'
3. Click 'Install Now'
4. Activate the plugin on the WordPress Plugin dashboard

= Uploading in the WordPress dashboard =

1. Navigate to the 'Add New' plugins dashboard
2. Navigate to the 'Upload' area
3. Select `flowplayer5.zip` from your computer
4. Upload
5. Activate the plugin on the WordPress Plugin dashboard

= Using FTP =

1. Download `flowplayer5.zip`
2. Extract the `flowplayer5` directory to your computer
3. Upload the `flowplayer5` directory to your `wp-content/plugins` directory
4. Activate the plugin on the WordPress Plugins dashboard

= Configuration =

You can configure Google Analytics, a Commercial Flowplayer license key and a custom watermark logo in the plugin's global options. You can purchase a commercial license at [flowplayer.org](http://flowplayer.org/pricing/).

== Frequently Asked Questions ==

= Where can I upload the videos? =
There are three ways you add add a video

1. You can use the WordPress media manager and upload the videos there.
2. You can use [Flowplayer Drive](http://flowplayer.org/) to upload a video and let Flowplayer.org host you video.
3. You can store your videos on Amazon S3 or any other cloud host and add the links manually.

= What video format do I need? =
It is recommended to add at least two [video formats](http://flowplayer.org/docs/setup.html#video-formats) so that the video plays on as many browsers as possible. By default Flowplayer attempts to use HTML5 video, and if it's not supported then Flash (9.0+) and MP4 is used. MP4 is enough for complete browser support, but providing WebM and/or OGG video gives you broader support for HTML5 video which is the preferred technology.

= Why use Flowplayer when there is video support since WordPress 3.6? =

Flowplayer HTML5 for WordPress provides a video management system where you can manage all of your video from a central place. You do not need to remember all of the shortcode configuration attributes, you can simply configure the videos form within the options. We are continuously adding further features to the plugin.

= Why can I not see the video that I just uploaded to Flowplayer Drive? =

It takes some time for the video to be processed. The plugin fetches the video links from Flowplayer.org and the results are cached. The cache is refreshed every 15 minutes.

= How do I load Flowplayer assets locally when using Flowplayer Commercial? =

If you want to load the Flowplayer assets (JS, CSS and SWF) for your site then you can download the files from [your account](https://flowplayer.org/account/). Create a new folder `flowplayer-commercial` in `wp-content`. Place the files in this new folder. The option in the settings to use Flowplayer CDN should be disabled

= How do I add Ads to my videos? =

After [Signing up](http://flowplayer.org/asf/) you will get your own custom advertising plugin that you upload and paste the link in the settings.

= Flowplayer Drive issues? =

If you are unable to connect to the Flowplayer Drive API, make sure you are connected to the internet and that you are logged in. You can login in the Settings page.

= Flowplayer issues? =

If you are having a issue please check the [Flowplayer known issues page](http://flowplayer.org/docs/known-issues.html).

= What happens when I disable the plugin? =

Nothing, other then it being disabled.

= What happens when I uninstall the plugin? =

Why would you want to do that? :-) If you do need to uninstall the plugin all of the data (Flowplayer videos and settings) will be deleted so that you do not have unnecessary data left on your database. Your media files will not be deleted. If you want to backup the Flowplayer videos that you have created you can easily export them under Tools -> Export -> Videos.

= Developer Docs =

= Filters =

* [fp5_filter_set_messages()](https://github.com/flowplayer/wordpress-flowplayer/blob/master/admin/class-flowplayer5-admin.php#L283)
* [fp5_post_type_labels()](https://github.com/flowplayer/wordpress-flowplayer/blob/master/includes/class-flowplayer5.php#L179)
* [fp5_post_type_supports()](https://github.com/flowplayer/wordpress-flowplayer/blob/master/includes/class-flowplayer5.php#L195)
* [fp5_post_type_rewrite()](https://github.com/flowplayer/wordpress-flowplayer/blob/master/includes/class-flowplayer5.php#L199)
* [fp5_post_type_args()](https://github.com/flowplayer/wordpress-flowplayer/blob/master/includes/class-flowplayer5.php#L207)
* [fp5_filter_flowplayer_data()](https://github.com/flowplayer/wordpress-flowplayer/blob/master/frontend/class-flowplayer5-shortcode.php#L198)
* [fp5_filter_video_src()](https://github.com/flowplayer/wordpress-flowplayer/blob/master/frontend/class-flowplayer5-shortcode.php#L205)
* [fp5_filter_has_shortcode()](https://github.com/flowplayer/wordpress-flowplayer/blob/master/frontend/class-flowplayer5-frontend.php#L105)

= Actions =

* [fp5_video_top()](https://github.com/flowplayer/wordpress-flowplayer/blob/master/frontend/class-flowplayer5-shortcode.php#L200)
* [fp5_video_bottom()](https://github.com/flowplayer/wordpress-flowplayer/blob/master/frontend/class-flowplayer5-shortcode.php#L210)

= Examples =

Here are a few code examples of things that have been asked.
`/**
 * Allow flowplayer files should be loaded on the home page.
 */
function fp5_has_shortcode( $has_shortcode ) {
	$has_shortcode = is_front_page();
	return $has_shortcode;
}
add_filter( 'fp5_filter_has_shortcode', 'fp5_has_shortcode' );`

`/**
 * Change post type arg to support hierarchical format.
 */
function fp5_post_type_arg_hierarchical( $args ) {
	$args['supports']     = array( 'title', 'page-attributes' );
	$args['hierarchical'] = true;
	return $args;
}
add_filter( 'fp5_post_type_args', 'fp5_post_type_arg_hierarchical' );`

`/**
 * Display links for single video posts and activate archive page.
 */
function fp5_post_type_arg_video_post( $args ) {
	$args['public']            = true;
	$args['show_in_nav_menus'] = true;
	$args['has_archive']       = true;
	return $args;
}
add_filter( 'fp5_post_type_args', 'fp5_post_type_arg_video_post' );`

== Screenshots ==

1. Posting a video
2. Flowplayer Drive
3. Video Widget
4. Plugin Settings
5. Video Frontend

== Changelog ==

We have a lot of plans for this plugin. You can see some of the up and coming features in the [roadmap](https://github.com/flowplayer/wordpress-flowplayer/issues?labels=enhancement&page=1&state=open)

= 1.8.1 - 17 April 2014 =
* replace php short tags with full tags
* fix icon for WordPress 3.9

= 1.8.0 - 9 March 2014 =
* introducing Flowplayer Drive to replace Flowplayer Designer
* add support for Google AdSense for Flowplayer

= 1.7.0 - 16 February 2014 =
* add full support for flash video file, rtmp and hls
* cache Flowplayer designer video results
* allow all data to be deleted from all sites when uninstalling on a multisite
* update pot file
* update to colorbox v1.4.37

= 1.6.0 - 25 January 2014 =
* add support for all of the [modifier classes](http://flowplayer.org/docs/skinning.html#modifier-classes)
* improve structure of video options by splitting options with tabs
* add support for "At a Glance" dashboard widget

= 1.5.0 - 26 December 2013 =
* update to [Flowplayer HTML5 5.4.6](http://flowplayer.org/news/#html5546)
* minify all backend scripts and styles
* reformatted video format meta and add a new filter
* started adding flash video file and rtmp support

= 1.4.0 - 10 December 2013 =
* added a video widget
* added support for WordPress 3.8
* added responsive design to the admin area
* code improvements

= 1.3.0 - 24 November 2013 =
* added a few extra filters
* updated [FAQ](http://wordpress.org/plugins/flowplayer5/faq/) with more code documentation
* code improvements

= 1.2.0 - 10 November 2013 =
* added functionality to fetch videos from Flowplayer Designer directly in the admin area
* added a few filters and actions
* reorganisations of files and folders
* update to Flowplayer HTML5 5.4.4
* enable subtitle after being disabled in version 1.0.0

= 1.1.0 - 20 September 2013 =
* added an extra column to show the shortcode in the overview
* added a button in the posts pages so add shortcodes easily
* fixed typos and updated pot file

= 1.0.0 - 18 August 2013 =
* complete rewrite of plugin - now you can manage all of your videos in one place
* updated the Flowplayer HTML5 code to version 5.4.3
* added preload option
* added CDN option
* added a few more Flowplayer options
* added embed options
* disable subtitles temporarily till Flowplayer version 5.4.4 is released

= 0.5.0 - 3 March 2013 =
* updated the Flowplayer HTML5 code to version 5.3.2
* fixed splash image sizing

= 0.4.0 - 16 January 2013 =
* fixed the new "show logo on origin site" checkbox that was introduced in version 0.3
* now possible to add several players with different skins in one post/page
* fixed: the "Send to Editor" button became non-functional if the media library window was closed without choosing media

= 0.3.0 - 16 January 2013 =
* now in the posting UI the height of the player is calculated based on video's aspect ratio
* added option to show the logo also in the origin site, and not just only in virally embedded players

= 0.2.0 - 16 January 2013 =
* fixed to work when this plugin is symlinked in the wp-content/plugins directory
* fixed link to plugins configuration page
* fixed player scaling, does not use a fixed player size any more
* added an option to make the player size fixed

= 0.1.0 - 4 January 2013 =
* Initial release

== Upgrade Notice ==

= 1.7.0 =
* introducing Flowplayer Drive and Google AdSense support

= 1.7.0 =
* add full support for flash video file, rtmp and hls

= 1.6.0 =
* add more customisation options

= 1.5.0 =
* update to Flowplayer HTML5 5.4.6

= 1.4.0 =
* new video widget

= 1.3.0 =
* code improvements

= 1.2.0 =
* add videos from Flowplayer Designer directly in the admin area

= 1.1.0 =
* add small new features

= 1.0.0 =
* big plugin rewrite

= 0.5.0 =
* bugs fixed

= 0.4.0 =
* fixes a critical issue with the media library

= 0.2.0 =
* Bugs fixed. Player size is no longer fixed: Works better on different screen sizes.

= 0.1.0 =
* This is the first stable release.