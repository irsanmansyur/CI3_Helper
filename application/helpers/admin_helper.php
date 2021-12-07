<?php
if (!function_exists("user")) {
  function user($col = null)
  {
    $CI = &get_instance();
    $user =  $CI->session->userdata("user");
    $user->id = $user->id_admin;
    if ($col)
      return $user->{$col};
    return $user;
  }
};
if (!function_exists("in_role")) {
  function in_role(...$roles)
  {
    $CI = &get_instance();

    $user =  $CI->session->userdata("user");
    foreach ($roles as $role) {
      if ($role == $user->level)
        return true;
    }
    return false;
  }
};
