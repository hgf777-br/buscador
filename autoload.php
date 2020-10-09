<?php

spl_autoload_register(function ($nome_da_classe) {
  $caminho_arquivo = str_replace('Alura', 'src', $nome_da_classe);
  $caminho_arquivo = str_replace("\\", DIRECTORY_SEPARATOR, $caminho_arquivo);
  $caminho_arquivo .= ".php";
  if (file_exists($caminho_arquivo))
    require_once $caminho_arquivo;
});
