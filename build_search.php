<?php
$output_file = 'assets/data/search-index.json';
$index_data = [];

// 1. Define your custom name mapping
$customTitles = [
    'index' => 'Home',
    'publicDocuments' => 'Public Documents',
    'about' => 'About PUSD',
    'calendar' => 'District Calendar'
];

$directory = new RecursiveDirectoryIterator(__DIR__);
$iterator = new RecursiveIteratorIterator($directory);
$files = new RegexIterator($iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

foreach ($files as $file) {
    $filePath = $file[0];
    $filename = basename($filePath);
    $filenameClean = str_replace('.php', '', $filename);

    // Skip system files and the indexer itself
    if (in_array($filename, ['header.php', 'footer.php', 'build_search.php'])) continue;

    if (is_file($filePath) && is_readable($filePath)) {
        $content = file_get_contents($filePath);
        
        // 2. Logic to determine the title
        if (array_key_exists($filenameClean, $customTitles)) {
            // Use custom map if exists
            $pageTitle = $customTitles[$filenameClean];
        } else {
            // Otherwise try to extract <title> or fallback to filename
            preg_match('/<title>(.*?)<\/title>/is', $content, $matches);
            $pageTitle = isset($matches[1]) ? trim($matches[1]) : ucfirst($filenameClean);
        }
        
        // Clean up the text for searching
        $text = preg_replace('/<\?php.*?\?>/s', '', $content);
        $text = strip_tags($text);
        $text = preg_replace('/\s+/', ' ', $text);
        $text = trim(substr($text, 0, 500));
        
        if (!empty($text)) {
            // We strip the local directory path and add a / at the start
            $relativePath = str_replace([__DIR__, '\\'], ['', '/'], $filePath);
            $finalLink = '/' . ltrim($relativePath, '/');

            $index_data[] = [
                'title' => $pageTitle,
                'link'  => $finalLink, // Now it will be /pages/Board of Trustees.php
                'text'  => trim(substr($text, 0, 500))
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