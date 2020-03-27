<!DOCTYPE html>
<html lang="pt-br">

  <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />

      <title>GestClass - Is Cool Manage</title>
      <link rel="icon" href="assets/icon/logo.png" />

      <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
      <link rel="stylesheet" type="text/css" href="css/default.css" />
      <link rel="stylesheet" type="text/css" href="css/chamada.css" />
  </head>

  <body>

      <?php require_once 'reqHeader.php' ?>


      <div class="container col s12 m12 l12">
          <h4>Cadastro de Notas</h4>
          <table class="highlight centered">
              <thead>
                  <tr>
                      <th>Nome</th>
                      <th>Nota</th>
                      <th>Observações</th>
                  </tr>
              </thead>

              <tbody>
                  <tr>
                      <td>Nome(Aluno)</td>
                      <td>
                          <label>
                              <input type="number" data-mask="00.00" placeholder="Ex: 09.50"/>
                              <span></span>
                          </label>
                      </td>
                      <td>
                        <input type="text" placeholder="Observações . . ."/>
                      </td>
                  </tr>
                  <tr>
                      <td>Nome(Aluno)</td>
                      <td>
                          <label>
                              <input type="number" data-mask="00.00" placeholder="Ex: 09.50"/>
                              <span></span>
                          </label>
                      </td>
                      <td>
                        <input type="text" placeholder="Observações . . ."/>
                      </td>
                  </tr>
                  <tr>
                      <td>Nome(Aluno)</td>
                      <td>
                          <label>
                              <input type="number" data-mask="00.00" placeholder="Ex: 09.50"/>
                              <span></span>
                          </label>
                      </td>
                      <td>
                        <input type="text" placeholder="Observações . . ."/>
                      </td>
                  </tr>
                  <tr>
                      <td>Nome(Aluno)</td>
                      <td>
                          <label>
                              <input type="number" data-mask="00.00" placeholder="Ex: 09.50"/>
                              <span></span>
                          </label>
                      </td>
                      <td>
                        <input type="text" placeholder="Observações . . ."/>
                      </td>
                  </tr>
              </tbody>
          </table>

          <div class="input-field right">
              <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue">
                  <i class="material-icons left">send</i>Enviar</button>
          </div>

      </div>

<?php require_once 'reqFooter.php' ?>