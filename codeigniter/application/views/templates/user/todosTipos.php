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
                            <li><a href="/codeigniter/index.php/produtos/todosprodutos"><i class="fa fa-user"></i>Todos os Produtos</a></li>
                            <li class="active"><a href="/codeigniter/index.php/tipos/todostipos"><i class="fa fa-tag"></i>Tipos de Produtos</a></li>
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
                            <a class="nav-link text-white add-button" href="/codeigniter/index.php/tipos/novotipo"><i class="fa fa-plus-circle"></i>Adicionar Tipo</a>
                        <?php } ?>
                    </div>
                    <h3 class="widget-header">Tipos de produtos</h3>
                    <table class="table table-responsive product-dashboard-table">
                        <thead>
                            <tr>
                                <th>Tipo Produto</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tipos as $tipo) { ?>
                                <tr>
                                    <td class="product-details">
                                        <h3 class="title"><?php echo $tipo->tipo ?></h3>
                                    </td>
                                    <td class="action" data-title="Action">
                                        <div class="">
                                            <ul class="list-inline justify-content-center">
                                                <li class="list-inline-item">
                                                    <a class="edit" data-toggle="tooltip" data-placement="top" title="Editar" href="/codeigniter/index.php/tipos/alterartipo?id=<?php echo $tipo->id ?>">
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
                                                        data-target="#delete-<?php echo $tipo->id ?>-modal"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="delete-<?php echo $tipo->id ?>-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Deletar Tipo</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Deseja realmente apagar este tipo de produto?</br>
                                                                    <?php echo $tipo->tipo ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <a style="width: 100px;" href="/codeigniter/index.php/tipos/excluir?id=<?php echo $tipo->id ?>" class="btn btn-danger">Remover</a>
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