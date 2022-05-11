<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-gray">
                    <h2>Resultados</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="category-sidebar">
                    <div class="widget category-list">
                        <h4 class="widget-header">Categorias</h4>
                        <ul class="category-list">
                            <?php foreach ($tipos as $tipo) { ?>
                                <li><a href="/codeigniter/index.php/produtos/?tipo=<?php echo $tipo->id ?>"><?php echo $tipo->tipo ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <!-- ad listing list  -->
                <?php foreach ($produtos as $produto) { ?>
                    <div class="ad-listing-list mt-20">
                        <div class="row p-lg-3 p-sm-5 p-4">
                            <div class="col-lg-4 align-self-center">
                                <a href="single.html">
                                    <img src="<?php echo $produto->imagem ?>" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 col-md-10">
                                        <div class="ad-listing-content">
                                            <div>
                                                <a href="single.html" class="font-weight-bold"><?php echo $produto->nome ?></a>
                                            </div>
                                            <ul class="list-inline mt-2 mb-3">
                                                <li class="list-inline-item"><a href="category.html"> <i class="fa fa-folder-open-o"></i> <?php echo $produto->tipo_produto ?></a></li>
                                                <li class="list-inline-item"><a href=""><i class="fa fa-box"></i>Estoque: <?php echo $produto->estoque ?></a></li>
                                            </ul>
                                            <p class="pr-5">Valor: <?php echo $produto->valor ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- ad listing list  -->
            </div>
        </div>
    </div>
</section>