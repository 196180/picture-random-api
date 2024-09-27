<?php
function updateCounter() {
    $counterFile = 'counter.txt';
    $data = file_exists($counterFile) ? json_decode(file_get_contents($counterFile), true) : [];

    $today = date('Y-m-d');
    $thisMonth = date('Y-m');

    // 更新总调用次数
    $data['total'] = isset($data['total']) ? $data['total'] + 1 : 1;

    // 更新本月调用次数
    $data['month'][$thisMonth] = isset($data['month'][$thisMonth]) ? $data['month'][$thisMonth] + 1 : 1;

    // 更新今日调用次数
    $data['daily'][$today] = isset($data['daily'][$today]) ? $data['daily'][$today] + 1 : 1;

    // 保存数据
    file_put_contents($counterFile, json_encode($data));

    return $data;
}

function getCounterData() {
    $counterFile = 'counter.txt';
    if (file_exists($counterFile)) {
        $data = json_decode(file_get_contents($counterFile), true);
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $thisMonth = date('Y-m');

        return [
            'total' => $data['total'] ?? 0,
            'month' => $data['month'][$thisMonth] ?? 0,
            'yesterday' => $data['daily'][$yesterday] ?? 0,
            'today' => $data['daily'][$today] ?? 0
        ];
    }
    return ['total' => 0, 'month' => 0, 'yesterday' => 0, 'today' => 0];
}
?>
