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

</head>

<body>

  <!-- start header  -->
  <?php require_once "header.php" ?>
  <!-- end header  -->

  <!-- side bar start  -->
  <?php require_once "sideBar.php" ?>
  <!-- side bar end  -->




  <!-- body Start -->
  <section class="home-grid">
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-2 mb-5">
      <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div class="rounded-md bg-indigo-500 p-4">
                <i class="fas fa-users text-white text-2xl"></i>
              </div>
            </div>
            <div class="ml-5 w-0 flex-1">
              <dl>
                <dt class="text-lg font-medium text-gray-500 truncate">Total Participants</dt>
                <dd class="text-2xl font-semibold text-gray-900"><?= $statistique['total_participants'] ?></dd>
              </dl>
            </div>
          </div>
        </div>
       
      </div>

      <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div class="rounded-md bg-purple-500 p-4"> 
                <i class="fas fa-user-tie text-white text-2xl"></i>
              </div>
            </div>
            <div class="ml-5 w-0 flex-1">
              <dl>
                <dt class="text-lg font-medium text-gray-500 truncate">Total Events</dt>
                <dd class="text-2xl font-semibold text-gray-900"><?= $statistique['total_events'] ?></dd>
              </dl>
            </div>
          </div>
        </div>
        
      </div>
    </div>

<!-- ajouter events start  -->
<section class="min-h-screen bg-gradient-to-br from-[#8e44ad] to-[#9b59b6] py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <!-- Header with animated gradient text -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold text-white mb-4">
                Create New Event
            </h1>
            <p class="text-xl text-purple-100">Design your next amazing event</p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8 backdrop-blur-lg bg-opacity-95">
        <form action="home" method="POST" class="space-y-8">
    <!-- Title Section -->
    <div class="space-y-6 bg-purple-50 p-6 rounded-xl">
        <div class="transform transition duration-300 hover:scale-[1.01]">
            <label for="event_title" class="block text-2xl font-bold text-[#8e44ad] mb-3">Event Title</label>
            <input type="text" id="event_title" name="event_title" required
                class="w-full px-6 py-4 text-xl border-2 border-purple-300 rounded-xl focus:ring-4 focus:ring-[#8e44ad] focus:border-[#8e44ad] transition duration-300 hover:border-[#8e44ad]"
                placeholder="Enter event title">
        </div>

        <div class="transform transition duration-300 hover:scale-[1.01]">
            <label for="event_description" class="block text-2xl font-bold text-[#8e44ad] mb-3">Description</label>
            <textarea id="event_description" name="event_description" rows="5"
                class="w-full px-6 py-4 text-xl border-2 border-purple-300 rounded-xl focus:ring-4 focus:ring-[#8e44ad] focus:border-[#8e44ad] transition duration-300 hover:border-[#8e44ad]"
                placeholder="Write a detailed description of your event"></textarea>
        </div>
    </div>

    <!-- Categories and Tags Section -->
    <div class="space-y-6 bg-purple-50 p-6 rounded-xl">
        <div class="transform transition duration-300 hover:scale-[1.01]">
            <label class="block text-2xl font-bold text-[#8e44ad] mb-3">Categories</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <?php foreach ($categories as $categorie): ?>
                    <label class="cursor-pointer">
                        <input type="radio" name="event_category" value="<?php echo htmlspecialchars($categorie['id']); ?>" class="hidden peer">
                        <div class="px-4 py-3 border-2 border-purple-300 rounded-lg text-center peer-checked:bg-[#8e44ad] peer-checked:text-white transition-all duration-300 hover:border-[#8e44ad]">
                            <?php echo htmlspecialchars($categorie['nom']); ?>
                        </div>
                    </label> 
                <?php endforeach; ?>
            </div>
        </div>
        <div class="transform transition duration-300 hover:scale-[1.01]">
            <label class="block text-2xl font-bold text-[#8e44ad] mb-3">Tags</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <?php foreach ($tags as $tag): ?>
                    <label class="cursor-pointer">
                        <input type="checkbox" name="event_tags[]" value="<?php echo htmlspecialchars($tag['id']); ?>" class="hidden peer">
                        <div class="px-4 py-3 border-2 border-purple-300 rounded-lg text-center peer-checked:bg-[#8e44ad] peer-checked:text-white transition-all duration-300 hover:border-[#8e44ad]">
                            <?php echo htmlspecialchars($tag['nom']); ?>
                        </div>
                    </label> 
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Details Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-purple-50 p-6 rounded-xl">
        <div class="transform transition duration-300 hover:scale-[1.01]">
            <label for="event_date" class="block text-2xl font-bold text-[#8e44ad] mb-3">Date</label>
            <input type="date" id="event_date" name="event_date" required
                class="w-full px-6 py-4 text-xl border-2 border-purple-300 rounded-xl focus:ring-4 focus:ring-[#8e44ad] focus:border-[#8e44ad] transition duration-300 hover:border-[#8e44ad]">
        </div>

        <div class="transform transition duration-300 hover:scale-[1.01]">
            <label for="event_location" class="block text-2xl font-bold text-[#8e44ad] mb-3">Location</label>
            <input type="text" id="event_location" name="event_location"
                class="w-full px-6 py-4 text-xl border-2 border-purple-300 rounded-xl focus:ring-4 focus:ring-[#8e44ad] focus:border-[#8e44ad] transition duration-300 hover:border-[#8e44ad]"
                placeholder="Enter event location">
        </div>

        <div class="transform transition duration-300 hover:scale-[1.01]">
            <label for="event_price" class="block text-2xl font-bold text-[#8e44ad] mb-3">Price</label>
            <div class="relative">
                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-xl text-gray-500">$</span>
                <input type="number" id="event_price" name="event_price" step="0.01" required
                    class="w-full pl-12 pr-6 py-4 text-xl border-2 border-purple-300 rounded-xl focus:ring-4 focus:ring-[#8e44ad] focus:border-[#8e44ad] transition duration-300 hover:border-[#8e44ad]"
                    placeholder="0.00">
            </div>
        </div>

        <div class="transform transition duration-300 hover:scale-[1.01]">
            <label for="event_capacity" class="block text-2xl font-bold text-[#8e44ad] mb-3">Capacity</label>
            <input type="number" id="event_capacity" name="event_capacity" required
                class="w-full px-6 py-4 text-xl border-2 border-purple-300 rounded-xl focus:ring-4 focus:ring-[#8e44ad] focus:border-[#8e44ad] transition duration-300 hover:border-[#8e44ad]"
                placeholder="Enter maximum capacity">
        </div>
    </div>

    <!-- Image Upload Section -->
    <div class="bg-purple-50 p-6 rounded-xl transform transition duration-300 hover:scale-[1.01]">
        <label for="event_image" class="block text-2xl font-bold text-[#8e44ad] mb-3">Event Image</label>
        <div class="flex items-center justify-center w-full">
            <label class="flex flex-col items-center justify-center w-full h-64 border-2 border-purple-300 border-dashed rounded-xl cursor-pointer hover:bg-purple-50 transition duration-300">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-12 h-12 mb-4 text-[#8e44ad]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <p class="mb-2 text-xl text-[#8e44ad]">Drop your image here or click to upload</p>
                    <p class="text-sm text-purple-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <input type="file" id="event_image" name="event_image" accept="image/*" class="hidden">
            </label>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="flex justify-end pt-6">
        <button type="submit"
            class="px-12 py-4 text-xl font-bold text-white bg-[#8e44ad] rounded-xl hover:bg-[#9b59b6] focus:outline-none focus:ring-4 focus:ring-purple-500 transform transition duration-300 hover:scale-105">
            Create Event
        </button>
    </div>
</form>

        </div>
    </div>
</section>
<!-- ajouter events end  -->
  </section>
  <!-- body end -->











  <!-- start footer -->
  
  <!-- end footer -->
  <!-- custom js file link  -->
  <script src="../js/script.js"></script>


</body>

</html>