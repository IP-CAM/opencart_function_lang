# Opencart Function Lang() & __()

Opencart function to quickly extract language data

这是 Opencart 系统语言函数 Lang() 以及 __()，可以方便提取语言数据，两个函数等价。

在开发 opencart(2.3.2) tpl 文件时，如果需要使用 language 目录里的数据，需要先在 controller 里先赋值到 $data 数组里，然后才能在 tpl 文件里使用。

使用这个函数（lang() __()），可以省去这一步骤（先在 controller 赋值 $data）。

# 使用方法

在 tpl 文件里使用
```html
<!-- 在 common/header.tpl 提取 language/*/common/header.php 的数据 -->
<div><?php __('heading_title'); ?></div>

<!-- 在 common/header.tpl 提取 language/*/sale/order.php 的数据 -->
<div><?php lang('sale/order.heading_title'); ?></div>
```

在 php 文件里使用
```php
// 在 common/forgotten.tpl 提取 language/*/common/forgotten.php 的数据
$this->error['error_password'] = __('error_password');

// 在 common/forgotten.tpl 提取 language/*/common/login.php 的数据
$this->error['error_login'] = lang('common/login.error_login');
```
