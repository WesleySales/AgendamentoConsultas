<?php
require '../repositories/MedicoRepository.php';

$medicos = MedicoRepository::findAll(); 
$especialidades = MedicoRepository::findEspecialidades();
?>

<html>
<head>
    <title>Medicos</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div>
        <button onclick="window.location.href='home.php'">HOME</button>
        <button onclick="window.location.href='paciente.php'">PACIENTES</button>
        <button onclick="window.location.href='agendamentos.php'">AGENDAMENTOS</button>
    </div>

    <div>
        <h1>Gerenciamento de Medicos</h1>
    </div>
    <div>
        <input type="text" placeholder="Nome do Paciente">
        <input type="text" placeholder="CRM">
        <select name="especialidade" id="especialidade">
            <option value="">Selecione um médico</option>
            <?php foreach ($especialidades as $especialidade): ?>
                <option value="<?= $especialidade['id'] ?>">
                    <?= htmlspecialchars($especialidade['nome_especialidade']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button>Cadastrar</button>
    </div>

    <div>

    <table>
    <tr>
        <th>Medico</th>
        <th>CRM</th>
        <th>Especialidade</th>
        <th>Consultas</th>
        <th>Editar</th>
        <th>Deletar</th>
    </tr>
    
    <?php 
    
    foreach($medicos as $row): ?>
        <tr>
            <td><?php echo $row['nome'] ?? 'não encontrado'; ?></td>
            <td><?php echo $row['crm'] ?? ''; ?></td>
            <td><?php echo $row['especialidade'] ?? ''; ?></td>
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
</div>

</body>
</html>