<?php

class UserSession extends Session {

  const session_key = 'boo_session';

  public static function isLoggedIn() {
    return !is_null(self::get_id());
  }

  public static function set_session($user_data) {
    self::set(self::session_key, $user_data);
  }

  public static function get_id() {
    return self::get_data('id');
  }

  public static function get_data($key) {
    $user_data = self::get(self::session_key);
    return isset($user_data[$key]) ? $user_data[$key] : null;
  }

  public static function get_session() {
    return self::get(self::session_key, false) === false ? [] : self::get(self::session_key, false);
  }

  public static function unset_session() {
    parent::unset(self::session_key);
  }

}