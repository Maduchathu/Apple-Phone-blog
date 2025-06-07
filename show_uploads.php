<?php include 'header.php'; ?>

<div class="container my-5">
  <h2 class="mb-4">Submitted Contact Messages</h2>

  <?php
  $dataFile = 'data/submissions.json';
  if (file_exists($dataFile)) {
      $jsonData = file_get_contents($dataFile);
      $submissions = json_decode($jsonData, true);
  } else {
      $submissions = [];
  }

  if (isset($_GET['success'])) {
      echo '<div class="alert alert-success">Your message was successfully submitted!</div>';
  }

  if (empty($submissions)) {
      echo '<p>No submissions found.</p>';
  } else {
      echo '<div class="row row-cols-1 row-cols-md-2 g-4">';
      foreach ($submissions as $item) {
          echo '<div class="col">';
          echo '<div class="card h-100 shadow-sm">';
          if (!empty($item['image'])) {
              echo '<img src="uploads/' . htmlspecialchars($item['image']) . '" class="card-img-top" alt="Uploaded Image">';
          }
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . htmlspecialchars($item['name']) . ' (' . htmlspecialchars($item['email']) . ')</h5>';
          echo '<h6 class="card-subtitle mb-2 text-muted">' . htmlspecialchars($item['subject']) . '</h6>';
          echo '<p class="card-text">' . nl2br(htmlspecialchars($item['message'])) . '</p>';
          echo '</div>';
          echo '<div class="card-footer text-muted">' . htmlspecialchars($item['date']) . '</div>';
          echo '</div>';
          echo '</div>';
      }
      echo '</div>';
  }
  ?>
</div>

<?php include 'footer.php'; ?>
