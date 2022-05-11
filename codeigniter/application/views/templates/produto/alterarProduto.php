<section class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <?php if(isset($produtoNotFound)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $produtoNotFound ?>
                    </div>
                <?php } else { ?>
                    <div class="border border">
                    <h3 class="bg-gray p-4">Alterar Produto</h3>
                    <?php if(isset($erros)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $erros ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($sucesso)) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sucesso ?>
                    </div>
                <?php } ?>
                    <form method="POST" action="/codeigniter/index.php/produtos/salvaralteracao">
                        <fieldset class="p-4">
                            <?php if (isset($produto)) { ?>
                                <input type="hidden" name="id" id="id" value="<?php echo $produto->id ?>">
                            <?php } ?>
                            
                            <input value="<?php if (isset($produto)) echo $produto->nome ?>" name="nome" id="nome" type="text" placeholder="nome*" class="border p-3 w-100 my-2">
                        
                            <div class="form-group">
                                <label for="tipo">valor</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">R$</div>
                                    </div>
                                    <input value="<?php if (isset($produto)) echo $produto->valor; else echo "1.00" ?>" type="number" min="0.00" step="0.01" value="1.00" id="valor" name="valor" class="form-control" placeholder="Price">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tipo">Estoque</label>
                                <input value="<?php if (isset($produto)) echo $produto->estoque; else echo "1" ?>" type="number" min="1" step="1" id="estoque" name="estoque" class="form-control" placeholder="Estoque">
                            </div>

                            <div class="form-group">
                                <label for="tipo">Imagem</label>
                                <input value="<?php if (isset($produto)) echo $produto->imagem ?>" type="text" id="imagem" name="imagem" class="form-control" placeholder="Link da Imagem">
                            </div>

                            <div class="form-group">
                                <label for="tipo">Tipo</label>
                                <select class="form-control" id="tipo" name="tipo">
                                    <?php foreach ($tipos as $tipo) { ?>
                                        <option value="<?php echo $tipo->id ?>" <?php if (isset($produto) && ($produto->tipo == $tipo->id)) echo " selected" ?>><?php echo $tipo->tipo ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tipo">Perecivel</label>
                                <select class="form-control" id="perecivel" name="perecivel">
                                    <option <?php if (isset($produto) && ($produto->perecivel == 'N')) echo " selected" ?> value="N">Não</option>
                                    <option <?php if (isset($produto) && ($produto->perecivel == 'S')) echo " selected" ?> value="S">Sim</option>
                                </select>
                            </div>

                            <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Salvar Produto</button>
                        </fieldset>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>