<body>
    <main>
        <div class="contenido">

            <h2 class="textosTitulo mt-5 mb-5">Bienvenido</h2>
            <?php foreach ($_SESSION['usuario'] as $user){?>
                <p>Email: <?=$user->getEmail()?></p>
                <p>Contraseña: <input type="password" disabled value="<?=$user->getPassword()?>"></p>
            <?php }?>
        </div>
    </main>