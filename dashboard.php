<?php
include_once 'init.php';
$PDO = db_connect();

$ChamaVacina = "SELECT * FROM cadVacinas";
$Forn = $PDO->prepare($ChamaVacina);
$Forn->execute();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kd Vacina</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-yellow layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index2.html" class="navbar-brand"><b>KD</b>Vacina</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- /.messages-menu -->

            <!-- Notifications Menu -->


            <!-- User Account Menu -->

          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <strong>KD</strong>Vacina - Lista de Vacinas
        </h1>

      </section>

      <!-- Main content -->
      <section class="content">
   <section class="content">
   <div class="row">
     <div class="col-md-4">
      <div class="info-box">
      <a data-toggle="modal" data-target="#myModal"">
       <span class="info-box-icon btn-danger">
        <i class="fa fa-plus"></i>
       </span>
      </a>
      <div class="info-box-content"><br /><h4>Cadastrar Vacina</h4></div>
      <!-- MODAL DE CADASTRO DE FORNECEDOR -->
      <div id="myModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header bg-green-gradient">
          <button type="button" class="close" data-dismiss="modal">X</button>
           <h4 class="modal-title">Cadastrar Vacina</h4>
         </div>
         <div class="modal-body">
          <form name="EdCad" id="name" method="post" action="" enctype="multipart/form-data">
           <div class="col-xs-6 form-group">Nome de Contato
            <input class="form-control" type="text" name="nm" required="required">
           </div>
           <div class="col-xs-6 form-group">Nome da Vacina
            <input class="form-control" type="text" name="nv" required="required">
           </div>
              <div class="col-xs-4">Data de Validade
               <div class="input-group">
                <div class="input-group-addon">
                 <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="dt" class="form-control" minlength="10" maxlength="10" OnKeyPress="formatar('##/##/####', this)" required="required">
               </div>
              </div>
           <div class="col-xs-8 form-group">Local de Origem
            <input class="form-control" type="text" name="lc" required="required">
           </div>
           <div class="col-xs-9 form-group">E-Mail
            <input class="form-control" type="mail" name="ml" required="required">
           </div>
           <div class="col-xs-3 form-group">Quantidade
            <input class="form-control" type="mail" name="qnt" required="required">
           </div>
           <div class="pull-right"><br /><br />
            <input name="Tsenha" type="submit" class="btn bg-green" id="Tsenha" value="Cadastrar"  />
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
           </div>
          </form>
          <?php
           if(@$_POST["Tsenha"]){
            $Nome = $_POST["nm"];
            $Vacina = $_POST["nv"];
            $Data = $_POST["dt"];
            $Local = $_POST["lc"];
            $Email = $_POST["ml"];
            $Quant = $_POST["qnt"];
            $DataCad = date('d/m/Y H:i:s');
            $AddCat = $PDO->query("INSERT INTO cadVacinas (NomeContato, Endereco, EmailOrigem, NomeVacina, DataValidade, DataCadastro) VALUES ('$Nome', '$Local', '$Email', '$Vacina', '$DataCad', '$Quant', '$DataCad')");
            if($AddCat)
             {
              echo '
              <script type="text/JavaScript">alert("Vacina Cadastrada");
              location.href="index.php"</script>';
             }
             else{
             echo '<script type="text/javascript">alert("Não foi possível. Erro: 0x03");</script>';
             }
           }
          ?>
         </div>
         <div class="modal-footer">
         </div>
        </div>
       </div>
      </div>
 
      </div>
     </div>
     <div class="col-md-8">
      <div class="info-box">
      </div>
     </div>
     <div class="col-md-12">
      <div class="info-box">
       <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
         <thead>
         <tr>
          <th style="width: 5%">#</th>
          <th style="width: 25%">Nome Vacina</th>
          <th style="width: 20%">Local de Origem</th>
          <th style="width: 10%">Data de Validade</th>
          <th style="width: 15%">E-Mail para Contato</th>
         </tr>
        </thead>
         <tbody>
         <?php 
          while ($VFor = $Forn->fetch(PDO::FETCH_ASSOC)): 
           echo '<tr>';
            echo '<td>' . $VFor['id'] . '</td>';
            echo '<td>' . $VFor['NomeVacina'] . '</td>';
            echo '<td>' . $VFor['Endereco'] . '</td>';
            echo '<td>' . $VFor['DataValidade'] . '</td>';
            echo '<td>' . $VFor['EmailOrigem'] . '</td>';

           echo '</tr>';
           endwhile;
          ?>
          </tbody>
        </table>
       </div>
      </div>
     </div>
      </section>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Versão</b> 1.0 
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Code For Curitiba</a>.</strong> Todos os Direitos Reservados.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>
</body>
</html>
