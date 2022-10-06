<?php 
  include "../app/ProductsController.php";
  $data = ProductsController::getBySlug($_GET['slug']);
//  print_r(json_encode($data));
//  print_r( $data);
/* 
  $data = $p->getAll();
  $objetos = json_decode($data)->data; */
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php  include '../layouts/head.template.php'?>
    <style>
        #side{
            height: 80vh;
            background-color: gray;
        }
    </style>
    <title>Document</title>
</head>
<body>
<?php  include '../layouts/scripts.template.php'?>
<?php  include '../layouts/nav.template.php'?>



<!-- <php  include '../layouts/sidebar.template.php'?> -->
<div class="container-fluid">
          <div class="row">
            <!-- <a   data-bs-toggle="modal" data-bs-target="#exampleModal"class="btn btn-primary">Agregar</a> -->
            <?php  include '../layouts/sidebar.template.php'?>
             
<div class="card mb-10" style="max-width: 1000px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo $data->cover ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $data->name ?></h5>
        <p class="card-text"><?php echo $data->description ?></p>
        <p class="card-text"><?php echo "Marca: ".$data->brand->name ?></p>
        <p class="card-text"><small class="text-muted"><?php echo $data->features?></small></p>
      
        Tags:  
        <?php  foreach($data->tags as $tag):?>
        <span><a href=<?php echo ".file.php?tag_id=".$tag->id ?>><?php echo $tag->name?></a></span>
        <?php endforeach; ?>
          <br>
          Categories:
        <?php  foreach($data->categories as $tag):?>
        <span><a href=<?php echo ".file.php?category_id=".$tag->id ?>><?php echo $tag->name?></a></span>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

            
        </div>
  
        

      <!--       <div class="col-lg-10 col-sm-12">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum magnam, veritatis illo adipisci possimus nisi quisquam qui, praesentium perferendis ipsa culpa doloremque deleniti in ut repellendus necessitatibus dolores blanditiis aperiam?
            </div> -->
            

     
    <!--   <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-none d-sm-block">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul> -->
<!--     <h1>
              
        qweqweq
    </h1> --> 
</body>

<script>
  const delet = function(arg){
    swal({
      title: 'desea eleminar',
      text : 'asdasd',
      icon: 'warning',
      buttons: true,
      dangetMode : true,

    }).then((willDelete)=>{
      if(willDelete){
        swal('eliminado',{
          icon:'delete'
        })
      }
    })
  }
</script>
</html>