<?php require 'connexion.php'; 
    session_start(); 
    if (!isset($_SESSION['admin_id'])) {
        header("Location: loginadmin.php"); 
        exit();
    }

if (isset($_POST['supp'])) {
    if (isset($_POST['commande_id'])) {
        $comID = $_POST['commande_id'];
        $id_c = $_POST['client_id'];

        $sql = "DELETE FROM commandes WHERE id_com = '$comID'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "Votre commande a été supprimée";
            $sql1 = "INSERT INTO meesage (id_c, id_com, message) VALUES ('$id_c', '$comID', '$message')";
            $messageResult = mysqli_query($con, $sql1);

            header("location:commandes.php");
            exit;
        } else {
            echo "Error deleting the commande: " . mysqli_error($con);
        }
    }
}


if (isset($_POST['accepter'])) {
    if (isset($_POST['commande_id'])) {
        $comID = $_POST['commande_id'];
        $id_c = $_POST['client_id'];

        $status = 'Accepted';
        $sql = "UPDATE commandes SET status = '$status' WHERE id_com = '$comID'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "Votre commande a été acceptée";
            $sql1 = "INSERT INTO meesage (id_c, id_com, message) VALUES ('$id_c', '$comID', '$message')";
            $messageResult = mysqli_query($con, $sql1);

            header("location:commandes.php");
            exit;
        } else {
            echo "Error accepting the commande: " . mysqli_error($con);
        }
    }
}
?>
