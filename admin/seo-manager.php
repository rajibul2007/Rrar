<?php
require_once 'inc/config.php';
session_start();

// Authentication check
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit;
}

// Handle SEO updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $calculator = $_POST['calculator'];
    $data = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'keywords' => explode(',', $_POST['keywords'])
    ];
    
    file_put_contents("../seo-config/{$calculator}.json", json_encode($data));
}
?>

<!-- SEO Management Interface -->
<form method="POST">
    <div class="form-group">
        <label>Calculator:</label>
        <select name="calculator">
            <?php foreach (glob('../calculators/*') as $calc): ?>
            <option value="<?= basename($calc) ?>"><?= ucwords(str_replace('-', ' ', basename($calc)) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Meta Title:</label>
        <input type="text" name="title" required>
    </div>
    
    <div class="form-group">
        <label>Meta Description:</label>
        <textarea name="description" required></textarea>
    </div>
    
    <button type="submit">Save SEO Settings</button>
</form>
