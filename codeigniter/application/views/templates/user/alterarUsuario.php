<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <?php if (isset($userNotFound)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $userNotFound ?>
                    </div>
                <?php } else { ?>
                    <?php if (isset($erros)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $erros ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($sucesso)) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $sucesso ?>
                        </div>
                    <?php } ?>
                    <div class="border border">
                        <h3 class="bg-gray p-4">Alterar Registro de Usuario</h3>
                        <form method="POST" action="/codeigniter/index.php/usuarios/salvaralteracao">
                            <fieldset class="p-4">
                                <input type="hidden" name="id" id="id" value="<?php echo $usuario->id ?>">
                                <input name="nome" id="nome" type="text" placeholder="nome*" class="border p-3 w-100 my-2" value="<?php echo $usuario->nome ?>">
                                <input name="email" id="email" type="email" placeholder="Email*" class="border p-3 w-100 my-2" value="<?php echo $usuario->email ?>">
                                <input name="senha" id="senha" type="password" placeholder="senha*" class="border p-3 w-100 my-2">
                                <input name="confirm_senha" id="confirm_senha" type="password" placeholder="confirmar senha*" class="border p-3 w-100 my-2">
                                <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Alterar Registro</button>
                            </fieldset>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>