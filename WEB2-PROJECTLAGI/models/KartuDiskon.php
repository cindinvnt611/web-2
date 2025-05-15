<?php
namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Pegawai
{
    public static function getAll()
    {
        $pdo = Connection::make();
        $sql = "SELECT * FROM pegawai ORDER BY id DESC";
        $statement = $pdo->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $statement = $pdo->prepare("SELECT * FROM pegawai WHERE id = ?");
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Connection::make();
        $sql = "INSERT INTO pegawai (nama, jabatan, gaji) VALUES (:nama, :jabatan, :gaji)";
        $statement = $pdo->prepare($sql);
        return $statement->execute([
            ':nama' => $data['nama'],
            ':jabatan' => $data['jabatan'],
            ':gaji' => $data['gaji'],
        ]);
    }

    public static function update($id, $data)
    {
        $pdo = Connection::make();
        $sql = "UPDATE pegawai SET nama = :nama, jabatan = :jabatan, gaji = :gaji WHERE id = :id";
        $statement = $pdo->prepare($sql);
        return $statement->execute([
            ':nama' => $data['nama'],
            ':jabatan' => $data['jabatan'],
            ':gaji' => $data['gaji'],
            ':id' => $id,
        ]);
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $sql = "DELETE FROM pegawai WHERE id = :id";
        $statement = $pdo->prepare($sql);
        return $statement->execute([':id' => $id]);
    }
}

// Contoh penggunaan untuk menambahkan pegawai
$dataPegawai = [
    'nama' => 'John Doe',
    'jabatan' => 'Manager',
    'gaji' => 5000000
];

$pegawai = new Pegawai();
$pegawai->create($dataPegawai);
