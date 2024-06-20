<?php


namespace app\common\vendor;


class MigrationsAutomation extends \yii\db\Migration
{
    protected $tablesList = [];
    protected $fKeyList = [];
    protected $IDXs = [];

    public function addForeignKey_Automated(string $srcTable, string $srcCol, string $dstTable, string $dstCol = 'id')
    {
        $this->addForeignKey(
            "FK-{$srcTable}-{$srcCol}-{$dstTable}",
            $srcTable,
            $srcCol,
            $dstTable,
            $dstCol,
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        for ($idx = count($this->fKeyList) - 1; $idx > -1; $idx--) {
            $this->dropForeignKey(
                "FK-{$this->fKeyList[$idx][0]}-{$this->fKeyList[$idx][1]}-{$this->fKeyList[$idx][2]}",
                $this->fKeyList[$idx][0]
            );
        }
        for ($idx = count($this->IDXs) - 1; $idx > -1; $idx--) {
            $this->dropIndex($this->IDXs[$idx][2] ?? "IDX-" . implode('-', $this->IDXs[$idx][1]), $this->IDXs[$idx][0]);
        }
        for ($idx = count($this->tablesList) - 1; $idx > -1; $idx--) {
            $this->dropTable($this->tablesList[$idx]);
        }
    }
}