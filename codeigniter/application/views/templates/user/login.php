<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Login</h3>
                    <form method="POST" action="/codeigniter/index.php/login/validalogin">
                        <fieldset class="p-4">
                            <input name="email" id="email" type="text" placeholder="Username" class="border p-3 w-100 my-2">
                            <input name="senha" id="senha" type="password" placeholder="Password" class="border p-3 w-100 my-2">
                            <button type="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Entrar</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>