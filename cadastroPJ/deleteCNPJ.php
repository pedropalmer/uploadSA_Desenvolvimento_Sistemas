<?php

    require_once "../funcoes.php";
    login();
    require_once "../cabecalho.php";
    include "../conexao.php";


if (isset($_POST['submit'])) {
    $query = "DELETE FROM  dadosCnpj WHERE id={$_POST['id']}";
    $resultado = $conexao->query($query);
    if ($resultado) {
        informaSucesso("Dados deletados com sucesso!");
        btns('lista_dadosCNPJ', '../index');
        exit();
    } else {
        informaErro("Erro ao deletar dados :( ");
    }
}


    $query = "SELECT * FROM  dadosCnpj where id= {$_GET['id']}";
    $resultado = $conexao->query($query);

?>

<div class="table-responsive">
    <table class="table table-striped">

        <h2>Lista de Dados</h2>

        <thead>

            <tr>
                <th scope="col">Id</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Matriz/Filial</th>
                <th scope="col">Abertura</th>
                <th scope="col">Razão Social</th>
                <th scope="col">Nome Fantasia</th>
                <th scope="col">Natureza jurídica</th>
                <th scope="col">Atividade Principal</th>
                <th scope="col">Atividades Secundárias</th>
                <th scope="col">CEP</th>
                <th scope="col">Logradouro</th>
                <th scope="col">Número</th>
                <th scope="col">Complemento</th>
                <th scope="col">Bairro/distrito</th>
                <th scope="col">Município</th>
                <th scope="col">UF</th>
                <th scope="col">Endereço eletrônico</th>
                <th scope="col">Telefone</th>
                <th scope="col">Situação cadastral</th>
                <th scope="col">Abertura Cadastro</th>
                <th scope="col">Data de Criação</th>
            </tr>

        </thead>

        <?php foreach ($resultado as  $value) { ?>

            <tbody>

                <tr>
                    <th scope="row"><?= $value['id'] ?></th>
                    <td><?= $value['cnpj'] ?></td>
                    <td><?= $value['tipo'] ?></td>
                    <td><?= $value['abertura'] ?></td>
                    <td><?= $value['nome'] ?></td>
                    <td><?= $value['fantasia'] ?></td>
                    <td><?= $value['natureza_juridica'] ?></td>
                    <td><?= $value['atividade_principal'] ?></td>
                    <td><?= $value['atividade_secundaria'] ?></td>
                    <td><?= $value['cep'] ?></td>
                    <td><?= $value['logradouro'] ?></td>
                    <td><?= $value['numero'] ?></td>
                    <td><?= $value['complemento'] ?></td>
                    <td><?= $value['bairro'] ?></td>
                    <td><?= $value['municipio'] ?></td>
                    <td><?= $value['uf'] ?></td>
                    <td><?= $value['email'] ?></td>
                    <td><?= $value['telefone'] ?></td>
                    <td><?= $value['situacao'] ?></td>
                    <td><?= $value['data_situacao']?></td>
                    <td><?= date("j/m/Y H:i:s", strtotime($value['dtCriacao'])) ?></td>
                </tr>

            <?php } ?>

            </tbody>

    </table>

    <form action="#" method="post">

        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

        <div class="form-row">

            <div class="form-group" col-md-1>

                <input type="submit" name="submit" class="btn btn-danger text-center" value="DELETAR">

                <a href="lista_dadosCNPJ.php" class="btn btn-primary text-center">VOLTAR</a>

            </div>

        </div>

    </form>

</div>


<?php

    require_once "../rodape.php";

?>