<body>
    <main>
        <div class="contenido">

            <h2 class="textosTitulo mt-5 mb-5">Inicio sesión</h2>
            <form class="d-flex justify-content-center" action="<?= url . "?controller=usuario&action=validarUsuario"?>" method="POST">
                <div class="row">
                    <label class="d-flex justify-content-center" for="">Dirección de correo electrónico</label>
                    <div class="d-flex justify-content-center col-12">
                        <input class="col-6" type="text" name="usuario"/>
                    </div>

                    <label class="d-flex justify-content-center" for="">Contraseña</label>
                    <div class="d-flex justify-content-center col-12">
                        <input class="col-6" type="password" name="password"/>
                    </div>

                    
                    <button type="submit" class="btnLogin border-0 rounded-5 py-3">
                        <div class="d-flex justify-content-center col-12">
                            <p class="m-0 btnIniciar">Continuar</p>
                        </div>
                    </button>
                    
                </div>
            </form>
        </div>
    </main>