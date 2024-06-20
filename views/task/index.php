<?php

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TaskSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создание задачи', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'class' => \app\widgets\pager\Pagination::class,
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            [
                'label' => 'Описание',
                'attribute' => 'description',
                'enableSorting' => false,
                'format' => 'raw',
                'value' => function (Task $model) {
                    return $model->description;
                }
            ],
            [
                'label' => 'Длительность',
                'attribute' => 'due_date',
                'enableSorting' => false,
                'format' => 'raw',
                'value' => function (Task $model) {
                    return $model->due_date;
                }
            ],
            [
                'label' => 'Статус',
                'attribute' => 'title',
                'enableSorting' => false,
                'format' => 'raw',
                'value' => function (Task $model) {
                    return Task::STATUSES_NAMES[$model->status];
                }
            ],
            [
                'label' => 'Приоритет',
                'attribute' => 'priority',
                'enableSorting' => false,
                'format' => 'raw',
                'value' => function (Task $model) {
                    return Task::PRIORITIES[$model->priority];
                }
            ], [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Task $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
