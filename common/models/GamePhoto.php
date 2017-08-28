<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "games_photos".
 *
 * @property integer $game_id
 * @property string $link
 * @property integer $added
 * @property integer $deleted
 *
 * @property Games $games
 */
class GamePhoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'games_photos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id'], 'required'],
            [['game_id', 'added', 'deleted'], 'integer'],
            [['link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'game_id' => 'Game ID',
            'link' => 'Link',
            'added' => 'Added',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGames()
    {
        return $this->hasOne(Games::className(), ['id' => 'game_id']);
    }
}
