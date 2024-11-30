<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFilmTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'auto_increment' =>true,
                'unsigned' => true,
            ],
            'judul' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'genre' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'tahun_terbit' =>
            [
                'type' => 'year'
            ]
        ]);

        $this->forge->addKey('id');
        $this->forge->createTable('film');
    }

    public function down()
    {
        $this->forge->dropTable('film');
    }
}
