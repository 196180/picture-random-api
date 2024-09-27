<?php
require_once 'counter.php';

// 更新计数器
updateCounter();

// 获取参数
$format = isset($_GET['format']) ? $_GET['format'] : 'pic';

// 图片类型目录
$typeDirs = ['meinv', 'dongman', 'fengjin'];

// 初始化图片数组
$images = [];

// 遍历每个目录，获取所有图片
foreach ($typeDirs as $typeDir) {
    $images = array_merge($images, glob($typeDir . '/*.jpg'));
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
