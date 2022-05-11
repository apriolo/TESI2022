<section class="dashboard section">
    <!-- Container Start -->
    <div class="container">
        <!-- Row Start -->
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                <div class="sidebar">
                    <!-- Dashboard Links -->
                    <div class="widget user-dashboard-menu">
                        <ul>
                            <li class="active"><a href="/codeigniter/index.php/produtos/todosprodutos"><i class="fa fa-user"></i>Todos os Produtos</a></li>
                            <li><a href="/codeigniter/index.php/tipos/todostipos"><i class="fa fa-tag"></i>Tipos de Produtos</a></li>
                            <li><a href="/codeigniter/index.php/usuarios/todosusuarios"><i class="fa fa-user"></i>Todos os Usuarios</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                <!-- Recently Favorited -->
                <div class="widget dashboard-container my-adslist">
                    <div class="col-md-10 offset-md-8">
                        <?php if ($_SESSION['padoca']['admin'] == 1) { ?>
                            <a class="nav-link text-white add-button" href="/codeigniter/index.php/produtos/formproduto"><i class="fa fa-plus-circle"></i>Adicionar Produto</a>
                        <?php } ?>
                    </div>
                    <h3 class="widget-header">Produtos</h3>
                    <table class="table table-responsive product-dashboard-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Title</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtos as $produto) { ?>
                                <tr>

                                    <td class="product-thumb">
                                        <img width="80px" height="auto" src="<?php echo $produto->imagem ?>" alt="image description">
                                    </td>
                                    <td class="product-details">
                                        <h3 class="title"><?php echo $produto->nome ?></h3>
                                        <span class="add-id"><strong>ID:</strong> <?php echo $produto->id ?></span>
                                        <span><strong>Estoque: </strong><time><?php echo $produto->estoque ?></time> </span>
                                        <span class="status active"><strong>Valor: </strong><?php echo $produto->valor ?></span>
                                    </td>
                                    <td class="product-category"><span class="categories"><?php echo $produto->tipo_produto ?></span></td>
                                    <td class="action" data-title="Action">
                                        <div class="">
                                            <ul class="list-inline justify-content-center">
                                                <li class="list-inline-item">
                                                    <a class="edit" data-toggle="tooltip" data-placement="top" title="Editar" href="/codeigniter/index.php/produtos/alterar?id=<?php echo $produto->id ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button 
                                                        class="btn btn-danger btn-xs rounded-0" 
                                                        type="button" 
                                                        data-toggle="modal"
                                                        data-placement="top" 
                                                        title="Delete"
                                                        data-target="#delete-<?php echo $produto->id ?>-modal"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="delete-<?php echo $produto->id ?>-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Deletar Produto</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Deseja realmente apagar este produto?</br>
                                                                    <?php echo $produto->nome ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <a href="/codeigniter/index.php/produtos/excluir?id=<?php echo $produto->id ?>" class="btn btn-primary">Remover</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</section>