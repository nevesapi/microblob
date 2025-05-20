<?php

namespace Microblog\auth;


final class ControleDeAcesso
{
  private function __construct() {}

  private static function iniciarSessao(): void
  {
    if (!isset($_SESSION)) session_start();
  }

  public static function exigirLogin(): void
  {
    self::iniciarSessao();
    if (!isset($_SESSION["id"])) {
      session_destroy();
      header("location:../login.php?acesso_proibido");
      exit;
    }
  }
}
