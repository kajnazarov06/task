<?php
// @codingStandardsIgnoreFile

/**
 * Yii is a helper class serving common framework functionality.
 */
class Yii extends \yii\BaseYii
{
    /**
     * @var \yii\console\Application|\yii\web\Application|IDECodeAssistHelper_Application the application instance
     */
    public static $app;
}

/**
 * @property \app\models\User $user
 * Enter components here
 * @property \yii\redis\Connection $redis
 * @property \yii\db\Connection $db79
 * @property \yii\db\Connection $db37
 * @property \yii\db\Connection $db37i
 * @property \app\components\cbrf\CBRF $cbrf
 */
class IDECodeAssistHelper_Application
{

}

/**
 * @property app\models\gii\Users $identity
 */
class IDECodeAssistHelper_User extends \yii\web\User
{
}
