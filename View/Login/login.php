<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auto Repuestos Grillo - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Styles/login.css" rel="stylesheet">
    
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="../imgs/logo.png" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">Repuestos Grillo</h4>
                                    </div>

                                    <form>
                                        <p>Inicia Sesion con tu Cuenta</p>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="email" id="username" class="form-control"
                                            placeholder="Phone number or email address" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" class="form-control" />
                                        </div>

                                        <div class="text-center pt-1 mb-2 pb-2">
                                            <button id="loginBtn" class="mx-2 btn btn-primary btn-block fa-lg gradient-custom-2 w-100" type="button">Iniciar Sesion</button>
                                        </div>

                                        <div class="text-center mb-2 pb-1">
                                            <a class="text-muted" href="#!">Olvidaste tu Contraseña?</a>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <button type="button" class="btn btn-outline-danger">Create new</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">¡Encuentra la pieza perfecta para tu auto, en El Grillo!</h4>
                                    <p class="small mb-0">Somos tu aliado de confianza en el mantenimiento y cuidado de vehículos. Con más de [X] años de experiencia en el mercado, 
                                        ofrecemos una amplia gama de repuestos originales y de alta calidad para todo tipo de automóviles.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../Scripts/login.js"></script>
</body>
</html>