<?php

namespace common\models;

 use yii\db\ActiveRecord;

 class Font extends ActiveRecord
 {
     const LIMIT = 20;

     public static function tableName()
     {
         return '{{font}}';
     }

     public static function getPopular($pivot = null)
     {
         $state = self::find()->orderBy(['views' => SORT_DESC]);
         if($pivot) $state->where(['<', 'id', $pivot]);

         return $state->asArray()->all();
     }
 }