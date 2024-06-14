<html>
    <head>
        <title>Coffee Show</title>
        <link rel="stylesheet" href="../public/css/gabreu.css">
        <link rel="stylesheet" href="../public/css/nav.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="shortcut icon" href="../public/images/icone2.png" type="image/x-icon">
    </head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="content-nav">
            <a class="navbar-brand">
                <img onclick="login()" src="../public/images/icone2.png" width="32" height="32" class="d-inline-block align-top icone">
                <img onclick="login()" src="../public/images/logo1.png" height="32" class="d-inline-block align-top icone">
            </a>

            <div class="links">
                <a href="produtos.php">Nossos produtos</a>
                <a href="sobre.php">Sobre</a>
                <a href="contato.php">Contato</a>
                <a href="login-cafe.php">Login</a>
            </div>
        </div>
    </nav>

    <div class="page">
        <div class="content-page text-center">

            <div class="sub-login">Login</div>

            <hr class="hr">
            
            <div class="login-form">
                <form>
                    <div class="form-group">
                      <label for="emailinput">Email</label>
                      <input type="email" class="form-control" id="emailinput" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="senhainput">Senha</label>
                      <input type="password" class="form-control" id="senhainput" placeholder="Senha">
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Lembrar senha</label>
                    </div>
                    <button id="buttonn" type="submit" class="btn btn-primary">Login</button>
                    <div class="possuo">
                        <a href="cadastro-cafe.php">não possuo uma conta</a>
                    </div>
                  </form>
            </div>

            <hr class="hr2">

        </div>
    </div>
</body>

<footer class="text-center text-lg-start">
    <div class="p-3" style="background-color: #f8f9fa !important;">
        <a>2024 Copyright Coffee Show ®</a>
    </div>
</footer>



<script>

function login(){
    window.location.href = "http://localhost/Cafeteria/view/index.php";
}

function verify() {
	if(document.getElementById("emailinput").value==="") { 
        document.getElementById('buttonn').disabled = true; 

    } else if(document.getElementById("senhainput").value==="") { 
        document.getElementById('buttonn').disabled = true; 

    } else { 
        document.getElementById('buttonn').disabled = false;
    }
}

window.setInterval(verify, 1);
</script>

</html>