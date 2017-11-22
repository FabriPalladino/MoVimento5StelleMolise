<?php

// include custom jQuery
function m5s_include_custom_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'm5s_include_custom_jquery');

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'm5s-fonts', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
		wp_enqueue_style( 'm5s-icons', 'https://fonts.googleapis.com/css?family=Oswald:400,700|Titillium+Web:300,400,400i,700' );
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'M5s-captcha', 'https://www.google.com/recaptcha/api.js');
    //wp_enqueue_script( 'M5s-ytAPI', 'https://apis.google.com/js/client.js?onload=googleApiClientReady?key=AIzaSyDm4YpHxb8-KICbHe4i-vFUyvHrV1pv8XE', array('jquery'));
    wp_enqueue_script( 'M5s-ytAPI-calls', get_stylesheet_directory_uri() . '/js/yt-scripts.js', array('jquery'));
		wp_enqueue_script( 'M5s-main', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'));
}

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


function pn_body_class_add_categories( $classes ) {

	// Only proceed if we're on a single post page
	if ( !is_single() )
		return $classes;

	// Get the categories that are assigned to this post
	$post_categories = get_the_category();

	// Loop over each category in the $categories array
	foreach( $post_categories as $current_category ) {

		// Add the current category's slug to the $body_classes array
		$classes[] = 'category-' . $current_category->slug;

	}

	// Finally, return the $body_classes array
	return $classes;
}
add_filter( 'body_class', 'pn_body_class_add_categories' );

function twentysixteen_m5s_cat() {
  $categories_list = get_the_category_list( _x( ' ', 'Used between list items, there is a space after the comma.', 'twentysixteen' ) );
	if ( $categories_list && twentysixteen_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'twentysixteen' ),
			$categories_list
		);
	}
}

function twentysixteen_m5s_tag() {

  $tags_list = get_the_tag_list( '', _x( '- ', 'Used between list items, there is a space after the comma.', 'twentysixteen' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'twentysixteen' ),
			$tags_list
		);
	}

}

function twentysixteen_m5s_author() {
  if ( 'post' === get_post_type() ) {
    $author_avatar_size = apply_filters( 'twentysixteen_author_avatar_size', 49 );
    printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
      get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
      _x( 'Author', 'Used before post author name.', 'twentysixteen' ),
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      get_the_author()
    );
  }
}

function m5s_custom_posttypes() {

	$labels = array(
			'name'               => 'Comunicati Stampa',
			'singular_name'      => 'Comunicato Stampa',
			'menu_name'          => 'Comunicati Stampa',
			'name_admin_bar'     => 'Comunicato Stampa',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New Comunicato Stampa',
			'new_item'           => 'New Comunicato Stampa',
			'edit_item'          => 'Edit Comunicato Stampa',
			'view_item'          => 'View Comunicato Stampa',
			'all_items'          => 'All Comunicati Stampa',
			'search_items'       => 'Search Comunicati Stampa',
			'parent_item_colon'  => 'Parent Comunicati Stampa:',
			'not_found'          => 'No Comunicati Stampa found.',
			'not_found_in_trash' => 'No Comunicati Stampa found in Trash.',
	);

	$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'          => 'dashicons-megaphone',
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'comunicati-stampa' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'supports'           => array( 'title', 'editor', 'thumbnail'),
			'show_in_rest'		 => true
	);
	register_post_type( 'comunicato-stampa', $args );

	$labels = array(
			'name'               => 'Restituzione',
			'singular_name'      => 'Restituzione',
			'menu_name'          => 'Restituzione',
			'name_admin_bar'     => 'Restituzione',
			'edit_item'          => 'Edit Restituzione',
			'parent_item_colon'  => 'Parent Restituzione:',
			'not_found'          => 'No Restituzione found.',
			'not_found_in_trash' => 'No Restituzione found in Trash.',
	);

	$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'          => 'dashicons-nametag',
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'restituzione' ),
			'capability_type'    => 'page',
			'has_archive'        => false,
			'hierarchical'       => true,
			'menu_position'      => 6,
			'supports'           => array( 'title'),
			'show_in_rest'		 => true
	);
	register_post_type( 'restituzione', $args );

}
add_action( 'init', 'm5s_custom_posttypes' );

// Flush rewrite rules to add "review" as a permalink slug
function m5s_rewrite_flush() {
    m5s_custom_posttypes();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'm5s_rewrite_flush' );

function register_top_menu() {
  register_nav_menu('top-menu',__( 'Top Menu' ));
}
add_action( 'init', 'register_top_menu' );

/*Add Google captcha field to Comment form*/

add_filter('comment_form','add_google_captcha');

function add_google_captcha(){
    echo '<div class="g-recaptcha" data-sitekey="6Lc_3P4SAAAAALZwukOKlo1Xx1fSSJNeDVfj4rKq"></div>';
}

/*End of Google captcha*/

//Yout ube calls


// if ($_GET['q'] && $_GET['maxResults']) {
//   // Call set_include_path() as needed to point to your client library.
//   require_once ($_SERVER["DOCUMENT_ROOT"].'/API/youtube/google-api-php-client/src/Google_Client.php');
//   require_once ($_SERVER["DOCUMENT_ROOT"].'/API/youtube/google-api-php-client/src/contrib/Google_YouTubeService.php');
//
//   /* Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
//   Google APIs Console <http://code.google.com/apis/console#access>
//   Please ensure that you have enabled the YouTube Data API for your project. */
//   $DEVELOPER_KEY = 'AIzaSyDm4YpHxb8-KICbHe4i-vFUyvHrV1pv8XE';
//
//   $client = new Google_Client();
//   $client->setDeveloperKey($DEVELOPER_KEY);
//
//   $youtube = new Google_YoutubeService($client);
//
//   try {
//     $searchResponse = $youtube->search->listSearch('id,snippet', array(
//       'q' => $_GET['q'],
//       'maxResults' => $_GET['maxResults'],
//     ));
//
//     $videos = '';
//     $channels = '';
//
//     foreach ($searchResponse['items'] as $searchResult) {
//       switch ($searchResult['id']['kind']) {
//         case 'youtube#video':
//           $videos .= sprintf('<li>%s (%s)</li>', $searchResult['snippet']['title'],
//             $searchResult['id']['videoId']."<a href=http://www.youtube.com/watch?v=".$searchResult['id']['videoId']." target=_blank>   Watch This Video</a>");
//           break;
//         case 'youtube#channel':
//           $channels .= sprintf('<li>%s (%s)</li>', $searchResult['snippet']['title'],
//             $searchResult['id']['channelId']);
//           break;
//        }
//     }
//
//    } catch (Google_ServiceException $e) {
//     $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
//       htmlspecialchars($e->getMessage()));
//   } catch (Google_Exception $e) {
//     $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
//       htmlspecialchars($e->getMessage()));
//   }
// }

function m5s_include_yt() {
	<?php

/**
 * Library Requirements
 *
 * 1. Install composer (https://getcomposer.org)
 * 2. On the command line, change to this directory (api-samples/php)
 * 3. Require the google/apiclient library
 *    $ composer require google/apiclient:~2.0
 */
if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
  throw new \Exception('please run "composer require google/apiclient:~2.0" in "' . __DIR__ .'"');
}

require_once __DIR__ . '/vendor/autoload.php';
session_start();

/*
 * You can acquire an OAuth 2.0 client ID and client secret from the
 * {{ Google Cloud Console }} <{{ https://cloud.google.com/console }}>
 * For more information about using OAuth 2.0 to access Google APIs, please see:
 * <https://developers.google.com/youtube/v3/guides/authentication>
 * Please ensure that you have enabled the YouTube Data API for your project.
 */
$OAUTH2_CLIENT_ID = 'REPLACE_ME';
$OAUTH2_CLIENT_SECRET = 'REPLACE_ME';

$client = new Google_Client();
$client->setClientId($OAUTH2_CLIENT_ID);
$client->setClientSecret($OAUTH2_CLIENT_SECRET);
$client->setScopes('https://www.googleapis.com/auth/youtube');
$redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'],
  FILTER_SANITIZE_URL);
$client->setRedirectUri($redirect);

// Define an object that will be used to make all API requests.
$youtube = new Google_Service_YouTube($client);

// Check if an auth token exists for the required scopes
$tokenSessionKey = 'token-' . $client->prepareScopes();
if (isset($_GET['code'])) {
  if (strval($_SESSION['state']) !== strval($_GET['state'])) {
    die('The session state did not match.');
  }

  $client->authenticate($_GET['code']);
  $_SESSION[$tokenSessionKey] = $client->getAccessToken();
  header('Location: ' . $redirect);
}

if (isset($_SESSION[$tokenSessionKey])) {
  $client->setAccessToken($_SESSION[$tokenSessionKey]);
}

// Check to ensure that the access token was successfully acquired.
if ($client->getAccessToken()) {
  try {
    // Call the channels.list method to retrieve information about the
    // currently authenticated user's channel.
    $channelsResponse = $youtube->channels->listChannels('contentDetails', array(
      'mine' => 'true',
    ));

    $htmlBody = '';
    foreach ($channelsResponse['items'] as $channel) {
      // Extract the unique playlist ID that identifies the list of videos
      // uploaded to the channel, and then call the playlistItems.list method
      // to retrieve that list.
      $uploadsListId = $channel['contentDetails']['relatedPlaylists']['uploads'];

      $playlistItemsResponse = $youtube->playlistItems->listPlaylistItems('snippet', array(
        'playlistId' => $uploadsListId,
        'maxResults' => 50
      ));

      $htmlBody .= "<h3>Videos in list $uploadsListId</h3><ul>";
      foreach ($playlistItemsResponse['items'] as $playlistItem) {
        $htmlBody .= sprintf('<li>%s (%s)</li>', $playlistItem['snippet']['title'],
          $playlistItem['snippet']['resourceId']['videoId']);
      }
      $htmlBody .= '</ul>';
    }
  } catch (Google_Service_Exception $e) {
    $htmlBody = sprintf('<p>A service error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  } catch (Google_Exception $e) {
    $htmlBody = sprintf('<p>An client error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  }

  $_SESSION[$tokenSessionKey] = $client->getAccessToken();
} elseif ($OAUTH2_CLIENT_ID == 'REPLACE_ME') {
  $htmlBody = <<<END
  <h3>Client Credentials Required</h3>
  <p>
    You need to set <code>\$OAUTH2_CLIENT_ID</code> and
    <code>\$OAUTH2_CLIENT_ID</code> before proceeding.
  <p>
END;
} else {
  $state = mt_rand();
  $client->setState($state);
  $_SESSION['state'] = $state;

  $authUrl = $client->createAuthUrl();
  $htmlBody = <<<END
  <h3>Authorization Required</h3>
  <p>You need to <a href="$authUrl">authorize access</a> before proceeding.<p>
END;
}
?>

    <?=$htmlBody?>
}




add_action( 'init', 'm5s_include_yt' );
