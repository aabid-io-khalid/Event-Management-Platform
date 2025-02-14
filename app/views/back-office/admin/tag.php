<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tags</title>

  <!-- Font Awesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Custom CSS File Link -->
  <link rel="stylesheet" href="../css/style2.css">
</head>

<body>

  <!-- Start Header -->
  <?php require_once "header.php" ?>
  <!-- End Header -->

  <!-- Side Bar Start -->
  <?php require_once "sideBar.php" ?>
  <!-- Side Bar End -->

  <!-- Body Start -->
  <section class="home-grid">
    <!-- Add Tag Button -->
    <button class="add-Tag-button bg-blue-500 text-white px-4 py-2 rounded-lg mb-4 hover:bg-blue-600 transition-colors duration-200" onclick="openAddTagModal()">
        <i class="fas fa-plus mr-2"></i> Add Tag
    </button>

    <!-- Add Tag Modal -->
    <div id="addTagModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4">Add New Tag</h2>
            <form id="addTagForm" action="tag?action=add" method="POST">
                <input type="text" name="name" id="newTagName" class="border border-gray-300 rounded-md px-3 py-2 w-full mb-4" placeholder="Enter Tag name" required>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                        Add
                    </button>
                    <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg ml-2 hover:bg-gray-400 transition-colors duration-200" onclick="closeAddTagModal()">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="tags-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php
   // tags Grid
    foreach ($tags as $tag): ?>
        <div class="Tag-grid bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <span class="px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-xl font-medium">
                <?php echo htmlspecialchars($tag['nom']); ?>
                </span>
                <div class="flex items-center gap-2">
                    <!-- Update Tag Button -->
                    <button class="text-gray-400 hover:text-gray-500 transition-colors duration-200" onclick="openUpdateTagModal(<?php echo $tag['id']; ?>, '<?php echo htmlspecialchars($tag['nom']); ?>')">
                        <i class="fas fa-pencil"></i>
                    </button>
                    <!-- Delete Tag Button -->
                    <a class="text-gray-400 hover:text-red-500 transition-colors duration-200" href="tag?action=delete&id=<?php echo $tag['id']; ?>">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
  <!-- Body End -->

  <!-- Update Tag Modal -->
  <div id="updateTagModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
      <div class="bg-white rounded-lg p-6 w-full max-w-md">
          <h2 class="text-lg font-semibold mb-4">Update Tag</h2>
          <form id="updateTagForm" action="tag?action=update&id=" method="POST">
              <input type="hidden" name="id" id="updateTagId">
              <input type="text" name="name" id="updateTagName" class="border border-gray-300 rounded-md px-3 py-2 w-full mb-4" placeholder="Enter Tag name" required>
              <div class="flex justify-end">
                  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                      Update
                  </button>
                  <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg ml-2 hover:bg-gray-400 transition-colors duration-200" onclick="closeUpdateTagModal()">
                      Cancel
                  </button>
              </div>
          </form>
      </div>
  </div>

  <!-- Custom JS File Link -->
  <script src="../js/script.js"></script>
  <script>
    function openAddTagModal() {
        document.getElementById('addTagModal').classList.remove('hidden');
    }

    function closeAddTagModal() {
        document.getElementById('addTagModal').classList.add('hidden');
    }

    function openUpdateTagModal(id, name) {
        document.getElementById('updateTagId').value = id;
        document.getElementById('updateTagForm').action += id;
        document.getElementById('updateTagName').value = name;
        document.getElementById('updateTagModal').classList.remove('hidden');
    }

    function closeUpdateTagModal() {
        document.getElementById('updateTagModal').classList.add('hidden');
    }

  </script>

</body>

</html>