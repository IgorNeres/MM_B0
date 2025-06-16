<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Ocorrência - MM B0</title>
    <link rel="stylesheet" href="node_modules\bootstrap\comp\bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body style="overflow: hidden;">
    <div class="container-fluid">
        <!--Cabeçalho-->
        <div class="row d-flex align-items-stretch ">
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
        <div class="row mx-auto">
            <img src="img/tipoOcorrencia.png" alt="" class="w-50 img-fluid mx-auto d-block" style="margin-top: 2.5rem;">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle col-6">
            <div class="row" style="margin-top: 1rem;">
                <div class="col">
                    <button type="button" class="btn btn-outline-danger d-grid gap-1 fs-2" data-bs-toggle="modal" data-bs-target="#atraso" style="height: 160px; width: 210px;">
                        <div class="row">
                            <i class="bi bi-hourglass-bottom" style="font-size: 5rem; margin-top:-0.70rem;"></i>
                        </div>
                        <div class="row" style="margin-top: -2rem !important">
                            <p>Atraso</p>
                        </div>
                    </button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-outline-info d-grid gap-1 fs-2" data-bs-toggle="modal" data-bs-target="#saida" style="height: 160px; width: 210px;">
                        <div class="row">
                            <i class="bi bi-door-open-fill" style="font-size: 5rem; margin-top:-0.70rem;"></i>
                        </div>
                        <div class="row" style="margin-top: -2rem !important">
                            <p>Saida</p>
                        </div>
                    </button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-outline-success d-grid gap-1 fs-2" data-bs-toggle="modal" data-bs-target="#saude" style="height: 160px; width: 210px;">
                        <div class="row">
                            <i class="bi bi-heart-pulse-fill" style="font-size: 5rem; margin-top:-0.70rem;"></i>
                        </div>
                        <div class="row" style="margin-top: -2rem !important">
                            <p>Saúde</p>
                        </div>
                    </button>
                </div>
            </div>
            <div class="row" style="margin-top: 1rem;">
                <div class="col" style="margin-left: 12%;">
                    <button type="button" class="btn btn-outline-warning d-grid gap-1 fs-2" data-bs-toggle="modal" data-bs-target="#fardamento" style="height: 160px; width: 210px;">
                        <div class="row">
                            <i class="bi bi-incognito" style="font-size: 5rem; margin-top:-0.70rem;"></i>
                        </div>
                        <div class="row" style="margin-top: -2rem !important">
                            <p>Fardamento</p>
                        </div>
                    </button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-outline-dark d-grid gap-1 fs-2" data-bs-toggle="modal" data-bs-target="#outros" style="height: 160px; width: 210px;">
                        <div class="row">
                            <i class="bi bi-clipboard2-x-fill" style="font-size: 5rem; margin-top:-0.70rem;"></i>
                        </div>
                        <div class="row" style="margin-top: -2rem !important">
                            <p>Outros</p>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!--Rodapé-->
    <div class="position-absolute bottom-0 end-0">
        <img src="img/onda4.png" alt="" class="img-fluid" style="width: 35rem;">
    </div>
    <div class="position-absolute bottom-0 start-0" style="margin: 1rem;">
        <a href="pg-home.php" class="btn btn-outline-dark"><i class="bi bi-box-arrow-left"></i> Voltar</a>
    </div>

    <!--Modais-->
    
    <!-- Modal Atraso -->
    <div class="modal fade" id="atraso" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title"><i class="bi bi-hourglass-bottom"></i> Atraso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="salvar_ocorrencia.php" method="POST">
                    <input type="hidden" name="tipo" value="atraso">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Estudante:</label>
                            <input type="text" class="form-control" name="estudante" required>
                        </div>
                        <div class="mb-3">
                            <label>Curso:</label>
                            <select class="form-select" name="curso" required>
                                <option value="Enfermagem">Enfermagem</option>
                                <option value="Informática">Informática</option>
                                <option value="Comércio">Comércio</option>
                                <option value="Administração">Administração</option>
                                <option value="Desenvolvimento de Sistemas">Desenvolvimento de Sistemas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Série:</label>
                            <select class="form-select" name="serie" required>
                                <option value="1º Ano">1º Ano</option>
                                <option value="2º Ano">2º Ano</option>
                                <option value="3º Ano">3º Ano</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Data:</label>
                            <input type="date" class="form-control" name="data_ocorrencia" required>
                        </div>
                        <div class="mb-3">
                            <label>Horário do Atraso:</label>
                            <input type="time" class="form-control" name="horario" required>
                        </div>
                        <div class="mb-3">
                            <label>Motivo:</label>
                            <textarea class="form-control" name="motivo" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Responsável:</label>
                            <select class="form-select" name="responsavel" required>
                                <option value="Glayton">Glayton</option>
                                <option value="Mirly">Mirly</option>
                                <option value="Zilmar">Zilmar</option>
                                <option value="Poliana">Poliana</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success" name="salvar">Salvar</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Saída -->
    <div class="modal fade" id="saida" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title"><i class="bi bi-door-open"></i> Saída</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="salvar_ocorrencia.php" method="POST">
                    <input type="hidden" name="tipo" value="saida">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Estudante:</label>
                            <input type="text" class="form-control" name="estudante" required>
                        </div>
                        <div class="mb-3">
                            <label>Curso:</label>
                            <select class="form-select" name="curso" required>
                                <option value="Enfermagem">Enfermagem</option>
                                <option value="Informática">Informática</option>
                                <option value="Comércio">Comércio</option>
                                <option value="Administração">Administração</option>
                                <option value="Desenvolvimento de Sistemas">Desenvolvimento de Sistemas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Série:</label>
                            <select class="form-select" name="serie" required>
                                <option value="1º Ano">1º Ano</option>
                                <option value="2º Ano">2º Ano</option>
                                <option value="3º Ano">3º Ano</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Data da Saída:</label>
                            <input type="date" class="form-control" name="data_ocorrencia" required>
                        </div>
                        <div class="mb-3">
                            <label>Horário:</label>
                            <input type="time" class="form-control" name="horario" required>
                        </div>
                        <div class="mb-3">
                            <label>Motivo:</label>
                            <textarea class="form-control" name="motivo" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Responsável:</label>
                            <select class="form-select" name="responsavel" required>
                                <option value="Glayton">Glayton</option>
                                <option value="Mirly">Mirly</option>
                                <option value="Zilmar">Zilmar</option>
                                <option value="Poliana">Poliana</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success" name="salvar">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Saúde -->
    <div class="modal fade" id="saude" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"><i class="bi bi-heart-pulse"></i> Saúde</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="salvar_ocorrencia.php" method="POST">
                    <input type="hidden" name="tipo" value="saude">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Estudante:</label>
                            <input type="text" class="form-control" name="estudante" required>
                        </div>
                        <div class="mb-3">
                            <label>Curso:</label>
                            <select class="form-select" name="curso" required>
                                <option value="Enfermagem">Enfermagem</option>
                                <option value="Informática">Informática</option>
                                <option value="Comércio">Comércio</option>
                                <option value="Administração">Administração</option>
                                <option value="Desenvolvimento de Sistemas">Desenvolvimento de Sistemas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Série:</label>
                            <select class="form-select" name="serie" required>
                                <option value="1º Ano">1º Ano</option>
                                <option value="2º Ano">2º Ano</option>
                                <option value="3º Ano">3º Ano</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>CID:</label>
                            <input type="text" class="form-control" name="cid" required>
                        </div>
                        <div class="mb-3">
                            <label>Duração (dias):</label>
                            <input type="number" class="form-control" name="dias" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label>Início:</label>
                            <input type="date" class="form-control" name="inicio" required>
                        </div>
                        <div class="mb-3">
                            <label>Término:</label>
                            <input type="date" class="form-control" name="termino" required>
                        </div>
                        <div class="mb-3">
                            <label>Responsável:</label>
                            <select class="form-select" name="responsavel" required>
                                <option value="Glayton">Glayton</option>
                                <option value="Mirly">Mirly</option>
                                <option value="Zilmar">Zilmar</option>
                                <option value="Poliana">Poliana</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success" name="salvar">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal Fardamento -->
    <div class="modal fade" id="fardamento" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title"><i class="bi bi-incognito"></i> Fardamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="salvar_ocorrencia.php" method="POST">
                    <input type="hidden" name="tipo" value="fardamento">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Estudante:</label>
                            <input type="text" class="form-control" name="estudante" required>
                        </div>
                        <div class="mb-3">
                            <label>Curso:</label>
                            <select class="form-select" name="curso" required>
                                <option value="Enfermagem">Enfermagem</option>
                                <option value="Informática">Informática</option>
                                <option value="Comércio">Comércio</option>
                                <option value="Administração">Administração</option>
                                <option value="Desenvolvimento de Sistemas">Desenvolvimento de Sistemas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Série:</label>
                            <select class="form-select" name="serie" required>
                                <option value="1º Ano">1º Ano</option>
                                <option value="2º Ano">2º Ano</option>
                                <option value="3º Ano">3º Ano</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Componente:</label>
                            <select class="form-select" name="componente" required>
                                <option value="Blusa">Blusa</option>
                                <option value="Calça">Calça</option>
                                <option value="Sapato">Sapato</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Data:</label>
                            <input type="date" class="form-control" name="data_ocorrencia" required>
                        </div>
                        <div class="mb-3">
                            <label>Motivo:</label>
                            <textarea class="form-control" name="motivo" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Responsável:</label>
                            <select class="form-select" name="responsavel" required>
                                <option value="Glayton">Glayton</option>
                                <option value="Mirly">Mirly</option>
                                <option value="Zilmar">Zilmar</option>
                                <option value="Poliana">Poliana</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success" name="salvar">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal Outros -->
    <div class="modal fade" id="outros" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title"><i class="bi bi-exclamation-triangle"></i> Outros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="salvar_ocorrencia.php" method="POST">
                    <input type="hidden" name="tipo" value="outros">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Estudante:</label>
                            <input type="text" class="form-control" name="estudante" required>
                        </div>
                        
                        <div class="mb-3">
                            <label>Curso:</label>
                            <select class="form-select" name="curso" required>
                                <option value="Enfermagem">Enfermagem</option>
                                <option value="Informática">Informática</option>
                                <option value="Comércio">Comércio</option>
                                <option value="Administração">Administração</option>
                                <option value="Desenvolvimento de Sistemas">Desenvolvimento de Sistemas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Série:</label>
                            <select class="form-select" name="serie" required>
                                <option value="1º Ano">1º Ano</option>
                                <option value="2º Ano">2º Ano</option>
                                <option value="3º Ano">3º Ano</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Data:</label>
                            <input type="date" class="form-control" name="data_ocorrencia" required>
                        </div>
                        <div class="mb-3">
                            <label>Descrição:</label>
                            <textarea class="form-control" name="motivo" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Responsável:</label>
                            <select class="form-select" name="responsavel" required>
                                <option value="Glayton">Glayton</option>
                                <option value="Mirly">Mirly</option>
                                <option value="Zilmar">Zilmar</option>
                                <option value="Poliana">Poliana</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success" name="salvar">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>