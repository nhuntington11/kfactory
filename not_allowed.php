<?php

require_once 'header.html';

echo <<<_BODY
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="login.php">Kitten Factory</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</header>

<body>
    <p>Not allowed: return <a href='index.php'>Home</a></p>
</body>
_BODY;

require_once 'footer.html';

?>