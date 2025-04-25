<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocorrências - MM B0</title>
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
        <!--Titulo-->
        <div class="row text-center" style="margin-top: 0.5rem;">
            <img src="img/ocorrencias.png" alt="" class="img-fluid mx-auto d-block w-25" style="width: 15%;">
        </div>
        <!--Corpo-->
        <div class="row m-2">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Procurar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <div class="row" style="margin-top: 2rem;">
            <div class="col-8">
                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-bordered">
                        <thead class="table-success" style="position: sticky; top: 0; z-index: 2;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Estudante</th>
                                <th scope="col">Sala</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Ferramentas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>#</th>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>
                                    <div class="button-group g-2">
                                        <button class="btn btn-dark"><i class="bi bi-info-circle-fill"></i> Detalhes</button>
                                        <button class="btn btn-dark"><i class="bi bi-trash-fill"></i> Excluir</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!---->
            <div class="col-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="card-body">
                                <label class="form-label">Curso</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="curso" id="enfermagem">
                                    <label class="form-check-label" for="enfermagem">Enfermagem</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="curso" id="informatica">
                                    <label class="form-check-label" for="informatica">Informática</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="curso" id="comercio">
                                    <label class="form-check-label" for="comercio">Comércio</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="curso" id="administracao">
                                    <label class="form-check-label" for="administracao">Administração</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="curso" id="Dsistemas">
                                    <label class="form-check-label" for="Dsistemas">Desenvolvimento de Sistemas</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <label class="form-label">Série</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="serie" id="1ano">
                                    <label class="form-check-label" for="1ano">1º Ano</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="serie" id="2ano">
                                    <label class="form-check-label" for="2ano">2º Ano</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="serie" id="3ano">
                                    <label class="form-check-label" for="3ano">3º Ano</label>
                                </div>
                            </div>
                        </div>
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
</body>
</html>