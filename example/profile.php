<?php
namespace feedly;

require dirname( __FILE__ ) . '/../vendor/autoload.php';

/**
 * Read this before set your callback url while in Sandbox mode
 * @see https://groups.google.com/forum/#!topic/feedly-cloud/vSo0DuShvDg/discussion
 */
$feedly = new Feedly( new Mode\SandBoxMode(), new AccessTokenStorage\AccessTokenSessionStorage() );

$model = $feedly->profile( $_SESSION['feedly_access_token'] );

$response = $model->fetch();

print_r( $response );
