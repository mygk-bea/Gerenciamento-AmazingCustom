<?php
include_once('../components/header.php');
session_start();
$errors = $_SESSION['errors'] ?? null;
unset($_SESSION['errors']);

$valores = $_SESSION['valores'] ?? null;
unset($_SESSION['valores']);
?>

<head>
  <link rel="stylesheet" href="../assets/css/style_cadCliente.css">
  <title>Cadastro Cliente</title>
</head>

<body>
  <div class="container_form d-flex flex-column align-items-center">
    <form action="./functions/func_cadClie.php" method="post" class="content_form d-flex flex-column">
      <h3>Novo Cliente</h3>

      <div class="input__field d-flex flex-column">
        <input type="text" name="nome" placeholder="Nome Completo" value="<?= ($valores) ? $valores['nome'] : null ?>">
        <span class="error"><?= (isset($errors['nome'])) ? $errors["nome"] : null ?></span>
      </div>

      <div class="input__field d-flex flex-column">
        <input type="email" name="email" placeholder="E-mail" value="<?= ($valores) ? $valores['email'] : null ?>">
        <span class="error"><?= (isset($errors['email'])) ? $errors["email"] : null ?></span>
      </div>

      <div class="d-flex justify-content-between">
        <label for="telefone-1">Telefone:</label>
        <div class="info_tel input__field d-flex flex-column">
          <input type="text" name="telefone" id="telefone-1" class="info_tel-input" value="<?= ($valores) ? $valores['telefone'] : null ?>">
          <span class="error"><?= (isset($errors['telefone'])) ? $errors["telefone"] : null ?></span>
        </div>

        <label for="telefone-2">Tel Opcional:</label>
        <div class="info_tel input__field d-flex flex-column">
          <input type="text" name="telefone_opcional" id="telefone-2" class="info_tel-input" value="<?= ($valores) ? $valores['telefone_opcional'] : null ?>">
          <span class="error"><?= (isset($errors['telefone_opcional'])) ? $errors["telefone_opcional"] : null ?></span>
        </div>
      </div>

      <div class="endereco d-flex flex-wrap">
        <div class="input__field d-flex flex-column">
          <input type="text" name="cep" class="cep" onchange="pesquisacep(this.value)" onkeyup="pesquisacep(this.value)" value="<?= ($valores) ? $valores['cep'] : null ?>">
          <span class="error"><?= (isset($errors['cep'])) ? $errors["cep"] : null ?></span>
        </div>

        <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" class="endereco_buscar-cep">
          <p>Não sabe o CEP?</p>
        </a>

        <div class="endereco_content d-flex justify-content-between">
          <div class="input__field d-flex flex-column">
            <input type="text" name="logradouro" id="logradouro__cli" placeholder="Logradouro" value="<?= ($valores) ? $valores['logradouro'] : null ?>">
            <span class="error"><?= (isset($errors['logradouro'])) ? $errors["logradouro"] : null ?></span>
          </div>
          <div class="input__field d-flex flex-column">
            <input type="text" name="numero" placeholder="Número" value="<?= ($valores) ? $valores['numero'] : null ?>">
            <span class="error"><?= (isset($errors['numero'])) ? $errors["numero"] : null ?></span>
          </div>
          <div class="input__field d-flex flex-column">
            <input type="text" name="bairro" id="bairro__cli" placeholder="Bairro" value="<?= ($valores) ? $valores['bairro'] : null ?>">
            <span class="error"><?= (isset($errors['bairro'])) ? $errors["bairro"] : null ?></span>
          </div>
        </div>

        <div class="endereco_content d-flex justify-content-between">
          <div class="input__field d-flex flex-column">
            <input type="text" name="cidade" id="cidade__cli" placeholder="Cidade" value="<?= ($valores) ? $valores['cidade'] : null ?>">
            <span class="error"><?= (isset($errors['cidade'])) ? $errors["cidade"] : null ?></span>
          </div>
          <div class="input__field d-flex flex-column">
            <input type="text" name="uf" id="uf__cli" placeholder="UF" maxlength="2" value="<?= ($valores) ? $valores['uf'] : null ?>">
            <span class="error"><?= (isset($errors['uf'])) ? $errors["uf"] : null ?></span>
          </div>
          <div class="input__field d-flex flex-column">
            <input type="text" name="complemento" id="complemento__cli" placeholder="Complemento" value="<?= ($valores) ? $valores['complemento'] : null ?>">
            <span class="error"><?= (isset($errors['complemento'])) ? $errors["complemento"] : null ?></span>
          </div>
        </div>
      </div>
      <div class="btn-cadastro d-flex justify-content-end p-0 w-100">
        <button type="submit" class="btn-default btn-cadastrar">CADASTRAR</button>
      </div>
    </form>
  </div>
  <script src="../assets/js/style.js"></script>
  <script src="../assets/js/cadCliente.js"></script>
</body>

</html>