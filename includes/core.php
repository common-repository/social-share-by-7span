<?php

/**
 * Register option fields
 */
function ss7s_website_social_connect( $wp_customize  ) {
	global $sources;
	
	// Add Social Connect Section
	$wp_customize->add_section( 'social_connect', array( 
		'title' => 'Social Connect',
		'description' => __( 'Add Social Links and Counts Here.' , 'theme'  ),
		'priority' => 90,
	  )  );

	
	foreach( $sources as $key => $value  ){
		$wp_customize->add_setting( $value.'_link' );
		$wp_customize->add_setting( $value.'_count' );
		$wp_customize->add_control( $value.'_link',
			array( 
				'settings' => $value.'_link',
				'type' => 'url',
				'label' => $key,
				'section' => 'social_connect',
				'input_attrs' => array(
					'placeholder' => __( 'Link', 'theme' ),
				)
			) 
		 );
		$wp_customize->add_control( $value.'_count',
			array( 
				'settings' => $value.'_count',
				'type' => 'text',
				'section' => 'social_connect',
				'input_attrs' => array(
					'placeholder' => __( 'Counts', 'theme' ),
				)
			) 
		 );
	}

	$wp_customize->add_setting( 'whatsapp' );
	$wp_customize->add_control( 'whatsapp',
			array( 
				'settings' => 'whatsapp',
				'type' => 'text',
				'label' => 'Whatsapp',
				'section' => 'social_connect',
				'input_attrs' => array(
					'placeholder' => __( 'Number', 'theme' ),
				)
			) 
		 );	
	$wp_customize->add_setting( 'whatsapp_msg' );
	$wp_customize->add_control( 'whatsapp_msg',
			array( 
				'settings' => 'whatsapp_msg',
				'type' => 'text',
				'section' => 'social_connect',
				'input_attrs' => array(
					'placeholder' => __( 'Message', 'theme' ),
				)
			) 
		 );	
		 
}
add_action( 'customize_register', 'ss7s_website_social_connect' );

/**
 * Adds social options to user profile
 */
function ss7s_author_social_connect(  $author_contact  ) {
  /* Add user contact methods */
  $author_contact['fb_profile'] = __( 'Facebook UserName', 'theme' );
  $author_contact['twt_profile'] = __( 'Twitter Handler', 'theme' );
  $author_contact['insta_profile'] = __( 'Instagram UserName', 'theme' );
  $author_contact['linkdin_profile'] = __( 'Linkedin UserName', 'theme' );
  $author_contact['reddit_profile'] = __( 'Reddit UserName', 'theme' );
  $author_contact['web_url'] = __( 'Website URL', 'theme' );

  return $author_contact;
}
add_filter( 'user_contactmethods', 'ss7s_author_social_connect' );

/**
 * Icons
 */
class ss7sIcon{

	static $icons = [
		"menu"	=>'<svg style="width:30px;height:30px" viewBox="0 0 24 24"> <path fill="#000000" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" /> </svg>',

		"facebook" => '<svg viewBox="0 0 24 24"><path fill="#ffffff" d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z"></path></svg>',

		"fb" => '<svg viewBox="0 0 24 24"><path d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z"></path></svg>',

		"pinterest" => '<svg viewBox="10 8 11 15" width="14px" fill="#fff" xmlns="http://www.w3.org/2000/svg"><path d="M10 13.048c0 1.39.505 2.626 1.588 3.087.177.075.337.002.388-.203.036-.14.12-.5.158-.648.052-.203.032-.274-.11-.45-.313-.384-.513-.88-.513-1.585 0-2.046 1.47-3.87 3.82-3.87 2.08 0 3.228 1.322 3.228 3.092 0 2.33-.99 4.297-2.458 4.297-.81 0-1.42-.7-1.225-1.557.233-1.023.684-2.128.684-2.867 0-.66-.34-1.213-1.047-1.213-.83 0-1.496.894-1.496 2.09 0 .764.248 1.28.248 1.28l-.998 4.403c-.296 1.307-.044 2.91-.023 3.07.013.097.13.12.184.047.076-.104 1.063-1.375 1.4-2.644.094-.36.545-2.22.545-2.22.27.534 1.056 1.006 1.894 1.006 2.49 0 4.183-2.368 4.183-5.538 0-2.4-1.948-4.63-4.908-4.63C11.858 8 10 10.75 10 13.046z"/></svg>',

		"instagram" => '<svg viewBox="0 0 24 24"><path fill="#ffffff" d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" /></svg>',

		"insta" => '<svg viewBox="0 0 24 24"><path fill="#ffffff" d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" /></svg>',

		"twt" => '<svg viewBox="0 0 24 24"><path fill="#ffffff" d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z"></path></svg>',

		"twitter" => '<svg viewBox="0 0 24 24"><path fill="#ffffff" d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z"></path></svg>',

		"gmail" => '<svg  viewBox="0 0 24 24"><path fill="#ffffff" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg>',

		"linkedin" => '<svg  viewBox="0 0 24 24"><path fill="#ffffff" d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z" /></svg>',

		"linkdin" => '<svg viewBox="0 0 24 24"><path fill="#ffffff" d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z" /></svg>',

		"youtube" => '<svg  viewBox="0 0 24 24"><path fill="#ffffff" d="M10,15L15.19,12L10,9V15M21.56,7.17C21.69,7.64 21.78,8.27 21.84,9.07C21.91,9.87 21.94,10.56 21.94,11.16L22,12C22,14.19 21.84,15.8 21.56,16.83C21.31,17.73 20.73,18.31 19.83,18.56C19.36,18.69 18.5,18.78 17.18,18.84C15.88,18.91 14.69,18.94 13.59,18.94L12,19C7.81,19 5.2,18.84 4.17,18.56C3.27,18.31 2.69,17.73 2.44,16.83C2.31,16.36 2.22,15.73 2.16,14.93C2.09,14.13 2.06,13.44 2.06,12.84L2,12C2,9.81 2.16,8.2 2.44,7.17C2.69,6.27 3.27,5.69 4.17,5.44C4.64,5.31 5.5,5.22 6.82,5.16C8.12,5.09 9.31,5.06 10.41,5.06L12,5C16.19,5 18.8,5.16 19.83,5.44C20.73,5.69 21.31,6.27 21.56,7.17Z" /></svg>',
		
		"whatsapp" => '<svg  viewBox="0 0 24 24"><path fill="#ffffff" d="M16.75,13.96C17,14.09 17.16,14.16 17.21,14.26C17.27,14.37 17.25,14.87 17,15.44C16.8,16 15.76,16.54 15.3,16.56C14.84,16.58 14.83,16.92 12.34,15.83C9.85,14.74 8.35,12.08 8.23,11.91C8.11,11.74 7.27,10.53 7.31,9.3C7.36,8.08 8,7.5 8.26,7.26C8.5,7 8.77,6.97 8.94,7H9.41C9.56,7 9.77,6.94 9.96,7.45L10.65,9.32C10.71,9.45 10.75,9.6 10.66,9.76L10.39,10.17L10,10.59C9.88,10.71 9.74,10.84 9.88,11.09C10,11.35 10.5,12.18 11.2,12.87C12.11,13.75 12.91,14.04 13.15,14.17C13.39,14.31 13.54,14.29 13.69,14.13L14.5,13.19C14.69,12.94 14.85,13 15.08,13.08L16.75,13.96M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C10.03,22 8.2,21.43 6.65,20.45L2,22L3.55,17.35C2.57,15.8 2,13.97 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12C4,13.72 4.54,15.31 5.46,16.61L4.5,19.5L7.39,18.54C8.69,19.46 10.28,20 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z" /></svg>',
		
		"reddit" => '<svg  viewBox="0 0 24 24"><path fill="#ffffff" d="M22,12.14C22,10.92 21,9.96 19.81,9.96C19.22,9.96 18.68,10.19 18.29,10.57C16.79,9.5 14.72,8.79 12.43,8.7L13.43,4L16.7,4.71C16.73,5.53 17.41,6.19 18.25,6.19C19.11,6.19 19.81,5.5 19.81,4.63C19.81,3.77 19.11,3.08 18.25,3.08C17.65,3.08 17.11,3.43 16.86,3.95L13.22,3.18C13.11,3.16 13,3.18 12.93,3.24C12.84,3.29 12.79,3.38 12.77,3.5L11.66,8.72C9.33,8.79 7.23,9.5 5.71,10.58C5.32,10.21 4.78,10 4.19,10C2.97,10 2,10.96 2,12.16C2,13.06 2.54,13.81 3.29,14.15C3.25,14.37 3.24,14.58 3.24,14.81C3.24,18.18 7.16,20.93 12,20.93C16.84,20.93 20.76,18.2 20.76,14.81C20.76,14.6 20.75,14.37 20.71,14.15C21.46,13.81 22,13.04 22,12.14M7,13.7C7,12.84 7.68,12.14 8.54,12.14C9.4,12.14 10.1,12.84 10.1,13.7A1.56,1.56 0 0,1 8.54,15.26C7.68,15.28 7,14.56 7,13.7M15.71,17.84C14.63,18.92 12.59,19 12,19C11.39,19 9.35,18.9 8.29,17.84C8.13,17.68 8.13,17.43 8.29,17.27C8.45,17.11 8.7,17.11 8.86,17.27C9.54,17.95 11,18.18 12,18.18C13,18.18 14.47,17.95 15.14,17.27C15.3,17.11 15.55,17.11 15.71,17.27C15.85,17.43 15.85,17.68 15.71,17.84M15.42,15.28C14.56,15.28 13.86,14.58 13.86,13.72A1.56,1.56 0 0,1 15.42,12.16C16.28,12.16 17,12.86 17,13.72C17,14.56 16.28,15.28 15.42,15.28Z" /></svg>'

	];

	public static function get($key){
		return self::$icons[$key];
	}
}


