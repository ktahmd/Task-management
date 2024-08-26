<?php
      if (isset($_SESSION['msg'])) {
        $msg_type = isset($_SESSION['msg_type']) ? $_SESSION['msg_type'] : 'success';  
        echo "<div class='alert {$msg_type}'>";
        echo "<span class='closebtnA' onclick=\"this.parentElement.style.display='none';\">&times;</span>";
        echo htmlspecialchars($_SESSION['msg'], ENT_QUOTES, 'UTF-8');
        echo "</div>";
        unset($_SESSION['msg']);
        unset($_SESSION['msg_type']);
      }
?>

