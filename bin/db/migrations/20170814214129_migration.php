<?php

use Phinx\Migration\AbstractMigration;

class Migration extends AbstractMigration {
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change() {
        $table = $this->table('categorias');
        $table->addColumn('titulo_categoria','string', array('null' => false))
            ->create();
        
        $table = $this->table('tags');
        $table->addColumn('descricao_tag','string', array('null' => false))
            ->create();

        $table = $this->table('tipo_arquivo');
        $table->addColumn('descricao_tipo_arquivo','string', array('null' => false))
            ->create();
        
        $table = $this->table('usuarios');
        $table->addColumn('nome', 'string', array('null' => false))
            ->addColumn('username', 'string', array('null' => false))
            ->addColumn('password', 'string', array('null' => false))
            ->addColumn('email', 'string', array('null' => false))
            ->addColumn('tipo_usuario', 'string', array('null' => false))
            ->create();

        $refTable = $this->table('praticas');
        $refTable->addColumn('titulo_pratica','string', array('null' => false))
            ->addColumn('descricao_pratica','string', array('null' => false))
            ->addColumn('categorias_id','integer', array('null' => false))
            ->addForeignKey('categorias_id', 'categorias', 'id', array('delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'))
            ->create();

        $refTable = $this->table('arquivos');
        $refTable->addColumn('cod_arquivo','string', array('null' => false))
            ->addColumn('titulo_arquivo','string', array('null' => false))
            ->addColumn('descricao_arquivo','string', array('null' => false))
            ->addColumn('path_arquivo','string', array('null' => false))
            ->addColumn('tipo_arquivo_id','integer', array('null' => false))
            ->addForeignKey('tipo_arquivo_id', 'tipo_arquivo', 'id', array('delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'))
            ->create();

        $refTable = $this->table('praticas_arquivos');
        $refTable->addColumn('praticas_id','integer', array('null' => false))
            ->addColumn('arquivos_id','integer', array('null' => false))
            ->addForeignKey('praticas_id', 'praticas', 'id', array('delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'))
            ->addForeignKey('arquivos_id', 'arquivos', 'id', array('delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'))
            ->create();

        $refTable = $this->table('praticas_tags');
        $refTable->addColumn('praticas_id','integer', array('null' => false))
            ->addColumn('tags_id','integer', array('null' => false))
            ->addForeignKey('praticas_id', 'praticas', 'id', array('delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'))
            ->addForeignKey('tags_id', 'tags', 'id', array('delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'))
            ->create();
    }
}
