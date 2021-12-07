<?php
if (!function_exists("CI")) {
  function CI()
  {
    $CI = &get_instance();
    return $CI;
  }
}
if (!function_exists("route")) {
  function route($name, ...$params)
  {
    $parameter = "";
    if (count($params) > 0)
      $parameter = "/" . implode("/", $params);
    switch ($name) {
      case "login":
        return base_url("frontend/login") .  $parameter;
        break;
      case "tagihan":
        return base_url("tagihan") .  $parameter;
        break;
      default:
        return base_url("") .  $parameter;
        break;
    }
  }
};
