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

  public static function login(int $id, string $nome, string $tipo): void
  {
    self::iniciarSessao();

    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['tipo'] = $tipo;
  }

  public static function logout(): void
  {
    self::iniciarSessao();
    session_destroy();
    header("location:../login.php?logout");
    exit;
  }

  public static function exigirAdmin(): void
  {
    self::iniciarSessao();
    if ($_SESSION["tipo"] !== "admin") {
      header("location:nao-autorizado.php");
      exit;
    }
  }
}
