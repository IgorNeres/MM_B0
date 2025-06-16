<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MM B0</title>
    <link rel="stylesheet" href="node_modules\bootstrap\comp\bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<body style="overflow: hidden;">
    <?php
    session_start();
    if(isset($_SESSION['nao_autenticado'])):
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 1000;">
        ERRO: Usuário ou senha inválidos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    endif;
    unset($_SESSION['nao_autenticado']);
    ?>
    <div class="container-fluid">
        <div class="row min-vh-100 d-flex align-items-stretch ">
<!--PARTE VERDE-->
            <div class="col-5 bg-success">
                <div class="row">
                    <img src="img/manoelmanologowhite.png" alt="" class="img-fluid w-100" style="margin-top: 25%; margin-left: 2%;">
                </div>
                <div class="row">
                    <img src="img/cearalogowhite.png" alt="" class="img-fluid w-50" style="margin-top: 25%; margin-left: 30%;">
                </div>
            </div>
<!--DETALHE-->
            <div class="col text-center" style="margin-left: -22px; margin-top: -5px;">
                <img src="img/onda1.png" class="img-fluid h-100">
            </div>
<!--FORMS-->
            <div class="col-5">
                <div class="row">
                    <img src="img/titulo.png" alt="" class="img-fluid w-50 rounded mx-auto d-block" style="margin-top: 10%;">
                </div>
                <div class="row">
                    <img src="img/login.png" alt="" class="img-fluid w-25 rounded mx-auto d-block" style="margin-top: 15%;">
                </div>
                <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuário:</label>
                    <input type="text" class="form-control" name="usuario" id="usuario">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" name="senha" id="senha">
                </div>
                <button type="submit" class="btn btn-outline-dark"><i class="bi bi-box-arrow-in-right"></i> Entrar</button>
                </form>
            </div>
<!--DETALHE-->
            <div class="col text-center" style="margin-right: -45px; margin-top: -5px;">
                <img src="img/onda2.png" class="img-fluid h-100">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>