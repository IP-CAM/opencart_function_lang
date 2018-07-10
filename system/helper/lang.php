<?php
if (! function_exists('lang')) {
    /**
     * Get language data
     * 
     * @param string $key Format(directory/filename.key). If the language file directory and
     *               name are the same as the file being called, then you can just write the key.
     * @param string $default Use this value as a return when the key does not exist
     * 
     * @return string
     */
    function lang($key = '', $default = '') {
        // Need to exist $GLOBALS['language_code']
        if (! isset($GLOBALS['language_code'])) {
            return $default;
        }

        // File of calling lang function or __ function
        $filename = '';
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $filepath = $backtrace[0]['file'] != __FILE__ ? $backtrace[0]['file'] : $backtrace[1]['file'];
        $filetype = pathinfo($filepath, PATHINFO_EXTENSION);

        // Parse the language file to be referenced
        if (preg_match('/\/([A-Za-z0-9_\-]+)\/([A-Za-z0-9_\-]+)\.([A-Za-z0-9_\-])$/', $key, $match) > 0) {
            $filename = $match[1] . '/' . $match[2];
            $key = $match[3];
        } elseif (preg_match('/\/([A-Za-z0-9_\-]+)\/([A-Za-z0-9_\-]+)\.(?:tpl|php)$/', str_replace('\\', '/', $filepath), $match) > 0) {
            $filename = $match[1] . '/' . $match[2];
        } else {
            throw new \Exception('Error: File path parsing error.');
        }
        
        // Initialize the language library and get the text
        if (! isset($GLOBALS['language_class'])) {
            $GLOBALS['language_class'] = new Language($GLOBALS['language_code']);
            $GLOBALS['language_class']->load($GLOBALS['language_code']);
            $GLOBALS['language_filename'] = array();
        }

        if (! in_array($filename, $GLOBALS['language_filename'])) {
            $GLOBALS['language_class']->load($filename);
            $GLOBALS['language_filename'][] = $filename;
        }
        
        // If equal, indicating missing, return the default value
        $result = $GLOBALS['language_class']->get($key) == $key ? $default : $GLOBALS['language_class']->get($key);
        
        // If the file type is equal to tpl, output, otherwise return
        if ($filetype == 'tpl') {
            echo $result;
        } else {
            return $result;
        }
    }
}

if (!function_exists('__')) {
    /**
     * Alias of lang()
     */
    function __($key = '', $default = '') {
        lang($key, $default);
    }
}