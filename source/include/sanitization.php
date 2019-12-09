<?php

  // v0.1.0 - Development


  // function to return sanitized config file contents, without writing it to a file.
  function sanitize_config($conf_file) {

  // store the config file contents in a variable.
  $conf_contents = file_get_contents($conf_file);

  // parse config file.
  $conf = parse_ini_file($conf_file);

  // loop through each key pair in the config file
  foreach ($conf as $key => $value) {
    
    // remove whitespace from between comma separated values for user variable.
    $new_value = remove_list_whitespace($value);

    // replace a corresponding value in the config variable with value from user variables.
    $conf_contents = str_ireplace("$key=\"$value\"", "$key=\"$new_value\"", $conf_contents);
  }

  return $conf_contents;
  }

  // function to remove white space from around commas in a list.
  function remove_list_whitespace($string) {
  $string = preg_replace('/\s*,\s*/', ',', $string);

  return $string;
  }

  // function to replace commas with new lines.
  function replace_comma_newline($string) {
  $string = str_ireplace(',', "\n", $string);

  return $string;
  }
?>