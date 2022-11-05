<?php
if( !session_id() ){
    session_start();
}

/**
 * set a Flash Message
 *
 * @param  mixed $messages message to be shown when calling flash() function
 * @param  mixed $type type of flas messafe
 *
 * @return void
 */
function setFlashlayout( $messages, $type = 'primary' ){

    $message = "<div class='alert alert-" . $type . "' role='alert'>
                    ";
    if( is_array( $messages ) ){
        $message .= '<ul>';
        foreach( $messages as $msg ){
            $message .= "<li>" . $msg . "</li>";
        }
        $message .= '</ul>';
    }else{
        $message .= $messages;
    }
    $message .="</div>";
    $_SESSION['flashlayout'] = $message; 
    
}

function setFlash( $messages, $type = 'primary' ){

    $message = "<div class='alert alert-" . $type . "' role='alert'>
                    ";
    if( is_array( $messages ) ){
        $message .= '<ul>';
        foreach( $messages as $msg ){
            $message .= "<li>" . $msg . "</li>";
        }
        $message .= '</ul>';
    }else{
        $message .= $messages;
    }
    $message .="</div>";
    $_SESSION['flash']['message'] = $message; 
    
}

/**
 * Show a Flash Messafe
 *
 * @return void
 */
function flash(){

    if( isset( $_SESSION['flash'] ) ){
        echo $_SESSION['flash']['message'];
    }
    unset( $_SESSION['flash'] );
}