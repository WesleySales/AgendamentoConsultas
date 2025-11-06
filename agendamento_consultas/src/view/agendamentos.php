<?php
    require '../repositories/AgendamentoRepository.php';
    require '../repositories/MedicoRepository.php';
    require '../repositories/PacienteRepository.php';

    $agendamentos = AgendamentoRepository::findAll(); 
    $medicos = MedicoRepository::findAll();
    $pacientes = PacienteRepository::findAll();
?>

<html>
<head>
    <title>Medicos</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div>
        <button onclick="window.location.href='home.php'">HOME</button>
        <button onclick="window.location.href='medico.php'">MÉDICOS</button>
        <button onclick="window.location.href='paciente.php'">PACIENTES</button>
    </div>

    <div>
        <h1>Gerenciamento de Agendamentos</h1>
    </div>
    <div>
        <select name="medico" id="medico">
            <option value="">Selecione um médico</option>
            <?php foreach ($medicos as $medico): ?>
                <option value="<?= $medico['id'] ?>">
                    <?= htmlspecialchars($medico['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <select name="paciente" id="paciente">
            <option value="">Selecione um paciente</option>
            <?php foreach ($pacientes as $paciente): ?>
                <option value="<?= $paciente['id'] ?>">
                    <?= htmlspecialchars($paciente['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="text" placeholder="data">
        <input type="text" placeholder="horario">

        <button>Cadastrar</button>
    </div>

    <div>

    <table>
    <tr>
        <th>Medico</th>
        <th>Paciente</th>
        <th>Data</th>
        <th>Horario</th>
        <th>Status</th>
        <th>Editar</th>
        <th>Deletar</th>
    </tr>
    
    <?php 
    
    foreach($agendamentos as $row): ?>
        <tr>
            <td><?php echo $row['medico'] ?? 'não encontrado'; ?></td>
            <td><?php echo $row['paciente'] ?? ''; ?></td>
            <td><?php echo $row['data'] ?? ''; ?></td>
            <td><?php echo $row['horario'] ?? ''; ?></td>
            <td><?php echo $row['status'] ?? ''; ?></td>
            <td>
                <button>Editar</button>
            </td>
            <td>
                <button>Deletar</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>