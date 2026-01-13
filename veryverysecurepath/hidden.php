<?php

$output = "";

if (isset($_POST['cmd'])) {

    $cmd = $_POST['cmd'];
    $command = $cmd;
    $blacklist = [
        "cat", "less", "more",
        "flag", "passwd",
        "whoami", "id",
        "nc", "netcat",
        "bash"
    ];
    $output = shell_exec($cmd);
    foreach ($blacklist as $bad) {
        if (stripos($command, $bad) !== false) {
            die("Command blocked.");
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Staff Terminal</title>
    <link rel="stylesheet" href="../css/horror.css">
</head>
<body>

<h2>☠ STAFF TERMINAL ☠</h2>

<p class="warning">
AUTHORIZED PERSONNEL ONLY
</p>

<form method="post">
    <input type="text" name="cmd" placeholder="enter command..." style="width:300px;">
    <br><br>
    <button type="submit">Execute</button>
</form>

<?php if ($output): ?>
<pre class="terminal">
<?= htmlspecialchars($output) ?>
</pre>
<?php endif; ?>

<p class="whisper">
It still listens.
</p>

</body>
</html>
