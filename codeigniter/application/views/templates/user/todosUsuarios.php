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
                            <li><a href="/codeigniter/index.php/tipos/todostipos"><i class="fa fa-tag"></i>Tipos de Produtos</a></li>
                            <li class="active"><a href="/codeigniter/index.php/usuarios/todosusuarios"><i class="fa fa-user"></i>Todos os Usuarios</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                <!-- Recently Favorited -->
                <div class="widget dashboard-container my-adslist">
                <div class="col-md-10 offset-md-8">
                        <?php if ($_SESSION['padoca']['admin'] == 1) { ?>
                            <a class="nav-link text-white add-button" href="/codeigniter/index.php/usuarios/registro"><i class="fa fa-plus-circle"></i>Adicionar Usuario</a>
                        <?php } ?>
                    </div>
                    <h3 class="widget-header">Usuarios</h3>
                    <table class="table table-responsive product-dashboard-table">
                        <thead>
                            <tr>
                                <th>Product Title</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario) { ?>
                                <tr>
                                    <td class="product-details">
                                        <h3 class="title"><?php echo $usuario->nome ?></h3>
                                        <span class="add-id"><strong>ID:</strong> <?php echo $usuario->id ?></span>
                                        <span><strong>email: </strong><time><?php echo $usuario->email ?></time> </span>
                                        <span class="status active"><strong>Admin: </strong><?php echo $usuario->admin ?></span>
                                    </td>
                                    <td class="action" data-title="Action">
                                        <div class="">
                                            <ul class="list-inline justify-content-center">
                                                <li class="list-inline-item">
                                                    <a class="edit" data-toggle="tooltip" data-placement="top" title="Editar" href="/codeigniter/index.php/usuarios/alterarusuario?id=<?php echo $usuario->id ?>">
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
                                                        data-target="#delete-<?php echo $usuario->id ?>-modal"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="delete-<?php echo $usuario->id ?>-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Deletar Usuario</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Deseja realmente apagar este usuario?</br>
                                                                    <?php echo $usuario->nome ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <a href="/codeigniter/index.php/usuarios/excluir?id=<?php echo $usuario->id ?>" class="btn btn-primary">Remover</a>
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