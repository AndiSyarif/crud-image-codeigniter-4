<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBarangsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'supplier' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'stock' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
            ],
            'price' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'note' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_barang');
        $this->forge->createTable('barangs');
    }

    public function down()
    {
        $this->forge->dropTable('barangs');
    }
}
