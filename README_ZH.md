# Opencart Function Lang() & __()

这是 Opencart 系统语言函数 `Lang()` 以及 `__()`，可以方便提取语言数据，两个函数等价。

在开发 opencart(2.3.2) tpl 文件时，如果需要使用 `language` 目录里的数据，需要先在 `controller` 编写 `$this->config->get('key')` 将数据赋值给 `$data`，然后才能在 `tpl` 文件里使用。

如果使用这个函数 lang()，就能省略这一步骤。

## 函数 lang() 以及 __()

(PHP 5, PHP 7)

lang — 查找语言数据（区分大小写）

## 说明

```php
string lang ( string $key [, string $default = ''])
```
返回或者打印 `$key` 查找到的语言数据。

## 参数
__key__

    查找的目标值，也就是 needle。

__default__

    可选，如果 needle 没有找到对应数据，返回这个参数的值（默认空字符串）。

## 返回值
返回 `$key` 查找到的 `string` 数据，如果没有找到，返回 `$default` 传参的值，如果没有 `$default` 传参，返回空字符串。
>如果是在 php 文件调用这个函数，则会返回结果，如果是在 tpl 文件调用这个函数，则会直接打印。

## 使用方法
1. 覆盖 `system` 目录里的对应文件
2. 更新 `modification` 目录里的缓存文件

__在 tpl 文件里使用__
```html
<!-- 在 common/header.tpl 提取 language/*/common/header.php 的数据 -->
<div><?php __('heading_title'); ?></div>

<!-- 在 common/header.tpl 提取 language/*/sale/order.php 的数据 -->
<div><?php __('sale/order.heading_title'); ?></div>

<!-- 当 heading_title 没有找到，则会打印 hello world! -->
<div><?php __('heading_title', 'hello world!'); ?></div>

<!-- 当 heading_title 没有找到，并且没有传递 $default，则会打印空字符串 -->
<div><?php __('heading_title'); ?></div>
```

__在 php 文件里使用__
```php
// 在 common/forgotten.tpl 提取 language/*/common/forgotten.php 的数据
$this->error['error_password'] = __('error_password');

// 在 common/forgotten.tpl 提取 language/*/common/login.php 的数据
$this->error['error_login'] = __('common/login.error_login');

// 当 error_login 没有找到，则会返回 Error message
$this->error['error_login'] = __('error_login', 'Error message');

// 当 error_login 没有找到，并且没有传递 $default，则会返回空字符串
if (__('error_login') === '') {
    echo '没有找到数据';
}
```
