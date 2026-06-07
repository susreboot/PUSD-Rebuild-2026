<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$output_file = $root . '/assets/data/search-index.json';
$index_data = [];

$customTitles = [
    'index'          => 'Home',
    'publicDocuments'=> 'Public Documents',
    'about'          => 'About PUSD',
    'calendar'       => 'District Calendar'
];

// ↓ was: new RecursiveDirectoryIterator(__DIR__)
$directory = new RecursiveDirectoryIterator($root . '/pages');
$iterator  = new RecursiveIteratorIterator($directory);
$files     = new RegexIterator($iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

foreach ($files as $file) {
    $filePath      = $file[0];
    $filename      = basename($filePath);
    $filenameClean = str_replace('.php', '', $filename);

    if (in_array($filename, ['header.php', 'footer.php', 'build_search.php'])) continue;

    if (is_file($filePath) && is_readable($filePath)) {
        $content = file_get_contents($filePath);

        if (array_key_exists($filenameClean, $customTitles)) {
            $pageTitle = $customTitles[$filenameClean];
        } else {
            preg_match('/<title>(.*?)<\/title>/is', $content, $matches);
            $pageTitle = isset($matches[1]) ? trim($matches[1]) : ucfirst($filenameClean);
        }

        // Strip PHP code first, then HTML tags
        $text = preg_replace('/<\?php.*?\?>/s', '', $content);
        $text = strip_tags($text);
        $text = preg_replace('/\s+/', ' ', $text);
        $text = trim(substr($text, 0, 500));

        if (!empty($text)) {
            // ↓ was: str_replace([__DIR__, '\\'], ...)
            $relativePath = str_replace([$root, '\\'], ['', '/'], $filePath);
            $finalLink    = '/' . ltrim($relativePath, '/');

            $index_data[] = [
                'title' => $pageTitle,
                'link'  => $finalLink,
                'text'  => $text
            ];
        }
    }
}

if (file_put_contents($output_file, json_encode($index_data, JSON_PRETTY_PRINT))) {
    echo "Success! Index generated with " . count($index_data) . " files.";
} else {
    echo "Error: Could not write to " . $output_file;
}
?>