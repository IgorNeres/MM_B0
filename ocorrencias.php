<?php
include('verifica_login.php');
include('conexao.php');

$mensagem = $_GET['mensagem'] ?? '';
$tipo = $_GET['tipo'] ?? '';

// Processar filtros e busca
$curso_filtro = isset($_GET['curso']) ? $_GET['curso'] : '';
$serie_filtro = isset($_GET['serie']) ? $_GET['serie'] : '';
$busca        = isset($_GET['busca'])  ? $_GET['busca']  : '';

// Construir consulta SQL
$query = "SELECT * FROM ocorrencias WHERE 1=1";

if (!empty($curso_filtro)) {
    $query .= " AND curso = '" . mysqli_real_escape_string($conexao, $curso_filtro) . "'";
}
if (!empty($serie_filtro)) {
    $query .= " AND serie = '" . mysqli_real_escape_string($conexao, $serie_filtro) . "'";
}
if (!empty($busca)) {
    $busca_esc = mysqli_real_escape_string($conexao, $busca);
    $query .= " AND (
            estudante LIKE '%$busca_esc%' OR
            curso     LIKE '%$busca_esc%' OR
            serie     LIKE '%$busca_esc%' OR
            tipo      LIKE '%$busca_esc%'
        )";
}

$query .= " ORDER BY data_ocorrencia DESC";
$resultado = mysqli_query($conexao, $query);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocorrências - MM B0</title>
    <link rel="stylesheet" href="node_modules\bootstrap\comp\bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body style="overflow: hidden;">

    <div class="container-fluid">
        <!-- Cabeçalho -->
        <div class="row d-flex align-items-stretch">
            <div class="col-8 gap-0" style="margin-left: -1rem;">
                <img src="img/fundogradient.png" alt="" class="img-fluid w-100">
            </div>
            <div class="col bg-success" style="margin-left: -1rem;">
                <div class="row">
                    <div class="col">
                        <img src="img/manoelmanologowhite.png" alt="" class="img-fluid w-50">
                    </div>
                    <div class="col">
                        <img src="img/cearalogowhite.png" alt="" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-left: -10rem;">
            <img src="img/linhagradient.png" alt="" class="img-fluid" style="margin-left: 5rem;">
        </div>
        <!-- Título -->
        <div class="row text-center" style="margin-top: 0.5rem;">
            <img src="img/ocorrencias.png" alt="" class="img-fluid mx-auto d-block w-25" style="width: 15%;">
        </div>

        <!-- Mensagens de sucesso/erro -->
        <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 1rem;">
                Ocorrência salva/atualizada com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['erro']) && $_GET['erro'] == 1): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Erro ao salvar/atualizar ocorrência!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Corpo -->
        <div class="row m-2">
            <form class="d-flex" role="search" method="GET">
                <input class="form-control me-2" type="search"
                    placeholder="Procurar estudante, série, curso ou tipo"
                    name="busca" value="<?php echo htmlspecialchars($busca); ?>">
                <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <div class="row" style="margin-top: 2rem;">
            <div class="col-8">
                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-bordered table-hover">
                        <thead class="table-success">
                            <tr class="sticky-header">
                                <th scope="col">#</th>
                                <th scope="col">Estudante</th>
                                <th scope="col">Série</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Data</th>
                                <th scope="col">Ferramentas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 1;
                            while ($ocorrencia = mysqli_fetch_assoc($resultado)):
                                $data_formatada = date('d/m/Y', strtotime($ocorrencia['data_ocorrencia']));
                                $tipo_formatado = match ($ocorrencia['tipo']) {
                                    'saida'       => 'Saída',
                                    'atraso'      => 'Atraso',
                                    'saude'       => 'Saúde',
                                    'fardamento'  => 'Fardamento',
                                    'outros'      => 'Outros',
                                    default       => ucfirst($ocorrencia['tipo'])
                                };
                            ?>
                                <tr>
                                    <th><?php echo $contador++; ?></th>
                                    <td><?php echo htmlspecialchars($ocorrencia['estudante']); ?></td>
                                    <td><?php echo htmlspecialchars($ocorrencia['serie']);     ?></td>
                                    <td><?php echo htmlspecialchars($ocorrencia['curso']);     ?></td>
                                    <td><?php echo $tipo_formatado;                          ?></td>
                                    <td><?php echo $data_formatada;                          ?></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <!-- Botão Detalhes -->
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target="#detalhesModal<?php echo $ocorrencia['id']; ?>">
                                                <i class="bi bi-info-circle"></i> Detalhes
                                            </button>

                                            <!-- Botão Editar -->
                                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editarModal<?php echo $ocorrencia['id']; ?>">
                                                <i class="bi bi-pencil"></i> Editar
                                            </button>

                                            <!-- Botão Excluir -->
                                            <a href="excluir_ocorrencia.php?id=<?php echo $ocorrencia['id']; ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Tem certeza que deseja excluir esta ocorrência?');">
                                                <i class="bi bi-trash"></i> Excluir
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal de Detalhes -->
                                <div class="modal fade" id="detalhesModal<?php echo $ocorrencia['id']; ?>" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info text-white">
                                                <h5 class="modal-title"><i class="bi bi-info-circle"></i> Detalhes da Ocorrência</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <strong>Estudante:</strong>
                                                        <p><?php echo htmlspecialchars($ocorrencia['estudante']); ?></p>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <strong>Curso:</strong>
                                                        <p><?php echo htmlspecialchars($ocorrencia['curso']); ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong>Série:</strong>
                                                        <p><?php echo htmlspecialchars($ocorrencia['serie']); ?></p>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <strong>Tipo:</strong>
                                                        <p><?php echo $tipo_formatado; ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong>Data:</strong>
                                                        <p><?php echo $data_formatada; ?></p>
                                                    </div>
                                                </div>

                                                <?php if (!empty($ocorrencia['horario'])): ?>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <strong>Horário:</strong>
                                                            <p><?php echo date('H:i', strtotime($ocorrencia['horario'])); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if (!empty($ocorrencia['motivo'])): ?>
                                                    <div class="row mb-3">
                                                        <div class="col-12">
                                                            <strong>Motivo:</strong>
                                                            <p><?php echo htmlspecialchars($ocorrencia['motivo']); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if (!empty($ocorrencia['responsavel'])): ?>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <strong>Responsável:</strong>
                                                            <p><?php echo htmlspecialchars($ocorrencia['responsavel']); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if (!empty($ocorrencia['cid'])): ?>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <strong>CID:</strong>
                                                            <p><?php echo htmlspecialchars($ocorrencia['cid']); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if (!empty($ocorrencia['dias'])): ?>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <strong>Duração:</strong>
                                                            <p><?php echo $ocorrencia['dias']; ?> dias</p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de Edição -->
                                <div class="modal fade" id="editarModal<?php echo $ocorrencia['id']; ?>" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form method="POST" action="editar_ocorrencia.php">
                                                <div class="modal-header bg-warning text-dark">
                                                    <h5 class="modal-title"><i class="bi bi-pencil"></i> Editar Ocorrência</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Campo oculto com o ID da ocorrência -->
                                                    <input type="hidden" name="id" value="<?php echo $ocorrencia['id']; ?>">

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="estudante<?php echo $ocorrencia['id']; ?>" class="form-label"><strong>Estudante</strong></label>
                                                            <input type="text"
                                                                class="form-control"
                                                                id="estudante<?php echo $ocorrencia['id']; ?>"
                                                                name="estudante"
                                                                value="<?php echo htmlspecialchars($ocorrencia['estudante']); ?>"
                                                                required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="tipo<?php echo $ocorrencia['id']; ?>" class="form-label"><strong>Tipo</strong></label>
                                                            <select class="form-select"
                                                                id="tipo<?php echo $ocorrencia['id']; ?>"
                                                                name="tipo"
                                                                required>
                                                                <?php
                                                                $tipos_possiveis = ['atraso' => 'Atraso', 'saida' => 'Saída', 'saude' => 'Saúde', 'fardamento' => 'Fardamento', 'outros' => 'Outros'];
                                                                foreach ($tipos_possiveis as $valor => $label):
                                                                ?>
                                                                    <option value="<?php echo $valor; ?>"
                                                                        <?php echo ($ocorrencia['tipo'] === $valor) ? 'selected' : ''; ?>>
                                                                        <?php echo $label; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="curso<?php echo $ocorrencia['id']; ?>" class="form-label"><strong>Curso</strong></label>
                                                            <select class="form-select"
                                                                id="curso<?php echo $ocorrencia['id']; ?>"
                                                                name="curso">
                                                                <option value="">— Selecione —</option>
                                                                <?php
                                                                $cursos_possiveis = ['Enfermagem', 'Informática', 'Comércio', 'Administração', 'Desenvolvimento de Sistemas'];
                                                                foreach ($cursos_possiveis as $curso_opt):
                                                                ?>
                                                                    <option value="<?php echo $curso_opt; ?>"
                                                                        <?php echo ($ocorrencia['curso'] === $curso_opt) ? 'selected' : ''; ?>>
                                                                        <?php echo $curso_opt; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="serie<?php echo $ocorrencia['id']; ?>" class="form-label"><strong>Série</strong></label>
                                                            <select class="form-select"
                                                                id="serie<?php echo $ocorrencia['id']; ?>"
                                                                name="serie">
                                                                <option value="">— Selecione —</option>
                                                                <?php
                                                                $series_possiveis = ['1º Ano', '2º Ano', '3º Ano'];
                                                                foreach ($series_possiveis as $serie_opt):
                                                                ?>
                                                                    <option value="<?php echo $serie_opt; ?>"
                                                                        <?php echo ($ocorrencia['serie'] === $serie_opt) ? 'selected' : ''; ?>>
                                                                        <?php echo $serie_opt; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="data_ocorrencia<?php echo $ocorrencia['id']; ?>" class="form-label"><strong>Data</strong></label>
                                                            <input type="date"
                                                                class="form-control"
                                                                id="data_ocorrencia<?php echo $ocorrencia['id']; ?>"
                                                                name="data_ocorrencia"
                                                                value="<?php echo $ocorrencia['data_ocorrencia']; ?>"
                                                                required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="horario<?php echo $ocorrencia['id']; ?>" class="form-label"><strong>Horário</strong></label>
                                                            <input type="time"
                                                                class="form-control"
                                                                id="horario<?php echo $ocorrencia['id']; ?>"
                                                                name="horario"
                                                                value="<?php echo htmlspecialchars($ocorrencia['horario']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-12">
                                                            <label for="motivo<?php echo $ocorrencia['id']; ?>" class="form-label"><strong>Motivo</strong></label>
                                                            <textarea class="form-control"
                                                                id="motivo<?php echo $ocorrencia['id']; ?>"
                                                                name="motivo"
                                                                rows="2"><?php echo htmlspecialchars($ocorrencia['motivo']); ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <label for="cid<?php echo $ocorrencia['id']; ?>" class="form-label"><strong>CID</strong></label>
                                                            <input type="text"
                                                                class="form-control"
                                                                id="cid<?php echo $ocorrencia['id']; ?>"
                                                                name="cid"
                                                                value="<?php echo htmlspecialchars($ocorrencia['cid']); ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="dias<?php echo $ocorrencia['id']; ?>" class="form-label"><strong>Duração (dias)</strong></label>
                                                            <input type="number"
                                                                class="form-control"
                                                                id="dias<?php echo $ocorrencia['id']; ?>"
                                                                name="dias"
                                                                min="0"
                                                                value="<?php echo htmlspecialchars($ocorrencia['dias']); ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="componente<?php echo $ocorrencia['id']; ?>" class="form-label"><strong>Componente</strong></label>
                                                            <input type="text"
                                                                class="form-control"
                                                                id="componente<?php echo $ocorrencia['id']; ?>"
                                                                name="componente"
                                                                value="<?php echo htmlspecialchars($ocorrencia['componente']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="inicio<?php echo $ocorrencia['id']; ?>" class="form-label"><strong>Início</strong></label>
                                                            <input type="date"
                                                                class="form-control"
                                                                id="inicio<?php echo $ocorrencia['id']; ?>"
                                                                name="inicio"
                                                                value="<?php echo htmlspecialchars($ocorrencia['inicio']); ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="termino<?php echo $ocorrencia['id']; ?>" class="form-label"><strong>Término</strong></label>
                                                            <input type="date"
                                                                class="form-control"
                                                                id="termino<?php echo $ocorrencia['id']; ?>"
                                                                name="termino"
                                                                value="<?php echo htmlspecialchars($ocorrencia['termino']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-12">
                                                            <label for="responsavel<?php echo $ocorrencia['id']; ?>" class="form-label"><strong>Responsável</strong></label>
                                                            <input type="text"
                                                                class="form-control"
                                                                id="responsavel<?php echo $ocorrencia['id']; ?>"
                                                                name="responsavel"
                                                                value="<?php echo htmlspecialchars($ocorrencia['responsavel']); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-warning">Salvar alterações</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim: Modal de Edição -->

                            <?php endwhile; ?>

                            <?php if (mysqli_num_rows($resultado) == 0): ?>
                                <tr>
                                    <td colspan="7" class="text-center">Nenhuma ocorrência encontrada</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!--Excluir tudo--->
                <?php if ($mensagem): ?>
                    <div class="alert alert-<?= htmlspecialchars($tipo) ?> alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($mensagem) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                    </div>
                <?php endif; ?>

                <!-- Botão para abrir o modal -->
                <div class="col text-end">
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                        <i class="bi bi-exclamation-triangle-fill"></i> Excluir Tudo
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="POST" action="excluir_ocorrencias.php">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="confirmDeleteLabel"><i class="bi bi-exclamation-triangle-fill"></i> Confirmar Exclusão</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Essa ação excluirá <strong>todas</strong> as ocorrências. Digite <code>DELETAR</code> para confirmar:</p>
                                    <input type="text" name="confirmacao" class="form-control" placeholder='Digite "DELETAR"' required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Filtros-->
            <div class="col-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Filtros</h5>
                    </div>
                    <div class="card-body bg-white rounded-2" style="z-index: 2;">
                        <form method="GET">
                            <div class="row">
                                <!-- Coluna do Filtro de Curso -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><strong>Curso</strong></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="curso" id="todos" value=""
                                            <?php echo empty($curso_filtro) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="todos">Todos</label>
                                    </div>
                                    <?php
                                    $opcoesCurso = ['Enfermagem', 'Informática', 'Comércio', 'Administração', 'Desenvolvimento de Sistemas'];
                                    foreach ($opcoesCurso as $optCurso):
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="curso"
                                                id="<?php echo $optCurso; ?>" value="<?php echo $optCurso; ?>"
                                                <?php echo ($curso_filtro == $optCurso) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="<?php echo $optCurso; ?>">
                                                <?php echo $optCurso; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Coluna do Filtro de Série -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><strong>Série</strong></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="serie" id="todas" value=""
                                            <?php echo empty($serie_filtro) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="todas">Todas</label>
                                    </div>
                                    <?php
                                    $opcoesSerie = ['1º Ano', '2º Ano', '3º Ano'];
                                    foreach ($opcoesSerie as $optSerie):
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="serie"
                                                id="<?php echo $optSerie; ?>" value="<?php echo $optSerie; ?>"
                                                <?php echo ($serie_filtro == $optSerie) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="<?php echo $optSerie; ?>">
                                                <?php echo $optSerie; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Aplicar Filtros</button>
                                <a href="ocorrencias.php" class="btn btn-outline-secondary">Limpar Filtros</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>

    <!-- Rodapé -->
    <div class="position-absolute bottom-0 end-0" style="z-index: 1;">
        <img src="img/onda4.png" alt="" class="img-fluid" style="width: 35rem;">
    </div>
    <div class="position-absolute bottom-0 start-0" style="margin: 1rem;">
        <a href="pg-home.php" class="btn btn-dark"><i class="bi bi-box-arrow-left"></i> Voltar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modais = document.querySelectorAll('[id^="editarModal"]');

            modais.forEach(modal => {
                modal.addEventListener("show.bs.modal", function() {
                    const inputs = modal.querySelectorAll("input.form-control");
                    inputs.forEach(input => {
                        if (input.value.trim() !== "") {
                            input.disabled = false;
                        } else {
                            input.disabled = true;
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>