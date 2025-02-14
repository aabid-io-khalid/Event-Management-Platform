<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- custom css file link  -->
  <link rel="stylesheet" href="../css/style2.css">
  <style>
    /* Add this CSS to style the popup */
    #editPopup {
      display: none; /* Hidden by default */
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    #editPopup.show {
      display: flex;
    }
  </style>
</head>

<body>

  <!-- start header  -->
  <?php require_once "header.php" ?>
  <!-- end header  -->

  <!-- side bar start  -->
  <?php require_once "sideBar.php" ?>
  <!-- side bar end  -->

  <!-- body Start -->
  <section>
    <!-- Header -->
    <div class="max-w-7xl mx-auto mb-12 text-center">
      <h1 class="text-4xl font-bold text-white mb-4">Upcoming Events</h1>
      <p class="text-purple-100">Discover amazing events happening around you</p>
    </div>

    <!-- Events Grid -->
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Event Card 1 -->
      <?php foreach ($events as $event): ?>
      <article class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300">
        <img src="<?= $event['image_url'] ?>" alt="<?= htmlspecialchars($event['titre']) ?>" class="w-full h-48 object-cover">
        <div class="p-6">
          <div class="flex justify-between items-start mb-4">
            <div>
              <h2 class="text-xl font-bold text-gray-800"><?= htmlspecialchars($event['titre']) ?></h2>
              <p class="text-purple-600"><?= $event['statut'] ?></p>
            </div>
            <span class="px-3 py-1 bg-purple-100 text-[#8e44ad] rounded-full font-semibold">
              $<?= number_format($event['prix'], 2) ?>
            </span>
          </div>

          <div class="space-y-3 mb-4">
            <div class="flex items-center gap-2 text-gray-600">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2 2v12a2 2 0 00-2 2z" />
              </svg>
              <span><?= date("F d, Y", strtotime($event['date'])) ?></span>
            </div>
            <div class="flex items-center gap-2 text-gray-600">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              </svg>
              <span><?= htmlspecialchars($event['lieu']) ?></span>
            </div>
          </div>

          <p class="text-gray-600 mb-4 line-clamp-2">
            <?= htmlspecialchars($event['description']) ?>
          </p>

          <div class="flex justify-end space-x-2 w-full">
            <button onclick="openEditPopup(<?= htmlspecialchars(json_encode($event)) ?>)" class="text-center w-[50%] px-4 py-2 bg-[#8e44ad] text-white rounded-lg hover:bg-[#9b59b6] transition duration-300">
              Edit
            </button>
            <a href="myEvents?action=delete&id=<?= $event['id'] ?>" class="text-center w-[50%] px-4 py-2 bg-[#e74c3c] text-white rounded-lg hover:bg-[#c0392b] transition duration-300">
              Delete
            </a>
          </div>
        </div>
      </article>
      <?php endforeach; ?>

      <!-- Load More Button -->
      <div class="col-span-full text-center mt-8">
        <button class="px-8 py-3 bg-white text-[#8e44ad] rounded-xl font-semibold hover:bg-purple-50 transition duration-300">
          Load More Events
        </button>
      </div>
    </div>
  </section>

  <!-- Popup Structure -->
  <div id="editPopup" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-lg">
      <h2 class="text-2xl font-bold text-[#8e44ad] mb-4">Edit Event</h2>
      <form id="editForm" action="myEvents?action=update&id=" method="POST" class="space-y-6">
        <!-- Event Title -->
        <div>
            <input type="text" id="editID" name="id" class="hidden">
          <label for="editTitle" class="block text-xl font-bold text-[#8e44ad] mb-2">Event Title</label>
          <input type="text" id="editTitle" name="title" required
            class="w-full px-4 py-2 text-lg border-2 border-purple-300 rounded-xl focus:ring-4 focus:ring-[#8e44ad] focus:border-[#8e44ad]">
        </div>

        <!-- Event Description -->
        <div>
          <label for="editDescription" class="block text-xl font-bold text-[#8e44ad] mb-2">Description</label>
          <textarea id="editDescription" name="description" rows="4"
            class="w-full px-4 py-2 text-lg border-2 border-purple-300 rounded-xl focus:ring-4 focus:ring-[#8e44ad] focus:border-[#8e44ad]"></textarea>
        </div>

        <!-- Event Date -->
        <div>
          <label for="editDate" class="block text-xl font-bold text-[#8e44ad] mb-2">Date</label>
          <input type="date" id="editDate" name="date" required
            class="w-full px-4 py-2 text-lg border-2 border-purple-300 rounded-xl focus:ring-4 focus:ring-[#8e44ad] focus:border-[#8e44ad]">
        </div>

        <!-- Event Location -->
        <div>
          <label for="editLocation" class="block text-xl font-bold text-[#8e44ad] mb-2">Location</label>
          <input type="text" id="editLocation" name="location"
            class="w-full px-4 py-2 text-lg border-2 border-purple-300 rounded-xl focus:ring-4 focus:ring-[#8e44ad] focus:border-[#8e44ad]">
        </div>

        <!-- Event Price -->
        <div>
          <label for="editPrice" class="block text-xl font-bold text-[#8e44ad] mb-2">Price</label>
          <input type="number" id="editPrice" name="price" step="0.01" required
            class="w-full px-4 py-2 text-lg border-2 border-purple-300 rounded-xl focus:ring-4 focus:ring-[#8e44ad] focus:border-[#8e44ad]">
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
          <button type="submit"
            class="px-6 py-2 text-lg font-bold text-white bg-[#8e44ad] rounded-xl hover:bg-[#9b59b6] focus:outline-none focus:ring-4 focus:ring-purple-500">
            Save Changes
          </button>
          <button type="button" id="closePopup"
            class="px-6 py-2 text-lg font-bold text-white bg-[#e74c3c] rounded-xl hover:bg-[#c0392b] focus:outline-none focus:ring-4 focus:ring-red-500 ml-2">
            Cancel
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- start footer -->

  <!-- end footer -->
  <!-- custom js file link  -->
  <script src="../js/script.js"></script>
  <script>
    // JavaScript to handle the popup functionality
    function openEditPopup(event) {
      document.getElementById('editTitle').value = event.titre;
      document.getElementById('editID').value = event.id;
      document.getElementById('editForm').action = "myEvents?action=update&id=" + event.id;
      document.getElementById('editDescription').value = event.description;
      document.getElementById('editDate').value = event.date;
      document.getElementById('editLocation').value = event.lieu;
      document.getElementById('editPrice').value = event.prix;
      document.getElementById('editPopup').classList.add('show');
    }

    document.getElementById('closePopup').addEventListener('click', function() {
      document.getElementById('editPopup').classList.remove('show');
    });
  </script>

</body>

</html>