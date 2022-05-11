
<section class="hero-area bg-1 text-center overly">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-12 align-content-center">
                                    <form method="GET" action="/codeigniter/index.php/produtos/">
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control my-2 my-lg-1" id="buscarProduto" name="buscarProduto" placeholder="Buscar Produto">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <select class="w-100 form-control mt-lg-1 mt-md-2" name="tipo" id="tipo">
                                                    <option value="">Categoria</option>
                                                    <?php foreach ($tipos as $tipo) { ?>
                                                        <option value="<?php echo $tipo->id ?>"><?php echo $tipo->tipo ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2 align-self-center">
                                                <button type="submit" class="btn btn-primary">Buscar Produto</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <section class="popular-deals section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Produtos Tradicionais</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- offer 01 -->
                <div class="col-lg-12">
                    <div class="trending-ads-slide">
                        <?php foreach ($produtos as $produto) { ?>
                            <div class="col-sm-12 col-lg-4">
                                <!-- product card -->
                                <div class="product-item bg-light">
                                    <div class="card">
                                        <div class="thumb-content">
                                            <!-- <div class="price">$200</div> -->
                                            <a href="single.html">
                                                <img class="card-img-top img-fluid" src="<?php echo $produto->imagem ?>">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="single.html"><?php echo $produto->nome ?></a></h4>
                                            <ul class="list-inline product-meta">
                                                <li class="list-inline-item">
                                                    <a href="single.html"><i class="fa fa-folder-open-o"></i><?php echo $produto->tipo ?></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#"><i class="fa fa-calendar"></i>estoque: <?php echo $produto->estoque ?></a>
                                                </li>
                                            </ul>
                                            <p class="card-text">Valor: <?php echo $produto->valor ?></p>
                                            <div class="product-ratings">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>


            </div>
        </div>
    </section>