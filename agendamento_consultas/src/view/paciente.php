<html>
<head>
    <title>Pacientes</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <div>
        <button onclick="window.location.href='home.php'">HOME</button>
        <button onclick="window.location.href='medico.php'">MÉDICOS</button>
        <button onclick="window.location.href='agendamentos.php'">AGENDAMENTOS</button>
    </div>

    <div>
        <h1>Gerenciamento de Pacientes</h1>
    </div>
    <div>
        <input type="text" placeholder="Nome do Paciente">
        <input type="text" placeholder="CPF">
        <button>Cadastrar novo Pacientes</button>
    </div>

    <table>
    <tr>
        <th>Paciente</th>
        <th>CPF</th>
        <th>Consultas</th>
        <th>Editar</th>
        <th>Deletar</th>
    </tr>

    <?php 
    require '../repositories/PacienteRepository.php';
    $pacientes = PacienteRepository::findAll();

    foreach($pacientes as $paciente): ?>
        <tr>
            <td><?php echo $paciente['nome'] ?? 'não encontrado'; ?></td>
            <td><?php echo $paciente['cpf'] ?? '123456'; ?></td>
            <td>
                <button>Ver</button>
            </td>
            <td>
                <button>Editar</button>
            </td>
            <td>
                <button>Deletar</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>

</body>
</html>