<?php
require_once 'counter.php';

// 更新计数器
updateCounter();

// 获取参数
$format = isset($_GET['format']) ? $_GET['format'] : 'pic';
$type = isset($_GET['type']) ? $_GET['type'] : null;

// 图片类型目录
$typeDirs = ['meinv', 'dongman', 'fengjing'];

// 初始化图片数组
$images = [];

// 检查类型参数是否有效
if ($type && in_array($type, $typeDirs)) {
    // 如果指定了类型，从该目录获取图片
    $images = glob($type . '/*.jpg');
} else {
    // 否则，从所有目录获取图片
    foreach ($typeDirs as $typeDir) {
        $images = array_merge($images, glob($typeDir . '/*.jpg'));
    }
}

// 检查是否有图片
if (count($images) > 0) {
    $randomImage = $images[array_rand($images)];
} else {
    $randomImage = 'default.jpg';
}

// 获取图片URL
$imageUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $randomImage;

// 返回 JSON 格式的图片 URL 或直接图片
if ($format === 'json') {
    header('Content-Type: application/json');
    echo json_encode(['imageUrl' => $imageUrl]);
} else {
    header("Location: $imageUrl");
}
exit();
