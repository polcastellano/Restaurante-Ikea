<body>
    <main>
        <div class="contenido">

            <h2 class="textosTitulo mt-5 mb-5">Inicio sesión</h2>
            <form class="d-flex justify-content-center" action="<?= url . "?controller=usuario&action=validarUsuario"?>" method="POST">
                <div class="row col-12 col-sm-8 col-lg-4">
                    <label class="p-0">Dirección de correo electrónico</label>
                        <input style="height: 50px;" type="text" name="email"/>
                    <label class="p-0 mt-3">Contraseña</label>
                        <input style="height: 50px;" type="password" name="password"/>
                    
                    <button type="submit" class="btnLogin border-0 rounded-5 py-3 mt-5">
                        <div class="d-flex justify-content-center col-12">
                            <p class="m-0 btnIniciar">Continuar</p>
                        </div>
                    </button>
                    
                    <div class="mt-2 d-flex justify-content-center">
                        <h3>
                            <a href="<?= url . "?controller=usuario&action=registro"?>" class="registrate">¿No tienes una cuenta IKEA? Crea una ahora:</a>
                        </h3>
                    </div>
                </div>
            </form>
        </div>
    </main>