public static function getAll()
{
    $pdo = Connection::make();
    $stmt = $pdo->query("SELECT * FROM kartu_diskon");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
