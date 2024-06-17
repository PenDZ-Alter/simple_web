<?php
  include "../controllers/connect.blog.php";
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="/styles/blogs.css"> -->
  <title>Blogs | ABX Blogs</title>
  <?php include "../components/toggle_tailwind.php" ?>
</head>

<body>
  <?php include "../components/header.php"; ?>
  <!-- Content Here -->
  <main class="flex-1 bg-gray-900 py-6 px-4 font-roboto">
    <div class="container mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Card Example -->
        <div class="bg-gray-800 text-white p-4 rounded-lg shadow flex items-center justify-center flex-col">
          <h3 class="text-xl font-semibold">Total Posts</h3>
          <p class="mt-2 text-3xl font-bold">120</p>
        </div>
        <div class="bg-gray-800 text-white p-4 rounded-lg shadow flex items-center justify-center flex-col">
          <h3 class="text-xl font-semibold">Total Comments</h3>
          <p class="mt-2 text-3xl font-bold">305</p>
        </div>
        <div class="bg-gray-800 text-white p-4 rounded-lg shadow flex items-center justify-center flex-col">
          <h3 class="text-xl font-semibold">Total Users</h3>
          <p class="mt-2 text-3xl font-bold">75</p>
        </div>
      </div>

      <!-- Blog Posts List -->
      <div class="mt-6">
        <h2 class="text-2xl font-bold text-white">Recent Posts</h2>
        <div class="mt-4">
          <div class="bg-gray-800 text-white p-4 rounded-lg shadow mb-4">
            <h3 class="text-xl font-semibold">Post Title 1</h3>
            <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor...</p>
            <div class="mt-4 flex justify-between items-center">
              <span>Author: John Doe</span>
              <a href="#" class="text-blue-500 hover:underline">Read more</a>
            </div>
          </div>
          <div class="bg-gray-800 text-white p-4 rounded-lg shadow mb-4">
            <h3 class="text-xl font-semibold">Post Title 2</h3>
            <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor...</p>
            <div class="mt-4 flex justify-between items-center">
              <span>Author: Jane Doe</span>
              <a href="#" class="text-blue-500 hover:underline">Read more</a>
            </div>
          </div>
          <div class="bg-gray-800 text-white p-4 rounded-lg shadow mb-4">
            <h3 class="text-xl font-semibold">Post Title 3</h3>
            <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor...</p>
            <div class="mt-4 flex justify-between items-center">
              <span>Author: Alice Smith</span>
              <a href="#" class="text-blue-500 hover:underline">Read more</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>