<?php
$_result_tpl .= '<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>' . ((isset($this->data['header']['vars']['TITLE'])) ? $this->data['header']['vars']['TITLE'] : $this->data['parent']['vars']['TITLE'])  . '</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
        <link rel="stylesheet" href="./assets/style.css">
        <link rel="stylesheet" href="./assets/weather-icons.css">
    </head>
    <body>
        <header class="mbm mtl">
            <a href="index.php" class="mrm">Accueil</a>
            <a href="admin.php">Admin</a>
        </header>
        <div id="main">

';
