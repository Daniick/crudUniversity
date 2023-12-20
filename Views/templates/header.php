 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../../assets/styles/board.css">
     <title>Mi Tiendita</title>
     <script src="https://kit.fontawesome.com/2ed691f658.js" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

 </head>

 <body>
     <!-- <header>
         <nav>
             <div class="userConatiner">
                 <div class="fotoUsuario"></div>
                 <h4><?= $userData['correo'] ?></h4>
                 <a href="index.php?controller=AuthController&action=logout">LOGOUT</a>
             </div>
             <ul></ul>
         </nav>
     </header>
     <section>
         <ul>
             <?php foreach ($menu as $key => $options) : ?>
                 <li><a href="<?= $options ?>"><?= $key ?></a></li>
             <?php endforeach; ?>

         </ul>
     </section>
     <div class="mainContainer"> -->

     <div class="menu">
         <div class="dlogo">
             <img src="../assets/logo.jpg" class="logo" alt="">
             <p>Universidad</p>

         </div>
         <hr>
         <div class="role">
             <h3>admin</h3>
             <p>Administrador </p>
         </div>
         <hr>
         <ul>
             <h4>Menu Administracion</h4>
             <?php foreach ($menu as $key => $options) : ?>
                 <li> <a href="<?= $options ?>"><?= $key ?></a></li>
             <?php endforeach; ?>
         </ul>
     </div>
     <section class="main">
         <nav>
             <div class="home">
                 <i class="fa-solid fa-bars"></i>
                 <a href="">Home</a>
             </div>
             <div class="adm">
                 <a href="index.php?controller=AuthController&action=logout">Administrador<i class="fa-solid fa-chevron-down"></i></a>
             </div>
         </nav>

         <!-- <div class="contenido">
             <div>
                 <p class="titulo">lista de maestros</p>
             </div>
             <div>
                 <p><a href="">Home </a> / <a href=""> Maestros</a></p>
             </div>
         </div> -->