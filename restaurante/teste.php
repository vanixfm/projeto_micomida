<!DOCTYPE html>
<html>
<head>
  <title>Menu Lateral com Opção de Recolher</title>
  <!-- Adicione as referências aos arquivos CSS do Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 250px;
      padding: 20px;
      background-color: #f8f9fa;
      transition: all 0.3s;
    }

    .sidebar.collapsed {
      width: 70px;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
      transition: all 0.3s;
    }

    .content.collapsed {
      margin-left: 70px;
    }
  </style>
</head>
<body>
  <div class="sidebar" id="sidebar">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-home"></i> Início
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-users"></i> Usuários
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-cog"></i> Configurações
        </a>
      </li>
    </ul>
  </div>
  <div class="content" id="content">
    <h1>Conteúdo Principal</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eleifend sem at tellus fringilla, at eleifend nunc interdum. Nulla nec sapien tellus.</p>
  </div>

  <!-- Adicione as referências aos arquivos JavaScript do Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#sidebar').addClass('collapsed');
      $('#content').addClass('collapsed');

      $('#sidebar').on('mouseenter', function() {
        $('#sidebar').removeClass('collapsed');
        $('#content').removeClass('collapsed');
      });

      $('#sidebar').on('mouseleave', function() {
        if (!$('#sidebar').hasClass('active')) {
          $('#sidebar').addClass('collapsed');
          $('#content').addClass('collapsed');
        }
      });

      $('#sidebar').on('click', function() {
        $(this).toggleClass('active');
        if ($(this).hasClass('active')) {
          $(this).removeClass('collapsed');
          $('#content').removeClass('collapsed');
        } else {
          $(this).addClass('collapsed');
          $('#content').addClass('collapsed');
        }
      });
    });
  </script>
</body>
</html>
