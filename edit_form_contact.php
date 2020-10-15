<?php

include 'database.php';

$uri = $_GET['uri'];

$stmt = $mysqli->prepare("SELECT * FROM Contact WHERE `url` = ?");

$stmt->bind_param("s", $uri);

$stmt->execute();
$res = $stmt->get_result();

$stmt->close();



echo $mysqli->error;



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Edit contact</title>
  </head>
  <body>
    <h1>Edit contact</h1>

<?php

	if($res->num_rows < 1) {
		echo "Cant find " . $uri;
	} else {
		$contact = $res->fetch_object();

?>



    <form action="/components/edit_contact.php?id=<?php echo $contact->id; ?>" method="post">
    	<input type="text" name="name" id="name" placeholder="First Name" value="<?php echo htmlspecialchars($contact->name, ENT_QUOTES); ?>">
    	<input type="text" name="surname" id="surname" placeholder="Surame" value="<?php echo htmlspecialchars($contact->surname, ENT_QUOTES); ?>">
    	<input type="tel" name="number" id="number" placeholder="Phone number" value="<?php echo htmlspecialchars($contact->number, ENT_QUOTES); ?>">
    	<input type="email" name="email" id="email" placeholder="Email" value="<?php echo htmlspecialchars($contact->email, ENT_QUOTES); ?>">
    	<textarea" name="note" id="note" placeholder="Note"><?php echo htmlspecialchars($contact->note, ENT_QUOTES); ?></textarea">
    	<input type="submit" class="btn btn-primary" value="Save">
    </form>

    <a href="/components/delete_contact.php?id=<?php echo $contact->id; ?>" class="btn btn-danger">Delete</a>

<?php
	}
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>