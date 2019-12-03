<?php
require __DIR__ . '/../config/db.php';

$sql = "CREATE TABLE `people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dna` text COLLATE utf8_unicode_ci NOT NULL,
  `is_mutant` tinyint(1) NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;";

db::query($sql);
echo "Operación de migración finalizada";
