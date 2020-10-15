<?php 

  include 'database.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>My contacts</title>
  </head>
  <body>
    <h1>Contacts</h1>


      <table class="table">
        <thead class="thead-light">
          <tr>

            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone number</th>
            <th scope="col">Email</th>
            <th scope="col">Note</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
          

<?php

  $sql = "SELECT * FROM Contact";
  $res = $mysqli->query($sql);
  $i = 0;

  while($contact = $res->fetch_object()) {
?>
          <tr>
            <th scope="row"><?php echo ++$i; ?></th>
            <td><?php echo htmlspecialchars($contact->name) . " " . htmlspecialchars($contact->surname); ?></td>
            <td><?php echo htmlspecialchars($contact->number); ?></td>
            <td><?php echo htmlspecialchars($contact->email); ?></td>
            <td><?php echo htmlspecialchars($contact->note); ?></td>
            <td><a href="/<?php echo $contact->url; ?>" class="btn btn-primary">Edit</a><a href="/components/delete_contact.php?id=<?php echo $contact->id; ?>" class="btn btn-danger">Delete</a></td>
          </tr>

<?php

  }

?>
          <tr>
            <form action="/components/new_contact.php" method="post">
              <th scope="row"><?php echo ++$i; ?></th>
              <td><input type="text" id="name" name="name" placeholder="First Name" required><input type="text" id="surname" name="surname" placeholder="Surname" required></td>
              <td><input type="tel" id="number" name="number" placeholder="Phone number"></td>
              <td><input type="email" id="email" name="email" placeholder="Email"></td>
              <td><textarea id="note" name="note" placeholder="Note"></textarea></td>
              <td><input type="submit" class="btn btn-primary" value="Save"></td>
            </form>

          </tr>
        </tbody>
      </table>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>