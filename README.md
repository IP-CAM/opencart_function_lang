# Opencart Function Lang() & __()
>Opencart function to quickly extract language data

>Opencart 函数，可以快速提取语言数据

>Readme in 
[Chinese 中文](https://github.com/fzzkyd/opencart_function_lang/blob/master/README_ZH.md)

This is the Opencart system language functions `Lang()` and `__()`, which makes it easy to extract language data, and the two functions are equivalent.

When developing the opencart(2.3.2) tpl file, if you need to use the data in the `language` directory, you need to first write `$this->config->get('key')` in `controller` to assign the data to `$data` before it can be used in the `tpl` file.

If you use this function `lang()`, you can omit this step.

## Function lang() and __()

(PHP 5, PHP 7)

lang — Find language data (case sensitive)

## Description

```php
string lang ( string $key [, string $default = ''])
```
Returns or prints the language data found by `$key`.

## Parameters
__key__

    The value being searched for, otherwise known as the needle.

__default__

    Optionally, if needle does not find the corresponding data, return the value of this parameter (the default empty string).

## Return Values
Returns the `string` data found by `$key`. If not found, returns the value of the `$default` parameter. If there is no `$default` argument, an empty `string` is returned.
> If the function is called in a php file, the result will be returned. If the function is called in the tpl file, it will be printed directly.

## Instructions
1. Overwrite the corresponding file in the `system` directory
2. Update the cache file in the `modification` directory

__Used in tpl files__
```html
<!-- Extract the `language/*/common/header.php` data in `common/header.tpl` -->
<div><?php __('heading_title'); ?></div>

<!-- Extract the data of `language/*/sale/order.php` in `common/header.tpl` -->
<div><?php __('sale/order.heading_title'); ?></div>

<!-- When `heading_title` is not found, it will return `hello world!` -->
<div><?php __('heading_title', 'hello world!'); ?></div>

<!-- When `heading_title` is not found and `$default` is not passed, an empty `string` is printed -->
<div><?php __('heading_title'); ?></div>
```

__Used in php files__
```php
// Extract the data of `language/*/common/forgotten.php` at `common/forgotten.tpl`
$this->error['error_password'] = __('error_password');

// Extract the data of `language/*/common/login.php` at `common/forgotten.tpl`
$this->error['error_login'] = __('common/login.error_login');

// When `error_login` is not found, it will return `Error message`
$this->error['error_login'] = __('error_login', 'Error message');

// When `error_login` is not found and `$default` is not passed, an empty `string` is returned
if (__('error_login') === '') {
    echo 'No data found';
}
```
