# product_demo
A demo of WordPress functions for WYSIWYG Editor Customization (TWD Project Demo)

TinyMCE (Tiny Moxiecode Content Editor) is a platform-independent, browser-based WYSIWYG editor control, written in JavaScript and released as open-source software under the LGPL by Ephox. It has the ability to convert HTML textarea fields or other HTML elements to editor instances. TinyMCE is designed to easily integrate with content management systems, including Django, Drupal, Joomla!, WordPress, and SOY CMS.
WordPress is bundled with the open source HTML WYSIWYG editor TinyMCE by Moxiecode Systems, AB.




/*==========================================================================================================*/
/* WYSIWYG EDITOR CUSTOMIZATION */
// function remove_h1_from_heading($args) {
//  // Omit h1 from the list in Paragraph drop-down
    // $args['block_formats'] = 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Pre=pre';
    // return $args;
    // }
    // add_filter('tiny_mce_before_init', 'remove_h1_from_heading' );
/*==========================================================================================================*/

/**
 * Removes buttons from the first row of the tiny mce editor
 *
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons
 * @return   array                The updated array of buttons that exludes some items
 */
// add_filter( 'mce_buttons', 'jivedig_remove_tiny_mce_buttons_from_editor');
// function jivedig_remove_tiny_mce_buttons_from_editor( $buttons ) {
//     $remove_buttons = array(
//         'bold',
//         'italic',
//         'strikethrough',
//         'bullist',
//         'numlist',
//         'blockquote',
//         'hr', // horizontal line
//         'alignleft',
//         'aligncenter',
//         'alignright',
//         'link',
//         'unlink',
//         'wp_more', // read more link
//         'spellchecker',
//         'dfw', // distraction free writing mode
//         'wp_adv', // kitchen sink toggle (if removed, kitchen sink will always display)
//     );
//     foreach ( $buttons as $button_key => $button_value ) {
//         if ( in_array( $button_value, $remove_buttons ) ) {
//             unset( $buttons[ $button_key ] );
//         }
//     }
//     return $buttons;
// }


/*
 * Removes buttons from the second row (kitchen sink) of the tiny mce editor
 *
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons in the kitchen sink
 * @return   array                The updated array of buttons that exludes some items
 */
// add_filter( 'mce_buttons_2', 'jivedig_remove_tiny_mce_buttons_from_kitchen_sink');
// function jivedig_remove_tiny_mce_buttons_from_kitchen_sink( $buttons ) {
//     $remove_buttons = array(
//         'formatselect', // format dropdown menu for <p>, headings, etc
//         'underline',
//         'alignjustify',
//         'forecolor', // text color
//         'pastetext', // paste as text
//         'removeformat', // clear formatting
//         'charmap', // special characters
//         'outdent',
//         'indent',
//         'undo',
//      'redo',
//      'strikethrough',
//      'hr',               
//         'wp_help', // keyboard shortcuts
//     );
//     foreach ( $buttons as $button_key => $button_value ) {
//         if ( in_array( $button_value, $remove_buttons ) ) {
//             unset( $buttons[ $button_key ] );
//         }
//     }
//     return $buttons;
// }

/*==========================================================================================================*/
/*ADD SUPERSCRIPT, FONT SELECT, FONT SIZE... */
//* Enable hidden buttons to third row of post editor
// function my_custom_mce_buttons_3( $buttons ) {   
//  /**
//   * Enable core button(s) that are disabled by default
//   */

//  $buttons[] = 'fontselect';
//  $buttons[] = 'fontsizeselect';
//  $buttons[] = 'wp_page';
//  $buttons[] = 'superscript';
//  $buttons[] = 'subscript';
//  $buttons[] = 'underline';

//  return $buttons;
// }
// add_filter( 'mce_buttons_3', 'my_custom_mce_buttons_3' );


/*==========================================================================================================*/
//ACF Editor customization
function product_demo_toolbars( $toolbars )
{
    // Uncomment to view format of $toolbars
    /*
    echo '< pre >';
        print_r($toolbars);
    echo '< /pre >';
    die;
         * 
         * 
      < preArray ( 
         * [Full] => Array ( 
         * [1] => Array ( [0] => bold [1] => italic [2] => strikethrough [3] => bullist [4] => numlist [5] => blockquote [6] => hr [7] => alignleft [8] => aligncenter [9] => alignright [10] => link [11] => unlink [12] => wp_more [13] => spellchecker [14] => fullscreen [15] => wp_adv ) 
         * [2] => Array ( [0] => formatselect [1] => underline [2] => alignjustify [3] => forecolor [4] => pastetext [5] => removeformat [6] => charmap [7] => outdent [8] => indent [9] => undo [10] => redo [11] => wp_help [12] => code ) 
         * [3] => Array ( ) 
         * [4] => Array ( )
         *  ) 
         * [Basic] => Array ( 
         * [1] => Array ( [0] => bold [1] => italic [2] => underline [3] => blockquote [4] => strikethrough [5] => bullist [6] => numlist [7] => alignleft [8] => aligncenter [9] => alignright [10] => undo [11] => redo [12] => link [13] => unlink [14] => fullscreen )
         *  )
         *  ) 
    */

    // Add a NEW toolbar called "Extremely Basic"
    // - this toolbar has only 1 row of buttons
    $toolbars['Extremely Basic' ] = array();
    $toolbars['Extremely Basic' ][1] = array('fullscreen');
    
    // Add a NEW toolbar called "Very Basic"
    // - this toolbar has only 1 row of buttons
    // $toolbars['Very Basic' ] = array();
    // $toolbars['Very Basic' ][1] = array('bold' , 'italic' , 'underline', 'fullscreen' );

                
        
    // Add a NEW toolbar called "Custom"
    // - this toolbar has only 1 row of buttons
    // $toolbars['Custom' ] = array();
    // $toolbars['Custom' ][1] = array('pastetext' ,'bold' , 'italic' , 'underline', 'formatselect', 'blockquote', 'link', 'unlink', 'removeformat' );     

        
        
    // Edit the "Full" toolbar and remove 'underline' from the 2nd row
    // if( ($key = array_search('underline' , $toolbars['Full' ][2])) !== false )
    // {
    //     unset( $toolbars['Full' ][2][$key] );
    // }

        
    // Edit the "Full" toolbar and remove 'alignleft' from the 1st row
    // if( ($key = array_search('alignleft' , $toolbars['Full' ][1])) !== false )
    // {
    //     unset( $toolbars['Full' ][1][$key] );
    // }
         
        
        
    // Edit the "Full" toolbar and add 'fontsizeselect' if not already present.
    // if (($key = array_search('fontsizeselect' , $toolbars['Full'][2])) !== true) {
    //     array_unshift($toolbars['Full'][2], 'fontsizeselect');
    // }

        
    // remove the 'Basic' toolbar completely
    // unset( $toolbars['Basic' ] );

       
    // return $toolbars - IMPORTANT!
//  return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars' , 'product_demo_toolbars'  );

/*=========================================================================================*/



