<?php
declare(strict_types=1);

if (!function_exists('redirect')) {

    function redirect($path)
    {
        header("Location: ${path}");
        exit;
    }
}

function SelectFromBD(PDO $pdo, string $sql, array $params, bool $fetchAll)
{
    $statement = $pdo->prepare($sql);
    $statement->execute($params);
    if ($fetchAll) {
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
