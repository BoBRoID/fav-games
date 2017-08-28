<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "games".
 *
 * @property integer $id
 * @property string $title
 * @property integer $year
 * @property integer $deleted
 *
 * @property GamesPhotos $id0
 */
class Game extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'games';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string'],
            [['year', 'deleted'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => GamesPhotos::className(), 'targetAttribute' => ['id' => 'game_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'year' => 'Year',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(GamesPhotos::className(), ['game_id' => 'id']);
    }
}
