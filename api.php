<?php
require_once 'counter.php';

updateCounter();

$format = isset($_GET['format']) ? $_GET['format'] : 'pic';
$type = isset($_GET['type']) ? $_GET['type'] : null;

// 图片类型目录
$typeDirs = ['meinv', 'dongman', 'fengjing'];
// 支持的图片格式
$imageExts = ['jpg', 'jpeg', 'png', 'gif'];

$images = [];

if ($type) {
    $type = str_replace(['{', '}'], '', $type);
    $types = array_map('trim', explode(',', $type));
    foreach ($types as $oneType) {
        if (in_array($oneType, $typeDirs)) {
            foreach ($imageExts as $ext) {
                $images = array_merge($images, glob("$oneType/*.$ext"));
            }
        }
    }
} else {
    foreach ($typeDirs as $typeDir) {
        foreach ($imageExts as $ext) {
            $images = array_merge($images, glob("$typeDir/*.$ext"));
        }
    }
}

if (count($images) > 0) {
    $randomImage = $images[array_rand($images)];
} else {
    $randomImage = 'default.jpg';
}

$imageUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $randomImage;

if ($format === 'json') {
    header('Content-Type: application/json');
    echo json_encode(['imageUrl' => $imageUrl]);
} else {
    header("Location: $imageUrl");
}
exit();
