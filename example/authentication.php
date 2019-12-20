<?php
namespace feedly;

require dirname(__FILE__) . "/../vendor/autoload.php";

/**
 * Read this before set your callback url while in Sandbox mode
 * @see https://groups.google.com/forum/#!topic/feedly-cloud/vSo0DuShvDg/discussion
 */
$feedly = new Feedly( new Mode\SandBoxMode(), new AccessTokenStorage\AccessTokenSessionStorage() );

if ( isset( $_GET['code'] ) ) {

    /**
     * Response will contain the Access Token and Refresh Token
     */
    $tokens = $feedly->getTokens(
        "sandbox",
        "nZmS4bqxgRQkdPks",
        $_GET['code'],
        "http://localhost/"
    );

    /**
     * You must update Client's Secret(nZmS4bqxgRQkdPks ) once in a while
     * @see https://groups.google.com/forum/#!topic/feedly-cloud/a_cGSAzv8bY
     */

    echo $tokens;
}

if ( ! isset( $_SESSION['feedly_access_token'] ) ) {
    /**
     * After redirection replace "localhost" with your domain
     * keeping the Auth Code GET param
     */
    $loginUrl = $feedly->getLoginUrl( 'sandbox', 'http://localhost' );
    echo "<a href=\"" . $loginUrl . "\">Authenticate using Feedly</a>";
}
