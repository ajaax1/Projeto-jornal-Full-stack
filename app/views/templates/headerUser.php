<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="../../../assets/Styles/headerUser.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,200&display=swap" rel="stylesheet">
</head>
<body>
  <nav>
    <div class="flex">
      <a class="font" href="/"><b>Fake</b> <i>Newspaper</i></a>
      <a class="font" href="/createNews">Create News</a>
    </div>
    <div class="flex">
      <input class="input1" placeholder="  Search..." type="text">
    </div>
    <div class="flex2">
    <div>
      <a class="button" style="border-top-left-radius:10px;" href=""><?php
             if (isset($_SESSION['logged'])) {
              echo $_SESSION['name'];}
             ?></a> 
    </div>
    <div>
      <a class="button" style="border-bottom-right-radius:10px;" href="/logout.php">Logout</a>
    </div>
  </div>
    <span class="material-symbols-outlined menu" id="menu" onclick="menuShow()">
      menu
    </span>
  </nav>
  <section id="navis">
            <a  class="text-menu" style="border-top-left-radius:10px;" href=""><?php
             if (isset($_SESSION['logado'])) {
              echo $_SESSION['name'];}
             ?></a> 
             <a class="text-menu" style="border-bottom-right-radius:10px;" href="/logout.php">Logout</a>
    <input placeholder="  Search..." type="text">
  </section>

  <script>
    function menuShow() {
      let menuMobile = document.querySelector('#navis');
      let menuIcon = document.querySelector('#menu');
      if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open');
        menuIcon.innerHTML = "menu";
      } else {
        menuMobile.classList.add('open');
        menuIcon.innerHTML = "close";
      }
    }
  </script>
</body>
</html>
