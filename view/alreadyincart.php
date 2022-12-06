<?php
session_start();
    // $_SESSION["alreadycart"] = "error";

if($_SESSION["alreadycart"] == "error"){
?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
    icon: 'error',
    title: 'Item already in cart',
    showConfirmButton: false,
    timer: 4000,
});


// unset($_SESSION["alreadycart"]);
</script>
<?php
}
?>
