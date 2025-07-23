<meta http-equiv ="refresh" content ="1">

<div>
    <?php
    $chatFile="chat.html";
    $chat=file_exists($chatFile)? file_get_contents($chatFile) : "";

    echo nl2br($chat);

    echo"<br/>";
    ?>

</div>