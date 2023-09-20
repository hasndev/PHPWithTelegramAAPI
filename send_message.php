<?php
// Set your bot API token and the chat ID of the group
$botToken = 'YOUR_BOT_API_TOKEN';
$chatID = 'YOUR_GROUP_CHAT_ID';

// Check if the message is submitted through the form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    // Get the message from the form
    $message = $_POST['message'];

    // URL to the Telegram Bot API
    $url = "https://api.telegram.org/bot$botToken/sendMessage";

    // Prepare the POST data
    $postData = [
        'chat_id' => $chatID,
        'text' => $message,
    ];

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session and close it
    $response = curl_exec($ch);
    curl_close($ch);

    // Check the response from Telegram (you can handle errors here)
    if ($response === false) {
        echo 'Error sending message';
    } else {
        echo 'Message sent successfully';
    }
} else {
    // If the form was not submitted, display an error message
    echo 'Error: Form not submitted';
}
