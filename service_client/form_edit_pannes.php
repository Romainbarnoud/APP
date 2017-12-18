<?php
require('modele.php');
editPanne();
header("Location:form_details_service_client.php?id=".$_POST['id']);
?>
