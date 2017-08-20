<?php

use Phinx\Seed\AbstractSeed;

class SeedAbpresa extends AbstractSeed {
    /**
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run() {
        // data_categorias
        $data_categorias = array(
            array('titulo_categoria' => 'RUP'),
            array('titulo_categoria' => 'XP'),
            array('titulo_categoria' => 'SCRUM')
        );

        // data_tags
        $data_tags = array(
            array('descricao_tag' => 'GERENCIA'),
            array('descricao_tag' => 'DESENVOLVIMENTO'),
            array('descricao_tag' => 'REUNIOES'),
            array('descricao_tag' => 'XP'),
            array('descricao_tag' => 'TESTES')
        );
        
        // data_praticas
        $data_praticas = array(
            array( 'titulo_pratica'        => 'Planning Pocker',
                   'descricao_pratica'     => 'Descrição da boa prática Planning Pocker',
                   'categorias_id'         => 3
            ),
            array( 'titulo_pratica'        => 'Reunios Diarias',
                   'descricao_pratica'     => 'Descrição da boa prática Reunios Diarias',
                   'categorias_id'         => 2
            ),
            array( 'titulo_pratica'        => 'Desenvolvimento em Pares',
                   'descricao_pratica'     => 'Descrição da boa prática Desenvolvimento em Pares',
                   'categorias_id'         => 2
            ),
            array( 'titulo_pratica'        => 'Disponibilidade do Cliente',
                   'descricao_pratica'     => 'Descrição da boa prática Disponibilidade do Cliente',
                   'categorias_id'         => 2
            ),
            array( 'titulo_pratica'        => 'Small Releases',
                   'descricao_pratica'     => 'Descrição da boa prática Small Releases',
                   'categorias_id'         => 2
            ),
            array( 'titulo_pratica'        => 'Testes de Aceitação',
                   'descricao_pratica'     => 'Descrição da boa prática Testes de Aceitação',
                   'categorias_id'         => 2
            )
        );
        
        // data_praticas_tags
        $data_praticas_tags = array(
            array('praticas_id' => 1, 'tags_id' => 1 ),
            array('praticas_id' => 1, 'tags_id' => 3 ),
            array('praticas_id' => 2, 'tags_id' => 3 ),
            array('praticas_id' => 2, 'tags_id' => 4 ),
            array('praticas_id' => 3, 'tags_id' => 4 ),
            array('praticas_id' => 3, 'tags_id' => 2 ),
            array('praticas_id' => 4, 'tags_id' => 3 ),
            array('praticas_id' => 4, 'tags_id' => 4 ),
            array('praticas_id' => 5, 'tags_id' => 4 ),
            array('praticas_id' => 6, 'tags_id' => 4 ),
            array('praticas_id' => 6, 'tags_id' => 5 )
        );
        
        // data_usuarios
        $data_usuarios = array(
            array('nome'          => 'Jonathas Almeida',
                  'username'      => 'jonathas.almeida',
                  'email'         => 'jonathasarts@gmail.com',
                  'password'      => 12345,
                  'tipo_usuario'  => 'ADM'
            ),
            array('nome'          => 'Alber Jonathas',
                  'username'      => 'alber.jonathas',
                  'email'         => 'alber.jonathas@gmail.com',
                  'password'      => 12345,
                  'tipo_usuario'  => 'NORMAL'
            ),
            array('nome'          => 'Samyra Almeida',
                  'username'      => 'samyra.almeida',
                  'email'         => 'samyra.almeida@gmail.com',
                  'password'      => 12345,
                  'tipo_usuario'  => 'NORMAL'
            ),
            array('nome'          => 'Heremita Brasileiro',
                  'username'      => 'heremita.brasileiro',
                  'email'         => 'heremita.brasileiro@gmail.com',
                  'password'      => 12345,
                  'tipo_usuario'  => 'ADM'
            )
        );

/*------------------------------------------------------------------*/
        
        $categorias = $this->table('categorias');
        $tags = $this->table('tags');
        $praticas = $this->table('praticas');
        $praticas_tags = $this->table('praticas_tags');
      //   $praticas_arquivos = $this->table('praticas_arquivos');
        $usuarios = $this->table('usuarios');

/*------------------------------------------------------------------*/
        
        // $praticas_tags->truncate(); // ESVAZIA A TABELA praticas_tags
        // $praticas_arquivos->truncate(); // ESVAZIA A TABELA praticas_arquivos
        // $praticas->truncate(); // ESVAZIA A TABELA praticas
        // $tipo_arquivo->truncate(); // ESVAZIA A TABELA tipo_arquivo
        // $categorias->truncate(); // ESVAZIA A TABELA categorias
        // $tags->truncate(); // ESVAZIA A TABELA tags        
        // $usuarios->truncate(); // ESVAZIA A TABELA usuarios

/*------------------------------------------------------------------*/


        // INSERT CATEGORIAS
        $categorias->insert($data_categorias)
              ->save();
        
        // INSERT TAGS   
        $tags->insert($data_tags)
              ->save();
        
        // INSERT PRATICAS
        $praticas->insert($data_praticas)
              ->save();

        // INSERT PRATICAS_TAGS
        $praticas_tags->insert($data_praticas_tags)
              ->save();

        // INSERT USUARIOS
        $usuarios->insert($data_usuarios)
              ->save();
    }
}
