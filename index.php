<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="/styles/index.css"> -->
  <title>Welcome | ABX Blogs</title>
  <?php // include "./components/toggle_tailwind.php" ?>

  <head>
    <link rel="stylesheet" href="/web/assets/styles/tw.css">
    <script src="https://flowbite.com/docs/flowbite.min.js"></script>
    <script src="https://flowbite.com/docs/datepicker.min.js"></script>
  </head>
</head>

<body>
  <?php include "./components/header.php"; ?>

  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
        <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our Blog</h2>
        <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test assumptions
          and connect with the needs of your audience early and often.</p>
      </div>
      <div class="grid gap-8 lg:grid-cols-2">
      <?php
      include "./controllers/connect.blog.php";

      // $query = "SELECT a.nama, c.judul FROM user a, kategori b, artikel c, kontributor d WHERE a.id_user = d.id_user AND c.id_artikel = d.id_artikel";
      $query = "SELECT a.nama, c.*, d.id_kontributor, b.nama_kategori FROM user a JOIN artikel c JOIN kontributor d JOIN kategori b ON a.id_user = d.id_user AND c.id_artikel = d.id_artikel AND b.id_kategori = d.id_kategori";
      $result = $conn->query($query);

      while ($res = $result->fetch_assoc()) { ?>

        <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
          <div class="flex justify-between items-center mb-5 text-gray-500">
            <span
              class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
              </svg>
              <?php echo $res['nama_kategori']; ?>
            </span>
          </div>
          <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a
              href="#"><?php echo $res['judul']; ?></a></h2>
          <p class="mb-5 font-light text-gray-500 dark:text-gray-400"><?php echo (strlen($res['isi']) > 200) ? substr($res['isi'], 0, 200) . "..." : $res['isi']; ?></p>
          <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
              <img class="w-7 h-7 rounded-full"
                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                alt="Jese Leos avatar" />
              <span class="font-medium dark:text-white"><?php echo $res['nama']; ?></span>
            </div>
            <a href="./blogs/blog.php?id=<?php echo $res['id_kontributor']; ?>"
              class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
              Read more
              <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                  clip-rule="evenodd"></path>
              </svg>
            </a>
          </div>
        </article>

      <?php
      }
      ?>
      </div>
    </div>
  </section>

  
</body>

</html>