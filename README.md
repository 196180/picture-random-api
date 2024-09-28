# picture-random-api

## 将项目文件上传至Serv00类似虚拟主机的`public_html`目录下，将`index.html`文件`https://yourdomain/api.php`中的`yourdomain`部分修改为你的域名，并将你的图片按分类上传至fengjing、meinv、dongman中即可随机调用图片。

## 接口调用说明

### 参数说明

| 参数   | 描述                                 | 示例值                     |
|--------|--------------------------------------|----------------------------|
| type   | 图片类别，可选。指定从哪个类别获取图片 | meinv, dongman, fengjing    |
| format | 返回数据格式。默认直接返回图片，可以选择返回JSON格式 | json, pic（默认）          |

### 调用示例

| URL 示例                                          | 描述                             |
|---------------------------------------------------|----------------------------------|
| https://images.linux-do.rr.nu/api.php             | 默认输出一张随机图片（从所有类别中选择） |
| https://images.linux-do.rr.nu/api.php?type=meinv  | 获取美女类型的随机图片                   |
| https://images.linux-do.rr.nu/api.php?type={dongman,fengjing} | 获取动漫、风景类型的随机图片           |
| https://images.linux-do.rr.nu/api.php?format=json | 返回图片的JSON格式地址                |
| https://images.linux-do.rr.nu/api.php?type={fengjing,meinv}&format=json | 获取JSON格式的风景、美女类型图片地址 |
