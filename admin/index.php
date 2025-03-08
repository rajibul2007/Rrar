<?php
// Load SEO config
$seo = json_decode(file_get_contents('../seo-config/loan-emi.json'), true);

// Language support
$lang = $_GET['lang'] ?? 'en';
$translations = json_decode(file_get_contents("../lang/{$lang}.json"), true);
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <!-- Preload critical resources -->
    <link rel="preload" href="/assets/css/critical.css" as="style">
    <link rel="preload" href="/assets/js/calculators/loan-emi.js" as="script">
    
    <!-- Inline critical CSS -->
    <style>
        .calculator-container { display:grid; grid-template-columns:1fr }
        .calc-form { padding:1rem; margin:1rem 0 }
    </style>
    
    <!-- Async load non-critical CSS -->
    <link rel="stylesheet" href="/assets/css/non-critical.css" media="print" onload="this.media='all'">
</head>

<body>
    <!-- Language selector -->
    <div class="lang-switcher">
        <a href="?lang=en">English</a>
        <a href="?lang=es">Español</a>
        <a href="?lang=hi">हिन्दी</a>
    </div>

    <!-- Calculator content using translations -->
    <h1><?= $translations['loan_emi_title'] ?></h1>
</body>
</html>
