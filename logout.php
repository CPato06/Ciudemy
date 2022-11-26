<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /dashboard/ciudemy');
?>

<div class="navbar">
      <img class="logo" src="css/img/logo.png" alt="">
      <input type="text" name="search" placeholder="Search..">
      <div class="dropdown">
        <button class="dropbtn">Categorias
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="#">Link 1</a>
            <ul>
              <li><a href="#">Python</a></li>
              <li><a href="#">HTML</a></li>
              <li><a href="#">Inteligencia Artificial</a></li>
            </ul>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
      </div>
    </div>