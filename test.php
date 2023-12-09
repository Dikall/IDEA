<?php

require_once 'Autoload.php';

use Akademik\Akademik as AkademikAkademikAlias;
use Admin\Akademik\Akademik as AdminAkademikAlias;

$akademikAkademik = new AkademikAkademikAlias();
echo $akademikAkademik->verifLirs();

echo "\n";

$adminAkademik = new AdminAkademikAlias();
echo $adminAkademik->verifLirs();
