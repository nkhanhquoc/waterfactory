<?php

/**
 * Created by PhpStorm.
 * User: Toanhv
 * Date: 8/10/2015
 * Time: 4:29 PM
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;

class AppController extends Controller {

    public function beforeAction($action) {
        date_default_timezone_set('Asia/Saigon');
        if (Yii::$app->session->has('lang')) {
            Yii::$app->language = Yii::$app->session->get('lang');
        } else {
            //or you may want to set lang session, this is just a sample
            Yii::$app->language = 'en';
        }
        return parent::beforeAction($action);
    }

}
