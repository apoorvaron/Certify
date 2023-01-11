<?php    session_start(); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
    .swal-overlay {
        background-color: #0e1d34;
    }
    .swal-button {
        padding: 7px 19px;
        border-radius: 2px;
        background-color: #4962B3;
        font-size: 12px;
        border: 1px solid #3e549a;
        text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
    }
</style>

<script>$(document).ready(function() {
            swal("<?php echo $_SESSION['alertmsz'] ?>","<?php echo $_SESSION['desc'] ?>","<?php echo $_SESSION['error'] ?>").then(function() {
                window.location.replace("<?php echo $_SESSION['redirection'] ?>");
            });
        });
</script>