<?php
/**
 * Blog Share
 */
function ss7s_social_share_shortcode($atts){
  
  extract(
    shortcode_atts(
      array(
        'share_on' => 'facebook,twitter,gmail,whatsapp'
      ),
      $atts
    )
  );
  
  global $post;
  
  $socialShareLinkHtml = '';
  
  $socialLinks[] = explode(',', $share_on);
  foreach($socialLinks as $socialLink){
  $socialShareLinkHtml .= '<div class="social-share">
                            <ul class="social-share__list">';

  if (in_array("facebook", $socialLink)){
    $facebookShareLink = 'https://www.facebook.com/sharer.php?caption='.get_the_title($post->ID).'&u='.get_the_permalink($post->ID);
    $socialShareLinkHtml .= '<li><a href="'.$facebookShareLink.'" data-description="'.get_the_excerpt($post->ID).'" class="ss-fb" target="_blank">'.ss7sIcon::get("facebook").'</a></li>';
  }
  if(in_array("twitter", $socialLink)){
    $twitterShareLink = 'https://twitter.com/intent/tweet?text='.get_the_title($post->ID).'&url='.get_the_permalink($post->ID);
    $socialShareLinkHtml .= '<li><a href="'.$twitterShareLink.'" data-url="'.get_the_permalink($post->ID).'" class="ss-twitter" target="_blank">'.ss7sIcon::get("twitter").'</a></li>';
  }
  if(in_array("linkedin", $socialLink)){
    $linkedinShareLink = 'https://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink($post->ID);
    $socialShareLinkHtml .= '<li><a href="'.$linkedinShareLink.'" class="ss-linkedin" target="_blank">'.ss7sIcon::get("linkedin").'</a></li>';
  }
  if(in_array("pinterest", $socialLink)){
    $pinterestShareLink = 'https://in.pinterest.com/pin/create/button/?url='.get_the_permalink($post->ID).'&media='.get_the_post_thumbnail_url($post->ID).'&description='.get_the_title($post->ID);
    $socialShareLinkHtml .= '<li><a href="'.$pinterestShareLink.'" class="ss-pinterest" target="_blnak">'.ss7sIcon::get("pinterest").'</a></li>';
  }
  if(in_array("gmail", $socialLink)){
    $gmailShareLink = 'mailto:?subject='.get_the_title($post->ID).'&body='.get_the_excerpt($post->ID);
    $socialShareLinkHtml .= '<li><a href="'.$gmailShareLink.'" class="ss-gmail" target="_blnak">'.ss7sIcon::get("gmail").'</a></li>';
  }  
  if(in_array("reddit", $socialLink)){
    $redditShareLink = 'https://reddit.com/submit?url='.get_the_permalink($post->ID).'&title='.get_the_title($post->ID);
    $socialShareLinkHtml .= '<li><a href="'.$redditShareLink.'" class="ss-reddit" target="_blnak">'.ss7sIcon::get("reddit").'</a></li>';
  }
  if(in_array("whatsapp", $socialLink)){
    $whatsappShareLink = 'whatsapp://send?text='.get_the_permalink($post->ID);
    $socialShareLinkHtml .= '<li><a href="'.$whatsappShareLink.'" class="ss-whatsapp" target="_blnak">'.ss7sIcon::get("whatsapp").'</a></li>';
  }
  
  $socialShareLinkHtml .= '</ul>
                        </div>';
  
  return  $socialShareLinkHtml;

  }
}

/**
 * Website Social Connect
 */
function ss7s_website_social_connect_shortcode( $atts ){
   
  extract(
    shortcode_atts(
      array(
        'show_counts' => 'true',
      ),
      $atts
    )
  );

  global $sources; 
  
  $socialConnectHtml = '';
  $socialConnectHtml .= '<div><ul class="social follow-on">';

  foreach( $sources as $key=>$value ){
    $source_link = get_theme_mod( $value.'_link' );
    $source_count = get_theme_mod( $value.'_count' );
    $wappNumber = get_theme_mod( 'whatsapp' );
    $wappMsg = get_theme_mod( 'whatsapp_msg' );
    $wappLink = "https://api.whatsapp.com/send?phone=".$wappNumber."&text=".$wappMsg;
    if( $source_link != '' ){
      $socialConnectHtml .=  '<li>
                                <a href="'.$source_link.'" class="ss-'.$value.'" target="_blank" >
                                  <div class="social-follow__icon">
                                    '.ss7sIcon::get($value).'
                                  </div>';
    if($show_counts != 'false' && $source_count != '' ) {                                
      $socialConnectHtml .=       '<div class="social-follow__content">
                                    <label>'.$key.'</label>
                                    <span>'.$source_count.'</span>                                                      
                                  </div>';
      }
      $socialConnectHtml .=   '</a>
                            </li>';
    }  
  }
  if( $wappNumber != '' ){ 
    $socialConnectHtml .= '<li>
                            <a href="'.$wappLink.'" class="social-follow social-follow--whatsapp" target="_blank">
                              <div class="social-follow__icon">
                                '.ss7sIcon::get("whatsapp").'
                              </div>';
    $socialConnectHtml .=  '</a>
                          </li>';
    }

  $socialConnectHtml .=  '</ul></div>';
  
  return  $socialConnectHtml;

}

/**
 * Author Social Connect
 */
function ss7s_author_social_connect_shortcode( $atts ){
  
  global $post;
  if(is_author()){
    $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
    $authorID = $author->ID;
    
  } else {
    $authorID = $post->post_author;
  }
  extract(
    shortcode_atts(
      array(
        'author_id' => $authorID,
        'follow_on' => '',
        'profile_picture' => 'show'
      ),
      $atts
    )
  );
  
  $followLinks[] = explode(',', $follow_on);  
  
  $fb_profile   	=  get_the_author_meta( 'fb_profile', $author_id );
  $twt_profile	  =  get_the_author_meta( 'twt_profile', $author_id );
  $insta_profile 	=  get_the_author_meta( 'insta_profile', $author_id );
  $linkdin_profile 	=  get_the_author_meta( 'linkdin_profile', $author_id );
  $reddit_profile 	=  get_the_author_meta( 'reddit_profile', $author_id );
  $web_url		    =  get_the_author_meta( 'web_url', $author_id );    
  
  $authorSocialConnectHtml = '';
  $authorSocialConnectHtml .= '<div class="single-author-wrap">
                                <div class="single-author">';
  
  $authorSocialConnectHtml .=     '<div class="article-author author--single">';
  
  if( $profile_picture == 'show' ) :
  $authorSocialConnectHtml .=       '<div class="article-author__img ">
                                      '. get_avatar( get_the_author_meta( "ID" ), '120' ).'
                                    </div>';
  endif;

  $authorSocialConnectHtml .=         '<div class="article-author__name">';
  
  $authorSocialConnectHtml .=         '<a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'">
                                        <span>'. get_the_author() .'</span>
                                      </a>';
  
  $authorSocialConnectHtml .=         '<p>'. get_the_author_meta('description', $author_id) .'</p> 
                                    </div>
                                  </div>';
  
  $authorSocialConnectHtml .=     '<div class="follow-author">
                                    <p class="follow-author__title">Follow Author</p>
                                    <ul class="ul-reset author-social social">';
                                    
  foreach( $followLinks as $followLink ){

    if ( in_array( "facebook", $followLink ) && $fb_profile != '' ){
      $authorSocialConnectHtml .=     '<li><a class="facebook" href="https://facebook.com/'.$fb_profile.'" target="_blank"><svg class="svg-inline--fa fa-facebook fa-w-14" aria-hidden="true" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z"></path></svg></a></li>';
    }

    if ( in_array( "twitter", $followLink ) && $twt_profile != '' ){
      $authorSocialConnectHtml .=     '<li> <a class="twitter" href="https://twitter.com/'.$twt_profile.'" target="_blank"><svg class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg></a></li>';
    }

    if ( in_array( "instagram", $followLink ) && $insta_profile != '' ){
      $authorSocialConnectHtml .=     '<li> <a class="instagram" href="https://instagram.com/'.$insta_profile.'" target="_blank"><svg class="svg-inline--fa fa-instagram fa-w-14" aria-hidden="true" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg></a></li>';
    }
    
    if ( in_array( "linkedin", $followLink ) && $linkdin_profile != '' ){
      $authorSocialConnectHtml .=     '<li> <a class="linkedin" href="https://linkedin.com/in/'.$linkdin_profile.'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" class="svg-inline--fa fa-linkedin-in fa-w-14" role="img" viewBox="0 0 448 512"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg></a></li>';
    }
    
    if ( in_array( "reddit", $followLink ) && $reddit_profile != '' ){
      $authorSocialConnectHtml .=     '<li> <a class="reddit" href="https://reddit.com/user/'.$reddit_profile.'" target="_blank"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="reddit-alien" class="svg-inline--fa fa-reddit-alien fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M440.3 203.5c-15 0-28.2 6.2-37.9 15.9-35.7-24.7-83.8-40.6-137.1-42.3L293 52.3l88.2 19.8c0 21.6 17.6 39.2 39.2 39.2 22 0 39.7-18.1 39.7-39.7s-17.6-39.7-39.7-39.7c-15.4 0-28.7 9.3-35.3 22l-97.4-21.6c-4.9-1.3-9.7 2.2-11 7.1L246.3 177c-52.9 2.2-100.5 18.1-136.3 42.8-9.7-10.1-23.4-16.3-38.4-16.3-55.6 0-73.8 74.6-22.9 100.1-1.8 7.9-2.6 16.3-2.6 24.7 0 83.8 94.4 151.7 210.3 151.7 116.4 0 210.8-67.9 210.8-151.7 0-8.4-.9-17.2-3.1-25.1 49.9-25.6 31.5-99.7-23.8-99.7zM129.4 308.9c0-22 17.6-39.7 39.7-39.7 21.6 0 39.2 17.6 39.2 39.7 0 21.6-17.6 39.2-39.2 39.2-22 .1-39.7-17.6-39.7-39.2zm214.3 93.5c-36.4 36.4-139.1 36.4-175.5 0-4-3.5-4-9.7 0-13.7 3.5-3.5 9.7-3.5 13.2 0 27.8 28.5 120 29 149 0 3.5-3.5 9.7-3.5 13.2 0 4.1 4 4.1 10.2.1 13.7zm-.8-54.2c-21.6 0-39.2-17.6-39.2-39.2 0-22 17.6-39.7 39.2-39.7 22 0 39.7 17.6 39.7 39.7-.1 21.5-17.7 39.2-39.7 39.2z"></path></svg></a></li>';
    }

    if ( in_array( "website", $followLink ) && $web_url != '' ){
      $authorSocialConnectHtml .=     '<li><a href="'.$web_url.'" target="_blank" class="web" ><svg class="svg-inline--fa fa-globe fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="globe" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M364.215 192h131.43c5.439 20.419 8.354 41.868 8.354 64s-2.915 43.581-8.354 64h-131.43c5.154-43.049 4.939-86.746 0-128zM185.214 352c10.678 53.68 33.173 112.514 70.125 151.992.221.001.44.008.661.008s.44-.008.661-.008c37.012-39.543 59.467-98.414 70.125-151.992H185.214zm174.13-192h125.385C452.802 84.024 384.128 27.305 300.95 12.075c30.238 43.12 48.821 96.332 58.394 147.925zm-27.35 32H180.006c-5.339 41.914-5.345 86.037 0 128h151.989c5.339-41.915 5.345-86.037-.001-128zM152.656 352H27.271c31.926 75.976 100.6 132.695 183.778 147.925-30.246-43.136-48.823-96.35-58.393-147.925zm206.688 0c-9.575 51.605-28.163 104.814-58.394 147.925 83.178-15.23 151.852-71.949 183.778-147.925H359.344zm-32.558-192c-10.678-53.68-33.174-112.514-70.125-151.992-.221 0-.44-.008-.661-.008s-.44.008-.661.008C218.327 47.551 195.872 106.422 185.214 160h141.572zM16.355 192C10.915 212.419 8 233.868 8 256s2.915 43.581 8.355 64h131.43c-4.939-41.254-5.154-84.951 0-128H16.355zm136.301-32c9.575-51.602 28.161-104.81 58.394-147.925C127.872 27.305 59.198 84.024 27.271 160h125.385z"></path></svg></a>';
    }

  }
  $authorSocialConnectHtml .=       '</ul>
                                  </div>
                                </div>
                              </div>';
    
  return  $authorSocialConnectHtml;

}

function ss7s_register_shortcode(){
  add_shortcode('social_share', 'ss7s_social_share_shortcode');
  add_shortcode( 'website_social_connect', 'ss7s_website_social_connect_shortcode' );
  add_shortcode( 'author_social_connect', 'ss7s_author_social_connect_shortcode' );
}

add_action('init', 'ss7s_register_shortcode');

?>