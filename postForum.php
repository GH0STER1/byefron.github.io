
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    
    $forumFile = fopen("forums/".str_replace(' ', '-', strtolower($title)).".html", "w");
    
    $forumContent = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>{$title}</title>
        <link rel='stylesheet' href='../styles.css'>
    </head>
    <body>
        <div class='container'>
            <header>
                <h1>{$title}</h1>
                <button onclick='toggleTheme()'>Toggle Dark Mode</button>
            </header>
            <main>
                <div class='forum-content'>
                    <h2>Discussion on {$title}</h2>
                    <p>{$content}</p>
                </div>
            </main>
        </div>
    </body>
    </html>
    ";
    
    fwrite($forumFile, $forumContent);
    fclose($forumFile);
    
    header("Location: ../index.html");
}
?>
