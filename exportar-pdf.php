<?php 

// Exportar para PDF

use CrudDiversos\Utilitarios;

require_once 'vendor/autoload.php';

session_start();
Utilitarios::teste($_SESSION['dados']);


echo "Script de exportação em PDF";