<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <button type="button" class="btn btn-outline-success d-grid gap-1 fs-2" data-bs-toggle="modal" data-bs-target="#adicionar" style="height: 160px; width: 210px;">
                            <div class="row">
                                <i class="bi bi-person-plus-fill" style="font-size: 5rem; margin-top:-0.70rem;"></i>
                            </div>
                            <div class="row" style="margin-top: -2rem !important">
                                <p>Adicionar</p>
                            </div>
                        </button>
                    </div>
                    <div class="col">
                        <a href="#" class="btn btn-outline-info d-grid gap-1 fs-2" style="height: 160px; width: 210px;">
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
                    <div class="col">
                        <button type="button" class="btn btn-outline-dark d-grid gap-1 fs-2" data-bs-toggle="modal" data-bs-target="#adicionar" style="height: 140px; width: 460px;">
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
                    <div>Grafico Foda</div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal-->
    <div class="modal fade" id="adicionar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-person-plus-fill"></i> Adicionar Ocorrência</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!--Forms para save-->
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">@example.com</span>
                    </div>
                    <div class="mb-3">
                        <label for="basic-url" class="form-label">Your vanity URL</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
                        </div>
                        <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">.00</span>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                        <span class="input-group-text">@</span>
                        <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                    </div>

                    <div class="input-group">
                        <span class="input-group-text">With textarea</span>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="bi bi-x-octagon-fill"></i> Fechar</button>
                    <button type="button" class="btn btn-dark"><i class="bi bi-floppy-fill"></i> Salvar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Rodapé-->
    <div class="position-absolute bottom-0 start-0">
        <img src="img/onda3.png" alt="" class="img-fluid w-50">
    </div>
    <div class="position-absolute bottom-0 end-0" style="margin: 1rem;">
        <a href="#" class="btn btn-outline-danger"><i class="bi bi-box-arrow-left"></i> Sair</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>