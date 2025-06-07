<?php include 'header.php'; ?>

<div class="container my-5">
  <section class="py-5 text-center bg-white rounded shadow-sm mb-5">
    <h1 class="display-5 fw-bold">Welcome to Our Shop</h1>
    <p class="lead text-muted">Get the latest Apple products from Embilipitiya, Sri Lanka</p>
  </section>

  <div class="row g-4">
    <!-- Contact Info -->
    <div class="col-md-4">
      <div class="bg-white p-4 rounded shadow-sm h-100">
        <h5 class="fw-bold mb-3">Contact Information</h5>
        <p><strong>Phone:</strong> 0704655268</p>
        <p><strong>Address:</strong> Embilipitiya, Sri Lanka</p>
        <p><strong>GitHub:</strong> <a href="https://github.com/Maduchathu" target="_blank">github.com/Maduchathu</a></p>
      </div>
    </div>

    <!-- Contact Form -->
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">Contact Us</h5>
        </div>
        <div class="card-body">
          <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="col-12">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject">
              </div>
              <div class="col-12">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
              </div>
              <div class="col-12">
                <label for="image" class="form-label">Upload an Image</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
