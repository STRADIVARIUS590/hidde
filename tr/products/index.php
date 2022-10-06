<?php 
      include_once '../app/config.php';
       include '..\app\ProductsController.php';
      $p = new ProductsController();
      $data = $p->getAll();
      $objetos = json_decode($data)->data;
  //    print_r($data);
?>
<?php
    // echo
    $brands =  ProductsController::gerBrands();
?>
  <!DOCTYPE html>
<html lang="en">
<head>
<?php  include '../layouts/head.template.php'?>
    <title>Document</title>
</head>
<body>
<?php  include '../layouts/scripts.template.php'?>
<?php  include '../layouts/nav.template.php'?>

    

    

        <div class="container-fluid">
          <div class="row">
            <a   data-bs-toggle="modal" data-bs-target="#exampleModal"class="btn btn-primary">Agregar</a>
            <?php  include '../layouts/sidebar.template.php'?>
            <div class="col-lg-10 col-sm-12">
            diandae voluptatibus molestias voluptates aut vel sint soluta ea aspernatur! Tenetur ex, inventore excepturi fugiat mollitia voluptas.
            <div class="row">
                  <?php  foreach ($objetos as $producto):?>
                    <div class="col md-4">

                      <div class='card'style='width: 18rem;'>
                        <img src="<?php  echo $producto->cover;?>" class='card-img-top' alt='...'>
                        <div class='card-body'>
                          <h5 class='card-title'><?php echo $producto->name; ?></h5>
                          <p class='card-text'><?php echo $producto->description; ?>  
                          </p>
                          <div class='row'>
                          <a href='#' class='btn btn-primary col-md-6' data-bs-toggle="modal" onclick='changeEdit(this)'  data-product=<?php echo '\''.json_encode($producto).'\'' ?> data-bs-target="#exampleModal">Editar</a>
                          <a href=<?php echo "details.php?slug=".$producto->slug.""?> class='btn btn-warning col-md-6' >Ver detalles</a>
                          <a href='#' class='btn btn-danger col-md-12' onclick="changeDelete(<?php echo $producto->id?>)">Eliminar</a>
                        </div>
                      </div>
                    </div>
                  </div>
                    <?php endforeach;?>
                </div>
                  </div>
        </div>

        


 

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
 <div class="modal-content">
   <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <form  method="POST" action="../app/ProductsController.php" enctype="multipart/form-data" >       
     <div class="modal-body">
     <div class="input-group">
         <span class="input-group-text">Name</span>
         <textarea id='name' name='name' class="form-control" aria-label="With textarea"></textarea>
     </div>
     <div class="input-group">
         <span class="input-group-text">Slug</span>
         <textarea  class="form-control"id='slug' name="slug" aria-label="With textarea"></textarea>
     </div><div class="input-group">
         <span class="input-group-text">Features</span>
         <textarea class="form-control" id='features' name="features" aria-label="With textarea"></textarea>
     </div>

     <div class="input-group">
         <span class="input-group-text">Description</span>
         <textarea name='description' id='description' class="form-control" aria-label="With textarea"></textarea>
     </div>
     <input type="hidden" name='gbtoken' value="<?= $_SESSION['gbtoken'] ?>">

<!--      <div class="input-group">
         <span class="input-group-text">Brand</span>
         <textarea name='brand_id' class="form-control" aria-label="With textarea"></textarea>
     </div> -->

     <div class="input-group">
         <span class="input-group-text">Image</span>
          <input type="file" name="imagen">
     </div>


     

     <select class="form-select" aria-label="Default select example" name = "brand_id">
        <!-- <option selected>Open this select menu</option> -->
        <?php foreach($brands as $brand): ?>
        <option value=<?php echo $brand->id?>><?php echo $brand->name?></option>
        <?php endforeach;?>
      <!--   <option value="2">Two</option>
        <option value="3">Three</option> -->
</select>

     <input type="hidden" id="action" name="action" value="create">
     <input type="hidden" id="id" name="id" value="-999">


     </div>
     <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Save changes</button>
     </div>
   </form>
 </div>
</div>
</div>
</body>
<!-- <script type="text/javascript">var token  = <php echo json_encode($_SESSION["token"]) ?>;</script> -->
<script>
 

    const changeDelete = function (id){
    document.getElementById('action').value = 'delete';
    // console.log( document.getElementById('action'));
// console.log(id);
    swal({
      title: 'desea eleminar',
      text : 'asdasd',
      icon: 'warning',
      buttons: true,
      dangetMode : true,
    }).then((willDelete)=>{
      if(willDelete){
        var bodyFormData = new FormData();
                bodyFormData.append('id', id);
                bodyFormData.append('action', 'delete');
               bodyFormData.append('gbtoken',"<?= $_SESSION['gbtoken'];?>");
                axios.post('../app/ProductsController.php', bodyFormData)
                .then(function (response){
                    console.log(response);
                    location.reload();
                })
                .catch(function (error){
                    console.log('error')
                })
        swal('eliminado',{
          icon:'delete'
        })
      }
    })
  }

  const changeEdit = function(target){
    
  document.getElementById('action').value = 'edit';

  //console.log( document.getElementById('action'));

  let prod = JSON.parse(target.getAttribute('data-product'))
   console.log(prod);


   document.getElementById('name').value = prod.name;
   document.getElementById('slug').value = prod.slug;
   document.getElementById('features').value = prod.features;
   document.getElementById('description').value = prod.description;
   document.getElementById('id').value = prod.id;
   


  }
 
</script>
</html>