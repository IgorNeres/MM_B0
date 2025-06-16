<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - MM B0</title>
    <link rel="stylesheet" href="node_modules\bootstrap\comp\bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<body style="overflow: hidden;">
    <div class="container-fluid">
        <!--Cabeçalho-->
        <div class="row d-flex align-items-stretch ">
            <div class="col-8 px-0">
                <img src="img/fundogradient.png" alt="" class="img-fluid w-100">
            </div>
            <div class="col bg-success px-0">
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
        <!--Titulo-->
        <div class="row text-center" style="margin-top: 0.5rem;">
            <img src="img/tituloborda.png" alt="" class="img-fluid mx-auto d-block" style="width: 15%;">
        </div>
        <!--Corpo-->
        <!--Primeira sessão-->
        <div class="row" style="margin-top: 2rem;">
            <div class="col-4" style="margin-left: 1rem;">
                <div class="row">
                    <img src="img/sessaoF.png" alt="" class="img-fluid mx-auto d-block w-75">
                </div>
                <div class="row" style="margin-top: 1rem;">
                    <div class="col">
                        <a href="adicionar.php" class="btn btn-outline-success d-grid gap-1 fs-2" style="height: 10rem; width: 13.125rem;">
                            <div class="row">
                                <i class="bi bi-person-plus-fill" style="font-size: 5rem; margin-top:-0.70rem;"></i>
                            </div>
                            <div class="row" style="margin-top: -2rem !important">
                                <p>Adicionar</p>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="ocorrencias.php" class="btn btn-outline-info d-grid gap-1 fs-2" style="height: 10rem; width: 13.125rem;">
                            <div class="row">
                                <i class="bi bi-person-lines-fill" style="font-size: 5rem; margin-top:-0.70rem;"></i>
                            </div>
                            <div class="row" style="margin-top: -2rem !important">
                                <p>Ocorrências</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row" style="margin-top: 1rem;">
                    <div class="col" style="z-index: 2;">
                        <button type="button" class="btn btn-outline-dark d-grid gap-1 fs-2" data-bs-toggle="modal" data-bs-target="#PDF" style="height: 8.75rem; width: 28.75rem;">
                            <div class="row">
                                <i class="bi bi-filetype-pdf" style="font-size: 5rem; margin-top:-1.1rem;"></i>
                            </div>
                            <div class="row" style="margin-top: -1.5rem !important">
                                <p>Gerar PDF</p>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-1 d-flex" style="margin-left: 3rem;">
                <div class="border-start border-4" style="height: 100%;"></div>
            </div>
            <!--Segunda sessão-->
            <div class="col-6" style="margin-left: -2rem;">
                <div class="row">
                    <img src="img/sessaoD.png" alt="" class="img-fluid mx-auto d-block" style="height: 40px; width:300px">
                </div>
                <div class="row" style="margin-top: 1rem;">
                    <!-- Adicione tabs para navegar entre gráficos -->
                    <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tipos-tab" data-bs-toggle="tab" data-bs-target="#tipos" type="button" role="tab">Por Tipo</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="alunos-tab" data-bs-toggle="tab" data-bs-target="#alunos" type="button" role="tab">Top Alunos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="cursos-tab" data-bs-toggle="tab" data-bs-target="#cursos" type="button" role="tab">Por Curso</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="series-tab" data-bs-toggle="tab" data-bs-target="#series" type="button" role="tab">Por Série</button>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="dashboardContent">
                        <div class="tab-pane fade show active" id="tipos" role="tabpanel">
                            <div id="chart_tipos" style="height: 300px;"></div>
                        </div>
                        <div class="tab-pane fade" id="alunos" role="tabpanel">
                            <div id="chart_alunos" style="height: 300px;"></div>
                        </div>
                        <div class="tab-pane fade" id="cursos" role="tabpanel">
                            <div id="chart_cursos" style="height: 300px;"></div>
                        </div>
                        <div class="tab-pane fade" id="series" role="tabpanel">
                            <div id="chart_series" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Modal 2-->
    <div class="modal fade" id="PDF" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-filetype-pdf"></i> Configurar PDF</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="gerar_pdf.php" method="POST">
                    <div class="modal-body">
                        <p style="margin-bottom: -0.5%; margin-top:-0.7rem;">Curso</p>
                        <div class="border border-black rounded p-1" style="--bs-border-opacity: .3;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="curso[]" id="inlineCheckbox1" value="Enfermagem">
                                <label class="form-check-label" for="inlineCheckbox1">Enfermagem</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="curso[]" id="inlineCheckbox2" value="Informática">
                                <label class="form-check-label" for="inlineCheckbox2">Informática</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="curso[]" id="inlineCheckbox3" value="Comércio">
                                <label class="form-check-label" for="inlineCheckbox3">Comércio</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="curso[]" id="inlineCheckbox4" value="Administração">
                                <label class="form-check-label" for="inlineCheckbox4">Administração</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="curso[]" id="inlineCheckbox5" value="Desenvolvimento de Sistemas">
                                <label class="form-check-label" for="inlineCheckbox5">Desenvolvimento de Sistemas</label>
                            </div>
                        </div>

                        <p style="margin-bottom: -0.5%; margin-top: 1%;">Série</p>
                        <div class="border border-black rounded p-1" style="--bs-border-opacity: .4;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="serie[]" id="inlineCheckbox6" value="1º ano">
                                <label class="form-check-label" for="inlineCheckbox6">1º ano</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="serie[]" id="inlineCheckbox7" value="2º ano">
                                <label class="form-check-label" for="inlineCheckbox7">2º ano</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="serie[]" id="inlineCheckbox8" value="3º ano">
                                <label class="form-check-label" for="inlineCheckbox8">3º ano</label>
                            </div>
                        </div>

                        <p style="margin-bottom: -0.5%; margin-top: 1%;">Tipo de ocorrência</p>
                        <div class="border border-black rounded p-1" style="--bs-border-opacity: .4;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tipo_ocorrencia[]" id="inlineCheckbox9" value="Atraso">
                                <label class="form-check-label" for="inlineCheckbox9">Atraso</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tipo_ocorrencia[]" id="inlineCheckbox10" value="Saída">
                                <label class="form-check-label" for="inlineCheckbox10">Saída</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tipo_ocorrencia[]" id="inlineCheckbox11" value="Saúde">
                                <label class="form-check-label" for="inlineCheckbox11">Saúde</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tipo_ocorrencia[]" id="inlineCheckbox12" value="Fardamento">
                                <label class="form-check-label" for="inlineCheckbox12">Fardamento</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tipo_ocorrencia[]" id="inlineCheckbox13" value="Outros">
                                <label class="form-check-label" for="inlineCheckbox13">Outros</label>
                            </div>
                        </div>

                        <p style="margin-bottom: -0.5%; margin-top: 1%;">Responsável</p>
                        <div class="border border-black rounded p-1" style="--bs-border-opacity: .4;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="responsavel[]" id="inlineCheckbox14" value="Mirly">
                                <label class="form-check-label" for="inlineCheckbox14">Mirly</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="responsavel[]" id="inlineCheckbox15" value="Glayton">
                                <label class="form-check-label" for="inlineCheckbox15">Glayton</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="responsavel[]" id="inlineCheckbox15" value="Zilmar">
                                <label class="form-check-label" for="inlineCheckbox15">Zilmar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="responsavel[]" id="inlineCheckbox15" value="Poliana">
                                <label class="form-check-label" for="inlineCheckbox15">Poliana</label>
                            </div>
                        </div>

                        <div class="p-2">
                            <button type="button" class="btn btn-outline-dark" id="btnLimpar">
                                <i class="bi bi-trash-fill"></i> Limpar seleção
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-octagon-fill"></i> Fechar
                        </button>
                        <button type="submit" class="btn btn-dark">
                            <i class="bi bi-arrow-right-square-fill"></i> Avançar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Adicionar funcionalidade ao botão Limpar
        document.getElementById('btnLimpar').addEventListener('click', function() {
            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false;
            });
        });
    </script>
    <!--Rodapé-->
    <div class="position-absolute bottom-0 start-0" style="z-index: 1;">
        <img src="img/onda3.png" alt="" class="img-fluid w-50">
    </div>
    <div class="position-absolute bottom-0 end-0" style="margin: 1rem;">
        <a href="home.php" class="btn btn-outline-danger"><i class="bi bi-box-arrow-left"></i> Sair</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(loadCharts);

        function loadCharts() {
            // Carregar dados para cada gráfico
            fetch('dashboard_data.php?chart=tipos')
                .then(response => response.json())
                .then(data => drawChart('chart_tipos', 'PieChart', 'Tipos de Ocorrência', data));

            fetch('dashboard_data.php?chart=alunos')
                .then(response => response.json())
                .then(data => drawChart('chart_alunos', 'BarChart', 'Top 10 Alunos', data));

            fetch('dashboard_data.php?chart=cursos')
                .then(response => response.json())
                .then(data => drawChart('chart_cursos', 'ColumnChart', 'Ocorrências por Curso', data));

            fetch('dashboard_data.php?chart=series')
                .then(response => response.json())
                .then(data => drawChart('chart_series', 'ColumnChart', 'Ocorrências por Série', data));
        }

        function drawChart(elementId, chartType, title, jsonData) {
            const data = google.visualization.arrayToDataTable(jsonData);

            const options = {
                title: title,
                titleTextStyle: {
                    fontSize: 16,
                    bold: true
                },
                chartArea: {
                    width: '80%',
                    height: '70%'
                },
                legend: {
                    position: 'right'
                },
                hAxis: {
                    title: 'Quantidade'
                },
                vAxis: {
                    title: elementId === 'chart_alunos' ? 'Alunos' : ''
                },
                pieHole: 0.4
            };

            if (chartType === 'BarChart') {
                options.bar = {
                    groupWidth: '75%'
                };
                options.legend = {
                    position: 'none'
                };
            }

            const chart = new google.visualization[chartType](document.getElementById(elementId));
            chart.draw(data, options);
        }
    </script>

</body>

</html>