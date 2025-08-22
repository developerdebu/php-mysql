<!DOCTYPE html>
<html>
<head>
    <title>MVC Demo</title>
</head>
<body>
    <h1>Hello, <?= htmlspecialchars($user->name) ?>!</h1>
    <p>Email: <?= htmlspecialchars($user->email) ?></p>
</body>
</html>
