<div class="chat">
<?php
while ($data = $chat->fetch()) {
  echo $data['nom']," : ",$data['message']; ?>
<br>
<?php
}
?>
</div>
