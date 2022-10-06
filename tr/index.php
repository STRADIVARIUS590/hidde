<?php include_once 'app/config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
 
    <?php include 'layouts/head.template.php' ?>
    <?php include 'layouts/scripts.template.php'?>
<style>
    .col{
        border: 1px solid red;
    }
</style>
    <title>Document</title>
</head>
<body>


    <div class="container-fluid ">
        <div class="row justify-content-center">

            <div class="col-md-6">  
                <form action='<?= BASE_PATH ?>auth'   method="POST">

                    <fieldset>
                        <legend>Datos</legend>
                        <label class="form-outline mb-1">Name</label>
                        <input  name= 'name'type="text" class="form-control mb-4" placeholder="nombre" value="crve_19@alu.uabcs.mx">
                        <label class="form-outline mb-1">Password</label>
                        <input name='pass' type="password" class="form-control mb-4" placeholder="Password" value="A9*27rh6%#271N">

                        <input type="hidden" value="<?= $_SESSION['gbtoken'];?>" name="gbtoken">
                        <button type="submit" class="btn btn-danger">Ok</button>
                        <input type="hidden" name='action'action='access' value="access">
                    </fieldset>
                </form>
            </div>
        </div>
    </div> 

<!--     <div class="container">
        <section>
            <div class="row">
                <div class="col">
                    Col
                </div>
                <div class="col">
                    Col
                </div>
                <div class="col">
                    col
                </div>
            </div>
        </section>
    </div>
 -->
<!--     <h1>Acceso al panel</h1>
    <div class="container mx-auto justify-center flex   ">
        
            <form action="">
                <fieldset>
                    <div class="columns-1">
                        <legend>
                            Datos
                        </legend>
                 
                        <input
                        type="text"
                        class="w-full bg-white  border border-solid py-1"
                        id=""
                        placeholder="Email"
                      />
                      <br>
                      <br>
                        
                        
                  
                        <input type="text" 
                        class="w-full border border-solid bg-white py-1"
                        name="" id=""
                        placeholder="Password">
                        <button type="button"  class="px-12 py-2 bg-green-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                        >Ok</button>
                      
                       
                    </div>
            </fieldset>
        </form>
    
    </div> -->
   <!-- JavaScript Bundle with Popper -->
 
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="">       
        <div class="modal-body">
        <div class="input-group">
            <span class="input-group-text">With textarea</span>
            <textarea name='name' class="form-control" aria-label="With textarea"></textarea>
        </div>
        <div class="input-group">
            <span class="input-group-text">With textarea</span>
            <textarea class="form-control" aria-label="With textarea"></textarea>
        </div><div class="input-group">
            <span class="input-group-text">With textarea</span>
            <textarea class="form-control" aria-label="With textarea"></textarea>

        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>