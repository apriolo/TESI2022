<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
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
                    <h3 class="bg-gray p-4">Cadastrar novo Tipo de Produto</h3>
                    <form method="POST" action="/codeigniter/index.php/tipos/salvarnovotipo">
                        <fieldset class="p-4">
                            <input name="nome" id="nome" type="text" placeholder="nome" class="border p-3 w-100 my-2">
                            <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Cadastrar Tipo</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>