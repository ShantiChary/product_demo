<?php 

//ACF Editor customization
function mindset_toolbars( $toolbars )
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
    
	// Add a NEW toolbar called "Soo Basic"
	// - this toolbar has only 1 row of buttons
	$toolbars['Soo Basic' ] = array();
	$toolbars['Soo Basic' ][1] = array('bold' , 'italic' , 'underline' );

                
        
	// Add a NEW toolbar called "Mindset Custom"
	// - this toolbar has only 1 row of buttons
	$toolbars['Mindset Custom' ] = array();
	$toolbars['Mindset Custom' ][1] = array('pastetext' ,'bold' , 'italic' , 'underline', 'formatselect', 'blockquote', 'link', 'unlink', 'removeformat' );     

        
        
	// Edit the "Full" toolbar and remove 'underline' from the 2nd row
	if( ($key = array_search('underline' , $toolbars['Full' ][2])) !== false )
	{
	    unset( $toolbars['Full' ][2][$key] );
	}

        
    // Edit the "Full" toolbar and remove 'alignleft' from the 1st row
    if( ($key = array_search('alignleft' , $toolbars['Full' ][1])) !== false )
	{
	    unset( $toolbars['Full' ][1][$key] );
	}
         
        
        
    // Edit the "Full" toolbar and add 'fontsizeselect' if not already present.
    if (($key = array_search('fontsizeselect' , $toolbars['Full'][2])) !== true) {
        array_unshift($toolbars['Full'][2], 'fontsizeselect');
    }

        
	// remove the 'Basic' toolbar completely
	unset( $toolbars['Basic' ] );

        
        
	// return $toolbars - IMPORTANT!
	return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars' , 'mindset_toolbars'  );