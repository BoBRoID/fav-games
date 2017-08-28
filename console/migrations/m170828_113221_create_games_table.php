<?php

use yii\db\Migration;

/**
 * Handles the creation of table `games`.
 */
class m170828_113221_create_games_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('games', [
            'id'        =>  $this->primaryKey()->unsigned(),
            'title'     =>  $this->text(),
            'year'      =>  $this->integer(4),
            'deleted'   =>  $this->boolean()
        ]);

        $this->createTable('games_photos', [
            'game_id'   =>  $this->integer(10)->notNull()->unsigned(),
            'link'      =>  $this->string(255),
            'added'     =>  $this->integer(),
            'deleted'   =>  $this->boolean()
        ]);

        $this->createIndex('id', 'games_photos', ['game_id', 'link']);
        $this->addForeignKey('fk-games-id-games_photos-game_id', 'games', 'id', 'games_photos', 'game_id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-games-id-games_photos-game_id', 'games');
        $this->dropTable('games_photos');
        $this->dropTable('games');
    }
}
