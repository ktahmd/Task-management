<?php
// Assuming $projectId is set
$projectId = 32; // Example project ID

// Redirect to the ProjectSetting page with the specified project ID
header("Location: ../../ProjectSetting-$projectId");
exit;
?>