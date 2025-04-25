<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Ocorrência - MM B0</title>
    <link rel="stylesheet" href="node_modules\bootstrap\comp\bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
            <img src="img/tipoOcorrencia.png" alt="" class="w-50 img-fluid mx-auto d-block" style="margin-top: 1rem;">
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
        <a href="home.php" class="btn btn-outline-dark"><i class="bi bi-box-arrow-left"></i> Voltar</a>
    </div>

    <!--Modais-->
    <!--Atraso-->
    <div class="modal fade" id="atraso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-hourglass-bottom"></i> Ocorrência de Atraso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!--Forms para save-->
                <div class="modal-body">
                    <label for="exampleInputPassword1" class="form-label">Estudante:</label>
                    <input type="text" class="form-control">
                    <label for="exampleInputPassword1" class="form-label">Sala:</label>
                    <select class="form-select">
                        <option selected>Selecione uma sala</option>
                        <option value="1">1ºA</option>
                        <option value="2">2ºA</option>
                        <option value="3">3ºA</option>
                        <option value="1">1ºB</option>
                        <option value="2">2ºB</option>
                        <option value="3">3ºB</option>
                        <option value="1">1ºE</option>
                        <option value="2">2ºC</option>
                        <option value="3">3ºC</option>
                        <option value="1">1ºD</option>
                        <option value="2">2ºD</option>
                        <option value="3">3ºD</option>
                    </select>
                    <div class="input-group" style="margin-top: 10px;">
                        <input type="date" class="form-control" placeholder="Data">
                        <input type="time" class="form-control" placeholder="Horario de Chegada">
                    </div>
                    <div class="input-group" style="margin-top: 10px;">
                        <span class="input-group-text">Motivo</span>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="bi bi-x-octagon-fill"></i> Fechar</button>
                    <button type="button" class="btn btn-dark"><i class="bi bi-arrow-right-square-fill"></i> Avançar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Saida-->
    <div class="modal fade" id="saida" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-door-open-fill"></i> Ocorrência de Saída</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!--Forms para save-->
                <div class="modal-body">
                    <label for="exampleInputPassword1" class="form-label">Estudante:</label>
                    <input type="text" class="form-control">
                    <label for="exampleInputPassword1" class="form-label">Sala:</label>
                    <select class="form-select">
                        <option selected>Selecione uma sala</option>
                        <option value="1">1ºA</option>
                        <option value="2">2ºA</option>
                        <option value="3">3ºA</option>
                        <option value="1">1ºB</option>
                        <option value="2">2ºB</option>
                        <option value="3">3ºB</option>
                        <option value="1">1ºE</option>
                        <option value="2">2ºC</option>
                        <option value="3">3ºC</option>
                        <option value="1">1ºD</option>
                        <option value="2">2ºD</option>
                        <option value="3">3ºD</option>
                    </select>
                    <div class="input-group" style="margin-top: 10px;">
                        <input type="date" class="form-control" placeholder="Data">
                        <input type="time" class="form-control" placeholder="Horario de Saída">
                    </div>
                    <div class="input-group" style="margin-top: 10px;">
                        <span class="input-group-text">Motivo</span>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                    <label for="exampleInputPassword1" class="form-label" style="margin-top: 10px;">Responsável pela Autorização:</label>
                    <select class="form-select">
                        <option selected>Selecione um responsável</option>
                        <option value="1">Glayton</option>
                        <option value="2">Mirly</option>
                        <option value="3">Samuel</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="bi bi-x-octagon-fill"></i> Fechar</button>
                    <button type="button" class="btn btn-dark"><i class="bi bi-arrow-right-square-fill"></i> Avançar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Saude-->
    <div class="modal fade" id="saude" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-heart-pulse-fill"></i> Ocorrência de Saúde</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!--Forms para save-->
                <div class="modal-body">
                    <label for="exampleInputPassword1" class="form-label">Estudante:</label>
                    <input type="text" class="form-control">
                    <div class="input-group" style="margin-top: 10px;">
                        <span class="input-group-text">CID</span>
                        <input class="form-control" type="text"></input>
                        <span class="input-group-text">Qtd. de Dias</span>
                        <input class="form-control" type="number"></input>
                    </div>
                    <div class="input-group" style="margin-top: 10px;">
                        <span class="input-group-text">Início:</span>
                        <input type="date" class="form-control" placeholder="Data">
                        <span class="input-group-text">Término:</span>
                        <input type="date" class="form-control" placeholder="Horario de Saída">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="bi bi-x-octagon-fill"></i> Fechar</button>
                    <button type="button" class="btn btn-dark"><i class="bi bi-arrow-right-square-fill"></i> Avançar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Fardamento-->
    <div class="modal fade" id="fardamento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-incognito"></i> Ocorrência de Fardamento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!--Forms para save-->
                <div class="modal-body">
                    <label for="exampleInputPassword1" class="form-label">Estudante:</label>
                    <input type="text" class="form-control">
                    <div class="input-group" style="margin-top: 10px;">
                        <input type="date" class="form-control" placeholder="Data">
                        <select class="form-select">
                            <option selected>Selecione o componente</option>
                            <option value="1">Blusa</option>
                            <option value="2">Calça</option>
                            <option value="3">Sapato</option>
                            <option value="3">Outro</option>
                        </select>
                    </div>
                    <div class="input-group" style="margin-top: 10px;">
                        <span class="input-group-text">Motivo</span>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                    <label for="exampleInputPassword1" class="form-label" style="margin-top: 10px;">Responsável pela Autorização:</label>
                    <select class="form-select">
                        <option selected>Selecione um responsável</option>
                        <option value="1">Glayton</option>
                        <option value="2">Mirly</option>
                        <option value="3">Samuel</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="bi bi-x-octagon-fill"></i> Fechar</button>
                    <button type="button" class="btn btn-dark"><i class="bi bi-arrow-right-square-fill"></i> Avançar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Outros-->
    <div class="modal fade" id="outros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-clipboard2-x-fill"></i> Outras Ocorrências</h1>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!--Forms para save-->
                <div class="modal-body">
                    <label for="exampleInputPassword1" class="form-label">Estudante:</label>
                    <input type="text" class="form-control">
                    <div class="input-group" style="margin-top: 10px;">
                        <select class="form-select">
                            <option selected>Selecione uma sala</option>
                            <option value="1">1ºA</option>
                            <option value="2">2ºA</option>
                            <option value="3">3ºA</option>
                            <option value="1">1ºB</option>
                            <option value="2">2ºB</option>
                            <option value="3">3ºB</option>
                            <option value="1">1ºE</option>
                            <option value="2">2ºC</option>
                            <option value="3">3ºC</option>
                            <option value="1">1ºD</option>
                            <option value="2">2ºD</option>
                            <option value="3">3ºD</option>
                        </select>
                        <input type="date" class="form-control" placeholder="Data">
                    </div>
                    <div class="input-group" style="margin-top: 10px;">
                        <span class="input-group-text">Motivo</span>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                    <label for="exampleInputPassword1" class="form-label" style="margin-top: 10px;">Responsável pela Autorização:</label>
                    <select class="form-select">
                        <option selected>Selecione um responsável</option>
                        <option value="1">Glayton</option>
                        <option value="2">Mirly</option>
                        <option value="3">Samuel</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="bi bi-x-octagon-fill"></i> Fechar</button>
                    <button type="button" class="btn btn-dark"><i class="bi bi-arrow-right-square-fill"></i> Avançar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>