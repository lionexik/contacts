<?php 
/**
 * Main page with all contacts
 */

  include 'class/Contact_class.php';

  session_start();

  $contactObj = new ContactManager();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Page with contacts.">

    <title>My contacts</title>
  </head>
  <body>
    <h1>Contacts</h1>


<?php 
  if(isset($_SESSION["message"])) {
    echo "<div>" . $_SESSION["message"] . "</div>";
    unset($_SESSION["message"]);
  }
?>

     <form action="/components/new_contact.php" method="post">
      <table>
        <thead>
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
  
  $i = 0;

  $res = $contactObj->getAllContacts();

  while($contact = $res->fetch_object()) {
?>
          <tr>
            <th scope="row"><?php echo ++$i; ?></th>
            <td><?php echo htmlspecialchars($contact->name) . " " . htmlspecialchars($contact->surname); ?></td>
            <td><?php echo htmlspecialchars($contact->number); ?></td>
            <td><?php echo htmlspecialchars($contact->email); ?></td>
            <td><?php echo htmlspecialchars($contact->note); ?></td>
            <td><a href="/<?php echo $contact->url; ?>">Edit</a><a href="/components/delete_contact.php?id=<?php echo $contact->id; ?>" >Delete</a></td>
          </tr>

<?php

  }


?>      
       
          <tr>
            
              <th scope="row"><?php echo ++$i; ?></th>
              <td><input type="text" id="name" name="name" placeholder="First Name" required><input type="text" id="surname" name="surname" placeholder="Surname" required></td>
              <td><input type="text" id="number" name="number" placeholder="Phone number"></td>
              <td><input type="email" id="email" name="email" placeholder="Email"></td>
              <td><textarea id="note" name="note" placeholder="Note"></textarea></td>
              <td><input type="submit" value="Save"></td>
            

          </tr>
        
        </tbody>
      </table>
    </form>
  </body>
</html>