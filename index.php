<?php 

  //connect to db
  include('./db_config.php');

  //query string
  $sql = "SELECT * FROM todo_list";
  $result=$conn->query($sql);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- css -->
    <style>

      body{

        background-color: #8EC5FC;
        background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);



      }
        .updateModal{
          padding:20px;
            overflow:hidden;
            position:fixed; 
            height:100%;
            width:100%;
            background:rgba(0,0,0,0.6);
            
            display:none;
        }

        .modal-content{
          position:relative;
          background-color: #8EC5FC;
          background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
          height:160px;
          width:50%;
          margin:100px auto;
          padding:30px;
          
        }

        .invisible{
          display: none;
          
        }

        .visible{
          display: block;
        
        }

        td{
          font-size:30px;
        }
       
        .btn-wrap{
        
           position:absolute;
           right:35px;
        }
    </style>
  </head>
  <body>
    
  <div class="updateModal">
    <div class="modal-content">
    <form action="./update-todo.php" method="GET">
        <input type="hidden" name="id" id="updateID">
        <div class="form-floating mb-3">
          <input type="text" class="form-control " name="todo" id="floatingInput" placeholder="Enter new task">
          <label for="floatingInput">Enter new task</label>
         </div>
        <div class="btn-wrap">
        <button type="submit" class="btn btn-primary">UPDATE</button>
        <button class="btn btn-primary cancel">CANCEL</button>
        </div>
        
      </form>
    </div>   
    </div>
    <div class="container p-3">
  
      <form action="./save-todo.php" method="POST">
      
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="todo" id="floatingInput" placeholder="Task">
          <label for="floatingInput">Task</label>
         </div>
        <button type="submit" class="btn btn-outline-primary mt-2">Add Todo</button>
      </form>
      <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Todo Item</th>
        <th scope="col">Action</th>
      </tr>
   </thead>
    <tbody>
      <?php
        if($result->num_rows)
        {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
      
        foreach($rows as $task)
        {
          ?>
          
      <tr>
        <td scope="row" class="id"> <?php echo $task['id'] ?></td>
          <td> <?php echo $task['title'] ?></td>
          <td>
            <button class="btn btn-outline-danger update"> <a href=""> Update</a></button>
            <button class="btn btn-outline-danger"> <a href="./delete-todo.php?id=<?php echo $task['id'] ?>"> Delete</a></button>
          </td>
      </tr>
      <?php
        }
    }
      ?>
     
   
  </tbody>
</table>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>

      const cancelBtn = document.querySelector('.cancel');
      const updateID =  document.querySelector('#updateID');
      console.log(updateID);
      const modal = document.querySelector('.updateModal');
      const updateBtn = document.querySelectorAll('.update');

      //setting event listener on 'update' each button in table
      updateBtn.forEach((el) => 
      {
          el.addEventListener('click',(e)=>{
          e.preventDefault();
          modal.classList.add('visible');
          modal.classList.remove('invisible');
          let id = Number(el.parentElement.parentElement.firstElementChild.textContent);
          updateID.value = id;
          console.log(typeof id);
         
        })
      })
      console.log(updateBtn);

      cancelBtn.addEventListener('click',(e)=>{
        e.preventDefault();
        modal.classList.remove('visible');
        modal.classList.add('invisible');
      });

    </script>
  </body>
</html>