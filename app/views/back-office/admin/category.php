<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categories</title>

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
    <!-- Add Category Button -->
    <button class="add-category-button bg-blue-500 text-white px-4 py-2 rounded-lg mb-4 hover:bg-blue-600 transition-colors duration-200" onclick="openAddCategoryModal()">
        <i class="fas fa-plus mr-2"></i> Add Category
    </button>

    <!-- Add Category Modal -->
    <div id="addCategoryModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4">Add New Category</h2>
            <form id="addCategoryForm" action="category?action=add" method="POST">
                <input type="text" name="name" id="newCategoryName" class="border border-gray-300 rounded-md px-3 py-2 w-full mb-4" placeholder="Enter category name" required>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                        Add
                    </button>
                    <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg ml-2 hover:bg-gray-400 transition-colors duration-200" onclick="closeAddCategoryModal()">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="categories-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php
   // Categories Grid
    foreach ($categories as $categorie): ?>
        <div class="Category-grid bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <span class="px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-xl font-medium">
                <?php echo htmlspecialchars($categorie['nom']); ?>
                </span>
                <div class="flex items-center gap-2">
                    <!-- Update Category Button -->
                    <button class="text-gray-400 hover:text-gray-500 transition-colors duration-200" onclick="openUpdateCategoryModal(<?php echo $categorie['id']; ?>, '<?php echo htmlspecialchars($categorie['nom']); ?>')">
                        <i class="fas fa-pencil"></i>
                    </button>
                    <!-- Delete Category Button -->
                    <a class="text-gray-400 hover:text-red-500 transition-colors duration-200" href="category?action=delete&id=<?php echo $categorie['id']; ?>">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
  <!-- Body End -->

  <!-- Update Category Modal -->
  <div id="updateCategoryModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
      <div class="bg-white rounded-lg p-6 w-full max-w-md">
          <h2 class="text-lg font-semibold mb-4">Update Category</h2>
          <form id="updateCategoryForm" action="category?action=update&id=" method="POST">
              <input type="hidden" name="id" id="updateCategoryId">
              <input type="text" name="name" id="updateCategoryName" class="border border-gray-300 rounded-md px-3 py-2 w-full mb-4" placeholder="Enter category name" required>
              <div class="flex justify-end">
                  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                      Update
                  </button>
                  <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg ml-2 hover:bg-gray-400 transition-colors duration-200" onclick="closeUpdateCategoryModal()">
                      Cancel
                  </button>
              </div>
          </form>
      </div>
  </div>

  <!-- Custom JS File Link -->
  <script src="../js/script.js"></script>
  <script>
    function openAddCategoryModal() {
        document.getElementById('addCategoryModal').classList.remove('hidden');
    }

    function closeAddCategoryModal() {
        document.getElementById('addCategoryModal').classList.add('hidden');
    }

    function openUpdateCategoryModal(id, name) {
        document.getElementById('updateCategoryId').value = id;
        document.getElementById('updateCategoryForm').action += id;
        document.getElementById('updateCategoryName').value = name;
        document.getElementById('updateCategoryModal').classList.remove('hidden');
    }

    function closeUpdateCategoryModal() {
        document.getElementById('updateCategoryModal').classList.add('hidden');
    }

    function deleteCategory(id) {
        if (confirm('Are you sure you want to delete this category?')) {
            window.location.href = `category?action=delete&id=${id}`;
        }
    }
  </script>

</body>

</html>