# Opencart Function Lang() & __()

# English
Opencart function to quickly extract language data

This is the Opencart system language functions Lang() and __(), which makes it easy to extract language data, and the two functions are equivalent.

When developing the opencart(2.3.2) tpl file, if you need to use the data in the language directory, you need to first assign it to the $data array in the controller before you can use it in the tpl file.

Using this function lang(), you can omit this step (first assign $data to the controller).

## Instructions
1. Overwrite system corresponding file
2. Update modification cache file

Used in tpl files
```html
<!-- Extract the language/*/common/header.php data in common/header.tpl -->
<div><?php __('heading_title'); ?></div>

<!-- Extract the data of language/*/sale/order.php in common/header.tpl -->
<div><?php lang('sale/order.heading_title'); ?></div>
Used in php files
```

```php
// Extract the data of language/*/common/forgotten.php at common/forgotten.tpl
$this->error['error_password'] = __('error_password');

// Extract the data of language/*/common/login.php at common/forgotten.tpl
$this->error['error_login'] = lang('common/login.error_login');
```

# 简体中文
这是 Opencart 系统语言函数 Lang() 以及 __()，可以方便提取语言数据，两个函数等价。

在开发 opencart(2.3.2) tpl 文件时，如果需要使用 language 目录里的数据，需要先在 controller 里先赋值到 $data 数组里，然后才能在 tpl 文件里使用。

使用这个函数 lang()，可以省去这一步骤（先在 controller 赋值 $data）。

## 使用方法

1. 覆盖 system 对应文件
2. 更新 modification 缓存文件

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
