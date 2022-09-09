<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kwitansi' => [
                'type'       => 'VARCHAR',
                'constraint' => 4,
                
            ],
            'tanggal' => [
                'type' => 'date',
                'null' => true,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                
            ],
            'ketjurnal' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                
            ],
        ]);
        $this->forge->addKey('id_transaksi', true);
        $this->forge->createTable('tbl_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_transaksi');
    }
}
