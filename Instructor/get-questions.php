<?php

// Initialize a cURL session
$ch = curl_init();

// Set the URL and query parameters
$url = 'https://questions.aloc.com.ng/api/v2/q-subjects-group?number=7&subject1=mathematics&subject2=english';

// Set the necessary headers
$headers = [
    'AccessToken: ALOC-66e1a6d126669f48c899' // Replace <value> with your actual Access Token
];

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // Set the headers

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    $data = json_decode($response, true);
    // Print the response
    // Check if the response is successful
if ($data['status'] === 200) {
    echo "<h1>{$data['data']['subject1']['subject']}</h1>";

    foreach ($data['data']['subject1']['data'] as $question) {
        echo "<div class='question'>";
        echo "<h2>Question ID: {$question['id']}</h2>";
        echo "<p><strong>Question:</strong> " . $question['question'] . "</p>";
        
        echo "<h3>Options:</h3>";
        echo "<ul>";
        foreach ($question['option'] as $key => $option) {
            echo "<li><strong>{$key}:</strong> " . htmlspecialchars($option) . "</li>";
        }
        echo "</ul>";

        echo "<p><strong>Correct Answer:</strong> " . $question['answer'] . "</p>";
        echo "<p><strong>Solution:</strong> " . $question['solution'] . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>Error fetching data: {$data['message']}</p>";
}
}

// Close the cURL session
curl_close($ch);
?>