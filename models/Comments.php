<?php

namespace app\models;
use app\models\User;
use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $user_id
 * @property string $comment
 * @property string $created_at
 *
 * @property Users $user
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'comment'], 'required'],
            [['user_id'], 'integer'],
            [['comment'], 'string'],
            [['created_at'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'comment' => 'Comment',
            'created_at' => 'Created At',
        ];
    }

    public function getAll(){
        $comments = Comments::find()->orderBy(['id' => SORT_DESC])->all();
        return $comments;
    }
}
