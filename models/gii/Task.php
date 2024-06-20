<?php

namespace app\models\gii;

use Yii;

/**
 * This is the model class for table "Task".
 *
 * @property int $id
 * @property string $title Имя задачи
 * @property string|null $description Описание задачи
 * @property string $due_date Длительность
 * @property int $status Статус
 * @property int $priority Приоритет
 */
class Task extends \app\common\vendor\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'due_date'], 'required'],
            [['description'], 'string'],
            [['due_date'], 'safe'],
            [['status', 'priority'], 'integer'],
            [['title'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'due_date' => 'Due Date',
            'status' => 'Status',
            'priority' => 'Priority',
        ];
    }
}
