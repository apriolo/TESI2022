# TESI 2022
#### Arian Alves Priolo - 010620024
#### Allan Marques -

### Trabalho Padoca do Barba

## Instalação
```bash
Colocar a pasta codeigniter dentro de htdocs do xampp.
```

## Parte do Usuario
### Home Page
#### O usuario tem um carrousel com os produtos mais vistos(last inserteds).
![image](https://user-images.githubusercontent.com/77355017/167947095-e41d8239-6e5d-4a29-bf44-76fb36d81758.png)
#### é possivel fazer buscas de produtos por nome de produto e tipo de protudo.
![image](https://user-images.githubusercontent.com/77355017/167947254-620a1159-c715-4faf-9d54-e0d2b4b22b84.png)
#### Fazendo uma busca por "Pão" na area de texto temos o resultado em uma listagem.
![image](https://user-images.githubusercontent.com/77355017/167947501-1545be0b-373d-45af-8dc8-0402185a9a30.png)
#### Ou por tipo de produto
o produto trakinas esta cadastrado com refrigerante para testes.
![image](https://user-images.githubusercontent.com/77355017/167947611-ea450ea3-d703-4d58-ac12-8563e5a3fcba.png)

### Admin
#### A area do admin é acessada através de login
No template header existe um botão admin que leva para area de login.
![image](https://user-images.githubusercontent.com/77355017/167947902-1a1663d0-14e6-46a7-bda1-398c38a48595.png)
##### Existe uma verificação se existe um usuario com as credenciais informadas.
Caso não, exibe mensagem de erro
![image](https://user-images.githubusercontent.com/77355017/167948616-ad1c7a0f-20b3-4846-8f64-c352b61187ed.png)
##### Se o login for realizado redirecionamos para a homepage, e o Header da aplicação ja muda adicionando um botão para o painel do admin
![image](https://user-images.githubusercontent.com/77355017/167948770-ba9944c0-1f4f-4b32-9704-ed1bed4d4e5c.png)

#### Clicando em Minha Loja, o painel de admin é aberto, é possivel visualizar, editar e excluir os produtos, tipos de produtos e usuarios.
![image](https://user-images.githubusercontent.com/77355017/167948920-4ba0ef9e-8f41-49f7-9014-da1f8d09c5b9.png)

#### Na parte de produtos
##### Adicionar
###### Novamente existe as validações de formulario com o formvalidation do codeigniter
![image](https://user-images.githubusercontent.com/77355017/167949072-6512d161-c0b7-419b-8b09-3ed9132ff37a.png)

###### Ao adicionar o produtos somos redirecionados para a pagina todos os produtos
![image](https://user-images.githubusercontent.com/77355017/167949552-d0df30ba-c2e3-4168-876e-8ed71a003bb3.png)
###### e ja podemos ver o produto cadastrado
![image](https://user-images.githubusercontent.com/77355017/167949618-e457af9f-0b0f-48fe-a10c-472ab1b54457.png)

##### Editar Produto
A trakinas esta no tipo errado de refrigerante, temos que mudar ele
![image](https://user-images.githubusercontent.com/77355017/167949693-e5a5ea88-e22d-439d-9d4e-c11e5f3e6f5d.png)
Clicamos em editar e o form ja aparece com os dados da bolacha
![image](https://user-images.githubusercontent.com/77355017/167949804-0eac23e2-524b-4180-aa1f-26eb7cd2a3d5.png)
Vamos alterar para Bolacha e salvar
![image](https://user-images.githubusercontent.com/77355017/167949871-8c339a02-9ec3-4103-952f-41277f0de0f8.png)
em Caso de sucesso temos a mensagem de alterado com sucesso
![image](https://user-images.githubusercontent.com/77355017/167949910-950a5594-a566-4987-acb3-8cf5b8dfc1a1.png)
E se tivermos erro a mensagem de erro é mostrada
![image](https://user-images.githubusercontent.com/77355017/167950001-7b0a9817-8b0a-4d8b-b225-d1b46d292682.png)

##### Exclusão de produto
###### A exclusão é feita com o click no botão com lixeira na listagem e então é aberto um modal para confirmação
Ao clicar em remover o item é excluido
![image](https://user-images.githubusercontent.com/77355017/167950257-155ba83a-30b8-40e5-8da9-f558baf22ac4.png)


### Todos os outros modulos seguem o mesmo padrão

#### Tipos
![image](https://user-images.githubusercontent.com/77355017/167950457-66851e1c-ed40-4eb0-a8d5-2f63d0dbb694.png)

##### Cadastro de tipo evitando tipos duplicados
![image](https://user-images.githubusercontent.com/77355017/167950558-9e437e1a-0897-40ca-969c-51957cbdd7f1.png)
![image](https://user-images.githubusercontent.com/77355017/167950601-2c6beeb2-9ae1-4ab7-a330-ce050d26359e.png)

##### Alterar Tipo
![image](https://user-images.githubusercontent.com/77355017/167950707-43d21a22-a552-47c0-9154-800c9200f54b.png)

##### Deletar Tipo
![image](https://user-images.githubusercontent.com/77355017/167950766-e1f1f95d-7e2b-4fa4-a5d8-eb1921132149.png)

#### Usuarios
![image](https://user-images.githubusercontent.com/77355017/167950852-47b68ff0-3cf7-466e-b644-15ea4600204f.png)

##### Cadastro de usuario com verificação de email unico e confirmação de senha através do form validation
![image](https://user-images.githubusercontent.com/77355017/167950971-78cbc45e-b31e-48d4-8649-578851655502.png)

###### Sucesso
![image](https://user-images.githubusercontent.com/77355017/167951079-6db482cf-5db3-4c81-8596-e5da43f07dac.png)

#### Editar Usuario
![image](https://user-images.githubusercontent.com/77355017/167951178-d4ad6370-f57a-469c-9c02-25bbe02e0784.png)
![image](https://user-images.githubusercontent.com/77355017/167951265-8a071ead-5e5d-4a04-a62f-36f54583c410.png)

#### Excluir Usuario
![image](https://user-images.githubusercontent.com/77355017/167951323-70edfffa-87f6-4d01-8eb6-8daa444a790a.png)










